<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Database\Eloquent\Model;
use App\Services\MailchimpNewsletter;
use App\Services\Newsletter;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        app()->bind(Newsletter::class, function () {
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
        Gate::define('admin',function(User $user){
            return $user->is_admin === 1;
        });
    }

}
