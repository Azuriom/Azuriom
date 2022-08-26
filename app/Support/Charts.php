<?php

namespace Azuriom\Support;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use RuntimeException;

class Charts
{
    public static function count(Builder $query, string $column)
    {
        return static::aggregate($query, __FUNCTION__, '*', $column);
    }

    public static function sum(Builder $query, string $column, string $group)
    {
        return static::aggregate($query, __FUNCTION__, $column, $group);
    }

    public static function aggregate(Builder $query, string $function, string $column, string $group)
    {
        return $query->withoutEagerLoads()
            ->select($group, DB::raw("{$function}({$query->getGrammar()->wrap($column)}) as aggregate"))
            ->groupBy($group)
            ->get()
            ->pluck('aggregate', $group);
    }

    public static function countByDays(Builder $query, string $column = null, int $days = 7)
    {
        return static::aggregateByDays($query, 'count', '*', $column, $days);
    }

    public static function sumByDays(Builder $query, string $group, string $column = null, int $days = 7)
    {
        return static::aggregateByDays($query, 'sum', $group, $column, $days);
    }

    public static function aggregateByDays(Builder $query, string $function, string $group, string $column = null, int $days = 7)
    {
        $start = today()->subDays($days);

        return static::rawAggregateByDays($query, $start, $function, $group, $column)
            ->mapWithKeys(fn ($value, string $date) => [
                format_date(Carbon::createFromFormat('!Y-m-d', $date)) => $value,
            ]);
    }

    public static function rawAggregateByDays(Builder $query, Carbon $start, string $function, string $group, ?string $column)
    {
        $date = $start->clone();
        $dates = collect();
        $column = $column ?? $query->getModel()->getCreatedAtColumn();

        while ($date->isPast() || $date->isToday()) {
            $dates->put($date->format('Y-m-d'), 0);

            $date = $date->addDay();
        }

        $sqlColumn = $query->getGrammar()->wrap($column);
        $sqlGroupColumn = $query->getGrammar()->wrap($group);
        $driver = $query->getConnection()->getDriverName();
        $dateCast = $driver !== 'sqlsrv' ? "date({$sqlColumn})" : "CAST({$sqlColumn} as date)";

        $results = $query->withoutEagerLoads()
            ->select(DB::raw("{$dateCast} as date, {$function}({$sqlGroupColumn}) as aggregate"))
            ->where($column, '>', $start)
            ->groupBy($driver !== 'sqlsrv' ? 'date' : DB::raw($dateCast))
            ->orderBy('date')
            ->get()
            ->pluck('aggregate', 'date');

        return $dates->merge($results);
    }

    public static function countByMonths(Builder $query, string $column = null, int $months = 12)
    {
        return static::aggregateByMonths($query, 'count', '*', $column, $months);
    }

    public static function sumByMonths(Builder $query, string $group, string $column = null, int $months = 12)
    {
        return static::aggregateByMonths($query, 'sum', $group, $column, $months);
    }

    public static function aggregateByMonths(Builder $query, string $function, string $group, string $column = null, int $months = 12)
    {
        $start = now()->startOfMonth()->subMonths($months - 1);
        $result = static::rawAggregateByMonths($query, $start, $function, $group, $column);

        return $result->mapWithKeys(function ($value, string $date) {
            $carbon = Carbon::createFromFormat('!Y-m', $date);

            return [$carbon->translatedFormat('F Y') => $value];
        });
    }

    public static function rawAggregateByMonths(Builder $query, Carbon $start, string $function, string $group, ?string $column)
    {
        $date = $start->clone();
        $dates = collect();
        $column = $column ?? $query->getModel()->getCreatedAtColumn();

        while ($date->isPast()) {
            $dates->put($date->format('Y-m'), 0);

            $date = $date->addMonthNoOverflow();
        }

        $driver = $query->getConnection()->getDriverName();
        $rawQuery = static::getDatabaseRawQuery($driver, $query->getGrammar()->wrap($column));
        $sqlGroupColumn = $query->getGrammar()->wrap($group);

        $results = $query->withoutEagerLoads()
            ->select(DB::raw("{$rawQuery} as date, {$function}({$sqlGroupColumn}) as aggregate"))
            ->where($column, '>', $start)
            ->groupBy($driver !== 'sqlsrv' ? 'date' : DB::raw($rawQuery))
            ->orderBy('date')
            ->get()
            ->pluck('aggregate', 'date');

        return $dates->merge($results);
    }

    protected static function getDatabaseRawQuery(string $driver, string $column)
    {
        return match ($driver) {
            'mysql' => "date_format({$column}, '%Y-%m')",
            'sqlite' => "strftime('%Y-%m', {$column})",
            'pgsql' => "to_char({$column}, 'YYYY-MM')",
            'sqlsrv' => "FORMAT({$column}, 'yyyy-MM')",
            default => throw new RuntimeException('Unsupported database driver: '.$driver),
        };
    }
}
