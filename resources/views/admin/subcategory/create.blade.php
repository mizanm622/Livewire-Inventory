@extends('layouts.admin')

@section('page-title')
Sub Category Add
@endsection

@section('main-content')
{{-- Image plugin css --}}
<link rel="stylesheet" href="{{asset('assets/css/dropify.min.css')}}" />

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Add Sub Category <small>Add your sub-category from here</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a class="dropdown-item" href="#">Settings 1</a>
                                </li>
                                <li><a class="dropdown-item" href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('subcategory.store')}}" method="post" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                        @csrf
                        <div class="row m-auto">
                            <div class="col-12">
                               
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="category_id">Category Name <span class=""></span>
                                    </label>
                                    <div class="col-md-4 col-sm-6">
                                       <select name="category_id" id="category_id" class="form-control">
                                            @foreach($categories as $category )
                                                <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                       </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="name">Sub Category Name <span class=""></span>
                                    </label>
                                    <div class="col-md-4 col-sm-6">
                                        <input type="text" name="name" id="name"  class="form-control">
                                    </div>
                                </div>

                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="description">Description<span class=""></span>
                                    </label>
                                    <div class="col-md-4 col-sm-6">
                                        <textarea type="text" name="description" id="description" cols="10" rows="2"  class="form-control"></textarea>
                                    </div>
                                </div>
                              
                                
                                <div class="item form-group">
                                    <label class="col-form-label col-md-4 col-sm-4 label-align" for="remarks">Remarks<span class=""></span>
                                    </label>
                                    <div class="col-md-4 col-sm-6">
                                        <textarea type="text" name="remarks" id="remarks" cols="10" rows="2"  class="form-control"></textarea>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                      
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-12 col-sm-12 text-center">
                                <a href="{{route('subcategory.index')}}" class="btn btn-primary" type="button">Cancel</a>
                                <button class="btn btn-primary" type="reset">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
@endsection
