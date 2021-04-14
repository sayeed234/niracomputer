@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Dashboard || {{$world->name}}
@endsection
@section('content')
<!-- Main content -->

<div class="content-header">

</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Today Service Sale</span>
            <span class="info-box-number">
              {{$todayss->total}} Tk.
           
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Today Product Sale</span>
            <span class="info-box-number">{{$todayps->total}} Tk.</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Today Total Sales</span>
            <span class="info-box-number">{{$todayps->total+$todayss->total}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hand-holding-medical"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Today Received Payment</span>
            <span class="info-box-number">{{$todayps->payment+$todayss->payment}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>




      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-thumbs-up"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Service Sale</span>
            <span class="info-box-number">
              {{$allss->total}} Tk.
           
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Product Sale</span>
            <span class="info-box-number">{{$allps->total}} Tk.</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"> Total Sales</span>
            <span class="info-box-number">{{$a=$allps->total+$allss->total}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-hand-holding-medical"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Received Payment</span>
            <span class="info-box-number">{{$b=$allps->payment+$allss->payment}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->


      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-database"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Total Stock Qty</span>
            <span class="info-box-number">
              {{$stock->qty}} 
           
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-align-left"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Sale Qty</span>
            <span class="info-box-number">{{$sale->qty}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plus-square"></i></span>

          <div class="info-box-content">
            <span class="info-box-text"> Total Purchase Amount</span>
            <span class="info-box-number">{{$purchase->amount}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-minus-square"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Total Due Payment</span>
            <span class="info-box-number">{{$a-$b}} Tk</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->



    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title">Daily  Report</h5>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
                      
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="table-responsive">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">User</th>
                    <th scope="col">Service Sale</th>
                    <th scope="col">Product Sale</th>
                    <th scope="col">Total Sale</th>
                    <th scope="col">Total Payment</th>
                    <th scope="col">Due</th>
                    <th scope="col">Expense</th>
                    <th scope="col">Due Recieved</th>
                    <th scope="col">Net Balance</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($user as $user)
            @php
            $date = new DateTime("now");

            $todayss=DB::table('service_sales')
                ->where('user',$user->id)
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();
            $tps=DB::table('product_sales')
                ->where('user',$user->id)
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();
            $expense=DB::table('expenses')
                    ->where('user',$user->id)
                    ->where('status',1)
                    ->whereDate('created_at', '=', $date)
                    ->select(DB::raw('SUM(amount) as amount'))
                    ->first();
            $todayduer=DB::table('due_receives')
                   ->where('user',$user->id)
                   ->whereDate('created_at', '=', $date)
                   ->select(DB::raw('SUM(amount) as total'))
                  ->first();
            @endphp


                  <tr>
                    <th scope="row">{{$user->name}} <br> {{$user->mobile}} </th>
                    <td>{{$todayss->total}}</td>
                    <td>{{$tps->total}}</td>
                    <td>{{$a=$tps->total+$todayss->total}}</td>
                    <td>{{$b=$tps->payment+$todayss->payment}}</td>
                    <td>{{$a-$b}}</td>
                    <td>{{$expense->amount}}</td>
                    <td>{{$c=$todayduer->total}}</td>
                    <td><b>{{($b+$c)-$expense->amount}} Tk.</b></td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            <!-- /.row -->
          </div>
        </div>
      </div>
          <!-- ./card-body -->
          <div class="card-footer">
            <div class="row">
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success">
                  <h5 class="description-header">{{$a=$productsale->total+$servicesale->total}}</h5>
                  <span class="description-text">TOTAL SALES</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-warning">
                  <h5 class="description-header">{{$b=$productsale->amount+$servicesale->amount}}</h5>
                  <span class="description-text">TOTAL PAYMENT</span>
                </div>
                <!-- /.description-block -->
              </div>
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                <div class="description-block">
                  <span class="description-percentage text-danger">
                  <h5 class="description-header">{{$a-$b}}</h5>
                  <span class="description-text">DUE PAYMENTS</span>
                </div>
              </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success">
                  <h5 class="description-header">{{$profit=$b-($expense->amount+$purchase->amount)}}</h5>
                  <span class="description-text">TOTAL PROFIT</span>
                </div>
                <!-- /.description-block -->
              </div>
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-success">
                  <h5 class="description-header">{{$loan->amount}}</h5>
                  <span class="description-text">TOTAL LOAN</span>
                </div>
                <!-- /.description-block -->
              </div>
              <div class="col-sm-2 col-6">
                <div class="description-block border-right">
                  <span class="description-percentage text-primary">
                  <h5 class="description-header">{{($profit+$world->balance)-$loan->amount}}</h5>
                  <span class="description-text">MY BALANCE</span>
                </div>
                <!-- /.description-block -->
              </div>
              <!-- /.col -->
            
              
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <div class="col-md-8">
        <!-- MAP & BOX PANE -->
        {{-- <div class="card">
          <div class="card-header">
            <h3 class="card-title">US-Visitors Report</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="d-md-flex">
              <div class="p-1 flex-fill" style="overflow: hidden">
                <!-- Map will be created here -->
                <div id="world-map-markers" style="height: 325px; overflow: hidden">
                  <div class="map"></div>
                </div>
              </div>
              <div class="card-pane-right bg-success pt-2 pb-2 pl-4 pr-4">
                <div class="description-block mb-4">
                  <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                  <h5 class="description-header">8390</h5>
                  <span class="description-text">Visits</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block mb-4">
                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                  <h5 class="description-header">30%</h5>
                  <span class="description-text">Referrals</span>
                </div>
                <!-- /.description-block -->
                <div class="description-block">
                  <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                  <h5 class="description-header">70%</h5>
                  <span class="description-text">Organic</span>
                </div>
                <!-- /.description-block -->
              </div><!-- /.card-pane-right -->
            </div><!-- /.d-md-flex -->
          </div>
          <!-- /.card-body -->
        </div> --}}
        <!-- /.card -->
        <div class="row">
          <div class="col-md-6">
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-warning">
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-warning">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="public/dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Is this template really for free? That's unbelievable!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="public/dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      You better believe it!
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message. Default to the left -->
                  <div class="direct-chat-msg">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-left">Alexander Pierce</span>
                      <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="/public/dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      Working with AdminLTE on a great new app! Wanna join?
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                  <!-- Message to the right -->
                  <div class="direct-chat-msg right">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right">Sarah Bullock</span>
                      <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="/public/dist/img/user3-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      I would love to.
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
                  <!-- /.direct-chat-msg -->

                </div>
                <!--/.direct-chat-messages-->

                <!-- Contacts are loaded here -->
                <div class="direct-chat-contacts">
                  <ul class="contacts-list">
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user1-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                          <span class="contacts-list-msg">How have you been? I was...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user7-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                          <span class="contacts-list-msg">I will be waiting for...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user3-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                          <span class="contacts-list-msg">I'll call you back at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user5-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                          <span class="contacts-list-msg">Where is your new...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user6-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                          <span class="contacts-list-msg">Can I take a look at...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                    <li>
                      <a href="#">
                        <img class="contacts-list-img" src="/public/dist/img/user8-128x128.jpg" alt="User Avatar">

                        <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                          <span class="contacts-list-msg">Never mind I found...</span>
                        </div>
                        <!-- /.contacts-list-info -->
                      </a>
                    </li>
                    <!-- End Contact Item -->
                  </ul>
                  <!-- /.contacts-list -->
                </div>
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="#" method="post">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                      <button type="button" class="btn btn-warning">Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
            <!--/.direct-chat -->
          </div>
          <!-- /.col -->

          <div class="col-md-6">
            <!-- USERS LIST -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Our User</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <ul class="users-list clearfix">
                  @foreach($userphoto as $user)
                  <li>
                    <img src="{{asset($user->profile_photo_path)}}" style="height: 70px;"  alt="User Image">
                    <a class="users-list-name" href="#">{{$user->name}}</a>
                    <span class="users-list-date">{{$user->mobile}}</span>
                  </li>
                @endforeach
                </ul>
                <!-- /.users-list -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="{{url('admin/user')}}">View All Users</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!--/.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- TABLE: LATEST ORDERS -->
        <div class="card">
          <div class="card-header border-transparent">
            <h3 class="card-title">Latest Orders</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Status</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($latestorder as $order)
                <tr>
                  <td><a href="{{url('/admin/saleview/'.$order->id)}}" target="blank" >{{$order->orderid}}</a></td>
                  <td>{{$order->name}}</td>
                  @if($order->due > 0)
                  <td><span class="badge badge-danger">Pending</span></td>
                  @else 
                  <td><span class="badge badge-success">Shipped</span></td>
                  @endif
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->qty}}</div>
                  </td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->total}} Tk.</div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer clearfix">
            <a href="{{url('admin/pending')}}" target="blank" class="btn btn-sm btn-info float-left">Pending Order</a>
            <a href="{{url('admin/alltimesale')}}"  target="blank" class="btn btn-sm btn-secondary float-right">View All Orders</a>
          </div>
          <!-- /.card-footer -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->

      <div class="col-md-4">
        <!-- Info Boxes Style 2 -->
        <div class="info-box mb-3 bg-warning">
          <span class="info-box-icon"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Customer</span>
            <span class="info-box-number">{{$customer}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-success">
          <span class="info-box-icon"><i class="far fa-heart"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Product</span>
            <span class="info-box-number">{{$totalproduct}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-danger">
          <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Service Sale</span>
            <span class="info-box-number">{{$salesc}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box mb-3 bg-info">
          <span class="info-box-icon"><i class="far fa-comment"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Product Sale</span>
            <span class="info-box-number">{{$salepc}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">User Online Status</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
              <!-- /.card-body -->

            @php 
              $users = DB::table('users')->where('status',1)->where('type',2)->get();
            @endphp
          <div class="card-footer bg-light p-0">
            <ul class="nav nav-pills flex-column">
              @foreach ($users as $users) 
                @if (Cache::has('user-is-online-' . $users->id))
              <li class="nav-item">
                <a href="#" class="nav-link">
                  {{$users->name}}
                  <span class="float-right text-success">
                    <i class="far fa-circle text-success"></i>
                  </span>
                </a>
              </li>
              @else 
              <li class="nav-item">
                <a href="#" class="nav-link">
                  {{$users->name}}
                  <span class="float-right text-warning">
                    <i class="far fa-circle text-danger"></i>
                  </span>
                </a>
              </li>
           @endif
            @endforeach
              {{-- @if(Cache::has('user-is-online-' . $users->id))
              <span class="text-success">Online</span>
          @else
              <span class="text-secondary">Offline</span>
          @endif --}}
              
            </ul>
          </div>
          <!-- /.footer -->
        </div>
        <!-- /.card -->

        <!-- PRODUCT LIST -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Recently Sale Products</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
              <button type="button" class="btn btn-tool" data-card-widget="remove">
                <i class="fas fa-times"></i>
              </button>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table m-0">
                <thead>
                <tr>
                  <th>Product</th>
                  <th>Qty</th>
                  <th>Total</th>
                </tr>
                </thead>
                <tbody>
                  @foreach($recentsale as $order)
                <tr>
                  <td> <b>{{$order->name}}</b></td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->qty}}</div>
                  </td>
                  <td>
                    <div class="sparkbar" data-color="#00a65a" data-height="20">{{$order->total}} Tk.</div>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.table-responsive -->
          </div>
 
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div><!--/. container-fluid -->
</section>

@endsection