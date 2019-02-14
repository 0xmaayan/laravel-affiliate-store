<?php

namespace App\Http\Middleware\Custom;

use Closure;
use Menu;
use Caffeinated\Menus\Builder;

class adminMenu
{
  /**
   * Run the request filter.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure                  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    Menu::make('admin', function(Builder $menu) {
      $menu->add('Dashboard',  '/admin')
        ->active('dashboard/*')
        ->icon('dashboard')
        ->prependIcon();
      $menu->add('Brands',  ['route' => 'admin.brands.index'])
        ->active('brands/*')
        ->icon('snowflake-o')
        ->prependIcon();
      $menu->add('Categories',  ['route' => 'admin.categories.index'])
        ->active('categories/*')
        ->icon('shopping-basket')
        ->prependIcon();
      $menu->add('Products',  ['route' => 'admin.products.index'])
        ->active('products/*')
        ->icon('bars')
        ->prependIcon();
      /*$menu->add('Content',  ['route' => 'admin.content.index'])
        ->active('content/*')
        ->icon('newspaper-o')
        ->prependIcon();*/
      $menu->add('Users',  '/admin/users')
        ->active('users/*')
        ->icon('users')
        ->prependIcon();
      $menu->add('Subscribes',  '/admin/subscribes')
        ->active('subscribes/*')
        ->icon('address-book-o')
        ->prependIcon();
      $menu->add('Settings',  '/admin/settings')
        ->active('settings/*')
        ->icon('cog')
        ->prependIcon();
     /* $menu->add('Stats',  '/admin/stats')
        ->active('stats/*')
        ->icon('bar-chart')
        ->prependIcon();*/
    });

    return $next($request);
  }
}