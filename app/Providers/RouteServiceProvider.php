<?php

namespace App\Providers;

use App\Brand;
use App\Category;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    protected $adminNamespace = 'App\Http\Controllers\Admin';

    protected $authNamespace = 'App\Http\Controllers\Auth';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();

        Route::bind('categorySlug', function ($slug) {
          $category =  Category::where('slug', $slug)->first() ?? abort(404);
          if (auth()->check()) {
            return $category;
          }

          return $category;
        });

      Route::bind('brandSlug', function ($slug) {
        $brand =  Brand::where('slug', $slug)->first() ?? abort(404);
        if (auth()->check()) {
          return $brand;
        }

        return $brand;
      });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapAdminRoutes();
        $this->mapWebRoutes();
        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));

        Route::middleware('web')->namespace($this->authNamespace)->prefix('auth')->group(
          base_path('routes/auth.php')
        );
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * Define the "admin" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
      Route::middleware('admin')
            ->as('admin.')
            ->namespace($this->adminNamespace)
            ->prefix('admin')
            ->group(base_path('routes/admin.php')
        );
    }
}
