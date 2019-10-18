<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavbarElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_elements', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('value');
            $table->unsignedInteger('position')->default(0);
            $table->enum('type', ['home', 'link', 'page', 'post', 'posts', 'dropdown']);
            $table->unsignedInteger('parent_id')->nullable();
            $table->boolean('new_tab')->default(false);

            $table->foreign('parent_id')->references('id')->on('navbar_elements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbar_elements');
    }
}
