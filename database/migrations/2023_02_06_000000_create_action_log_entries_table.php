<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('action_log_entries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('action_log_id');
            $table->string('attribute');
            $table->text('old_value')->nullable();
            $table->text('new_value')->nullable();

            $table->foreign('action_log_id')
                ->references('id')
                ->on('action_logs')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('action_log_entries');
    }
};
