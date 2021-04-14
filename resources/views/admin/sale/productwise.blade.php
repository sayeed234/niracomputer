@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Product Wise || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('admin/productwise')}}" method="get"> 
        @csrf 
     <div class="row">
                <div class="col-md-8 ">
                    <div class="row">
                     <div class="col-md-1">
                            <label style="float: center;">From:</label>
                        </div>
                        <div class="col-md-4" style="float: right;">
                            <input type="date"  required  name="fromDate" value="{{$fromDate}}" class="form-control "/>
                        </div>
                        <div class="col-md-1"><label>To:</label></div>
                        <div class="col-md-4 "><input type="date" value="<?php echo date('Y-m-d'); ?>"class="form-control" name="toDate"
                            /></div>
                        <div class="col-md-2 "><input type="submit" class="btn btn-success" value="Load"/>
                        </div>
                    </div>
                </div>
            </div>
            </form>  
    </div>    
    
    

<div class="card-body">
  <div class="row ">
 <div class="col-md-6">
<h5 class="d-flex justify-content-left">{{$company->name}}</h5>
<h6 class="d-flex justify-content-left">{{$company->address}}</h6>
<h6 class="d-flex justify-content-left">{{$company->phone1}}, {{$company->phone2}}</h6>
</div>
 <div class="col-md-6">    

     <h5 class="d-flex justify-content-left"> Products Sale</h5>
     <h5> Issue: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 
 <div class="table-responsive">
    <table  class="table table-bordered ">
     <thead>
       <tr>
         <th>SL</th>
         <th>Name</th>
         <th>Qty</th>
         <th>Amount</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; $payment=0;  @endphp
     @foreach($product as $ex)
       <tr> 
      <td>{{$k++}}</td>                       
      <td>{{$ex->name}}</td>                                                 
      <td>{{$ex->qty}}</td>                                                 
      <td>{{$ex->total}}</td>                                                 
      </tr>
     @php  $total=$total+$ex->qty; @endphp
     @php  $payment=$payment+$ex->total;  @endphp

      @endforeach
      <tr>
          <td colspan="2"><b>Total Sale</b></td>
          <td><b>{{$total}}</b></td>
          <td><b>{{$payment}}</b></td>
      </tr>
     </tbody>
   </table>
   <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
</form>
 </div>
</div>





  </div>  
  @endsection