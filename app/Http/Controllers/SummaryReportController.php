<?php

namespace App\Http\Controllers;

use App\Models\BankExpense;
use App\Models\CarringExpense;
use App\Models\Collection;
use App\Models\DokanExpense;
use App\Models\LabourExpense;
use App\Models\Payment;
use App\Models\PurchaseSupplierInfo;
use App\Models\SalaryExpense;
use App\Models\SalesCustomerInfo;
use Illuminate\Http\Request;
use PDF;

class SummaryReportController extends Controller
{
    //daily summary report
    public function dailyReport()
    {
        return view('admin.summary.daily');
    }

    //daily summary pdf report
    public function dailyReportDownload($date)
    {

        if($date)
        {
            $sales = SalesCustomerInfo::where('date',$date)->get();
            $purchase = PurchaseSupplierInfo::where('date',$date)->get();
            $collection = Collection::where('date',$date)->get();
            $payment = Payment::where('date',$date)->get();

            $salary = SalaryExpense::where('date',$date)->get();
            $bank = BankExpense::where('date',$date)->get();
            $labour = LabourExpense::where('date',$date)->get();
            $dokan = DokanExpense::where('date',$date)->get();
            $carring = CarringExpense::where('date',$date)->get();

            $pdf = PDF::loadView('admin.report.pdf.daily_summary',[
                'sales'=>$sales,
                'purchase'=>$purchase,
                'collection'=>$collection,
                'payment'=>$payment,
                'salary'=>$salary,
                'bank'=>$bank,
                'labour'=>$labour,
                'dokan'=>$dokan,
                'carring'=>$carring,
                'date'=>$date,

            ]);

            $date = now()->format('d-m-Y');
            return $pdf->stream('daily_summary_report('.$date.').pdf');

        }
        else
        {

        }
    }



     //monthly summary report
     public function monthlyReport()
     {
         return view('admin.summary.monthly');
     }

     //monthly summary pdf report
     public function monthlyReportDownload($date)
     {
        if($date)
        {

            $month_name = date("F-Y", strtotime($date));

            $sales = SalesCustomerInfo::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            //$sales = SalesCustomerInfo::where('date',$date)->get();
            $purchase = PurchaseSupplierInfo::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $collection = Collection::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $payment = Payment::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $salary = SalaryExpense::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $bank = BankExpense::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $labour = LabourExpense::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $dokan = DokanExpense::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();

            $carring = CarringExpense::whereMonth('date',  date('m', strtotime($date)))
            ->whereYear('date',date('Y', strtotime($date)))
            ->get();



        $pdf = PDF::loadView('admin.report.pdf.monthly_summary',[
            'sales'=>$sales,
            'purchase'=>$purchase,
            'collection'=>$collection,
            'payment'=>$payment,
            'salary'=>$salary,
            'bank'=>$bank,
            'labour'=>$labour,
            'dokan'=>$dokan,
            'carring'=>$carring,
            'month_name'=>$month_name,

        ]);

        $date = now()->format('d-m-Y');
        return $pdf->stream('monthly_summary_report('.$date.').pdf');
     }

    }



      //yearly summary report
      public function yearlyReport()
      {
          return view('admin.summary.yearly');
      }

      //yearly summary pdf report
      public function yearlyReportDownload($date)
      {

        if($date)
        {

            $year =  date("Y", strtotime($date));


            $sales = SalesCustomerInfo::whereYear('date',$date)->get();

            $purchase = PurchaseSupplierInfo::whereYear('date',$date)->get();

            $collection = Collection::whereYear('date',$date)->get();

            $payment = Payment::whereYear('date',$date)->get();

            $salary = SalaryExpense::whereYear('date',$date)->get();

            $bank = BankExpense::whereYear('date',$date)->get();

            $labour = LabourExpense::whereYear('date',$date)->get();

            $dokan = DokanExpense::whereYear('date',$date)->get();

            $carring = CarringExpense::whereYear('date',$date)->get();


            $pdf = PDF::loadView('admin.report.pdf.yearly_summary',[
                'sales'=>$sales,
                'purchase'=>$purchase,
                'collection'=>$collection,
                'payment'=>$payment,
                'salary'=>$salary,
                'bank'=>$bank,
                'labour'=>$labour,
                'dokan'=>$dokan,
                'carring'=>$carring,
                'year'=>$year,

            ]);

            $date = now()->format('d-m-Y');
            return $pdf->stream('yearly_summary_report('.$date.').pdf');

        }
        else
        {

        }

      }

}
