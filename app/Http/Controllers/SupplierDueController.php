<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\SupplierDue;
use Illuminate\Http\Request;

class SupplierDueController extends Controller
{
    public function index()
    {
        $suppliers = SupplierDue::orderBy('id','DESC')->get();
        return view('admin.due.supplier.index',get_defined_vars());
    }
    public function create()
    {
        return view('admin.due.supplier.create');
    }
    public function edit($id)
    {
        $supplier = SupplierDue::where('id',$id)->first();
        return view('admin.due.supplier.edit',get_defined_vars());
    }
    public function update(Request $request)
    {

        // if($request->payment_by === 'Cheque')
        // {
        //     $pay_by = $request->cheque;
        // }
        // elseif($request->payment_by === 'Bank')
        // {
        //     $pay_by = $request->bank_title;
        // }
        // else
        // {
        //     $pay_by = Null; 
        // }


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
                    //dd($request->previous_due);
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
                //dd($request->payment ,$request->previous_due);

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

        //dd($request->all());

        SupplierDue::where('id',$request->id)->update([
            'current_due'=> $curr_due,
            'previous_due'=> $request->previous_due,
            'paid_amount'=>$request->payment,
            'previous_advance'=>$pre_adv,
            'current_advance'=>$curr_Adv,
            'date'=>$request->date,
            'purpose'=>$request->purpose,
            'remarks'=>$request->remarks,
        ]);

        Supplier::where('id', $request->supplier_id)->update([
             'company_name' => $request->company_name,
             'address' => $request->address,
             'mobile' => $request->mobile,
        ]);

        $alert = array('msg' => 'Supplier Due Successfully Update', 'alert-type' => 'info');
        return redirect()->route('supplier.due.index')->with($alert);

    }
    public function delete($id)
    {

        SupplierDue::where('id',$id)->delete();

        $alert = array('msg' => 'Supplier Due Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('supplier.due.index')->with($alert);

    }
    // view details collection from here
    public function view($id)
    {
        $supplier = SupplierDue::where('id',$id)->first();
        return view('admin.due.supplier.view', compact('supplier'));
    }

}
