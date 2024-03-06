@extends('layouts.admin')

@section('page-title')
Customer Statement
@endsection

@section('main-content')

@php
$type = 0;
@endphp
<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Customer Statement </h2>
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
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="due-list-area mt-4">

                                <div class="customer-info-area py-2">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 offset-1">
                                            <div class="col-lg-1 col-md-1 col-sm-1">
                                                <p class="border border-dark p-2">ID: {{ $customer->id }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <p class="border border-dark p-2">Name: {{$customer->name }}</p>
                                            </div>
                                            <div class="col-lg-3 col-md-3 col-sm-3">
                                                <p class="border border-dark p-2 text-wrap">Address: {{$customer->address }}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <p class="border border-dark p-2">Mobile: {{  $customer->mobile}}</p>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-2">
                                                <p class="border border-dark p-2">Total Due: {{$customer->previous_due ?? $customer->advance_payment}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 offset-2">
                                    <form action="" method="post">
                                        <div class="row ">
                                            <div class="col-lg-2 col-md-2 col-sm-12">
                                                <div class="supplier-search-area">
                                                    {{-- <label  class="d-block py-1 border" for="supplier_search">From Date:</label> --}}
                                                    <div class="form-group">
                                                    <input type="date" name="start_date"  class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2 col-md-2 col-sm-12">
                                                <div class="supplier-search-area">
                                                    {{-- <label  class="d-block py-1 border" for="supplier_search">To Date:</label> --}}
                                                    <div class="form-group">
                                                    <input type="date" name="end_date"  class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-3 col-md-3 col-sm-12">
                                                <div class="supplier-search-button">
                                                    <div class="form-group">
                                                        <button type="submit" class="btn btn-success">Search</button>
                                                        <button type="button" wire:click="resetSupplier" class="btn btn-danger">Reset</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </form>
                                </div>
                                    <table  id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                                        <thead>
                                            <tr class="text-center">
                                                <th class="all">Date</th>
                                                <th class="all">Invoice No.</th>
                                                <th class="all">Description</th>
                                                <th class="all">Product Quantity</th>
                                                <th class="all">Sales Amount</th>
                                                <th class="all">Discount</th>
                                                <th class="all">Vat.</th>
                                                <th class="all">Carring</th>
                                                <th class="all">Others</th>
                                                <th class="all">Total Amount</th>
                                                <th class="all">Payment</th>
                                                <th class="all">Balance</th>
                                                <th class="all">Due Amount</th>
                                            </tr>
                                        </thead>
                                        <tr>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="">Opening Balance</td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class=""></td>
                                            <td class="text-right">{{$customer->opening_balance}}/=</td>
                                        </tr>
                                        <tbody>
                                            @php
                                                $total_qty = 0;
                                                $total_sales = 0;
                                                $total_discount = 0;
                                                $total_vat = 0;
                                                $total_carring = 0;
                                                $total_others = 0;
                                                $total_amount = 0;
                                                $total_balance = 0;
                                                $total_due = 0;
                                                $total_collection_due = 0;
                                                $total_collection_advance = 0;
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
                                                $total_balance +=  $report->total_price-$report->price_discount+$report->vat+$report->carring+$report->other_charge-$report->payment ;
                                            @endphp
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                                <td class="text-center">{{$report->invoice_no}}</td>
                                                <td>Sales - {{$report->store->name}}</td>
                                                <td class="text-center">{{$report->total_qty}} {{$type}}</td>
                                                @if($report->total_price)
                                                <td class="text-right">{{$report->total_price}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($report->price_discount)
                                                <td class="text-right">{{$report->price_discount}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($report->vat)
                                                <td class="text-right">{{$report->vat}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($report->carring)
                                                <td class="text-right">{{$report->carring}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($report->other_charge)
                                                <td class="text-right">{{$report->other_charge}}/=</td>
                                                @else
                                                <td></td>
                                                @endif

                                                <td class="text-right">{{$report->total_price-$report->price_discount+$report->vat+$report->carring+$report->other_charge }}/=</td>
                                                @if($report->payment)
                                                <td class="text-right">{{$report->payment}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                <td class="text-right">{{$balance = $report->total_price-$report->price_discount+$report->vat+$report->carring+$report->other_charge-$report->payment }}/=</td>
                                                <td class="text-right">{{$report->old_due+$balance ?? $report->advance_payment+$balance}}/=</td>
                                            </tr>
                                            @endforeach


                                        </tbody>


                                        <tbody>
                                            @foreach ($collections as $collection)
                                            @php

                                                $total_collection_due += $collection->current_due;
                                                $total_collection_advance += $collection->current_advance;
                                            @endphp
                                            <tr>
                                                <td class="">{{date('d-m-Y', strtotime($collection->date))}}</td>
                                                <td class="text-center">{{$collection->invoice_no}}</td>
                                                <td class="text-center">
                                                    {{$collection->payment_by}} - {{$collection->bank_title}} -
                                                    {{$collection->remarks}}
                                                </td>
                                                @if($collection->total_qty)
                                                <td class="text-center">{{$collection->total_qty}}</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->total_price)
                                                <td class="text-right">{{$collection->total_price}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->price_discount)
                                                <td class="text-right">{{$collection->price_discount }}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->vat)
                                                <td class="text-right">{{$collection->vat  }}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->carring)
                                                <td class="text-right">{{$collection->carring }}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->other_charge)
                                                <td class="text-right">{{$collection->other_charge}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->total_price)
                                                <td class="text-right">{{$collection->total_price}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->paid_amount)
                                                <td class="text-right">{{$collection->paid_amount}}/=</td>
                                                @else
                                                <td></td>
                                                @endif
                                                @if($collection->paid_amount)
                                                <td class="text-right">-{{$collection->paid_amount}}/=</td>
                                                @else
                                                <td></td>
                                                @endif

                                                <td class="text-right">{{$collection->current_due ?? -$collection->current_advance}}/=</td>

                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tbody>

                                            @foreach ($dues as $due)
                                            @php
                                            $total_due +=$due->paid_amount;
                                            @endphp
                                            <tr>
                                                <td class="">{{date('d-m-Y', strtotime($due->date))}}</td>
                                                <td></td>
                                                <td class="text-center">
                                                    {{$due->purpose}} - {{$due->remarks}}
                                                </td>
                                                <td colspan="9" class="text-right">{{$due->paid_amount}}/=</td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tr>
                                            <td colspan="4" class="text-right p-0">{{$total_qty}} {{$type}}</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_sales}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_discount}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_vat}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_carring}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_others}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_amount}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_balance}}/=</td>
                                            <td colspan="1"  class="text-right p-0">{{$total_due}}/=</td>
                                            @if($total_collection_due)
                                            <td colspan="1"  class="text-right p-0">{{$total_due + $total_collection_due }}/=</td>
                                            @else
                                            <td colspan="1"  class="text-right p-0">-{{$total_due - $total_collection_advance }}/=</td>
                                            @endif

                                        </tr>
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
