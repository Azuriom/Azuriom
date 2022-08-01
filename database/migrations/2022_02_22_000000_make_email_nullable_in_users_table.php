<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\MySqlConnection;
use Illuminate\Database\PostgresConnection;
use Illuminate\Database\Schema\Builder;
use Illuminate\Database\SqlServerConnection;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO 1.0 remove this
        $strLength = Builder::$defaultStringLength;
        $connection = DB::connection();

        if ($connection instanceof MySqlConnection) {
            $connection->statement('alter table `users` modify `email` varchar('.$strLength.') null;');
        } elseif ($connection instanceof PostgresConnection) {
            $connection->statement('alter table "users" alter column "email" drop not null;');
        } elseif ($connection instanceof SqlServerConnection) {
            $connection->statement('alter table "users" alter column "email" nvarchar('.$strLength.') null;');
        }

        $column = DB::table('users')->getGrammar()->wrap('game_id');

        DB::table('users')->update([
            'game_id' => DB::raw("replace({$column}, '-', '')"),
        ]);
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
};
