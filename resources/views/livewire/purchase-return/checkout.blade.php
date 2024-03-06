<div class="x_panel">
    <div class="x_title">
        <h2>Return Checkout Page<small>Submit your Return Purchase from here</small></h2>
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
        <div class="row">
            <div class="col-lg-8 col-md-8 col-sm-12">
                <form wire:submit.prevent="purchaseStore()" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">
                    @csrf
                    <!--Start supplier area-->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5 class="x_title text-center">Supplier Info</h5>
                            @php
                                $return_pre_due = 0;
                                //$advance_pay = 0;
                            @endphp
                            @if(session()->has('return_supplier'))
                                @foreach (Session::get('return_supplier') as $value)
                                    @php
                                        $return_pre_due = $value['previous_due'];
                                        $return_adv_pay = $value['advance_pay'];
                                    @endphp


                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Return Date </th>
                                                <th>Purchase Date</th>
                                                <th>Supplier Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{$value['return_date']}} </td>
                                                <td>{{$value['purchase_date']}}</td>
                                                <td>{{$value['supplier_name']}}</td>
                                                <td>{{$value['address']}}</td>
                                                <td>{{$value['mobile']}}</td>
                                            </tr>
                                        </tbody>
                                        <thead>
                                            <tr>
                                                <th>Return Invoice No.</th>
                                                <th>Purchase Invoice No.</th>
                                                <th>Store</th>
                                                <th>Warehouse</th>
                                                <th>Remarks</th>

                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <td>{{$value['return_invoice_no']}} </td>
                                                <td>{{$value['purchase_invoice_no']}}</td>
                                                <td>{{$value['product_store_name']}}</td>
                                                <td>{{$value['warehouse_name']}}</td>
                                                <td class="text-wrap">{{$value['remarks']}}</td>
                                            </tr>
                                        </tbody>


                                        {{-- <tr><th>Total Quantity<td>= {{$value->address}}</td></th></tr> --}}

                                    </table>
                                @endforeach
                            @endif

                            {{-- <div class="ln_solid"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-md-2">
                                <div class="item form-group">
                                    <button type="button" class="btn btn-primary" wire:click="back" type="button">Back</button>
                                    <button type="button" class="btn btn-danger" wire:click="canceal" type="button">Canceal</button>
                                    <button type="submit" class="btn btn-success">Submit Order</button>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="row">
                        <!--End supplier area-->
                        {{--Start Purchase Total Amount Area --}}
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <h5 class="x_title text-center">Products List</h5>
                            <table  class="table table-striped table-bordered" cellspacing="0" width="100%" >
                                <thead>
                                    <tr class="text-center">
                                        <th class="all">Code</th>
                                        <th class="all">Name</th>
                                        <th class="all">Return (Qty)</th>
                                        {{-- <th class="all">Discount</th> --}}
                                        <th class="all">Price Rate</th>
                                        <th class="all">Sub Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php

                                        $total_qty = 0;
                                        $total_amount = 0;
                                        $type = 0;
                                    @endphp
                                    @forelse (Cart::instance('purchase_return')->content() as $product)

                                    @php
                                        $total_qty+=$product->qty;
                                        $total_amount += ($product->qty-$product->options->discount)*$product->price;
                                        $type = $product->options->type;
                                    @endphp
                                    <tr>
                                        <td>{{$product->options->code}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->qty}}</td>
                                        {{-- <td>{{$product->options->discount}}</td> --}}
                                        <td class="text-right">{{$product->price}}/=</td>
                                        <td class="text-right">{{$product->qty*$product->price}}/=</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>No Product Found!</td>
                                    </tr>
                                    @endforelse

                                </tbody>
                                <tr>
                                    <td colspan="3" class="text-right">Total = {{$total_qty}} {{$type}}</td>
                                    <td colspan="3" class="text-right">Total = {{$total_amount}}/=</td>
                                </tr>
                            </table>
                            <div class="ln_solid"></div>
                            <div class="col-lg-12 col-md-12 col-sm-12 offset-md-2">
                                <div class="item form-group">
                                    <button type="button" class="btn btn-primary" wire:click="back" type="button">Back</button>
                                    <button type="button" class="btn btn-danger" wire:click="cancel" type="button">Cancel</button>
                                    <button type="submit" class="btn btn-success">Submit</button>
                                </div>
                            </div>
                        </div>
                        {{-- End Purchase Total Amount Area --}}
                    </div>
                </form>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
                <h5 class="x_title text-center">Amount Calculation</h5>
                    <div class="px-3">

                        <table class="table table-striped table-bordered">
                            <tr class="text-right"><th>Total Purchase<td>= {{Cart::instance('purchase_return')->total()-Cart::instance('purchase_return')->tax()}}/=</td></th></tr>
                            <tr class="text-right"><th>Carring<td> <input type="text" wire:model.lazy="carring" name="carring" class="form-control"></td></th></tr>
                            <tr class="text-right"><th>Other Charge<td> <input type="text" wire:model.lazy="other_charge" name="other_charge" class="form-control"></td></th></tr>
                            <tr class="text-right"><th>Grand Total<td>= {{$grand_total . '/=' ?? ''}}</td></th></tr>
                            @if(isset($return_adv_pay))
                                <tr class="text-right"><th>Previous Due<td>= -{{$return_adv_pay  .'/=' ?? ''}}</td></th></tr>
                                <tr class="text-right"><th>Current Due<td>= {{$return_adv_pay +$grand_total  .'/=' ?? ''}}</td></th></tr>
                            @else
                                <tr class="text-right"><th>Previous Due<td>= {{$return_pre_due  .'/=' ?? ''}}</td></th></tr>
                                <tr class="text-right"><th>Current Due<td>= {{$return_pre_due-$grand_total  .'/=' ?? ''}}</td></th></tr>
                            @endif

                            {{-- <tr><th>Current Due<td>= {{$grand_total+$previous_due  .'/=' ?? ''}}</td></th></tr> --}}
                            {{-- payment type section --}}
                            {{-- <tr>
                                <th>
                                    Payment Type
                                    <td>
                                @if(isset($bank_title))

                                 @else
                                    <select type="text" wire:model="payment_by" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">
                                        <option value="">Select Option</option>
                                            @foreach($payment_types as $payment_type)
                                                <option value="{{$payment_type}}">{{$payment_type}}</option>
                                            @endforeach
                                    </select>

                                @endif
                                    @if(isset($bank_list))
                                        @if($bank_list == 1)
                                        <select type="text" wire:model="bank_title" wire:change="paymentSearch($event.target.value)"  name="payment_by"  class="form-control">
                                            <option value="">Select Option</option>
                                                @foreach($banks as $bank)
                                                    <option value="{{$bank->title}}">{{$bank->title}}</option>
                                                @endforeach
                                        </select>
                                    @elseif($bank_list == 2)
                                            <input type="text" wire:model="bank_title" class="form-control">

                                    @else


                                    @endif


                                @endif






                                    </td>
                                </th>
                            </tr> --}}
                            {{-- <tr><th>Current Due<td>= </td></th></tr> --}}

                            {{-- payment section --}}
                            {{-- <tr><th>Payment<td><input type="text"  wire:model.lazy="payment" name="payment" class="form-control"></td></th></tr> --}}
                            <tr class="text-right"><th>Due Amount<td><input type="text"  name="current_due" readonly value="{{$current_due}}"  class="form-control"></td></th></tr>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>

