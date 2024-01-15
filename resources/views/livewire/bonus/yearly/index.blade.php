<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Yearly Bonus  <small>Show your Yearly Bonus from here</small></h2>
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
                                    <label for="supplier_search">Start Year:</label>
                                    <div class="form-group">
                                      <input type="date" name="start_year" wire:model="start_year" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label for="supplier_search">End Year:</label>
                                    <div class="form-group">
                                      <input type="date" name="end_year" wire:model="end_year" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label for="supplier_search">Select Supplier:</label>
                                    <div class="form-group" wire:ignore>
                                        <select type="search" id="get_supplier_id"   name="get_supplier_id" placeholder="search supplier" class="form-control">
                                            <option value=""></option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">
                                                    {{$supplier->company_name}} |
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

                                @if(count($bonuses) > 0)
                                <div class="x_title">

                                    <h3 class="text-center"> <strong>Year wise commission rate </strong></h3>
                                </div>
                                @endif
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">

                                                <th>Year</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Total Ton</th>
                                                <th>Commission Rate</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_weight = 0;
                                                $total_commission = 0;
                                            @endphp
                                            @foreach ($bonuses as $bonus)
                                            @php
                                                $total_weight += $bonus->total_ton;
                                                $total_commission +=$bonus->commission_rate*$bonus->total_ton;
                                            @endphp
                                            <tr>
                                                <td>{{$bonus->year}}</td>
                                                <td>{{$bonus->supplier->company_name}}</td>
                                                <td>{{$bonus->supplier->address}}</td>
                                                <td class="text-center">{{$bonus->supplier->mobile}}</td>
                                                <td class="text-center">{{$bonus->total_ton}}</td>
                                                <td class="text-right">{{$bonus->commission_rate}}/=</td>
                                                <td class="text-right">{{$bonus->commission_rate*$bonus->total_ton}}/=</td>
                                            </tr>
                                            @endforeach
                                            <tr class="text-right">
                                                <td colspan="5">Total Weight = {{$total_weight}} (Ton)</td>
                                                <td colspan="5">Total Commission = {{$total_commission}} /=</td>
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


@push('scripts')
<script>

    $(document).ready(function () {

           $('#get_supplier_id').select2({
            placeholder: 'Select supplier from here',
           });

           $('#get_supplier_id').on('change', function (e){
               //@this.searchSupplier(e.target.value);
                var data = $('#get_supplier_id').select2("val");
                @this.set('get_supplier_id', data);
            });

            // $('#due_supplier_search').on('change', function (){
            //     $('#due_customer_search').reset('').trigger('change');

            // });


            //$('#due_customer_search').val([]).trigger('change');
    });

    </script>

@endpush
