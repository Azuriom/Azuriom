<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddUserIdToServerCommandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO 1.0 remove old database schema support
        if (Schema::hasColumn('server_commands', 'user_id')) {
            return;
        }

        $commands = DB::table('server_commands')
            ->where('created_at', '>', now()->subMonth())
            ->get();

        Schema::drop('server_commands');

        require __DIR__.'/2019_12_06_000000_create_server_commands_table.php';
        (new CreateServerCommandsTable())->up();

        $usersNames = $commands->groupBy('player_name')->keys()->all();

        $users = DB::table('users')
            ->whereIn('name', $usersNames)
            ->get()
            ->pluck('id', 'name');

        $mappedCommands = $commands->map(function ($command) use ($users) {
            $userId = $users[$command->player_name] ?? null;

            $command->player_name = null;
            $command->user_id = $userId;

            return (array) $command;
        })->all();

        DB::table('server_commands')->insert($mappedCommands);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
