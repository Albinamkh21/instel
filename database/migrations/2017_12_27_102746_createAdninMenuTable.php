<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdninMenuTable extends Migration
{
    public function up()
    {
        Schema::create('admin_menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('path');
            $table->string('parentId');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_menus');
    }
}
