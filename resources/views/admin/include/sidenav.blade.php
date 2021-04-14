<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
<a href="{{route('admin.dashboard')}}" class="brand-link">
   @php $company=DB::table('companies')->first(); @endphp
      <img src="{{asset($company->image)}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$company->name}}</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset(Auth::user()->profile_photo_path)}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
        <a href="{{route('admin.profile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div> 
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
          <li class="nav-item">
            <a href="{{route('admin.company')}}" class="nav-link">
              <i class="fas fa-building"></i>
                <p>
                 My Company           
                </p>
              </a>
            </li>   
          <li class="nav-item">
          <a href="{{route('admin.outlet')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               User List
                <span class="right badge badge-info">NIRA</span>
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="{{route('admin.customer')}}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                 Customer List
                </p>
              </a>
            </li>   
          <li class="nav-header">Service & Product</li>       
          <li class="nav-item">
            <a href="{{url('admin/service_list')}}" class="nav-link">
              <i class="fas fa-align-justify"></i>
              <p>
                 Service List
              </p>
            </a>
          </li>  
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-list"></i>
              <p>
                 Products
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/product')}}" class="nav-link">
                 
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product List</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/stock')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Update</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/preport')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purchase Report</p>
                </a>
              </li>
            </ul>
          </li>  
          <li class="nav-header">Sale Module</li>
          <li class="nav-item">
            <a href="{{url('admin/todaysale')}}" class="nav-link">
              <i class="fas fa-money-bill-alt"></i>
              <p>Today Sale</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-coins"></i>
              <p>
                Sale History
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/pending')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/alltimesale')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Time Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/userwise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User Wise Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/datewise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Sale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/productwise')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Wise Sale</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-header">Expense Module</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-user-minus"></i>
              <p>
                Expense History
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/loan')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Loan List </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/pending_expense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Expense </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/all_expense')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Expense </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('admin/expense_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Date Wise Expense</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Report Module</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-hourglass-half"></i>
              <p>
               Report Sheet
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('admin/summary')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Summary Report </p>
                </a>
              </li>
            </ul>
          </li> 
        </ul>
      </nav>    
    </div>
  </aside>