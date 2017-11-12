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
        ->active('admin/dashboard/*')
        ->icon('dashboard')
        ->prependIcon();
      $menu->add('Categories',  ['route' => 'categories.index'])
        ->active('admin/categories/*')
        ->icon('shopping-basket')
        ->prependIcon();
      $menu->add('Users',  '/admin/users')
        ->active('admin/users/*')
        ->icon('users')
        ->prependIcon();
      $menu->add('Settings',  '/admin/settings')
        ->active('admin/settings/*')
        ->icon('cog')
        ->prependIcon();
      $menu->add('Stats',  '/admin/stats')
        ->active('admin/stats/*')
        ->icon('bar-chart')
        ->prependIcon();
    });

    return $next($request);
  }
}