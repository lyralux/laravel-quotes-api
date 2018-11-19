<?php

namespace App\Providers;

use App\Support\Directory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $modules = Directory::listDirectories(app_path('Modules'));
        foreach ($modules as $module)
        {
            $routesPath = app_path('Modules/' . $module . '/routes.php');
            $viewsPath  = app_path('Modules/' . $module . '/Views');
            if (file_exists($routesPath))
            {
                require $routesPath;
            }
            if (file_exists($viewsPath))
            {
                $this->app->view->addLocation($viewsPath);
            }
        }
        foreach (File::files(app_path('Helpers')) as $helper)
        {
            require_once $helper;
        }

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
