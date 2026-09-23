<?php

namespace App\Providers;

use App\Services\Turnstile;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Validator;
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
        Blade::directive('routeIs', function ($expression) {
            return "<?php if (Request::url() == route($expression)): ?>";
        });

        Validator::extend('turnstile', function ($attribute, $value, $parameters) {
            $request = $this->app['request'];

            return $this->app->make(Turnstile::class)->verify(
                $value,
                $request->header('CF-Connecting-IP', $request->ip()),
                isset($parameters[0]) ? $parameters[0] : null
            );
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Turnstile::class, function ($app) {
            return new Turnstile(
                new Client(),
                $app['db']->connection(),
                $app['config']['services.turnstile.secret_key'],
                $app['config']['services.turnstile.hostnames'],
                $app->environment('local', 'testing')
            );
        });
    }
}
