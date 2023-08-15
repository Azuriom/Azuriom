<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamp('password_changed_at')->nullable()->after('last_login_at');
        });

        DB::table('users')->update([
            'password_changed_at' => DB::raw('created_at'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function ($table) {
            $table->dropColumn('password_changed_at');
        });
    }
};
