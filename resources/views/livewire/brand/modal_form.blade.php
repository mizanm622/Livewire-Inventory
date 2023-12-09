{{-- inser tmodal --}}
<div wire:ignore.self class="modal fade add-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                {{-- <h4 class="modal-title" id="myModalLabel">Brand Add</h4> --}}
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Add Brand <small>Add your Brand from here</small></h2>
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
                                <form wire:submit.prevent="store()" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    @csrf
                                    <div class="row m-auto">
                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Brand Name <span class="required"></span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <input type="text" id="name" wire:model="name" name="name"  class="form-control">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="description">Description<span class="required">*</span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <textarea type="text" name="description" wire:model="description" id="description" cols="10" rows="2" required="required" class="form-control"></textarea>
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="remarks">Remarks<span class="required"></span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <textarea type="text" name="remarks" wire:model="remarks" id="remarks" cols="10" rows="2"  class="form-control"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 offset-md-4">
                                            <a href="" class="btn btn-primary" type="button">Cancel</a>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- update modal --}}
<div wire:ignore.self class="modal fade update-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                {{-- <h4 class="modal-title" id="myModalLabel">Brand Add</h4> --}}
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 ">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Update Brand <small>Update your Brand from here</small></h2>
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
                                <form wire:submit.prevent="update()" enctype="multipart/form-data" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                    @csrf
                                    <div class="row m-auto">
                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="name">Brand Name <span class="required"></span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <input type="text" id="name" wire:model.defer="name"  class="form-control">
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="description">Description<span class="required">*</span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <textarea type="text"  wire:model.defer="description"  id="description" cols="10" rows="2" required="required" class="form-control"></textarea>
                                                </div>
                                            </div>


                                            <div class="item form-group">
                                                <label class="col-form-label col-md-4 col-sm-3 label-align" for="remarks">Remarks<span class="required"></span>
                                                </label>
                                                <div class="col-md-5 col-sm-6">
                                                    <textarea type="text"  wire:model.defer="remarks"  id="remarks" cols="10" rows="2"  class="form-control"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="ln_solid"></div>
                                    <div class="item form-group">
                                        <div class="col-md-12 col-sm-12 offset-md-4">
                                            <a href="" class="btn btn-primary" type="button">Cancel</a>
                                            <button class="btn btn-primary" type="reset">Reset</button>
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Delete modal popup --}}
<div wire:ignore.self class="modal fade delete-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-header">
                {{-- <h4 class="modal-title" id="myModalLabel">Brand Add</h4> --}}
                <button type="button" class="close" wire:click="closeModal" data-dismiss="modal"><span aria-hidden="true">×</span>
                </button>
            </div>
            <form wire:submit.prevent="destroy"  data-parsley-validate class="form-horizontal form-label-left">
                @csrf
                <div class="modal-body">
                    <h4 class="text-center">Are your sure you want to delete this item?</h4>
                </div>

                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-sm btn-warning mx-2" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-sm btn-success">Yes, Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>
