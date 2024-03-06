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
                    <div class="col-lg-12 col-md-12 col-sm-12 offset-lg-2 offset-md-3">

                        <div class="customer_area">
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <h2 class="text-center text-dark border">Employee Information</h2>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <div class="logo text-center mb-3">
                                                @if(empty($employee->photo))
                                                    <img src="{{asset('assets/images/user.png')}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                                @else
                                                    <img src="{{asset($employee->photo)}}" alt="Photo" width="100" height="100" class="rounded-circle">
                                                @endif

                                                <h4 class="text-dark">{{$employee->name}}</h4>
                                                @if(!empty($employee->email))
                                                    <h6 class="text-dark">{{$employee->email}}</h6>
                                                @endif
                                            </div>
                                        </tr>
                                    </thead>
                                    <thead>
                                        <tr>
                                            <th class="w-25 text-center">Father Name</th>
                                            <th class="w-25 text-center">Address</th>
                                            <th class="w-25 text-center">Mobile</th>
                                            <th class="w-25 text-center">NID Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$employee->father_name}}</td>
                                            <td class="text-center">{{$employee->address}}</td>
                                            <td class="text-center">{{$employee->mobile}}</td>
                                            <td class="text-center">{{$employee->nid}}</td>
                                        </tr>
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th class="w-25 text-center">Date of Birth</th>
                                            <th class="w-25 text-center">Joining Date</th>
                                            <th class="w-25 text-center">Salary Amount</th>
                                            <th class="w-25 text-center">Bonus Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{$employee->birthday}}</td>
                                            <td class="text-center">{{$employee->joining_date}}</td>
                                            <td class="text-right">{{$employee->salary_amount}}/=</td>
                                            <td class="text-right">{{$employee->bonus_amount}}/=</td>
                                        </tr>
                                    </tbody>

                                    <thead>
                                        <tr>
                                            <th class="w-25 text-center">Others Amount</th>
                                            <th class="w-25 text-center">Security</th>
                                            <th class="w-50 text-center" colspan="2">Remarks</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-right">{{$employee->others}}/=</td>
                                            <td class="text-center">{{$employee->security}}</td>
                                            <td class="text-center" colspan="2">{{$employee->remarks}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
