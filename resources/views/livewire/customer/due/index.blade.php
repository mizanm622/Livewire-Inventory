<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Show Customer Due <small>Show your Customer Due from here</small></h2>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
                            <form wire:submit.prevent=customerDueSearch()>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="date-area">
                                            <label class="d-block py-1 border" for="supplier_search">Date:</label>
                                            <div class="form-group">
                                              <input type="date" name="date" wire:model="date" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="customer-search-area">
                                            <label class="d-block py-1 border" for="customer_search">Customer Name:</label>
                                            <div class="form-group" wire:ignore>
                                                <select type="search" id="due_customer_search" name="get_customer_id"  placeholder="search customer" class="form-control">
                                                    <option value=""></option>
                                                    @foreach ($customers as $customer)
                                                        <option value="{{$customer->id}}">
                                                            {{$customer->name}} -
                                                            {{$customer->address}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12">
                                        <div class="customer-search-button py-4">
                                            <div class="form-group py-3">
                                                <button type="submit" class="btn btn-success">Search</button>
                                                <button type="button" wire:click="resetCustomer" class="btn btn-danger">Reset</button>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="due-list-area mt-4">
                                @if(isset($due_customer) || isset($last_due))
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer ID</th>
                                                <th>Customer Name</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if($last_due)
                                            <tr>
                                                <td>{{date('d-m-Y',strtotime($last_due->date))}}</td>
                                                <td>{{$last_due->customer->id}}</td>
                                                <td>{{$last_due->customer->name}}</td>
                                                <td>{{$last_due->customer->company_name ?? ""}}</td>
                                                <td>{{$last_due->customer->address ?? ""}}</td>
                                                <td>{{$last_due->customer->mobile ?? ""}}</td>
                                                <td class="text-right">{{$last_due->old_due  ?? -$last_due->advance_payment}}/=</td>
                                            </tr>
                                        @elseif($due_customer)
                                           @forelse ($due_customer as $customer)
                                                <tr>
                                                    <td>{{date('d-m-Y',strtotime($customer->date))}}</td>
                                                    <td>{{$customer->customer->id}}</td>
                                                    <td>{{$customer->customer->name}}</td>
                                                    <td>{{$customer->customer->company_name ?? ""}}</td>
                                                    <td>{{$customer->customer->address ?? ""}}</td>
                                                    <td>{{$customer->customer->mobile ?? ""}}</td>
                                                    <td class="text-right">{{$customer->old_due  ?? -$customer->advance_payment}}/=</td>
                                                </tr>
                                           @empty
                                                <tr class="text-center">
                                                    <td colspan="7">No Data Found!</td>
                                                </tr>
                                           @endforelse
                                        @endif
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


        $('#due_customer_search').select2({
        placeholder: 'Select customer from here',
        });

        $('#due_customer_search').on('change', function (e) {
            //@this.searchCustomer(e.target.value);
            var data = $('#due_customer_search').select2("val");
            @this.set('get_customer_id', data);
        });


    });

    </script>

@endpush
