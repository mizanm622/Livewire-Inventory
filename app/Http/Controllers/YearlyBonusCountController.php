<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use App\Models\YearlyBonusCount;
use Illuminate\Http\Request;

class YearlyBonusCountController extends Controller
{
   //
   public function index()
   {
       $bonus_list = YearlyBonusCount::latest()->get();

       return view('admin.bonus.yearly_count.index', get_defined_vars());

   }

   public function create()
   {
      
       return view('admin.bonus.yearly_count.create');
   }
   public function store(Request $request)
   {

       //dd($request->all());

       $request->validate([
           'company_name'=> 'required',
           'ton_101'=> 'integer | nullable',
           'ton_120'=> 'integer | nullable',
           'ton_101_to_ton_120_rate'=> 'integer | nullable',
           'ton_121'=> 'integer | nullable',
           'ton_130'=> 'integer | nullable',
           'ton_121_to_ton_130_rate'=> 'integer | nullable',
           'ton_131'=> 'integer | nullable',
           'ton_140'=> 'integer | nullable',
           'ton_131_to_ton_140_rate'=> 'integer | nullable',
           'ton_141'=> 'integer | nullable',
           'ton_150'=> 'integer | nullable',
           'ton_141_to_ton_150_rate'=> 'integer | nullable',
           'ton_151'=> 'integer | nullable',
           'ton_160'=> 'integer | nullable',
           'ton_151_to_ton_160_rate'=> 'integer | nullable',
           'ton_161'=> 'integer | nullable',
           'ton_170'=> 'integer | nullable',
           'ton_161_to_ton_170_rate'=> 'integer | nullable',
           'ton_171'=> 'integer | nullable',
           'ton_180'=> 'integer | nullable',
           'ton_171_to_ton_180_rate'=> 'integer | nullable',
           'ton_181'=> 'integer | nullable',
           'ton_190'=> 'integer | nullable',
           'ton_181_to_ton_190_rate'=> 'integer | nullable',
           'ton_191'=> 'integer | nullable',
           'ton_200'=> 'integer | nullable',
           'ton_191_to_ton_200_rate'=> 'integer | nullable',
           'ton_201'=> 'integer | nullable',
           'ton_210'=> 'integer | nullable',
           'ton_201_to_ton_210_rate'=> 'integer | nullable',
       ]);

       YearlyBonusCount::insert([
           'supplier_id'=> $request->company_name,
           'ton_101'=>$request->ton_101,
           'ton_120'=>$request->ton_120,
           'ton_101_to_ton_120_rate'=>$request->ton_101_to_ton_120_rate,
           'ton_121'=>$request->ton_121,
           'ton_130'=>$request->ton_130,
           'ton_121_to_ton_130_rate'=>$request->ton_121_to_ton_130_rate,
           'ton_131'=>$request->ton_131,
           'ton_140'=>$request->ton_140,
           'ton_131_to_ton_140_rate'=>$request->ton_131_to_ton_140_rate,
           'ton_141'=>$request->ton_141,
           'ton_150'=>$request->ton_150,
           'ton_141_to_ton_150_rate'=>$request->ton_141_to_ton_150_rate,
           'ton_151'=>$request->ton_151,
           'ton_160'=>$request->ton_160,
           'ton_151_to_ton_160_rate'=>$request->ton_151_to_ton_160_rate,
           'ton_161'=>$request->ton_161,
           'ton_170'=>$request->ton_170,
           'ton_161_to_ton_170_rate'=>$request->ton_161_to_ton_170_rate,
           'ton_171'=>$request->ton_171,
           'ton_180'=>$request->ton_180,
           'ton_171_to_ton_180_rate'=>$request->ton_171_to_ton_180_rate,
           'ton_181'=>$request->ton_181,
           'ton_190'=>$request->ton_190,
           'ton_181_to_ton_190_rate'=>$request->ton_181_to_ton_190_rate,
           'ton_191'=>$request->ton_191,
           'ton_200'=>$request->ton_200,
           'ton_191_to_ton_200_rate'=>$request->ton_191_to_ton_200_rate,
           'ton_201'=>$request->ton_201,
           'ton_210'=>$request->ton_210,
           'ton_201_to_ton_210_rate'=>$request->ton_201_to_ton_210_rate,
       ]);

       $alert = array('msg' => 'Yearly Bonus Count List Successfully Inserted', 'alert-type' => 'info');
       return redirect()->back()->with($alert);

   }

   public function edit($id)
   {
       $suppliers = Supplier::get();
       $bonus_list = YearlyBonusCount::where('id',$id)->first();
       return view('admin.bonus.yearly_count.edit' ,get_defined_vars());
   }

   public function update(Request $request)
   {

       //dd($request->all());

       YearlyBonusCount::where('id',$request->id)->update([
           'supplier_id'=> $request->company_name,
           'ton_101'=>$request->ton_101,
           'ton_120'=>$request->ton_120,
           'ton_101_to_ton_120_rate'=>$request->ton_101_to_ton_120_rate,
           'ton_121'=>$request->ton_121,
           'ton_130'=>$request->ton_130,
           'ton_121_to_ton_130_rate'=>$request->ton_121_to_ton_130_rate,
           'ton_131'=>$request->ton_131,
           'ton_140'=>$request->ton_140,
           'ton_131_to_ton_140_rate'=>$request->ton_131_to_ton_140_rate,
           'ton_141'=>$request->ton_141,
           'ton_150'=>$request->ton_150,
           'ton_141_to_ton_150_rate'=>$request->ton_141_to_ton_150_rate,
           'ton_151'=>$request->ton_151,
           'ton_160'=>$request->ton_160,
           'ton_151_to_ton_160_rate'=>$request->ton_151_to_ton_160_rate,
           'ton_161'=>$request->ton_161,
           'ton_170'=>$request->ton_170,
           'ton_161_to_ton_170_rate'=>$request->ton_161_to_ton_170_rate,
           'ton_171'=>$request->ton_171,
           'ton_180'=>$request->ton_180,
           'ton_171_to_ton_180_rate'=>$request->ton_171_to_ton_180_rate,
           'ton_181'=>$request->ton_181,
           'ton_190'=>$request->ton_190,
           'ton_181_to_ton_190_rate'=>$request->ton_181_to_ton_190_rate,
           'ton_191'=>$request->ton_191,
           'ton_200'=>$request->ton_200,
           'ton_191_to_ton_200_rate'=>$request->ton_191_to_ton_200_rate,
           'ton_201'=>$request->ton_201,
           'ton_210'=>$request->ton_210,
           'ton_201_to_ton_210_rate'=>$request->ton_201_to_ton_210_rate,
       ]);

       $alert = array('msg' => 'Yearly Bonus Count Table Successfully Update', 'alert-type' => 'info');
       return redirect()->route('yearly.bonus.index')->with($alert);

   }


   public function supplierSearch(Request $request)
   {

       $data = [];

       if($request->filled('q')){
           $data = Supplier::select("company_name", "mobile","address","id")
                       ->where('company_name', 'LIKE', '%'. $request->get('q'). '%')
                       ->get();

       }
       else
       {
           $data = Supplier::get();
       }

       return response()->json($data);

   }

   public function delete($id)
   {
       YearlyBonusCount::where('id',$id)->delete();
       $alert = array('msg' => 'Yearly Bonus Count List Successfully Deleted', 'alert-type' => 'warning');
       return redirect()->route('yearly.bonus.index')->with($alert);

   }
}
