<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBrandToProductsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::table('products', function($table) {
      $table->integer('brand_id')->unsigned()->nullable();
      $table->foreign('brand_id')
        ->references('id')
        ->on('brands')
        ->onDelete('cascade');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('products', function($table) {
      $table->dropColumn('brand_id');
    });
  }
}
