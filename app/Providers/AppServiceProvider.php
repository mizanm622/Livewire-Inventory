<?php

namespace App\Providers;

use App\Models\Collection;
use App\Models\Payment;
use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use Carbon\Carbon;
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


        $numberToWord = new \NumberFormatter("en", \NumberFormatter::SPELLOUT);

        //months
        $months = ([
            'January','February','March','April','May','June','July','August','September','October','November','December'
        ]);

        //payment types
        $payment_types = ([
            'Bkash','Rocket','Nagad','Upay','Ucash','SureCash','T-Cash','mCash','Cash','Bank','Cheque','Card'
        ]);

        $date = Carbon::now()->format('Y-m-d');

        $daily_sales = SalesCustomerInfo::where('date',$date)->get();
        $sales_weight = SalesProduct::where('date',$date)->get(['product_quantity','product_weight']);

        $daily_purchase = PurchaseSupplierInfo::where('date',$date)->get();
        $purchase_weight = PurchaseProduct::where('date',$date)->get(['product_quantity','product_weight']);

        $collection = Collection::where('date',$date)->get();
        $payment = Payment::where('date',$date)->get();


         view()->share('payment_types',$payment_types);
         view()->share('months',$months);
         view()->share('daily_sales',$daily_sales);
         view()->share('sales_weight',$sales_weight);
         view()->share('daily_purchase',$daily_purchase);
         view()->share('purchase_weight',$purchase_weight);
         view()->share('collection',$collection);
         view()->share('payment',$payment);
         view()->share('numberToWord',$numberToWord);


    }
}
