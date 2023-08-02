<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('navbar_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->unsignedInteger('position')->default(0);
            $table->string('type');
            $table->unsignedInteger('parent_id')->nullable();
            $table->boolean('new_tab')->default(false);

            $table->foreign('parent_id')->references('id')->on('navbar_elements');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('navbar_elements');
    }
};
