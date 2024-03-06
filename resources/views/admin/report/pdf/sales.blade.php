<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
</head>
<style>
    /* page size customize here */
/* .container-body{
   width: 80%;
   font-size: 12px;
} */
.customer-info-area
{
    margin: 0px 20px;
}
.date-area
{
    width: 48%;
    float:left
}
.table td, .table th
{
border: 1px solid #000;
padding: 8px;
}

.table th
{
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #ffffff;
  color: rgb(0, 0, 0);
}
</style>
<body>

    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="row container container-body">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="due-list-area">

                    <div class="header-area">
                        <div class="banner-area">
                            <img src="{{ public_path('assets/images/firoz_header.jpg') }}" width="100%" height="120" alt="">
                        </div>
                        <h5 class="text-center text-dark">Challan/Cashmemo.</h5>
                    </div>
                    {{-- <div class="x_title">
                        @if(!empty($reports))
                        <h3 class="text-center"> <strong>Customer Wise Sales Report</strong></h3>
                        @elseif(!empty($all_reports))
                        <h3 class="text-center"> <strong>Total Sales Report</strong></h3>
                        @endif
                    </div> --}}

                    <div class="customer-info-area">
                        @if(!empty($customer_info))
                            <div class="row">
                                <div class="customer-info">
                                    <p class="border">ID: {{ $customer_info->id }}</p>
                                </div>
                                <div class="customer-info">
                                    <p class="border">Name: {{$customer_info->name }}</p>
                                </div>
                                <div class="customer-info">
                                    <p class="border">Address: {{  $customer_info->address }}</p>
                                </div>
                                <div class="customer-info">
                                    <p class="border">Mobile: {{  $customer_info->mobile}}</p>
                                </div>
                            </div>
                        @endif
                        @if($start_date && $end_date)
                            <div class="row">
                                <div class="date-area">
                                    <h6 class="text-left">From: {{date('d-m-Y', strtotime($start_date))}}</h6>
                                </div>
                                <div class="date-area">
                                    <h6 class="text-right">To: {{date('d-m-Y', strtotime($end_date))}}</h6>
                                </div>
                            </div>
                        @endif
                    </div>

                    @if(!empty($reports))
                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Date</th>
                                    <th>Invoice No.</th>
                                    <th>From Delivery</th>
                                    <th class="text-center">Description</th>
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
                                        <table class="table">

                                            <tbody>
                                                @php
                                                $type = 0;
                                                @endphp
                                                @foreach ($products as $product)
                                                @php
                                                    $type = $product->product->type;
                                                @endphp
                                                    @if($product->invoice_no == $report->invoice_no)
                                                        <tr>
                                                            <td><small>{{ $product->product->name}}</small></td>
                                                            <td><small>{{ $product->product_quantity}} {{$product->product->type}}</small></td>
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
                                <td colspan="5" class="text-right">Total= {{$total_qty}} {{$type}}</td>
                                <td colspan="1"  class="p-0">Total= {{$total_sales}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_discount}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_vat}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_carring}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_others}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_amount}}/=</td>
                            </tr>
                        </table>
                    @elseif(!empty($all_reports))

                        <table class="table">
                            <thead>
                                <tr class="text-center">
                                    <th>Date</th>
                                    <th>Invoice No.</th>
                                    <th>From Delivery</th>
                                    <th class="text-center">Description</th>
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
                                        <table class="table">

                                            <tbody>
                                                @php
                                                $type = 0;
                                                @endphp
                                                @foreach ($products as $product)
                                                @php
                                                    $type = $product->product->type;
                                                @endphp
                                                    @if($product->invoice_no == $report->invoice_no)
                                                        <tr>
                                                            <td><small>{{ $product->product->name}}</small></td>
                                                            <td><small>{{ $product->product_quantity}} {{$product->product->type}}</small></td>
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
                                <td colspan="5" class="text-right p-0">Total= {{$total_qty}} {{$type}}</td>
                                <td colspan="1"  class="p-0">Total= {{$total_sales}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_discount}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_vat}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_carring}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_others}}/=</td>
                                <td colspan="1"  class="p-0">Total= {{$total_amount}}/=</td>
                            </tr>
                        </table>
                        @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
