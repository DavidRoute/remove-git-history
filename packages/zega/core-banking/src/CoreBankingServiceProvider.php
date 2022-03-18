<?php

namespace Zega\CoreBanking;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Http;
use Zega\CoreBanking\Api\ClientApi;
use Zega\CoreBanking\Api\LoanApi;
use Zega\CoreBanking\Api\LoanProductApi;

class CoreBankingServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/corebanking.php', 'corebanking');
        $this->mergeConfigFrom(__DIR__.'/../config/const.php', 'const');

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/corebanking.php' => config_path('corebanking.php'),
        ]);

        $this->defineMacros();
    }

    /**
     * Define the macros.
     *
     * @return void
     */
    protected function defineMacros()
    {
        Http::macro('coreBanking', function () {
            return Http::withBasicAuth(config('corebanking.username'), config('corebanking.password'))
                        ->withHeaders([
                            'X-Fineract-Platform-TenantId' => config('corebanking.tenant_id'),
                            'x-api-key'                    => config('corebanking.api_key')
                        ])
                        ->baseUrl(config('corebanking.base_url'));
        });
    }

    /**
     * Register the api instance.
     *
     * @return void
     */
    protected function registerFacades()
    {
        $this->app->singleton('client-api', function ($app) {
            return new ClientApi;
        });

        $this->app->singleton('loan-api', function ($app) {
            return new LoanApi;
        });

        $this->app->singleton('loan-product-api', function ($app) {
            return new LoanProductApi;
        });
    }

}
