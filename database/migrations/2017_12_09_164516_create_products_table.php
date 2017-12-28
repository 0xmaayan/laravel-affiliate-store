<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table) {
      $table->increments('id');
      $table->string('name');
      $table->string('slug');
      $table->string('title')->nullable();
      $table->string('seo_description')->nullable();
      $table->string('seo_keywords')->nullable();
      $table->longText('link')->nullable();
      $table->decimal('price',9,2)->nullable();
      $table->string('main_image')->nullable();
      $table->integer('clicks')->default(0);
      $table->integer('brands_id')->unsigned();
      $table->foreign('brands_id')
        ->references('id')
        ->on('brands')
        ->onDelete('cascade');
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
    Schema::dropIfExists('products');
  }
}

