<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataToServerStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // TODO 1.0 remove old database schema support
        if (Schema::hasColumn('server_stats', 'data')) {
            return;
        }

        Schema::table('server_stats', function (Blueprint $table) {
            $table->text('data')->nullable()->after('cpu');
        });

        try {
            Schema::table('server_stats', function (Blueprint $table) {
                $table->dropColumn(['tps', 'loaded_chunks', 'entities']);
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
        Schema::table('server_stats', function (Blueprint $table) {
            $table->dropColumn('data');
        });
    }
}
