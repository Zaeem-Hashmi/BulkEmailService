<?php

namespace App\Providers;

use App\Models\EmialConfig;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        try{
            $mailSettings = EmialConfig::latest()->first();
            if ($mailSettings) {
                $data = [
                    'driver' => $mailSettings->driver,
                    'host' => $mailSettings->host,
                    'port' => $mailSettings->port,
                    'encryption' => $mailSettings->encryption,
                    'username' => $mailSettings->username,
                    'password' => $mailSettings->password,
                    'from' => [
                        'address' =>$mailSettings->username,
                        'name' => 'email'
                    ],
                ];
                Config::set('mail',$data);
            }
        }
        catch(\Exception $e){
            Log::error($e->getMessage());
        }
        
    }
}
