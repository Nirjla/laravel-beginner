<?php

namespace App\Services;
use App\Services\Newsletter;
use \MailchimpMarketing\ApiClient;
class MailchimpNewsletter implements Newsletter{
    public function __construct(protected ApiClient $client){
    }
    public function subscribe(string $email, string $list = null)
{
    $list ??= config('services.mailchimp.list_id');
    return $this->client->lists->addListMember($list, [
        "email_address" => $email,
        "status" => "subscribed"
    ]);
}

      // public function client(){
      //       // $mailchimp = new \MailchimpMarketing\ApiClient();
      //     return  $this->client->setConfig([
      //     'apiKey' => config('services.mailchimp.key'),
      //     'server' => 'us18',
  
      // ]);
      // }
    
     
}