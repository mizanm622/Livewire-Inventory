@extends('layouts.admin')

@section('main-content')

<div class="col-md-12 col-sm-12">
    <div class="x_panel">
        <div class="x_title">
                <h2>Daily Updates<small>Show your all updates from here</small></h2>
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
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="daily-update-area">
                                <div class="header-title py-2">
                                    <h3 class="text-left text-dark border d-inline">Total Sales on {{now()->format('d-F-Y')}}</h3>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-success text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Sales</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_sales->sum('total_price')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-warning text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Quantity</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_sales->sum('total_qty')}} Bags</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-danger text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Weight</h4>
                                        </div>
                                        <div class="items-description">
                                            @php
                                            $total_weight = 0;
                                            foreach($sales_weight as $value)
                                             {
                                                $total_weight += $value->product_quantity * $value->product_weight;
                                             }
                                             @endphp
                                            <h5 class="text-center">{{$total_weight/1000}} Ton/Tons</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-primary text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Payment</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_sales->sum('payment')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-dark text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Due</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_sales->sum('total_price') - $daily_sales->sum('payment')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-info text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Invoice No.</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{ $daily_sales->count('invoice_no') }}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-12 col-md-12 col-sm-12 ">
                            <div class="daily-update-area">
                                <div class="header-title py-2">
                                    <h3 class="text-left text-dark border d-inline">Total Purchase on {{now()->format('d-F-Y')}}</h3>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-success text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Purchase</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_purchase->sum('total_price')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-warning text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Quantity</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_purchase->sum('total_qty')}} Bags</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-danger text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Weight</h4>
                                        </div>
                                        <div class="items-description">
                                            @php
                                            $total_weight = 0;
                                            foreach($purchase_weight as $value)
                                             {
                                                $total_weight += $value->product_quantity * $value->product_weight;
                                             }
                                             @endphp
                                            <h5 class="text-center">{{$total_weight/1000}} Ton/Tons</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-primary text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Payment</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_purchase->sum('payment')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-dark text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Due</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$daily_purchase->sum('total_price') - $daily_purchase->sum('payment')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-2 col-sm-6">
                                    <div class="single-item bg-info text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Invoice No.</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{ $daily_purchase->count('invoice_no') }}</h5>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row py-4">
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="daily-update-area">
                                <div class="header-title py-2">
                                    <h3 class="text-left text-dark border d-inline">Total Collection on {{now()->format('d-F-Y')}}</h3>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="single-item bg-success text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Collection</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$collection->sum('paid_amount')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="daily-update-area">
                                <div class="header-title py-2">
                                    <h3 class="text-left text-dark border d-inline">Total Payment on {{now()->format('d-F-Y')}}</h3>
                                </div>
                                <div class="col-lg-8 col-md-8 col-sm-12">
                                    <div class="single-item bg-danger text-light text-center py-3">
                                        <div class="items-title">
                                            <h4 class="text-center">Total Payment</h4>
                                        </div>
                                        <div class="items-description">
                                            <h5 class="text-center">{{$payment->sum('paid_amount')}}/=</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
