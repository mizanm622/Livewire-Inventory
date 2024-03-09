<!--Sidebar menu profile quick info -->
{{-- <div class="profile clearfix">
    <div class="profile_pic">
      <img src="{{asset('assets/images/img.jpg')}}" alt="..." class="img-circle profile_img">
    </div>
    <div class="profile_info">
      <span>Welcome,</span>
      <h2>Admin</h2>
    </div>
  </div> --}}
  <!-- End Sidebar menu profile quick info -->

  <br />

  <!--Start sidebar menu -->
  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
      <h3>General</h3>
      <ul class="nav side-menu">
        <li><a><i class="fa fa-user"></i> Customer <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('customer.create')}}">Customer Add</a></li>
            <li><a href="{{route('customer.index')}}">Customer List</a></li>
            <li><a href="#">Customer Seles</a></li>
            <li><a href="#">Customer Ledger</a></li>
            <li><a href="#">Customer Payment</a></li>
          </ul>
        </li>


        <li><a><i class="fa fa-ambulance"></i> Supplier <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('supplier.create')}}">Supplier Add</a></li>
              <li><a href="{{route('supplier.index')}}">Supplier List</a></li>
              <li><a href="#">Supplier Selse</a></li>
              <li><a href="#">Supplier Ledger</a></li>
              <li><a href="#">Supplier Payment</a></li>
            </ul>
        </li>


        <li><a><i class="fa fa-product-hunt"></i> Product <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('product.create')}}">Product Add</a></li>
              <li><a href="{{route('product.index')}}">Product List</a></li>
              <li><a href="#">Product Details</a></li>
              <li><a href="#">Product Stock</a></li>
              <li><a href="{{route('product.gallery')}}">Product Gallery</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-cart-plus"></i> Purchase orders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              {{-- <li><a href="{{route('purchase.create')}}">Purchase Entry</a></li> --}}
              <li><a href="{{route('live.purchase.create')}}">Purchase Entry </a></li>
              <li><a href="{{route('purchase.index')}}">Purchase List</a></li>
              <li><a href="{{route('live.purchase.return.create')}}">Purchase Return</a></li>
              <li><a href="{{route('purchase.return.index')}}">Purchase Return List</a></li>
              <li><a href="#">Purchase Report</a></li>
              <li><a href="#">Purchase Invoice</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-shopping-cart"></i> Sales orders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('live.sales.create')}}">Sale Entry</a></li>
              <li><a href="{{route('sales.index')}}">Sale List</a></li>
              <li><a href="{{route('live.sales.return.create')}}">Sale Return</a></li>
              <li><a href="{{route('sales.return.index')}}">Sale Return List</a></li>
              <li><a href="#">Sale Report</a></li>
              <li><a href="#">Sale Invoice</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-credit-card"></i> Accounts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('collection.create')}}">Collection</a></li>
              <li><a href="{{route('collection.index')}}">Collection List</a></li>
              <li><a href="#">Collection Report</a></li>
              <li><a href="{{route('payment.create')}}">Payment</a></li>
              <li><a href="{{route('payment.index')}}">Payment List</a></li>
              <li><a href="#">Payment Report</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-users"></i>Employee Management<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('employee.create')}}">Employee Add </a></li>
              <li><a href="{{route('employee.index')}}">Employee List</a></li>
              <li><a href="#">Designation Add </a></li>
              <li><a href="#">Designation List</a></li>
              <li><a href="#">Employee Salary</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-gift"></i>Bonus Counting<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('bonus.create')}}">Monthly Bonus Counting Add</a></li>
              <li><a href="{{route('bonus.index')}}">Monthly Bonus Counting List</a></li>
              <li><a href="{{route('monthly.bonus.index')}}">Monthly Bonus</a></li>
              <li><a href="{{route('yearly.bonus.create')}}">Yearly Bonus Counting Add</a></li>
              <li><a href="{{route('yearly.bonus.index')}}">Yearly Bonus Counting List</a></li>
              <li><a href="{{route('yearly.bonus.show')}}">Yearly Bonus</a></li>
              <li><a href="#">Total Bonus</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-refresh"></i>Follow Up Date<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('customer.follow.create')}}">Customer Follow Up Date</a></li>
              <li><a href="{{route('customer.follow.index')}}">Customer Follow Up List</a></li>
              <li><a href="{{route('supplier.follow.create')}}">Supplier Follow Up Date</a></li>
              <li><a href="{{route('supplier.follow.index')}}">Supplier Follow Up List</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-quote-right"></i> Quotations <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('quotation.create')}}">Quotation List</a></li>
              {{-- <li><a href="{{route('customer.quotation.create')}}">Quotation List/Record</a></li> --}}
            </ul>
        </li>

        <li><a><i class="fa fa-list-alt"></i>Reporting and Analytics<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('sales.report')}}">Sales Report</a></li>
              <li><a href="{{route('purchase.report')}}">Purchases Report</a></li>
              <li><a href="{{route('payment.report')}}">Payment Report</a></li>
              <li><a href="{{route('collection.report')}}">Collection Report</a></li>
              <li><a href="#">Customer Report</a></li>
              <li><a href="#">Supplier Report</a></li>
              <li><a href="{{route('expense.report')}}">Expenses Report</a></li>
              <li><a href="{{route('daily.report')}}">Daily Summary</a></li>
              <li><a href="{{route('monthly.report')}}">Monthly Summary</a></li>
              <li><a href="{{route('yearly.report')}}">Yearly Summary</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-money"></i> Expenses <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              {{-- <li><a href="{{route('expense.create')}}">Expenses Add</a></li>
              <li><a href="{{route('expense.index')}}">Expenses List</a></li> --}}
              <li><a href="{{route('salary.expense.create')}}">Salary Expenses Add</a></li>
              <li><a href="{{route('salary.expense.index')}}">Salary Expenses List</a></li>
              <li><a href="{{route('bank.expense.create')}}">Bank Expenses Add</a></li>
              <li><a href="{{route('bank.expense.index')}}">Bank Expenses List</a></li>
              <li><a href="{{route('labour.expense.create')}}">Labour Expenses Add</a></li>
              <li><a href="{{route('labour.expense.index')}}">Labour Expenses List</a></li>
              <li><a href="{{route('carring.expense.create')}}">Carring Expenses Add</a></li>
              <li><a href="{{route('carring.expense.index')}}">Carring Expenses List</a></li>
              <li><a href="{{route('dokan.expense.create')}}">Dokan Expenses Add</a></li>
              <li><a href="{{route('dokan.expense.index')}}">Dokan Expenses List</a></li>
              {{-- <li><a href="{{route('expense_category.index')}}">Expenses Category</a></li> --}}
              {{-- <li><a href="#">Others</a></li> --}}
            </ul>
        </li>



        <li><a><i class="fa fa-calendar"></i>Add Due<span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="{{route('customer.due.create')}}">Add Customer Due</a></li>
            <li><a href="{{route('customer.due.index')}}">Customer Due List</a></li>
            <li><a href="{{route('supplier.due.create')}}">Add Supplier Due</a></li>
            <li><a href="{{route('supplier.due.index')}}">Supplier Due List</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-calendar"></i>Due Show<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('customer.due.show')}}">Customer Due</a></li>
              <li><a href="{{route('supplier.due.show')}}">Supplier Due</a></li>
              {{-- <li><a href="{{route('show.customer.due')}}">Show Customer Due</a></li>
              <li><a href="{{route('show.supplier.due')}}">Show Supplier Due</a></li> --}}
            </ul>
        </li>

        <li><a><i class="fa fa-plus"></i> Additional Add <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('store.index')}}">Store</a></li>
              <li><a href="{{route('category.index')}}">Category</a></li>
              <li><a href="{{route('subcategory.index')}}">Sub Category</a></li>
              {{-- <li><a href="{{route('brand')}}">Brand</a></li> --}}
              <li><a href="{{route('price_group.index')}}">Price Group</a></li>
              <li><a href="{{route('bank.index')}}">Bank</a></li>
              <li><a href="{{route('warehouse.index')}}">Warehouse</a></li>
              <li><a href="{{route('product_group.index')}}">Product Group</a></li>
              <li><a href="{{route('size.index')}}">Size</a></li>
              <li><a href="{{route('unit.index')}}">Unit</a></li>
            </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- End sidebar menu -->

  <!-- Sidebar menu footer buttons -->
  <div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
      <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
      <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
      <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
      <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
  </div>
  <!-- End Sidebar menu footer buttons -->
