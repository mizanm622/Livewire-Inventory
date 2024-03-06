<div class="row">
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Payment Report  <small>Show your Payment Report from here</small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        @if($get_supplier_id) <a href="{{route('payment.supplier.report.pdf',[$start_date, $end_date, $get_supplier_id]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@elseif($start_date && $end_date) <a href="{{ route('payment.all.report.pdf',[$start_date, $end_date]) }}" class="btn btn-info btn-link"> Download <i class="fa fa-file-pdf-o text-danger"></i></a>@endif
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
                    <form wire:submit.prevent=paymentReportSearch()>
                        <div class="row ">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label class="d-block py-1 border" for="supplier_search">Start Date:</label>
                                    <div class="form-group">
                                      <input type="date" name="start_date" wire:model="start_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="supplier-search-area">
                                    <label class="d-block py-1 border" for="supplier_search">End Date:</label>
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
                                                    {{$supplier->company_name}} -
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
                                @if($reports)
                                <div class="x_title">
                                    <h3 class="text-center"> <strong>Customer Wise Payment Report</strong></h3>
                                </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Invoice No.</th>
                                                <th>Previous Due</th>
                                                <th>Payment Amount</th>
                                                <th>Paying By</th>
                                                <th>Current Due</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_quantity = 0;
                                                $total_amount = 0;
                                            @endphp
                                            @foreach ($reports as $report)
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                                <td>{{$report->supplier->company_name}}</td>
                                                <td class="text-wrap">{{$report->supplier->address}}</td>
                                                <td class="text-center">{{$report->supplier->mobile}}</td>
                                                <td class="text-center">{{$report->invoice_no}}</td>
                                                <td class="text-right">{{$report->previous_due ?? -$report->previous_advance}}/=</td>
                                                <td class="text-right">{{$report->paid_amount}}/=</td>
                                                <td class="text-center">{{$report->payment_by}}: {{$report->bank_title}}</td>
                                                <td class="text-right">{{$report->current_due ?? -$report->current_advance}}/=</td>
                                                <td class="text-wrap">{{$report->purpose ?? $report->remarks}}</td>
                                            </tr>
                                            @endforeach
                                            {{-- <tr class="text-right">
                                                <td colspan="8">Total Quantity = {{$total_quantity}} Pcs/Bags</td>
                                                <td colspan="1">Total Amount = {{$total_amount}} /=</td>
                                            </tr> --}}
                                        </tbody>

                                    </table>
                                    @elseif($all_reports)
                                    <div class="x_title">

                                        <h3 class="text-center"> <strong>Total Payment Report</strong></h3>
                                    </div>
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Date</th>
                                                <th>Company Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Invoice No.</th>
                                                <th>Previous Due</th>
                                                <th>Payment Amount</th>
                                                <th>Paying By</th>
                                                <th>Current Due</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total_quantity = 0;
                                            $total_amount = 0;

                                        @endphp
                                        @foreach ($all_reports as $report)
                                        {{-- @php
                                            $total_quantity += $report->total_qty;
                                            $total_amount += $report->total_price;
                                        @endphp --}}
                                        <tr>
                                            <td>{{date('d-m-Y', strtotime($report->date))}}</td>
                                            <td>{{$report->supplier->company_name}}</td>
                                            <td class="text-wrap">{{$report->supplier->address}}</td>
                                            <td class="text-center">{{$report->supplier->mobile}}</td>
                                            <td class="text-center">{{$report->invoice_no}}</td>
                                            <td class="text-right">{{$report->previous_due ?? -$report->previous_advance}}/=</td>
                                            <td class="text-right">{{$report->paid_amount}}/=</td>
                                            <td class="text-center">{{$report->payment_by}}: {{$report->bank_title}}</td>
                                            <td class="text-right">{{$report->current_due ?? -$report->current_advance}}/=</td>
                                            <td class="text-wrap">{{$report->purpose ?? $report->remarks}}</td>
                                        </tr>
                                        @endforeach
                                        {{-- <tr class="text-right">
                                            <td colspan="8">Total Quantity = {{$total_quantity}} Pcs/Bags</td>
                                            <td colspan="1">Total Amount = {{$total_amount}} /=</td>
                                        </tr> --}}
                                    </tbody>
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
               //@this.searchSupplier(e.target.value);
                var data = $('#get_supplier_id').select2("val");
                @this.set('get_supplier_id', data);
            });
    });

    </script>

@endpush
