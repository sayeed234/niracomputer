@extends('shop.master')

@section('title')

Dashboard
@endsection
@section('content')
<br>
<div class="content">
  <div class="container-fluid ">
    <div class="row ">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Today Sale </h3>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Type</th>
                  <th scope="col">Total</th>
                  <th scope="col">Payment</th>
                  <th scope="col">Due</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Service Sale</th>
                  <td>{{$tss->total}}</td>
                  <td>{{$tss->payment}}</td>
                  <td>{{$tss->total-$tss->payment}}</td>
                </tr>
                <tr>
                  <th scope="row">Product Sale</th>
                  <td>{{$tps->total}}</td>
                  <td>{{$tps->payment}}</td>
                  <td>{{$tps->total-$tps->payment}}</td>
                </tr>
                <tr>
                  <th scope="row">Due Recieve</th>
                  <td >{{$todayduer->total}}</td>
                  <td class="text-right"><b>Total Income = </b></td>
                  <td><b>{{$todayduer->total+$tps->payment+$tss->payment}} Tk.</b></td>

                </tr>
               
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header border-0">
            <h3 class="card-title">Latest Service Sale</h3>
            <div class="card-tools">
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-download"></i>
              </a>
              <a href="#" class="btn btn-tool btn-sm">
                <i class="fas fa-bars"></i>
              </a>
            </div>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-striped table-valign-middle">
              <thead>
              <tr>
                <th>Service</th>
                <th>Date</th>
                <th>Total</th>
                <th>Payment</th>
                <th>Due</th>
              </tr>
              </thead>
              <tbody>
@foreach($latestss as $aa)
              <tr>
                <td>
                  <small class="text-success mr-1">
                    {{$aa->servicecode}}
                  </small>
                  {{$aa->service}}
                </td>
              
                  <td>{{ date('d-M-Y', strtotime($aa->created_at)) }}</td>
               
                <td>
                  {{$aa->total}}
                  
                </td>
                <td>
                  {{$aa->payment}}
                  
                </td>
                <td>
                  {{$aa->due}}
                  
                </td>
              </tr>
 @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col-md-6 -->
      <div class="col-lg-6">
        <div class="card">
          <div class="card-header border-0">
            <div class="d-flex justify-content-between">
              <h3 class="card-title">Total Sales</h3>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">Type</th>
                  <th scope="col">Total</th>
                  <th scope="col">Payment</th>
                  <th scope="col">Due</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">Service Sale</th>
                  <td>{{$tsss->total}}</td>
                  <td>{{$tsss->payment}}</td>
                  <td>{{$a=$tsss->total-$tsss->payment}}</td>
                </tr>
                <tr>
                  <th scope="row">Product Sale</th>
                  <td>{{$tpss->total}}</td>
                  <td>{{$tpss->payment}}</td>
                  <td>{{$b=$tpss->total-$tpss->payment}}</td>
                </tr>
                <tr>
                  <th scope="row"> <b>Due Recieved</b></th>
                  <td colspan="3"> <b>{{$a+$b}} Tk.</b></td>

                </tr>
              </tbody>
            </table>
          </div>
        </div>
        <!-- /.card -->

      
          <div class="card">
            <div class="card-header border-0">
              <h3 class="card-title">Latest Product Sale</h3>
              <div class="card-tools">
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-download"></i>
                </a>
                <a href="#" class="btn btn-tool btn-sm">
                  <i class="fas fa-bars"></i>
                </a>
              </div>
            </div>
            <div class="card-body table-responsive p-0">
              <table class="table table-striped table-valign-middle">
                <thead>
                <tr>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Invoice</th>
                  <th>Qty</th>
                  <th>Total</th>
    
                </tr>
                </thead>
                <tbody>
  @foreach($latestps as $aa)
                <tr>
                  <td>
                    <small class="text-success mr-1">
                      {{@$aa->mobile}}
                    </small>
                    {{@$aa->name}}
                  </td>
                
                    <td>{{ date('d-M-Y', strtotime($aa->created_at)) }}</td>
                 
                  <td>
                    {{$aa->orderid}}
                    
                  </td>
                  <td>
                    {{$aa->qty}}
                    
                  </td>
                  <td>
                    {{$aa->total}}
                    
                  </td>
                </tr>
   @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
      <!-- /.col-md-6 -->
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</div>
<!-- /.content -->

@endsection