<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Supplier Due <small>Show your Supplier Due from here</small></h2>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <form wire:submit.prevent=supplierDueSearch()>
                        <div class="row ">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label for="supplier_search">Search Due Supplier by Date:</label>
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="date" name="date" id="date" class="form-control" wire:model="date">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label for="supplier_search">Search Due Supplier:</label>
                                    {{$get_supplier_id}}
                                    <div class="form-group" wire:ignore>
                                        <select type="search" id="due_supplier_search"   name="get_supplier_id" placeholder="search supplier" class="form-control">
                                            <option value=""></option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">
                                                    {{$supplier->company_name}} -
                                                    {{$supplier->address}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="supplier-search-button pt-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <button type="button" wire:click="resetSupplier" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="due-list-area mt-4">
                                @if(isset($due_supplier))
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Supplier ID</th>
                                                <th>Supplier Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Total Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @forelse ($due_supplier as $supplier)
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($supplier->date))}}</td>
                                                <td>{{$supplier->supplier_id}}</td>
                                                <td>{{$supplier->supplier->company_name}}</td>
                                                <td>{{$supplier->supplier->address}}</td>
                                                <td>{{$supplier->supplier->mobile}}</td>
                                                <td>{{$supplier->current_due ?? -$supplier->current_advance}}/=</td>
                                            </tr>
                                             @empty
                                                <tr class="text-center">
                                                    <td colspan="5">No Data Found!</td>
                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                @else

                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@push('scripts')
<script>

    $(document).ready(function () {

           $('#due_supplier_search').select2({
            placeholder: 'Select supplier from here',
           });

           $('#due_supplier_search').on('change', function (e){
               //@this.searchSupplier(e.target.value);
                var data = $('#due_supplier_search').select2("val");
                @this.set('get_supplier_id', data);
            });

            // $('#due_supplier_search').on('change', function (){
            //     $('#due_customer_search').reset('').trigger('change');

            // });


            //$('#due_customer_search').val([]).trigger('change');
    });

    </script>

@endpush
