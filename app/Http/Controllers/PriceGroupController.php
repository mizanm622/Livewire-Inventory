<?php

namespace App\Http\Controllers;

use App\Models\PriceGroup;
use Illuminate\Http\Request;

class PriceGroupController extends Controller
{
    public function index()
    {
        $price_groups = PriceGroup::latest()->get();
        return view('admin.price_group.index',compact('price_groups'));
    }

    public function create()
    {
        return view('admin.price_group.create');
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => [  'max:255'],
            'description' => [ 'max:1000'],
            'remarks' => [ 'max:255'],
           
        ]);

        PriceGroup::insert([
            'name' => $request->name,
            'description' => $request->description,
            'remarks' => $request->remarks,
        ]);

        $alert = array('msg' => 'Price Group Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('price_group.index')->with($alert);


    }
    public function edit($id)
    {
        $price_group = PriceGroup::where('id',$id)->first();

        return view('admin.price_group.edit', compact('price_group'));
    }

    public function update(Request $request)
    {
        $validator = $request->validate([
            'name' => [ 'max:255'],
            'description' => [ 'max:1000'],
            'remarks' => [ 'max:255'],
           
        ]);
        
        PriceGroup::where('id',$request->id)->update([
            'name' => $request->name,
            'description' => $request->description,
            'remarks' => $request->remarks,
        ]);

        $alert = array('msg' => 'Price Group Successfully Update', 'alert-type' => 'info');
        return redirect()->route('price_group.index')->with($alert);


    }

    public function delete($id)
    {
       
        PriceGroup::where('id',$id)->delete();

        $alert = array('msg' => 'Price Group Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('price_group.index')->with($alert);
    }
}
