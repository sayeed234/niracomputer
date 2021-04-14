@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
My Work || {{$world->name}}
Dashboard
@endsection
@section('content')
<div class="container-fluid">
    <form enctype="multipart/form-data" action="{{url('/mywork_store')}}" method="post">
        @csrf 
              <div class="row">     
              <div class="col-sm-3 form-group">
                  <label>Service *</label><br>
                  <select name="service"  required class="form-control select2bs4"   style="width: 100%;">
                   <option value="">Select Service</option>
                 @foreach($service as $service)
                   <option  value="{{$service->id}}">{{$service->service}}({{$service->servicecode}})</option>
                   @endforeach
                  </select>
              </div>
               <div class="col-sm-3 form-group">
                  <label>Total</label>
                  <input class="form-control "  placeholder="Customer Total Bill" type="number" min="1" name="total">             
              </div> 
                <div class="col-sm-3 form-group">
                  <label>Payment *</label>
                  <input class="form-control " placeholder="Customer Payment" required type="number" min="1" name="payment">              
              </div> 
              <div class="col-sm-3 form-group"> 
                <label>Paid By</label>
                <select name="paidby"   class="form-control select2bs4" style="width: 100%;">
                    <option value="Cash">Cash</option>
                    <option value="Bkash">Bkash</option>
                    <option value="Rocket">Rocket</option>
                    <option value="Nagad">Nagad</option>
                    <option value="Cheque">Cheque</option>
                    <option value="Credit Card">Credit Card</option>
                   </select>
             </div>
            <div class="col-sm-3 form-group">
                <label>Name</label>
                <input class="form-control " placeholder="Customer Name"  type="text" min="1" name="cusname">              
            </div>
            <div class="col-sm-3 form-group">
                <label>Mobile</label>
                <input class="form-control " placeholder="Customer Mobile"  type="number" min="0" name="cusmobile">              
            </div>
            <div class="col-sm-3 form-group">
                <label>Address</label>
                <input class="form-control " placeholder="Customer Address"  type="text"  name="cusaddress">              
            </div>
         </div>        
          <div class="modal-footer">
              <button type="submit" class="btn btn-success">Submit</button>
          </div>
      </form>
    </div> 
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
          <form enctype="multipart/form-data" action="{{url('/mywork_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
              <div class="col-sm-8 form-group">
                <label>Service *</label><br>
                <select name="service"  required class="form-control select2bs4 service"   style="width: 100%;">
                 <option value="">Select Service</option>
               @foreach($service2 as $service)
                 <option  value="{{$service->id}}">{{$service->service}}({{$service->servicecode}})</option>
                 @endforeach
                </select>
                <input class="cId" type="hidden" name="id" id="id">
            </div>
             <div class="col-sm-4 form-group">
                <label>Total</label>
                <input class="form-control total"  placeholder="Total Bill" type="number" min="1" name="total">             
            </div> 
              <div class="col-sm-6 form-group">
                <label>Payment *</label>
                <input class="form-control payment" placeholder="Customer Payment" required type="number" min="1" name="payment">              
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
    <br> 
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Today Service Sale</h5></div>   
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table class="table table-bordered table-hover">
              <thead>
                <tr >
                  <th>Sl</th>
                  <th>Customer</th>
                  <th>Service</th>
                  <th>Paid By</th>
                  @if(Auth::user()->com==1)
                  <th>Com.</th>
                  @endif
                  <th>Total</th>
                  <th>Payment</th>
                  <th>Due</th>
                  <th>Action</th>
           
                </tr>
              </thead>
              <tbody>
                  @php $k=1; $total=0; $payment=0; $com=0; @endphp
                  @foreach($sale as $sale)
                  @php $cus=DB::table('customers')->find($sale->customer); @endphp
             <tr>
                <td>{{$k++}}</td>
                 @if($sale->customer)
                <td>{{@$cus->name}} ( {{@$cus->mobile}} )</td>
                 @else
                  <td>Walk-in-Customer</td>
                 @endif
                <td>{{$sale->service}}</td>
                <td>{{$sale->paidby}}</td>
                @if(Auth::user()->com==1)
                <td>{{$sale->com}}</td>
                @endif
                <td>{{$sale->total}}</td>
                <td>{{$sale->payment}}</td>
                <td>{{$sale->due}}</td>
                <td> <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  </a>              
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="" onclick= 'edit({{$sale->id}});' data-toggle="modal" id="edit" 
                          data-target="#exampleModalCenter_edit"> Edit</a>                   
                     <a  class="dropdown-item"  href="{{url('/mywork_delete/'.$sale->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
                  </div>
                  </div>
              </td>
             </tr>
             @php $total=$total+$sale->total @endphp
             @php $payment=$payment+$sale->payment; @endphp
             @php $com=$com+$sale->com; @endphp
             @endforeach
             <tr>
              
               @if(Auth::user()->com==1)
                 <td colspan="4"><b>Total Service Sale</b></td>
                 <td><b>{{$com}} TK.</b></td>
                 @else 
                 <td colspan="4"><b>Total Service Sale</b></td>
                 @endif
                 <td><b>{{$total}} TK.</b></td>
                 <td><b>{{$payment}} TK.</b></td>
                 <td><b>{{$total-$payment}} TK.</b></td>
             </tr>
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
                          $('.cusname').val(response.cusname);                              
                          $('.cusmobile').val(response.cusmobile);                              
                          $('.cusaddress').val(response.cusaddress);                              
                          $('.cId').val(response.id);
                   
                      },
                          
                  });
              }
          
          </script>
@endsection