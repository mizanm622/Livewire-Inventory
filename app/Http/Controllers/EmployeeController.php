<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('admin.employee.index',compact('employees'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request)
    {

        $validator = $request->validate([
            'name' => [ 'max:255'],
            'designation' => [  'max:255'],
            'father_name' => [ 'max:255'],
            'mobile' => [  'max:14'],
            'email' => ['max:255'],
            'address' => [  'max:255'],
            'nid' => ['max:20'],
            'birthday' => ['max:10'],
            'joining_date' => ['max:10'],
            'salary_amount' => ['max:20'],
            'bonus_amount' => ['max:20'],
            'security' => ['max:255'],
            'remarks' => ['max:255'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
            
        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/employee/',$photoName);
        }
        else
        {
            $photo_path = "";
        }
       

       
        Employee::insert([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'nid' => $request->nid,
            'birthday' => $request->birthday,
            'designation' => $request->designation,
            'joining_date' => $request->joining_date,
            'salary_amount' => $request->salary_amount,
            'bonus_amount' => $request->bonus_amount,
            'others_amount' => $request->others,
            'security' => $request->security,
            'remarks' => $request->remarks,
            'photo' => $photo_path,
           
        ]);

        $alert = array('msg' => 'Employee Successfully Inserted', 'alert-type' => 'success');
        return redirect()->route('employee.index')->with($alert);
    }
    public function edit($id)
    {
        $employee = Employee::where('id',$id)->first();

        return view('admin.employee.edit', compact('employee'));
    }

    public function update(Request $request)
    {

        $validator = $request->validate([
            'name' => [ 'max:255'],
            'designation' => [  'max:255'],
            'father_name' => [ 'max:255'],
            'mobile' => [  'max:14'],
            'email' => ['max:255'],
            'address' => [ 'max:255'],
            'nid' => ['max:20'],
            'birthday' => ['max:10'],
            'joining_date' => ['max:10'],
            'salary_amount' => ['max:20'],
            'bonus_amount' => ['max:20'],
            'security' => ['max:255'],
            'remarks' => ['max:255'],
            'photo' =>  ['image','mimes:jpeg,png,jpg,gif,svg','max:1000'],
            
        ]);

        if(!empty($request->photo))
        {
            $photo = $request->photo;
            $photoName = uniqid().'.'.$photo->getClientOriginalExtension();
            $photo_path = $photo->move('images/employee/',$photoName);
            if(file_exists($request->old_photo))
            {
                unlink($request->old_photo);
            }
        }
        else
        {
            if(!empty($request->old_photo))
            {
                $photo_path=$request->old_photo;
            }
            else
            {
                $photo_path = "";
            }
          
        } 
      

        Employee::where('id',$request->id)->update([
            'name' => $request->name,
            'father_name' => $request->father_name,
            'mobile' => $request->mobile,
            'email' => $request->email,
            'address' => $request->address,
            'nid' => $request->nid,
            'birthday' => $request->birthday,
            'joining_date' => $request->joining_date,
            'designation' => $request->designation,
            'salary_amount' => $request->salary_amount,
            'bonus_amount' => $request->bonus_amount,
            'others_amount' => $request->others,
            'security' => $request->security,
            'remarks' => $request->remarks,
            'photo' => $photo_path,
           
        ]);

        $alert = array('msg' => 'Employee Successfully Updated', 'alert-type' => 'info');
        return redirect()->route('employee.index')->with($alert);
    }

    public function delete($id)
    {
        $getImg = Employee::where('id',$id)->first();
        if(file_exists($getImg->photo ))
        {
            unlink($getImg->photo);
            
        }
        Employee::where('id',$id)->delete();

        $alert = array('msg' => 'Employee Successfully Deleted', 'alert-type' => 'warning');
        return redirect()->route('employee.index')->with($alert);
    }

    public function view($id)
    {
        $employee = Employee::where('id',$id)->first();
        return view('admin.employee.view', compact('employee'));
    }



}
