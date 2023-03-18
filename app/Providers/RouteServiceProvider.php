<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * This is used by Laravel authentication to redirect users after login.
     *
     * @var string
     */
    public const HOME = '/users/index';
    public const MESSAGE = 'message';
    public const CODE = 'code';
    public const DATA = 'data';

    public const OK = '200';

    public const ERROR = '001';

    public const INFO = '002';

    public const CREATED = '201';

    /**
     * The controller namespace for the application.
     *
     * When present, controller route declarations will automatically be prefixed with this namespace.
     *
     * @var string|null
     */
    // protected $namespace = 'App\\Http\\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::prefix('')
                ->middleware('api')
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            Route::prefix('')
                ->middleware('web')
                ->namespace($this->namespace)
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for ('users', function (Request $request) {
            return Limit::perMinute(10)->response(
                function () {
                    return response()->json(
                        [
                            RouteServiceProvider::CODE => "429",
                            RouteServiceProvider::MESSAGE => __('auth.throttle')
                        ],
                        Response::HTTP_TOO_MANY_REQUESTS
                    );
                }
            );
        });

        RateLimiter::for ('api', function (Request $request) {
            return Limit::perMinute(10)->response(
                function () {
                    return response()->json(
                        [
                            RouteServiceProvider::CODE => "429",
                            RouteServiceProvider::MESSAGE => __('auth.throttle')
                        ],
                        Response::HTTP_TOO_MANY_REQUESTS
                    );
                }
            );
        });
    }
}