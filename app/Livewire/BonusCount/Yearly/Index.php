<?php

namespace App\Livewire\BonusCount\Yearly;

use App\Models\Supplier;
use App\Models\YearlyBonusCount;
use Livewire\Component;

class Index extends Component
{
   
    public $ton_101;
    public $ton_120;
    public $ton_101_to_ton_120_rate;
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
];
}

public function getSupplier($id)
{
    $this->supplier_id = $id;
    $this->supplier_info = Supplier::where('id',$id)->first();
  
   
}

public function store()
{
    

    YearlyBonusCount::updateOrCreate(
        [ 
            'supplier_id'=> $this->supplier_id
        ],
        [
        
        'ton_101'=>$this->ton_101,
        'ton_120'=>$this->ton_120,
        'ton_101_to_ton_120_rate'=>$this->ton_101_to_ton_120_rate,
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

   
    $notification = array('msg' => 'Yearly Bonus Count Table Successfully Inserted', 'alert-type' => 'success');
    return redirect()->route('yearly.bonus.create')->with($notification);
}


    
    public function render()
    {
        $suppliers = Supplier::all();
        return view('livewire.bonus-count.yearly.index', get_defined_vars());
    }
}
