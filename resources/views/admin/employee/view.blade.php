@extends('layouts.admin')

@section('page-title')
Employee View
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
            <div class="x_panel">
                <div class="back_button mb-2">
                    <a href="{{route('employee.index')}}" class="btn btn-md btn-primary float-right">Back</a>
                </div>
                <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <h2>Employee Information   <small> Employee all information</small></h2>
                    <div class="customer_area">
                        <div class="logo text-center mb-3">
                            @if(empty($employee->photo))
                                <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                            @else
                                <img src="{{asset($employee->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                            @endif
                           
                            <h4>{{$employee->name}}</h4>
                            @if(!empty($employee->email))
                                <h6>{{$employee->email}}</h6>
                            @endif
                        </div>
                        <div class="title text-left">
                            <p><strong>Father Name:</strong> {{$employee->father_name}}</p>
                            <p><strong>Address: </strong>{{$employee->address}}</p>
                            <p><strong>Mobile: </strong>{{$employee->mobile}}</p>
                            <p><strong>NID Number: </strong>{{$employee->nid}}</p>
                            <p><strong>Date of Birth: </strong>{{$employee->birthday}}</p>
                            <p><strong>Joining Date: </strong>{{$employee->joining_date}}</p>
                            <p><strong>Salary Amount: </strong>{{$employee->salary_amount}}/-</p>
                            <p><strong>Bonus Amount: </strong>{{$employee->bonus_amount}}/-</p>
                            <p><strong>Others Amount: </strong>{{$employee->others}}/-</p>
                            <p><strong>Security: </strong>{{$employee->security}}</p>
                            <p><strong>Remarks: </strong>{{$employee->remarks}}</p>
                        </div>
                    </div>
                </div>
               
             </div>
            </div>
        </div>
    </div>
</div>

@endsection
