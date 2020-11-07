<?php

namespace Tests\Unit;

use Azuriom\Models\User;
use Azuriom\Support\Charts;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ChartsTest extends TestCase
{
    use RefreshDatabase;

    public function testDailyChart()
    {
        $dates = [
            today()->subMonths(2),
            today()->subDays(5),
            today()->subDays(3),
            today()->subDays(3),
            today()->subDays(3),
            today(),
        ];

        foreach ($dates as $date) {
            User::factory()->create(['created_at' => $date]);
        }

        $expected = collect([0, 0, 1, 0, 3, 0, 0, 1])->mapWithKeys(function (int $count, int $i) {
            return [format_date(today()->subDays(7 - $i)) => $count];
        })->all();

        $this->assertEquals($expected, Charts::countByDays(User::query())->all());
    }

    public function testMonthlyChart()
    {
        $month = today()->startOfMonth()->toImmutable();

        $dates = [
            $month->subMonths(7),
            $month->subMonths(5),
            $month->subMonths(3),
            $month->subMonths(3),
            $month->subMonth(),
            $month,
        ];

        foreach ($dates as $date) {
            User::factory()->create(['created_at' => $date]);
        }

        $expected = collect([0, 0, 2, 0, 1, 1])->mapWithKeys(function (int $count, int $i) {
            return [today()->subMonths(5 - $i)->translatedFormat('F Y') => $count];
        })->all();

        $this->assertEquals($expected, Charts::countByMonths(User::query(), null, 6)->all());
    }
}
