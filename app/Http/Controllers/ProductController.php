<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\PriceGroup;
use App\Models\Product;
use App\Models\ProductGroup;
use App\Models\Size;
use App\Models\Stack;
use App\Models\SubCategory;
use App\Models\Unit;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        
        return view('admin.product.index',get_defined_vars());
    }

    public function create()
    {
        $product_groups = ProductGroup::get();
        $categories = Category::get();
        $warehouses = Warehouse::get();
        $units = Unit::get();
        $brands = Brand::get();
        $sizes = Size::get();
        return view('admin.product.create',get_defined_vars());
    }

    public function store(Request $request)
    {
        

        // if(empty($request->category_id)){

        //     $alert = array('msg' => 'Please select a category then submit', 'alert-type' => 'danger');
        //     return redirect()->back()->with($alert);
        // }
        // else
        // {
            
        // }
        
       
      
        $validator = $request->validate([
            'code' => [ 'max:255'],
            'name' => [ 'max:255'],
            'group_id' => ['max:11'],
            'purches_rate' => ['max:20'],
            'price_rate' => ['max:20'],
            'mrp_rate' => ['max:20'],
            'opening_stock' => ['max:10'],
            'alert_quantity' => ['max:10'],
            'photo' => ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
           
        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/product/',$photoName);
        }
        else
        {
            $photo_path = ""; 
        }
       

      $category_id = $request->category_id;

        Product::insert([
            'code' => $request->code,
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'size_id' => $request->size_id,
            'unit_id' => $request->unit_id,
            'metric_ton' => $request->metric_ton,
            'barcode' => $request->barcode,
            'group_id' => $request->group_id,
            'purches_rate' => $request->purches_rate,
            'price_rate' => $request->price_rate,
            'mrp_rate' => $request->mrp_rate,
            'opening_stock' => $request->opening_stock,
            'alert_quantity' => $request->alert_quantity,
            'warehouse_id' => $request->warehouse_id,
            'status' => $request->status == true ? '1':'0',
            'remarks' => $request->remarks,
            'photo' => $photo_path,
           
        ]);

        // $product_id = Product::where('category_id',$category_id)->first()->id;

        // Stack::insert([
        //     'product_id' => $product_id,
        //     'category_id' => $category_id,
        //     'brand_id' => $request->brand_id,
        // ]);

        $alert = array('msg' => 'Product Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('product.index')->with($alert);
    }


    public function edit($id)
    {
        $product_groups = ProductGroup::get();
        $product = Product::where('id',$id)->first();
        $categories = Category::get();
        $units = Unit::get();
        $brands = Brand::get();
        $sizes = Size::get();

        return view('admin.product.edit',get_defined_vars());
    }

    public function update(Request $request)
    {

       

        $validator = $request->validate([
            'code' => [ 'max:255'],
            'name' => [ 'max:255'],
            'group_id' => ['max:11'],
            'purches_rate' => ['max:20'],
            'price_rate' => ['max:20'],
            'mrp_rate' => ['max:20'],
            'opening_stock' => ['max:10'],
            'alert_quantity' => ['max:10'],
            'photo' => ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
           
        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/product/',$photoName);
            if(file_exists($request->old_photo))
            {
                unlink($request->old_photo);
            }
        }
        else
        {
            if(!empty($request->old_photo))
            {
                $photo_path = $request->old_photo;
            }
            else
            {
                $photo_path = "";
            }
           
        } 
        
      

        Product::where('id',$request->id)->update([
            'code' => $request->code,
            'name' => $request->name,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
            'type' => $request->type,
            'size_id' => $request->size_id,
            'unit_id' => $request->unit_id,
            'metric_ton' => $request->metric_ton,
            'barcode' => $request->barcode,
            'group_id' => $request->group_id,
            'purches_rate' => $request->purches_rate,
            'price_rate' => $request->price_rate,
            'mrp_rate' => $request->mrp_rate,
            'opening_stock' => $request->opening_stock,
            'alert_quantity' => $request->alert_quantity,
            'warehouse_id' => $request->warehouse_id,
            'status' => $request->status == true ? '1':'0',
            'remarks' => $request->remarks,
            'photo' => $photo_path,
        ]);

        $alert = array('msg' => 'Product Successfully Updated', 'alert-type' => 'info');
        return redirect()->route('product.index')->with($alert);

    }

    public function delete($id)
    {
        $getImg = Product::where('id',$id)->first();
        if(file_exists($getImg->photo ))
        {
            unlink($getImg->photo);
           
        }

        Product::where('id',$id)->delete();

        $alert = array('msg' => 'Product Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('product.index')->with($alert);
    }

    public function view($id)
    {
        $product = Product::where('id',$id)->first();
        return view('admin.product.view',compact('product'));
    }

    public function gallery()
    {
        $products = Product::latest()->get();
        return view('admin.product.gallery', get_defined_vars());

    }
}
