<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddTwoFactorColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO 1.0 remove old database schema support
        if (Schema::hasColumn('users', 'two_factor_secret')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->string('two_factor_secret')->nullable()->after('password');
            $table->string('two_factor_recovery_codes')->nullable()->after('two_factor_secret');
        });

        DB::table('users')->whereNotNull('google_2fa_secret')->tap(function (Builder $query) {
            $column = $query->getGrammar()->wrap('google_2fa_secret');

            $query->update(['two_factor_secret' => $query->raw($column)]);
        });

        try {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('google_2fa_secret');
            });
        } catch (Throwable $t) {
            // ignore, SQLite doesn't have native support for dropping columns.
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['two_factor_secret', 'two_factor_recovery_codes']);
        });
    }
}
