<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use App\Models\customer;
use App\Models\Payment;
use App\Models\PurchaseProduct;
use App\Models\PurchaseSupplierInfo;
use App\Models\SalesCustomerInfo;
use App\Models\SalesProduct;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class AllReportController extends Controller
{
    public function selse()
    {
        return view('admin.report.sales');
    }
    public function purchase()
    {
        return view('admin.report.purchase');
    }

    //purchase report pdf generator method for specific customer
    public function salesCustomerReportDownload($start_date, $end_date, $id)
    {

        if($id && ($start_date && $end_date))
        {
            $customer_info = customer::where('id',$id)->first();
            $reports = SalesCustomerInfo::where('customer_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $products = SalesProduct::where('customer_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

            $pdf = PDF::loadView('admin.report.pdf.sales',['start_date'=>$start_date,'end_date'=>$end_date,'reports'=>$reports, 'products'=>$products,'customer_info'=> $customer_info]);
            $date = now()->format('d-m-Y');
            return $pdf->stream('invoice('.$date.').pdf');

        }
        else
        {

        }
    }


     //purchase report pdf generator method for all customer
    public function salesAllReportDownload($start_date, $end_date)
    {
        //dd($start_date, $end_date);

        if($start_date && $end_date)
        {
            $all_reports = SalesCustomerInfo::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $products = SalesProduct::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

            $pdf = PDF::loadView('admin.report.pdf.sales',['start_date'=>$start_date,'end_date'=>$end_date,'all_reports'=>$all_reports, 'products'=>$products]);
            $date = now()->format('d-m-Y');
            return $pdf->stream('invoice('.$date.').pdf');
         }
        else
        {

        }


    }

    //purchase report pdf generator method for specific supplier
    public function purchaseSupplierReportDownload($start_date, $end_date, $id)
    {

        if($id && ($start_date && $end_date))
        {
            $supplier_info = Supplier::where('id',$id)->first();
            $reports = PurchaseSupplierInfo::where('supplier_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
            $products = PurchaseProduct::where('supplier_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

            $pdf = PDF::loadView('admin.report.pdf.purchase',['start_date'=>$start_date,'end_date'=>$end_date,'reports'=>$reports, 'products'=>$products,'supplier_info'=> $supplier_info]);
            $date = now()->format('d-m-Y');
            return $pdf->stream('invoice('.$date.').pdf');

        }
        else
        {

        }
    }

     //purchase report pdf generator method for all supplier
    public function purchaseAllReportDownload($start_date, $end_date)
    {

        if($start_date && $end_date)
        {
            $all_reports = PurchaseSupplierInfo::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->orderBy('id','DESC')->get();
            $products = PurchaseProduct::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

            $pdf = PDF::loadView('admin.report.pdf.purchase',['start_date'=>$start_date,'end_date'=>$end_date,'all_reports'=>$all_reports, 'products'=>$products]);
            $date = now()->format('d-m-Y');
            return $pdf->stream('invoice('.$date.').pdf');
         }
        else
        {

        }
    }

     //customer collection pdf report generator method for specific customer
     public function collectionCustomerReportDownload($start_date, $end_date,$id)
     {

        if($id && ($start_date && $end_date))
        {
            $reports = Collection::where('customer_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

             $pdf = PDF::loadView('admin.report.pdf.collection',['start_date'=>$start_date,'end_date'=>$end_date,'reports'=>$reports]);
             $date = now()->format('d-m-Y');
             return $pdf->stream('collection_report('.$date.').pdf');
          }
         else
         {

         }
     }

      //customer collection pdf report generator method for all customer
      public function collectionAllReportDownload($start_date, $end_date)
      {

          if($start_date && $end_date)
          {
              $all_reports = Collection::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
              $pdf = PDF::loadView('admin.report.pdf.collection',['start_date'=>$start_date,'end_date'=>$end_date,'all_reports'=>$all_reports]);
              $date = now()->format('d-m-Y');
              return $pdf->stream('collection_report('.$date.').pdf');
           }
          else
          {

          }
      }

       //supplier payment pdf report generator method
       public function paymentSupplierReportDownload($start_date, $end_date, $id)
       {

        if($id && ($start_date && $end_date))
        {
            $reports = Payment::where('supplier_id', $id)->whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();

            $pdf = PDF::loadView('admin.report.pdf.payment',['start_date'=>$start_date,'end_date'=>$end_date,'reports'=>$reports]);
            $date = now()->format('d-m-Y');
            return $pdf->stream('payment_report('.$date.').pdf');
            }
           else
           {

           }
       }

          //supplier payment pdf report generator method
          public function paymentAllReportDownload($start_date, $end_date)
          {

              if($start_date && $end_date)
              {
                $all_reports = Payment::whereBetween('date',[$start_date, $end_date])->orderBy('id','DESC')->get();
                $pdf = PDF::loadView('admin.report.pdf.payment',['start_date'=>$start_date,'end_date'=>$end_date,'all_reports'=>$all_reports]);
                $date = now()->format('d-m-Y');
                return $pdf->stream('payment_report('.$date.').pdf');
               }
              else
              {

              }
          }
}
