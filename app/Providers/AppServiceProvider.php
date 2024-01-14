<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //months 
        $months = ([
            'January','February','March','April','May','June','July','August','September','October','November','December'
        ]);
        
        //payment types
        $payment_types = ([
            'Bkash','Rocket','Nagad','Cash','Bank','Cheque','Card'
        ]);
      
         view()->share('payment_types',$payment_types);
         view()->share('months',$months);
    }
}
