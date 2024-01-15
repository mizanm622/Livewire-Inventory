<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonthlyBonusCount;
use App\Models\Supplier;


class MonthlyBonusCountController extends Controller
{
    //
    public function index()
    {
        $bonus_list = MonthlyBonusCount::latest()->get();

        return view('admin.bonus.bonus_count.index', get_defined_vars());

    }

    public function create()
    {
        $suppliers = Supplier::all();
        $bonus_list = MonthlyBonusCount::first();
        return view('admin.bonus.bonus_count.create' ,get_defined_vars());
    }
    public function store(Request $request)
    {

        //dd($request->all());

        $request->validate([
            'company_name'=> 'required',
            'ton_10'=>  'integer | nullable',
            'ton_20'=> 'integer | nullable',
            'ton_10_to_ton_20_rate'=> 'integer | nullable',
            'ton_21'=> 'integer | nullable',
            'ton_30'=> 'integer | nullable',
            'ton_21_to_ton_30_rate'=> 'integer | nullable',
            'ton_31'=> 'integer | nullable',
            'ton_40'=> 'integer | nullable',
            'ton_31_to_ton_40_rate'=> 'integer | nullable',
            'ton_41'=> 'integer | nullable',
            'ton_50'=> 'integer | nullable',
            'ton_41_to_ton_50_rate'=> 'integer | nullable',
            'ton_51'=> 'integer | nullable',
            'ton_60'=> 'integer | nullable',
            'ton_51_to_ton_60_rate'=> 'integer | nullable',
            'ton_61'=> 'integer | nullable',
            'ton_70'=> 'integer | nullable',
            'ton_61_to_ton_70_rate'=> 'integer | nullable',
            'ton_71'=> 'integer | nullable',
            'ton_80'=> 'integer | nullable',
            'ton_71_to_ton_80_rate'=> 'integer | nullable',
            'ton_81'=> 'integer | nullable',
            'ton_90'=> 'integer | nullable',
            'ton_81_to_ton_90_rate'=> 'integer | nullable',
            'ton_91'=> 'integer | nullable',
            'ton_100'=> 'integer | nullable',
            'ton_91_to_ton_100_rate'=> 'integer | nullable',
            'ton_101'=> 'integer | nullable',
            'ton_110'=> 'integer | nullable',
            'ton_101_to_ton_110_rate'=> 'integer | nullable',
            'ton_111'=> 'integer | nullable',
            'ton_120'=> 'integer | nullable',
            'ton_111_to_ton_120_rate'=> 'integer | nullable',
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

        MonthlyBonusCount::insert([
            'supplier_id'=> $request->company_name,
            'ton_10'=>$request->ton_10,
            'ton_20'=>$request->ton_20,
            'ton_10_to_ton_20_rate'=>$request->ton_10_to_ton_20_rate,
            'ton_21'=>$request->ton_21,
            'ton_30'=>$request->ton_30,
            'ton_21_to_ton_30_rate'=>$request->ton_21_to_ton_30_rate,
            'ton_31'=>$request->ton_31,
            'ton_40'=>$request->ton_40,
            'ton_31_to_ton_40_rate'=>$request->ton_31_to_ton_40_rate,
            'ton_41'=>$request->ton_41,
            'ton_50'=>$request->ton_50,
            'ton_41_to_ton_50_rate'=>$request->ton_41_to_ton_50_rate,
            'ton_51'=>$request->ton_51,
            'ton_60'=>$request->ton_60,
            'ton_51_to_ton_60_rate'=>$request->ton_51_to_ton_60_rate,
            'ton_61'=>$request->ton_61,
            'ton_70'=>$request->ton_70,
            'ton_61_to_ton_70_rate'=>$request->ton_61_to_ton_70_rate,
            'ton_71'=>$request->ton_71,
            'ton_80'=>$request->ton_80,
            'ton_71_to_ton_80_rate'=>$request->ton_71_to_ton_80_rate,
            'ton_81'=>$request->ton_81,
            'ton_90'=>$request->ton_90,
            'ton_81_to_ton_90_rate'=>$request->ton_81_to_ton_90_rate,
            'ton_91'=>$request->ton_91,
            'ton_100'=>$request->ton_100,
            'ton_91_to_ton_100_rate'=>$request->ton_91_to_ton_100_rate,
            'ton_101'=>$request->ton_101,
            'ton_110'=>$request->ton_110,
            'ton_101_to_ton_110_rate'=>$request->ton_101_to_ton_110_rate,
            'ton_111'=>$request->ton_111,
            'ton_120'=>$request->ton_120,
            'ton_111_to_ton_120_rate'=>$request->ton_111_to_ton_120_rate,
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

        $alert = array('msg' => 'Bonus Count List Successfully Inserted', 'alert-type' => 'info');
        return redirect()->back()->with($alert);

    }

    public function edit($id)
    {
        $suppliers = Supplier::get();
        $bonus_list = MonthlyBonusCount::where('id',$id)->first();
        return view('admin.bonus.bonus_count.edit' ,get_defined_vars());
    }

    public function update(Request $request)
    {

        //dd($request->all());

        MonthlyBonusCount::where('id',$request->id)->update([
            'supplier_id'=> $request->company_name,
            'ton_10'=>$request->ton_10,
            'ton_20'=>$request->ton_20,
            'ton_10_to_ton_20_rate'=>$request->ton_10_to_ton_20_rate,
            'ton_21'=>$request->ton_21,
            'ton_30'=>$request->ton_30,
            'ton_21_to_ton_30_rate'=>$request->ton_21_to_ton_30_rate,
            'ton_31'=>$request->ton_31,
            'ton_40'=>$request->ton_40,
            'ton_31_to_ton_40_rate'=>$request->ton_31_to_ton_40_rate,
            'ton_41'=>$request->ton_41,
            'ton_50'=>$request->ton_50,
            'ton_41_to_ton_50_rate'=>$request->ton_41_to_ton_50_rate,
            'ton_51'=>$request->ton_51,
            'ton_60'=>$request->ton_60,
            'ton_51_to_ton_60_rate'=>$request->ton_51_to_ton_60_rate,
            'ton_61'=>$request->ton_61,
            'ton_70'=>$request->ton_70,
            'ton_61_to_ton_70_rate'=>$request->ton_61_to_ton_70_rate,
            'ton_71'=>$request->ton_71,
            'ton_80'=>$request->ton_80,
            'ton_71_to_ton_80_rate'=>$request->ton_71_to_ton_80_rate,
            'ton_81'=>$request->ton_81,
            'ton_90'=>$request->ton_90,
            'ton_81_to_ton_90_rate'=>$request->ton_81_to_ton_90_rate,
            'ton_91'=>$request->ton_91,
            'ton_100'=>$request->ton_100,
            'ton_91_to_ton_100_rate'=>$request->ton_91_to_ton_100_rate,
            'ton_101'=>$request->ton_101,
            'ton_110'=>$request->ton_110,
            'ton_101_to_ton_110_rate'=>$request->ton_101_to_ton_110_rate,
            'ton_111'=>$request->ton_111,
            'ton_120'=>$request->ton_120,
            'ton_111_to_ton_120_rate'=>$request->ton_111_to_ton_120_rate,
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

        $alert = array('msg' => 'Bonus Count Table Successfully Update', 'alert-type' => 'info');
        return redirect()->route('bonus.index')->with($alert);

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
        MonthlyBonusCount::where('id',$id)->delete();
        $alert = array('msg' => 'Bonus Count List Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('bonus.index')->with($alert);

    }
}
