@php
$type = 0;
@endphp
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Sales Report  <small>Show your Sales Report from here</small>  </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        @if($customer_info) <a href="{{ route('sales.customer.report.pdf',[$start_date, $end_date, $customer_info->id ?? 0]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@elseif($start_date && $end_date) <a href="{{ route('sales.all.report.pdf',[$start_date, $end_date]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@endif
                    </li>
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
                    <form wire:submit.prevent=salesReportSearch()>
                        <div class="row ">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label  class="d-block py-1 border" for="supplier_search">From Date:</label>
                                    <div class="form-group">
                                      <input type="date" name="start_date" wire:model="start_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label  class="d-block py-1 border" for="supplier_search">To Date:</label>
                                    <div class="form-group">
                                      <input type="date" name="end_date" wire:model="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label  class="d-block py-1 border" for="supplier_search">Select Customer:</label>
                                    <div class="form-group" wire:ignore>
                                        <select type="search" id="get_customer_id"   name="get_customer_id" placeholder="search supplier" class="form-control">
                                            <option value=""></option>
                                            @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">
                                                    {{$customer->name}} -
                                                    {{$customer->address}} -
                                                    {{$customer->mobile}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-button pt-4">
                                    <div class="form-group pt-3">
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
                                <div class="x_title">

                                    @if($reports)
                                    <h3 class="text-center"> <strong>Customer Wise Purchase Report</strong></h3>
                                    @elseif($all_reports)
                                    <h3 class="text-center"> <strong>Total Sales Report</strong></h3>
                                    @endif
                                </div>

                                <div class="customer-info-area py-2">
                                    @if($customer_info)
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="border border-dark p-2">ID: {{ $customer_info->id }}</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="border border-dark p-2">Name: {{$customer_info->name }}</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="border border-dark p-2 text-wrap">Address: {{  $customer_info->address }}</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="border border-dark p-2">Mobile: {{  $customer_info->mobile}}</p>
                                            </div>
                                        </div>
                                    @endif
                                    @if($start_date && $end_date)
                                        <div class="row pt-3">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h4 class="text-right text-dark font-weight-bold">Start Date: {{date('d-m-Y', strtotime($start_date))}}</h4>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <h4 class="text-left text-dark font-weight-bold">End Date: {{ date('d-m-Y', strtotime($end_date))}}</h4>
                                            </div>
                                        </div>
                                    @endif
                                </div>

                                @if($reports)
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Invoice No.</th>
                                                <th>From Delivery</th>
                                                <th>Description</th>
                                                <th>Product Quantity</th>
                                                <th>Sales Amount</th>
                                                <th>Discount</th>
                                                <th>Vat.</th>
                                                <th>Carring</th>
                                                <th>Others</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_qty = 0;
                                                $total_sales = 0;
                                                $total_discount = 0;
                                                $total_vat = 0;
                                                $total_carring = 0;
                                                $total_others = 0;
                                                $total_amount = 0;
                                            @endphp
                                            @foreach ($reports as $report)
                                            @php
                                                $total_qty +=$report->total_qty;
                                                $total_sales += $report->total_price;
                                                $total_discount += $report->price_discount;
                                                $total_vat += $report->vat;
                                                $total_carring +=$report->carring;
                                                $total_others += $report->other_charge;
                                                $total_amount += $report->total_price -$report->price_discount+$report->vat+$report->carring+$report->other_charge;
                                            @endphp
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                                <td class="text-center">{{$report->invoice_no}}</td>
                                                <td>{{$report->store->name}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered ">

                                                        <tbody>

                                                            @foreach ($products as $product)
                                                            @php
                                                                $type = $product->product->type;
                                                            @endphp
                                                                @if($product->invoice_no == $report->invoice_no)
                                                                    <tr>
                                                                        <td><small>{{ $product->product->name}}</small></td>
                                                                        <td><small>{{ $product->product_quantity - $product->product_discount}} {{$product->product->type}}</small></td>
                                                                        <td class="text-right"><small>{{ $product->product_price}}/=</small></td>
                                                                        <td class="text-right"><small>{{$product->sub_total}}/=</small></td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center">{{$report->total_qty}} {{$type}}</td>
                                                <td class="text-right">{{$report->total_price}}/=</td>
                                                <td class="text-right">{{$report->price_discount}}/=</td>
                                                <td class="text-right">{{$report->vat}}/=</td>
                                                <td class="text-right">{{$report->carring}}/=</td>
                                                <td class="text-right">{{$report->other_charge}}/=</td>
                                                <td class="text-right">{{$report->total_price-$report->price_discount+$report->vat+$report->carring+$report->other_charge }}/=</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tr>
                                            <td colspan="5" class="text-right p-0"> {{$total_qty}} {{$type}}</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_sales}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_discount}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_vat}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_carring}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_others}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_amount}}/=</td>
                                        </tr>
                                    </table>
                                @elseif($all_reports)

                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Invoice No.</th>
                                                <th>From Delivery</th>
                                                <th>Description</th>
                                                <th>Product Quantity</th>
                                                <th>Sales Amount</th>
                                                <th>Discount</th>
                                                <th>Vat.</th>
                                                <th>Carring</th>
                                                <th>Others</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_qty = 0;
                                                $total_sales = 0;
                                                $total_discount = 0;
                                                $total_vat = 0;
                                                $total_carring = 0;
                                                $total_others = 0;
                                                $total_amount = 0;
                                            @endphp
                                            @foreach ($all_reports as $report)
                                            @php
                                                $total_qty +=$report->total_qty;
                                                $total_sales += $report->total_price;
                                                $total_discount += $report->price_discount;
                                                $total_vat += $report->vat;
                                                $total_carring +=$report->carring;
                                                $total_others += $report->other_charge;
                                                $total_amount += $report->total_price -$report->price_discount+$report->vat+$report->carring+$report->other_charge;
                                            @endphp
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                                <td class="text-center">{{$report->invoice_no}}</td>
                                                <td>{{$report->store->name}}</td>
                                                <td>
                                                    <table class="table table-striped table-bordered ">

                                                        <tbody>
                                                            @foreach ($products as $product)
                                                            @php
                                                                $type = $product->product->type;
                                                            @endphp
                                                                @if($product->invoice_no == $report->invoice_no)
                                                                    <tr>
                                                                        <td><small>{{ $product->product->name}}</small></td>
                                                                        <td><small>{{ $product->product_quantity - $product->product_discount}} {{$product->product->type}}</small></td>
                                                                        <td class="text-right"><small>{{ $product->product_price}}/=</small></td>
                                                                        <td class="text-right"><small>{{$product->sub_total}}/=</small></td>
                                                                    </tr>
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td class="text-center">{{$report->total_qty}} {{$type}}</td>
                                                <td class="text-right">{{$report->total_price}}/=</td>
                                                <td class="text-right">{{$report->price_discount}}/=</td>
                                                <td class="text-right">{{$report->vat}}/=</td>
                                                <td class="text-right">{{$report->carring}}/=</td>
                                                <td class="text-right">{{$report->other_charge}}/=</td>
                                                <td class="text-right">{{$report->total_price-$report->price_discount+$report->vat+$report->carring+$report->other_charge }}/=</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tr>
                                            <td colspan="5" class="text-right p-0"> {{$total_qty}} {{$type}}</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_sales}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_discount}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_vat}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_carring}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_others}}/=</td>
                                            <td colspan="1"  class="text-right p-0"> {{$total_amount}}/=</td>
                                        </tr>
                                    </table>
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

           $('#get_customer_id').select2({
            placeholder: 'Select Customer from here',
           });

           $('#get_customer_id').on('change', function (e){
               @this.getCustomer(e.target.value);
                // var data = $('#get_customer_id').select2("val");
                // @this.set('get_customer_id', data);
            });
    });

    </script>

@endpush
