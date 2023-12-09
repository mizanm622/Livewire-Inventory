<?php

namespace App\Livewire\Brand;

use Livewire\Component;
use App\Models\Brand;

class Index extends Component
{
    public $name, $description, $remarks, $id;

    public function rules()
    {
        return
        [
            'name' => ['required','string'],
            'description' => ['required','string'],
            'remarks' => ['nullable']
        ];
    }


    public function store()
    {
        $validateData = $this->validate();



        Brand::insert([
            'name'=>$validateData['name'],
            'description'=>$validateData['description'],
            'remarks'=>$validateData['remarks']
        ]);

        session()->flash('msg','Brand Successfully Inserted');
        $this->dispatch('close-modal');
        $this->reset(['name','description','remarks']);
    }

    public function resetInput()
    {
        $this->reset(['name','description','remarks']);
    }

    public function closeModal()
    {
        $this->resetInput();
    }

    public function openModal()
    {
        $this->resetInput();
    }

    public function edit($id)
    {
        $this->id = $id;
        $brands = Brand::findOrFail($id);
        $this->name = $brands->name;
        $this->description = $brands->description;
        $this->remarks = $brands->remarks;
    }

    public function update()
    {

        $validateData = $this->validate();

        Brand::where('id',$this->id)->update([
            'name'=>$validateData['name'],
            'description'=>$validateData['description'],
            'remarks'=>$validateData['remarks']
        ]);

        session()->flash('msg','Brand Successfully Updated');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function delete($id)
    {
        $this->id = $id;
    }

    public function destroy()
    {
        Brand::findOrFail($this->id)->delete();
        session()->flash('msg','Brand Successfully Deleted');
        $this->dispatch('close-modal');
        $this->resetInput();
    }

    public function render()
    {
        $brands = Brand::latest()->get();
        return view('livewire.brand.index', get_defined_vars())
        ->extends('layouts.admin')
        ->section('main-content');
    }
}
