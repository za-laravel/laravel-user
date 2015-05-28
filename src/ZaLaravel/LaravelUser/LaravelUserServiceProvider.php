<?php
namespace ZaLaravel\LaravelUser;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;

/**
 * Class LaravelAdminServiceProvider
 * @package ZaLaravel\LaravelAdmin
 */
class LaravelUserServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../../views', 'laravel-user');
        $this->app->bind('ZaLaravel\LaravelUser\Models\Interfaces\UserInterface', Config::get('auth.model'));
        $this->app->bind('Illuminate\Contracts\Auth\Registrar', 'ZaLaravel\LaravelUser\Services\Registrar');

        $this->publishes([
            __DIR__.'/../../../database/migrations/' => database_path('/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../../../database/seeds/' => database_path('/seeds')
        ], 'seeds');

        include __DIR__ . '/../../routes.php';
    }
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
    }
    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }
}