<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(Newsletter::class, function ($app) {
            $client = new \MailchimpMarketing\ApiClient();
            $client->setConfig([
                'apiKey' => config('services.mailchimp.key'),
                'server' => 'us18',
            ]);
            return new MailchimpNewsletter($client);
        });
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // Paginator::useBootstrap();
        Model::unguard();
    }
}
