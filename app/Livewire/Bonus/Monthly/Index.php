<?php

namespace App\Livewire\Bonus\Monthly;

use App\Models\MonthlyBonus;
use App\Models\MonthlyBonusCount;
use App\Models\PurchaseProduct;
use App\Models\Supplier;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class Index extends Component
{

    public $bonus;
    public $start_date;
    public $end_date;
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
        MonthlyBonus::truncate();
      

    }



    public function supplierDueSearch()
    {



        if($this->get_supplier_id && ($this->start_date && $this->end_date))
        {

            //if previous record exists then destroy all data to store new data
            MonthlyBonus::truncate();


            //get start month
            $start = date('m', strtotime($this->start_date));
             //get end month
            $end = date('m', strtotime($this->end_date));
              //get year to search record
            $this->year = date('Y', strtotime($this->end_date));
            //get last 2 digit in a year
            $get_year = date('y', strtotime($this->end_date));


          for($i= $start; $i<= $end; $i++)
          {

            // get month wise quantity and weight
            $this->bonus = PurchaseProduct::whereMonth('date', date($i))
            ->whereYear('date', date($this->year))
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
           $bonus_count = MonthlyBonusCount::where('supplier_id',$this->get_supplier_id)->first();

            // check commission rate
           if( $this->total_ton < $bonus_count->ton_10)
           {
            $this-> commission_rate = 0;
           }
           elseif($this->total_ton >= $bonus_count->ton_10 && $this->total_ton <= $bonus_count->ton_20)
           {
            $this-> commission_rate =$bonus_count->ton_10_to_ton_20_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_21 && $this->total_ton <= $bonus_count->ton_30)
           {
            $this-> commission_rate =$bonus_count->ton_21_to_ton_30_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_31 && $this->total_ton <= $bonus_count->ton_40)
           {
            $this-> commission_rate =$bonus_count->ton_31_to_ton_40_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_41 && $this->total_ton <= $bonus_count->ton_50)
           {
            $this-> commission_rate =$bonus_count->ton_41_to_ton_50_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_51 && $this->total_ton <= $bonus_count->ton_60)
           {
            $this-> commission_rate =$bonus_count->ton_51_to_ton_60_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_61 && $this->total_ton <= $bonus_count->ton_70)
           {
            $this-> commission_rate =$bonus_count->ton_61_to_ton_70_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_71 && $this->total_ton <= $bonus_count->ton_80)
           {
            $this-> commission_rate =$bonus_count->ton_71_to_ton_80_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_81 && $this->total_ton <= $bonus_count->ton_90)
           {
            $this-> commission_rate =$bonus_count->ton_81_to_ton_90_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_91 && $this->total_ton <= $bonus_count->ton_100)
           {
            $this-> commission_rate =$bonus_count->ton_91_to_ton_100_rate;
           }
           elseif($this->total_ton >= $bonus_count->ton_101 && $this->total_ton <= $bonus_count->ton_110)
           {
            $this-> commission_rate =$bonus_count->ton_101_to_ton_110_rate;
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


           //get month name from loop
           if($i == 1)
           {
            $date = 'January';

           }
           elseif($i == 2)
           {
            $date = 'February';
           }
           elseif($i == 3)
           {
            $date = 'March';
           }
           elseif($i == 4)
           {
            $date = 'April';
           }
           elseif($i == 5)
           {
            $date = 'May';
           }
           elseif($i == 6)
           {
            $date = 'June';
           }
           elseif($i == 7)
           {
            $date = 'July';
           }
           elseif($i == 8)
           {
            $date = 'August';
           }
           elseif($i == 9)
           {
            $date = 'September';
           }
           elseif($i == 10)
           {
            $date = 'October';
           }
           elseif($i == 11)
           {
            $date = 'November';
           }
           else
           {
            $date = 'December';
           }


           //store month wise commission
            MonthlyBonus::insert([
            'supplier_id' => $this->get_supplier_id,
            'total_ton' =>    $this->total_weight/1000,
            'commission_rate' =>  $this->commission_rate,
            'month'=>$date.'-'.$get_year,
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
        $bonuses = MonthlyBonus::get();

        return view('livewire.bonus.monthly.index', get_defined_vars());
    }
}
