<?php

use Illuminate\Database\Seeder;

class ProductsCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $categories = App\Category::all();
      // Populate the pivot table
      App\Product::all()->each(function ($user) use ($categories) {
        $user->category()->attach(
          $categories->random(rand(1, 3))->pluck('id')->toArray()
        );
      });
    }
}
