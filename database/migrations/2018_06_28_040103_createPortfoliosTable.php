<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfoliosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('text');
            $table->string('customer',150);
            $table->string('alias',150)->unique();
            $table->string('img');
            $table->string('url');
            $table->string('keywords');
            $table->string('meta_desc');
            $table->integer('category_id');
            $table->foreign('category_id')->references('id')->on('portfolioCategories');



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
        Schema::dropIfExists('portfolios');
    }
}

