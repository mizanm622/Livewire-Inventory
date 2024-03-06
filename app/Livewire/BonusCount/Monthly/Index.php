<?php

namespace App\Livewire\BonusCount\Monthly;

use App\Models\MonthlyBonusCount;
use App\Models\Supplier;
use Livewire\Component;

class Index extends Component
{

    public $ton_10;
    public $ton_20;
    public $ton_10_to_ton_20_rate;
    public $ton_21;
    public $ton_30;
    public $ton_21_to_ton_30_rate;
    public $ton_31;
    public $ton_40;
    public $ton_31_to_ton_40_rate;
    public $ton_41;
    public $ton_50;
    public $ton_41_to_ton_50_rate;
    public $ton_51;
    public $ton_60;
    public $ton_51_to_ton_60_rate;
    public $ton_61;
    public $ton_70;
    public $ton_61_to_ton_70_rate;
    public $ton_71;
    public $ton_80;
    public $ton_71_to_ton_80_rate;
    public $ton_81;
    public $ton_90;
    public $ton_81_to_ton_90_rate;
    public $ton_91;
    public $ton_100;
    public $ton_91_to_ton_100_rate;
    public $ton_101;
    public $ton_110;
    public $ton_101_to_ton_110_rate;
    public $ton_111;
    public $ton_120;
    public $ton_111_to_ton_120_rate;
    public $ton_121;
    public $ton_130;
    public $ton_121_to_ton_130_rate;
    public $ton_131;
    public $ton_140;
    public $ton_131_to_ton_140_rate;
    public $ton_141;
    public $ton_150;
    public $ton_141_to_ton_150_rate;
    public $ton_151;
    public $ton_160;
    public $ton_151_to_ton_160_rate;
    public $ton_161;
    public $ton_170;
    public $ton_161_to_ton_170_rate;
    public $ton_171;
    public $ton_180;
    public $ton_171_to_ton_180_rate;
    public $ton_181;
    public $ton_190;
    public $ton_181_to_ton_190_rate;
    public $ton_191;
    public $ton_200;
    public $ton_191_to_ton_200_rate;
    public $ton_201;
    public $ton_210;
    public $ton_201_to_ton_210_rate;
    public $supplier_id;
    public $supplier_info;
  


    public function rules()
    {
        return
        [
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
];
}

public function getSupplier($id)
{
    $this->supplier_id = $id;
    $this->supplier_info = Supplier::where('id',$id)->first();
  
   
}

public function store()
{
    

    MonthlyBonusCount::updateOrCreate(
        [ 
            'supplier_id'=> $this->supplier_id
        ],
        [
        'ton_10'=>$this->ton_10,
        'ton_20'=>$this->ton_20,
        'ton_10_to_ton_20_rate'=>$this->ton_10_to_ton_20_rate,
        'ton_21'=>$this->ton_21,
        'ton_30'=>$this->ton_30,
        'ton_21_to_ton_30_rate'=>$this->ton_21_to_ton_30_rate,
        'ton_31'=>$this->ton_31,
        'ton_40'=>$this->ton_40,
        'ton_31_to_ton_40_rate'=>$this->ton_31_to_ton_40_rate,
        'ton_41'=>$this->ton_41,
        'ton_50'=>$this->ton_50,
        'ton_41_to_ton_50_rate'=>$this->ton_41_to_ton_50_rate,
        'ton_51'=>$this->ton_51,
        'ton_60'=>$this->ton_60,
        'ton_51_to_ton_60_rate'=>$this->ton_51_to_ton_60_rate,
        'ton_61'=>$this->ton_61,
        'ton_70'=>$this->ton_70,
        'ton_61_to_ton_70_rate'=>$this->ton_61_to_ton_70_rate,
        'ton_71'=>$this->ton_71,
        'ton_80'=>$this->ton_80,
        'ton_71_to_ton_80_rate'=>$this->ton_71_to_ton_80_rate,
        'ton_81'=>$this->ton_81,
        'ton_90'=>$this->ton_90,
        'ton_81_to_ton_90_rate'=>$this->ton_81_to_ton_90_rate,
        'ton_91'=>$this->ton_91,
        'ton_100'=>$this->ton_100,
        'ton_91_to_ton_100_rate'=>$this->ton_91_to_ton_100_rate,
        'ton_101'=>$this->ton_101,
        'ton_110'=>$this->ton_110,
        'ton_101_to_ton_110_rate'=>$this->ton_101_to_ton_110_rate,
        'ton_111'=>$this->ton_111,
        'ton_120'=>$this->ton_120,
        'ton_111_to_ton_120_rate'=>$this->ton_111_to_ton_120_rate,
        'ton_121'=>$this->ton_121,
        'ton_130'=>$this->ton_130,
        'ton_121_to_ton_130_rate'=>$this->ton_121_to_ton_130_rate,
        'ton_131'=>$this->ton_131,
        'ton_140'=>$this->ton_140,
        'ton_131_to_ton_140_rate'=>$this->ton_131_to_ton_140_rate,
        'ton_141'=>$this->ton_141,
        'ton_150'=>$this->ton_150,
        'ton_141_to_ton_150_rate'=>$this->ton_141_to_ton_150_rate,
        'ton_151'=>$this->ton_151,
        'ton_160'=>$this->ton_160,
        'ton_151_to_ton_160_rate'=>$this->ton_151_to_ton_160_rate,
        'ton_161'=>$this->ton_161,
        'ton_170'=>$this->ton_170,
        'ton_161_to_ton_170_rate'=>$this->ton_161_to_ton_170_rate,
        'ton_171'=>$this->ton_171,
        'ton_180'=>$this->ton_180,
        'ton_171_to_ton_180_rate'=>$this->ton_171_to_ton_180_rate,
        'ton_181'=>$this->ton_181,
        'ton_190'=>$this->ton_190,
        'ton_181_to_ton_190_rate'=>$this->ton_181_to_ton_190_rate,
        'ton_191'=>$this->ton_191,
        'ton_200'=>$this->ton_200,
        'ton_191_to_ton_200_rate'=>$this->ton_191_to_ton_200_rate,
        'ton_201'=>$this->ton_201,
        'ton_210'=>$this->ton_210,
        'ton_201_to_ton_210_rate'=>$this->ton_201_to_ton_210_rate,
    ]
   
    );

    $this->reset('supplier_info');

   
    $notification = array('msg' => 'Bonus Count List Successfully Inserted', 'alert-type' => 'success');
    return redirect()->route('bonus.create')->with($notification);
}


    
    public function render()
    {
        $suppliers = Supplier::all();
        return view('livewire.bonus-count.monthly.index',get_defined_vars());
    }
}
