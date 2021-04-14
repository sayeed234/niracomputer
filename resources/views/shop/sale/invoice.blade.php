@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Invoice #{{$order->orderid}} || {{$world->name}}
Dashboard
@endsection
@section('content')


<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
                  <!-- Main content -->
          <div class="invoice p-3 mb-3">
            <!-- title row -->
            <div class="row">
              <div class="col-12">
                <h4>
                  <i class="fas fa-globe"></i> {{$company->name}}
                  <small class="float-right">Date: <?php echo date('d-M-Y'); ?></small>
                </h4>
              </div>
              <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
              <div class="col-sm-4 invoice-col">
                From
                <address>
                  <strong>{{$company->name}}</strong><br>
                  {{$company->address}}<br>
                  Phone: {{$company->phone1}}<br>
                  Email: {{$company->email}}
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                To
                <address>
                  <strong>{{$customer->name}}</strong><br>
                  {{$customer->address}} <br>
                  Phone: {{$customer->mobile}}<br>
              
                </address>
              </div>
              <!-- /.col -->
              <div class="col-sm-4 invoice-col">
                <b>Invoice #{{$order->orderid}}</b><br>
                <br>
                <b>Order ID:</b> {{$order->id}}<br>
                <b>Issue By:</b> {{Auth::user()->name}}<br>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
              <div class="col-12 table-responsive">
                <table class="table table-striped table-bordered">
                  <thead>
                  <tr>                  
                    <th>Serial #</th>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Rate</th>
                    <th>Subtotal</th>
                  </tr>
                  </thead>
                  <tbody>
                      @php $s=1;  @endphp
                @foreach($orderdetails as $od)
                  <tr>
                    <td>{{$s++}}</td>
                    <td>{{$od->name}}</td>
                    <td>{{$od->qty}}</td>
                    <td>{{$od->price}} Tk.</td>
                    <td>{{$od->total}} Tk.</td>
                 </tr>

                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
              <!-- accepted payments column -->
              <div class="col-6">
              
              </div>
              <!-- /.col -->
              <div class="col-6">
                <p class="lead">Amount Summary</p>

                <div class="table-responsive">
                  <table class="table table-bordered" >
                    <tr>
                      <th style="width:50%">Subtotal:</th>
                      <td>{{$order->total}} Tk</td>
                    </tr>
                    <tr>
                      <th>Payment</th>
                      <td>{{$order->payment}} Tk</td>
                    </tr>

                    @if($order->due==0)
                    <tr>
                      <th>Total:</th>
                      <td>Paid</td>
                    </tr>
                    @else
                    <tr>
                        <th>Due Total:</th>
                        <td>{{$order->due}} Tk.</td>
                      </tr>
                    @endif

                  </table>
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row no-print">
              <div class="col-12">
                <form> 
                    <input type="button" value="Print" 
                           onclick="window.print()" /> 
                </form>
    
              </div>
            </div>
          </div>
          <!-- /.invoice -->
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->



@endsection