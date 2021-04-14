@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Today Sale || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
               <thead>
                 <tr >
                   <th>Name</th>
                   <th>Mobile</th>
                   <th>Address</th>
                   <th>Invoice</th>
                   <th>Total</th>           
                   <th>Payment</th>           
                   <th>Due</th>           
                 </tr>
               </thead>
               <tbody>                     
              <tr>
                  <td><b>{{$data->name}}</b></td>
                  <td><b>{{$data->mobile}}</b></td>
                  <td><b>{{$data->address}}</b></td>
                  <td><b>#{{$data->orderid}}</b></td>
                  <td><b>{{$data->total}}</b></td>
                  <td><b>{{$data->payment}}</b></td>
                  <td> @if($data->due==0) <b>Paid</b>  @else {{$data->due }} @endif</td>                          
              </tr>                     
               </tbody>
             </table>
           </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table class="table table-bordered table-hover">
          <thead>
            <tr >
              <th>Sl</th>
              <th>Product Name</th>
              <th>Price</th>
              <th>Qty</th>
              <th>Total</th>           
            </tr>
          </thead>
          <tbody>
              @php $k=1;  @endphp
              @foreach($details as $sale)
         <tr>
            <td>{{$k++}}</td>                 
       
            <td>{{$sale->name}}</td>
            <td>{{$sale->price}}</td>
            <td>{{$sale->qty}}</td>
            <td>{{$sale->total}}</td>     
         </tr>
         @endforeach
           <tr>
               <td colspan="2"><b>Date: {{ date('d-M-Y', strtotime($data->created_at)) }}</b></td>
               <td ><b>Total</b></td>
               <td ><b>{{$data->qty}}</b></td>
               <td ><b>{{$data->total}} Tk.</b></td>
            
           </tr>
          </tbody>
        </table>
        <form> 
            <input type="button"  class="btn btn-info" value="Print" 
               onclick="window.print()" /> 
                </form>

                
      </div>
    </div>
</div>


@endsection