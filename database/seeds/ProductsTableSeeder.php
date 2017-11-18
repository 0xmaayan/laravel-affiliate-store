<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Product::class, 15)->create()->each(function ($u) {
        $u->category()->save(factory(App\Category::class)->make());
      });
    }
}
