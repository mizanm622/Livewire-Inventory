

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
       @include('livewire.brand.modal_form')

        <div class="x_title">
                <h2> <a href="" class="btn btn-md btn-primary" data-toggle="modal" data-target=".add-modal">+Add Brand</a> Brand List<small>Show Brand list from here</small></h2>
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
                                <th class="all">Brand Name</th>
                                <th class="all">Description</th>
                                <th class="all">Remarks</th>
                                <th class="all">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)


                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$brand->name}}</td>
                                        <td>{{$brand->description}}</td>
                                        <td>{{$brand->remarks}}</td>
                                        <td> <a href="#" wire:click="edit({{$brand->id}})" class="btn btn-success" data-toggle="modal" data-target=".update-modal"><i class="fa fa-edit" ></i></a> <button  wire:click="delete({{$brand->id}})" data-toggle="modal" data-target=".delete-modal" class="btn btn-danger"><i class="fa fa-trash" ></i></button></td>
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


@push('script')

<script>
 window.addEventListener('close-modal', event=> {
     $('.add-modal').modal('hide');
     $('.update-modal').modal('hide');
     $('.delete-modal').modal('hide');
  });

</script>

@endpush
