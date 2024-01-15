<?php

namespace App\Livewire\Bonus\Yearly;


use App\Models\PurchaseProduct;
use App\Models\Supplier;
use App\Models\YearlyBonus;
use App\Models\YearlyBonusCount;
use Livewire\Component;

class Index extends Component
{

    public $bonus;
    public $start_year;
    public $end_year;
    public $year;
    public $get_supplier_id;
    public $company_name;
    public $address;
    public $mobile;
    public $commission_rate;
    public $total_weight;
    public $total_ton;






    // public function mount()
    // {
    //     // Set the initial date when the component is mounted
    //     $this->date = now()->toDateString();

    // }

    public function resetSupplier()
    {
        $this->reset('bonus');
        YearlyBonus::truncate();


    }



    public function supplierDueSearch()
    {



        if($this->get_supplier_id && ($this->start_year && $this->end_year))
        {

            //if previous record exists then destroy all data to store new data
            YearlyBonus::truncate();


            //get start month
            $start = date('Y', strtotime($this->start_year));
             //get end month
            $end = date('Y', strtotime($this->end_year));


          for($i= $start; $i<= $end; $i++)
          {

            // get month wise quantity and weight
            $this->bonus = PurchaseProduct::whereYear('date', date($i))
            ->where('supplier_id',$this->get_supplier_id)
            ->get(['product_quantity','product_weight']);


            //$this->bonus = PurchaseProduct::where('supplier_id',$this->get_supplier_id)->whereBetween('date',[$this->start_date, $this->end_date])->get();


            foreach($this->bonus as $value)
            {
                // get total weight from multiply quantity and weight
                $this->total_weight += $value->product_quantity * $value->product_weight;

            }

            // total weight convert into ton
           $this->total_ton =  floor($this->total_weight/1000);

            // get supplier bonus count list and rate
           $bonus_count = YearlyBonusCount::where('supplier_id',$this->get_supplier_id)->first();

            // check commission rate

           if($this->total_ton >= $bonus_count->ton_101 && $this->total_ton <= $bonus_count->ton_120)
           {
            $this-> commission_rate =$bonus_count->ton_101_to_ton_120_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_121 && $this->total_ton <= $bonus_count->ton_130)
           {
            $this-> commission_rate =$bonus_count->ton_121_to_ton_130_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_131 && $this->total_ton <= $bonus_count->ton_140)
           {
            $this-> commission_rate =$bonus_count->ton_131_to_ton_140_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_141 && $this->total_ton <= $bonus_count->ton_150)
           {
            $this-> commission_rate =$bonus_count->ton_141_to_ton_150_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_151 && $this->total_ton <= $bonus_count->ton_160)
           {
            $this-> commission_rate =$bonus_count->ton_151_to_ton_160_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_161 && $this->total_ton <= $bonus_count->ton_170)
           {
            $this-> commission_rate =$bonus_count->ton_161_to_ton_170_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_171 && $this->total_ton <= $bonus_count->ton_180)
           {
            $this-> commission_rate =$bonus_count->ton_171_to_ton_180_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_181 && $this->total_ton <= $bonus_count->ton_190)
           {
            $this-> commission_rate =$bonus_count->ton_181_to_ton_190_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_191 && $this->total_ton <= $bonus_count->ton_200)
           {
            $this-> commission_rate =$bonus_count->ton_191_to_ton_200_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_201 && $this->total_ton <= $bonus_count->ton_210)
           {
            $this-> commission_rate =$bonus_count->ton_201_to_ton_210_rate;
           }
           else
           {
            $this-> commission_rate = 0;
           }




           //store month wise commission
            YearlyBonus::insert([
            'supplier_id' => $this->get_supplier_id,
            'total_ton' =>    $this->total_weight/1000,
            'commission_rate' =>  $this->commission_rate,
            'year'=>$i,
           ]);

           //reset previous month value
           $this->reset('total_ton','total_weight');

        }

        }
        else
        {
            $this->bonus = "No result found";
        }

        //dd( $this->due_supplier);

    }


    public function render()
    {

        //$this->date = Carbon::now()->format('d-m-Y');
        $suppliers = Supplier::get();
        $bonuses = YearlyBonus::get();
        return view('livewire.bonus.yearly.index', get_defined_vars());
    }
}
