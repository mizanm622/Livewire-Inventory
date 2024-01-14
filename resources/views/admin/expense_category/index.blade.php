@extends('layouts.admin')

@section('page-title')
Expense Category List
@endsection

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2> <a href="{{route('expense_category.create')}}" class="btn btn-md btn-primary">+Add Expense Category</a> Expense Category List<small>Show expense category list from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                   
                    <li>
                        <a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li>
                        <a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 ">
                    <div class="card-box table-responsive">
                        {{-- notification message --}}
                        @if(session()->has('msg'))
                            <div class="text-center alert alert-success">
                                {{session()->get('msg')}}
                            </div>
                        @endif
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                <th class="all">S.N.</th>
                                <th class="all">Category Name</th>
                                <th class="all">Description</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expense_categories as $expense_category)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$expense_category->name}}</td>
                                        <td class="text-wrap">{{$expense_category->description}}</td>
                                        <td> <a href="{{route('expense_category.edit',$expense_category->id)}}" class="btn btn-success"><i class="fa fa-edit" ></i></a> <a href="{{route('expense_category.delete',$expense_category->id)}}" class="btn btn-danger" id="delete"><i class="fa fa-trash" ></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
