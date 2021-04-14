@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Payment Pending Service Sale || {{$world->name}}
Dashboard
@endsection
@section('content')
    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{url('/pendings_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
             <div class="col-sm-6 form-group">
                <label>Total</label>
                <input class="form-control total" readonly  placeholder="Total Bill" type="number" min="1"> 
                <input class="cId" type="hidden" name="id" id="id">
            </div> 
              <div class="col-sm-6 form-group">
                <label>Last Payment</label>
                <input class="form-control payment" readonly placeholder="Customer Payment" required type="number" min="1">              
            </div> 
            <div class="col-sm-6 form-group">
              <label>Payment</label>
              <input class="form-control "  placeholder="Customer Payment" required type="number" min="1" name="payment">              
          </div> 
            <div class="col-sm-6 form-group"> 
              <label>Paid Bye</label>
              <select name="paidby"   class="form-control select2bs4 paidby" style="width: 100%;">
                  <option value="Cash">Cash</option>
                  <option value="Bkash">Bkash</option>
                  <option value="Rocket">Rocket</option>
                  <option value="Nagad">Nagad</option>
                  <option value="Cheque">Cheque</option>
                  <option value="Credit Card">Credit Card</option>
                 </select>
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Payment Pending Service Sale</h5></div>   
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Customer</th>
                  <th>Service</th>
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
                <td>{{@$sale->service}}</td>
                <td>{{ date('d-M-Y', strtotime($sale->created_at)) }}</td>
                <td>{{$sale->total}}</td>
                <td>{{$sale->payment}}</td>
                <td>{{$sale->due}}</td>
                <td> 
                  <a  href="" onclick= 'edit({{$sale->id}});' data-toggle="modal" id="edit" 
                  data-target="#exampleModalCenter_edit"> <button class="btn btn-sm btn-info ">Payment</button> </a> 
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
                      url:"{{url('/mywork_edit')}}/"+x,
                      success:function(response){
                          console.log(response);
                          $('.service').val(response.service);        
                          $('.total').val(response.total);                
                          $('.payment').val(response.payment);                
                          $('.paidby').val(response.paidby);                                                            
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>
@endsection