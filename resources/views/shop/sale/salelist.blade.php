@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Product Sale List || {{$world->name}}
Dashboard
@endsection
@section('content')
    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{url('/pendingp_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
              <div class="col-sm-6 form-group">
                <label>Invoice No</label>
                <input class="form-control invoice" readonly >              
            </div>
             <div class="col-sm-6 form-group">
                <label>Total</label>
                <input class="form-control total" readonly  placeholder="Total Bill" type="number" min="1" > 
                <input class="cId" type="hidden" name="id" id="id">
            </div> 
              <div class="col-sm-6 form-group">
                <label>Last Payment</label>
                <input class="form-control payment" readonly placeholder="Customer Payment"  type="number" min="1">              
            </div> 
            <div class="col-sm-6 form-group">
              <label>Payment</label>
              <input class="form-control " placeholder="Customer Payment" required type="number" min="1" name="payment">              
          </div>           
        </div>
       </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold "> Product Sale List</h5></div>   
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Customer</th>
                  <th>Invoice</th>
                  <th>Qty</th>
                  <th>Date</th>
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Due</th>
                  <th>Action</th>
           
                </tr>
              </thead>
              <tbody>
                  @php $k=1;  @endphp
                  @foreach($data as $sale)
             <tr>
                <td>{{$k++}}</td>                 
                <td>{{@$sale->name}} <br> ( {{@$sale->mobile}} )</td>
                <td>{{$sale->orderid}}</td>
                <td>{{$sale->qty}}</td>
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->payment}}</td>
                <td> @if($sale->due==0) <b>Paid</b>  @else {{$sale->due }} @endif</td>
                <td> 
                  <a  href="{{url('/salelist_view/'.$sale->id)}}"  > <button class="btn btn-sm btn-info ">View</button> </a> 
              </td>
     
             </tr>
             @endforeach
           
              </tbody>
            </table>
            
          </div>
        </div>
        <script>
          function edit(id) {
                  var x =id;
                  
                  $.ajax({
                      type:'GET',
                      url:"{{url('/productsale_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.invoice').val(response.orderid);        
                          $('.total').val(response.total);                
                          $('.payment').val(response.payment);                                              
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>
@endsection