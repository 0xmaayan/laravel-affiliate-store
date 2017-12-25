<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatCategoryFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('categoryfiles', function($table) {
        $table->increments('id');
        $table->string('image')->nullable();
        $table->string('second_image')->nullable();
        $table->integer('category_id')->unsigned();
        $table->foreign('category_id')
          ->references('id')
          ->on('categories')
          ->onDelete('cascade');
        $table->softDeletes();
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
      Schema::dropIfExists('categoryfiles');
    }
}
