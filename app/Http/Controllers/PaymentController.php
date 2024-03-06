<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Payment;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    //show payment list table from here
    public function index()
    {
        $payments = Payment::orderBy('id','DESC')->get();
        return view('admin.account.payment.index',compact('payments'));
    }
    // create new payment
    public function create()
    {
        return view('admin.account.payment.create');
    }

    // retrive data to update form
    public function edit($id)
    {
        $banks = Bank::get();
        $supplier = Payment::where('id',$id)->first();
        return view('admin.account.payment.edit',get_defined_vars());
    }

    //update payment info
    public function update(Request $request)
    {
        // payment type
        if($request->payment_by === 'Cheque')
        {
            $pay_by = $request->cheque;
        }
        elseif($request->payment_by === 'Bank')
        {
            $pay_by = $request->bank_title;
        }
        else
        {
            $pay_by = Null;
        }



        //previous advance and current advance calculation
        if($request->previous_advance || $request->current_advance)
        {
            // if advance payment is already exist
            if($request->previous_advance)
            {
                $pre_adv = abs($request->previous_advance);
                $curr_Adv = abs($request->previous_advance-$request->payment);
                //dd($pre_adv, $request->payment, $curr_Adv);
                $curr_due = $request->current_due; // get original value
                //$pre_due = $request->previous_due; // get original value
                Supplier::where('id',$request->supplier_id)->update(
                    [
                       'advance_payment' =>$curr_Adv
                    ]
                );
            }
           // if there is no previous advance payment but currently advanced
            else
            {
                if($request->previous_due)
                {
                    $pre_adv = $request->previous_advance;// get original value
                    $curr_Adv= abs($request->payment - $request->previous_due);
                    $curr_due = $request->current_due; // get original value

                    Supplier::where('id',$request->supplier_id)->update(
                        [
                           'advance_payment' =>$curr_Adv
                        ]
                    );
                }
                else
                {

                    $pre_adv = $request->previous_advance;// get original value
                    $curr_Adv= $request->payment;
                    //dd($request->previous_advance, $request->payment, $curr_Adv,$request->previous_due, $request->current_due );
                    $curr_due = $request->current_due; // get original value
                    //$pre_due = $request->previous_due; // get original value
                    Supplier::where('id',$request->supplier_id)->update(
                        [
                           'advance_payment' =>$curr_Adv
                        ]
                    );
                }



            }

        }
        else
        {
            // if payment is greater than the previous due
            if($request->payment > $request->previous_due)
            {
                $pre_adv = $request->previous_advance; // get Null value
                $curr_Adv = abs($request->previous_due-$request->payment);
                $curr_due = Null; // get original value
                //$pre_due = Null; // get Null value
                //dd($curr_Adv, $request->previous_advance, $request->previous_due, $request->current_due);

                Supplier::where('id',$request->supplier_id)->update(
                    [
                       'advance_payment' =>$curr_Adv
                    ]
                );
            }
            // if payment is equal to the previous due
            elseif($request->payment == $request->previous_due)
            {
                $curr_Adv = $request->current_advance; // get original value
                $pre_adv = $request->previous_advance; // get original value

                $curr_due = Null;
                //$pre_due = $request->previous_due; // get original value
                // ok dd($curr_due,  $request->previous_due, $request->previous_advance, $request->current_advance);
                Supplier::where('id',$request->supplier_id)->update(
                    [
                       'previous_due' =>$curr_due
                    ]
                );

            }
            // if payment is less than the previous due
            else
            {
                $curr_Adv = $request->current_advance; // get original value
                $pre_adv = $request->previous_advance; // get original value
                //dd('Current Due a jabe');
                $curr_due = abs($request->previous_due-$request->payment);

                //$pre_due = $request->previous_due; // get original value
                //ok dd($curr_due, $request->previous_due, $request->previous_advance, $request->current_advance);

                Supplier::where('id',$request->supplier_id)->update(
                    [
                       'previous_due' =>$curr_due
                    ]
                );

            }


        }




        //dd($request->all(),  $pay_by);

        Payment::where('id',$request->id)->update([
            'invoice_no'=>$request->invoice_no,
            'current_due'=> $curr_due,
            'previous_due'=> $request->previous_due,
            'paid_amount'=>$request->payment,
            'previous_advance'=>$pre_adv,
            'current_advance'=>$curr_Adv,
            'payment_by'=>$request->payment_by,
            'bank_title'=>$pay_by,
            'date'=>$request->date,
            'purpose'=>$request->purpose,
            'remarks'=>$request->remarks,
        ]);

        Supplier::where('id', $request->supplier_id)->update([
            'company_name' => $request->supplier_name,
            'address' => $request->address,
            'mobile' => $request->mobile,
       ]);

        $alert = array('msg' => 'Payment Successfully Update', 'alert-type' => 'info');
        return redirect()->route('payment.index')->with($alert);

    }

     //delete Payment from here
     public function delete($id)
     {

         Payment::where('id',$id)->delete();

         $alert = array('msg' => 'Payment Successfully Deleted', 'alert-type' => 'warning');
         return redirect()->route('payment.index')->with($alert);

     }

     // view details Payment from here
     public function view($id)
     {
         $supplier = Payment::where('id',$id)->first();
         return view('admin.account.payment.view', compact('supplier'));
     }

     //get collection report from here
    public function report()
    {
        return view('admin.account.payment.report');
    }
}
