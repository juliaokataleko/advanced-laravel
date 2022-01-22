<?php

namespace App\Providers;

use App\Billing\BankPaymentGateway;
use App\Billing\CreditPaymentGateway;
use App\Billing\PaymentGateway;
use App\Billing\PaymentGatewayContract;
use App\Http\View\Composers\ChannelComposer;
use App\Mixins\StrMixin;
use App\Models\Channel;
use App\PostCardSendingService;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // $this->app->bind(PaymentGateway::class, function($app) {
        //     return new PaymentGateway('USD');
        // });
        // $this->app->singleton(BankPaymentGateway::class, function ($app) {
        //     return new BankPaymentGateway('USD');
        // });

        // Service container
        $this->app->singleton(PaymentGatewayContract::class, function ($app) {
            // return new BankPaymentGateway('USD');

            // dinamic choose the implementation
            if(request()->has('credit')) {
                return new CreditPaymentGateway('USD');
            }

            return new BankPaymentGateway('USD');
            
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // View composer

        // Option 1 - Every single view
        // View::share('channels', Channel::orderBy('name', 'asc')->get());

        // Option 2 - Granular views with wildcards
        // View::composer(['post.*', 'channel.index'], function($view) {
        //     $view->with('channels', Channel::orderBy('name', 'asc')->get());
        // });

        // Option 3 - Dedicated class
        View::composer(['partials.channels.*'], ChannelComposer::class);

        // Facades
        $this->app->singleton('PostCard', function($app) {
            return new PostCardSendingService('us', 4, 6);
        });

        // Macros

        // Str::macro('partNumber', function($part) {
        //     return 'AB-' . substr($part, 0, 3) . '-' . substr($part, 3);
        // });

        Str::macro('formatCurrency', function ($amount) {
            return number_format($amount, 0, ',', ' ') . ' EUROS';
        });

        Str::mixin(new StrMixin(), false);

        // error response
        ResponseFactory::macro('errorJson', function($message = 'Default error message') {
            return [
                'message' => $message,
                'error_code' => 123
            ];
        });
    }
}
