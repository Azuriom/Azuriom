<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('social_links', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->string('value');
            $table->unsignedInteger('position')->default(0);
            $table->text('properties')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_links');
    }
}
