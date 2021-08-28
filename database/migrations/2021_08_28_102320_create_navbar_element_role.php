<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarElementRole extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_element_role', function (Blueprint $table) {
            $table->id();
            $table->integer('navbar_element_id')->index()->unsigned();
            $table->integer('role_id')->index()->unsigned();
            $table->foreign('navbar_element_id')->references('id')->on('navbar_elements');
            $table->foreign('role_id')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbar_element_role');
    }
}
