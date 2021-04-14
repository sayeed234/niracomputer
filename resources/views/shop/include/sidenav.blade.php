<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
<a href="{{route('dashboard')}}" class="brand-link">
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
          <a href="{{route('user.profile')}}" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
               
          <li class="nav-item">
            {{-- <a href="#" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Layout Options
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a> --}}
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Top Navigation + Sidebar</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('mywork')}}" class="nav-link">
              <i class="fas fa-user-tie"></i>
              <p>
               Service Sale
              </p>
            </a>
          </li>
     @if(Auth::user()->sale==1)
          <li class="nav-item">
            <a href="{{url('sale')}}" class="nav-link">
              <i class="fas fa-cart-plus"></i>
              <p>
               Product Sale
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('sale_list')}}" class="nav-link">
              <i class="fas fa-align-justify"></i>
              <p>
              Product Sale List
              </p>
            </a>
          </li>
        @endif

          <li class="nav-item">
            <a href="{{url('expense')}}" class="nav-link">
              <i class="fas fa-minus-square"></i>
              <p>
               Expense List
              </p>
            </a>
          </li>
          @if(Auth::user()->loan==1)
          <li class="nav-item">
            <a href="{{url('loan')}}" class="nav-link">
              <i class="fas fa-minus-square"></i>
              <p>
               Loan List
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="" class="nav-link">
              <i class="fas fa-sms"></i>
              <p>
               SMS
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-coins"></i>
              <p>
                Pending Payment
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('pendings')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Sale</p>
                </a>
              </li>
              @if(Auth::user()->sale==1)
              <li class="nav-item">
                <a href="{{url('pendingp')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Sale</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{url('report')}}" class="nav-link">
              <i class="fas fa-align-justify"></i>
              <p>
               Report
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>