<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PayseraService;
class PayseraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PayseraService::class, function ($app) {
            $paysera = new PayseraService([
                'projectid'     => 181595,
                'sign_password' => '779955dc72a6648396359fe03ce1f967',
            ]);
            return $paysera;
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
