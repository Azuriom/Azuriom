<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AddDeletedAtToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('users', 'deleted_at')) {
            return;
        }

        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });

        DB::table('users')->where('is_deleted', true)->tap(function (Builder $query) {
            $column = $query->getGrammar()->wrap('updated_at');

            $query->update(['deleted_at' => $query->raw($column)]);
        });

        try {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('is_deleted');
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
        //
    }
}
