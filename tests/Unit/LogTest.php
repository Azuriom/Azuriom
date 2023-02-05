<?php

namespace Tests\Unit;

use Azuriom\Models\ActionLog;
use Azuriom\Models\User;
use Tests\TestCase;

class LogTest extends TestCase
{
    /**
     * Test Log creation and value.
     *
     * @return void
     */
    public function test_log_creation(): void
    {
        $name = 'John';
        $user = User::factory()->create(['name' => $name]);

        $this->actingAs(User::factory()->create());

        $newName = $user->name .= '+';
        $user->save();

        $log = ActionLog::whereTargetId($user->id)->latest()->first();

        $this->assertEquals(['old' => ['name' => $name], 'new' => ['name' => $newName]], $log->data);
    }
}
