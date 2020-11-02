<?php

namespace Azuriom\Support;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
        return $query->select($group, DB::raw("{$function}({$query->getGrammar()->wrap($column)}) as aggregate"))
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
        $date = $start->clone();
        $dates = collect();
        $column = $column ?? $query->getModel()->getCreatedAtColumn();

        while ($date->isPast() || $date->isToday()) {
            $dates->put(format_date($date), 0);

            $date = $date->addDay();
        }

        $sqlColumn = $query->getGrammar()->wrap($column);
        $sqlGroupColumn = $query->getGrammar()->wrap($group);
        $driver = $query->getConnection()->getDriverName();
        $dbRaw = null;
        if ($driver === 'sqlsrv') {
            $dbRaw = DB::raw("CAST($sqlColumn as date) as date, {$function}({$sqlGroupColumn}) as aggregate");
        } else {
            $dbRaw = DB::raw("date({$sqlColumn}) as date, {$function}({$sqlGroupColumn}) as aggregate");
        }
        $escapedColumnName = Str::between($column, '[', ']');
        $results = $query->select($dbRaw)
            ->where($column, '>', $start)
            ->groupBy($escapedColumnName)
            ->orderBy($escapedColumnName)
            ->get()
            ->mapWithKeys(function ($value) {
                $date = Carbon::createFromFormat('Y-m-d', $value->date);

                return [format_date($date) => $value->aggregate];
            });

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
        $date = $start->clone();
        $dates = collect();
        $column = $column ?? $query->getModel()->getCreatedAtColumn();

        while ($date->isPast()) {
            $dates->put($date->translatedFormat('F Y'), 0);

            $date = $date->addMonth();
        }

        $rawQuery = static::getDatabaseRawQuery($query, $query->getGrammar()->wrap($column));
        $sqlGroupColumn = $query->getGrammar()->wrap($group);
        $escapedColumnName = Str::between($column, '[', ']');
        $results = $query->select(DB::raw("{$rawQuery} as date, {$function}({$sqlGroupColumn}) as aggregate"))
            ->where($column, '>', $start)
            ->groupBy($escapedColumnName)
            ->orderBy($escapedColumnName)
            ->get()
            ->mapWithKeys(function ($result) {
                $date = Carbon::createFromFormat('Y-m', $result->date);

                return [$date->translatedFormat('F Y') => $result->aggregate];
            });

        return $dates->merge($results);
    }

    protected static function getDatabaseRawQuery(Builder $query, string $column)
    {
        $driver = $query->getConnection()->getDriverName();

        switch ($driver) {
            case 'mysql':
                return "date_format({$column}, '%Y-%m')";
            case 'sqlite':
                return "strftime('%Y-%m', {$column})";
            case 'pgsql':
                return "to_char({$column}, 'YYYY-MM')";
            case 'sqlsrv':
                return "FORMAT($column, 'yyyy-MM')";
            default:
                throw new RuntimeException('Unsupported database driver: '.$driver);
        }
    }
}
