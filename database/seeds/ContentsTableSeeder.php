<?php

use Illuminate\Database\Seeder;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('contents')->insert([
        [
          'id' => 1,
          'name' => 'Home',
          'files' => '{}',
          'content' => 'test'
        ],
        [
          'id' => 2,
          'name' => 'About',
          'files' => '{}',
          'content' => 'test'
        ]
      ]);
    }
}
