<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNameMessageToSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('subscribes', function($table) {
        $table->string('name')->nullable();
        $table->string('message')->nullable();
      });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('subscribes', function($table) {
        $table->dropColumn('name');
        $table->dropColumn('message');
      });
    }
}
