<?php

namespace App\Livewire\Customer\Ledger;

use App\Models\Collection;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $collections = Collection::orderBy('id','DESC')->get();
        return view('livewire.customer.ledger.index',get_defined_vars());
    }
}
