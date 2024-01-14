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
                    <form wire:submit.prevent=customerDueSearch()>
                        <div class="row ">
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="customer-search-area">
                                    <label for="customer_search">Search Due customer by Date:</label>
                                    <div class="form-group">
                                        <div class="form-group ">
                                            <input type="date" name="date" id="date" class="form-control" wire:model="date">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12">
                                <div class="customer-search-area">
                                    <label for="customer_search">Search Due Customer:</label>
                                    <div class="form-group" wire:ignore>
                                        <select type="search" id="due_customer_search"   name="get_customer_id" placeholder="search customer" class="form-control">
                                            <option value=""></option>
                                            @foreach ($customers as $customer)
                                                <option value="{{$customer->id}}">
                                                    {{$customer->name}} |
                                                    {{$customer->address}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="customer-search-button pt-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success">Search</button>
                                        <button type="button" wire:click="resetCustomer" class="btn btn-danger">Reset</button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="due-list-area mt-4">
                                @if(isset($due_customer))
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Customer ID</th>
                                                <th>Customer Name</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>Total Due</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                                
                                           
                                            @forelse ($due_customer as $customer)
                                            <tr>
                                                <td>{{date('d-m-Y', strtotime($customer->date))}}</td>
                                                <td>{{$customer->customer_id}}</td>
                                                <td>{{$customer->customer->name}}</td>
                                                <td>{{$customer->customer->address}}</td>
                                                <td>{{$customer->customer->mobile}}</td>
                                                <td>{{$customer->current_due  ?? -$customer->current_advance}}/=</td>
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
      
       
        $('#due_customer_search').select2({
        placeholder: 'Select customer from here',
        });
        
        $('#due_customer_search').on('change', function (e) {
            //@this.searchCustomer(e.target.value);
            var data = $('#due_customer_search').select2("val");
            @this.set('get_customer_id', data);
        });  
      
        // $('#due_customer_search').on('change', function () {
        //     $('#due_supplier_search').reset('').trigger('change');
            
        // });
      

       
       
       
    
    }); 

    $(document).ready(function () {
          
           $('#due_supplier_search').select2({
            placeholder: 'Select supplier from here',
           });

           $('#due_supplier_search').on('change', function (e){
               @this.searchSupplier(e.target.value);
               
            });
        
            // $('#due_supplier_search').on('change', function (){
            //     $('#due_customer_search').reset('').trigger('change');
               
            // });
          
        
            //$('#due_customer_search').val([]).trigger('change');
    }); 

    </script>
    
@endpush