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
        <li><a><i class="fa fa-home"></i> Customer <span class="fa fa-chevron-down"></span></a>
          <ul class="nav child_menu">
            <li><a href="#">Customer Add</a></li>
            <li><a href="#">Customer List</a></li>
            <li><a href="#">Customer Due</a></li>
            <li><a href="#">Customer Selse</a></li>
            <li><a href="#">Customer Ledger</a></li>
            <li><a href="#">Customer Payment</a></li>
          </ul>
        </li>

        <li><a><i class="fa fa-group"></i> Supplier <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Supplier Add</a></li>
              <li><a href="#">Supplier List</a></li>
              <li><a href="#">Supplier Due</a></li>
              <li><a href="#">Supplier Selse</a></li>
              <li><a href="#">Supplier Ledger</a></li>
              <li><a href="#">Supplier Payment</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Product <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Product Add</a></li>
              <li><a href="#">Product List</a></li>
              <li><a href="#">Product Details</a></li>
              <li><a href="#">Product Stack</a></li>
              <li><a href="#">Product Gallery</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-cube"></i> Purchase orders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Purchase Entry</a></li>
              <li><a href="#">Purchase List</a></li>
              <li><a href="#">Purchase Return</a></li>
              <li><a href="#">Purchase Return List</a></li>
              <li><a href="#">Purchase Report</a></li>
              <li><a href="#">Purchase Invoice</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-shopping-cart"></i> Sales orders <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Sale Entry</a></li>
              <li><a href="#">Sale List</a></li>
              <li><a href="#">Sale Return</a></li>
              <li><a href="#">Sale Return List</a></li>
              <li><a href="#">Sale Report</a></li>
              <li><a href="#">Sale Invoice</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Accounts <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Collection</a></li>
              <li><a href="#">Collection List</a></li>
              <li><a href="#">Collection Report</a></li>
              <li><a href="#">Payment</a></li>
              <li><a href="#">Payment List</a></li>
              <li><a href="#">Payment Report</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Employee Management <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Employee Add </a></li>
              <li><a href="#">Employee List</a></li>
              <li><a href="#">Designation Add </a></li>
              <li><a href="#">Designation List</a></li>
              <li><a href="#">Employee Salary</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Bonus Counting <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Bonus Counting Add</a></li>
              <li><a href="#">Bonus Counting List</a></li>
              <li><a href="#">Monthly Bonus</a></li>
              <li><a href="#">Yearly Bonus</a></li>
              <li><a href="#">Total Bonus</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Follow Up Date <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Customer Follow Up Date</a></li>
              <li><a href="#">Customer Follow Up List</a></li>
              <li><a href="#">Supplier Follow Up Date</a></li>
              <li><a href="#">Supplier Follow Up List</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Quotations <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Quotation Add</a></li>
              <li><a href="#">Quotation List/Record</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Reporting and Analytics <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Sales Report</a></li>
              <li><a href="#">Purchases Report</a></li>
              <li><a href="#">Payment Report</a></li>
              <li><a href="#">Collection Report</a></li>
              <li><a href="#">Customer Report</a></li>
              <li><a href="#">Supplier Report</a></li>
              <li><a href="#">Expenses  Report</a></li>
              <li><a href="#">Daily Summary</a></li>
              <li><a href="#">Monthly Summary</a></li>
              <li><a href="#">Yearly Summary</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Expenses <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Expenses Add</a></li>
              <li><a href="#">Expenses List</a></li>
              <li><a href="#">Expenses Category</a></li>
              <li><a href="#">Others</a></li>
            </ul>
        </li>

        <li><a><i class="fa fa-home"></i> Additional Add <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="#">Category</a></li>
              <li><a href="{{route('brand')}}">Brand</a></li>
              <li><a href="#">Price Group</a></li>
              <li><a href="#">Bank</a></li>
              <li><a href="#">Warehouse</a></li>
              <li><a href="#">Product Group</a></li>
              <li><a href="#">Size</a></li>
              <li><a href="#">Unit</a></li>
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
