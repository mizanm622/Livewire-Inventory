@php
$type = 0;
@endphp
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Purchase Report  <small>Show your Purchase Report from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        @if($supplier_info) <a href="{{ route('purchase.supplier.report.pdf',[$start_date, $end_date, $supplier_info->id]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@elseif($start_date && $end_date) <a href="{{ route('purchase.all.report.pdf',[$start_date, $end_date]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@endif
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
                    <form wire:submit.prevent=purchaseReportSearch()>
                        <div class="row ">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label class="d-block py-1 border" for="start_date">From Date:</label>
                                    <div class="form-group">
                                      <input type="date" name="start_date" wire:model="start_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label class="d-block py-1 border" for="end_date">To Date:</label>
                                    <div class="form-group">
                                      <input type="date" name="end_date" wire:model="end_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label class="d-block py-1 border" for="supplier_search">Select Supplier:</label>
                                    <div class="form-group" wire:ignore>
                                        <select type="search" id="get_supplier_id"   name="get_supplier_id" placeholder="search supplier" class="form-control">
                                            <option value=""></option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{$supplier->id}}">
                                                    {{$supplier->company_name}}  -
                                                    {{$supplier->address}} -
                                                    {{$supplier->mobile}}
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
                                    <h3 class="text-center"> <strong>Supplier Wise Purchase Report</strong></h3>
                                    @elseif($all_reports)
                                    <h3 class="text-center"> <strong>Total Purchase Report</strong></h3>
                                    @endif
                                </div>
                                <div class="supplier-info-area py-2">
                                    @if($supplier_info)
                                    <div class="row">
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <p class="border border-dark p-2">ID: {{ $supplier_info->id }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <p class="border border-dark p-2">Name: {{$supplier_info->company_name }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <p class="border border-dark p-2 text-wrap">Address: {{  $supplier_info->address }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <p class="border border-dark p-2">Mobile: {{  $supplier_info->mobile}}</p>
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
                                            <th>Purchase Amount</th>
                                            <th>Discount</th>
                                            <th>Vat.</th>
                                            <th>Carring</th>
                                            <th>Others</th>
                                            <th>Total Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $quantity = 0;
                                            $amount = 0;
                                            $discount = 0;
                                            $vat = 0;
                                            $carring = 0;
                                            $others = 0;

                                        @endphp
                                        @foreach ($reports as $report)
                                        @php
                                              $quantity += $report->total_qty;
                                              $amount += $report->total_price;
                                              $discount += $report->price_discount;
                                              $vat += $report->vat;
                                              $carring += $report->carring;
                                              $others += $report->other_charge;

                                        @endphp
                                        <tr>
                                            <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                            <td class="text-center">{{$report->invoice_no}}</td>
                                            <td>{{$report->warehouse->name}}</td>
                                            <td>
                                                <table class="table table-striped table-bordered ">

                                                    <tbody>

                                                        @if(count($products) < 1)

                                                        @else
                                                        @forelse ($products as $product )

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
                                                        @empty

                                                        @endforelse
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td class="text-center">{{$report->total_qty}} {{$type }} </td>
                                                <td class="text-right">{{$report->total_price}}/=</td>
                                                <td class="text-right">{{$report->price_discount}}/=</td>
                                                <td class="text-right">{{$report->vat}}/=</td>
                                                <td class="text-right">{{$report->carring}}/=</td>
                                                <td class="text-right">{{$report->other_charge}}/=</td>
                                                <td class="text-right">{{$report->total_price-$report->price_discount-$report->vat-$report->carring-$report->other_charge }}/=</td>
                                            </tr>
                                        @endforeach
                                        <tr>
                                            <td class="text-right p-0" colspan="5">{{$quantity}} {{$type}}</td>
                                            <td class="text-right p-0" colspan="1">{{$amount}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$discount}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$vat}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$carring}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$others}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$amount+$discount+$vat+$carring+$others}}/=</td>
                                        </tr>
                                    </tbody>
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
                                                <th>Purchase Amount</th>
                                                <th>Discount</th>
                                                <th>Vat.</th>
                                                <th>Carring</th>
                                                <th>Others</th>
                                                <th>Total Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $quantity = 0;
                                            $amount = 0;
                                            $discount = 0;
                                            $vat = 0;
                                            $carring = 0;
                                            $others = 0;

                                        @endphp
                                        @foreach ($all_reports as $report)
                                        @php
                                              $quantity += $report->total_qty;
                                              $amount += $report->total_price;
                                              $discount += $report->price_discount;
                                              $vat += $report->vat;
                                              $carring += $report->carring;
                                              $others += $report->other_charge;

                                        @endphp

                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                                <td class="text-center">{{$report->invoice_no}}</td>
                                                <td>{{$report->warehouse->name}}</td>
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
                                                <td class="text-right">{{$report->total_price-$report->price_discount-$report->vat-$report->carring-$report->other_charge }}/=</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tr>
                                            <td class="text-right p-0" colspan="5">{{$quantity}} {{$type}}</td>
                                            <td class="text-right p-0" colspan="1">{{$amount}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$discount}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$vat}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$carring}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$others}}/=</td>
                                            <td class="text-right p-0" colspan="1">{{$amount+$discount+$vat+$carring+$others}}/=</td>
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

           $('#get_supplier_id').select2({
            placeholder: 'Select supplier from here',
           });

           $('#get_supplier_id').on('change', function (e){
               @this.getSupplier(e.target.value);
                // var data = $('#get_supplier_id').select2("val");
                // @this.set('get_supplier_id', data);
            });
    });

    </script>

@endpush
