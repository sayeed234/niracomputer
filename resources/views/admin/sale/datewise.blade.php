@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Date Wise || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('admin/datewise')}}" method="get"> 
        @csrf 
     <div class="row">
         <div class="col-md-4 ">
                    <div class="row">
                         <div class="col-md-4">
                        <label style="float: center;">Type:</label>
                        </div>
                        <div class="col-md-8" style="float: right;">                     
                            <select name="type" required class="form-control select2bs4" style="width: 100%;">
                             <option value="1">Service Sale</option>
                             <option value="2">Product Sale</option>  
                            </select>           
                        </div>                       
                    </div>
                </div>
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
    
    

@if($service)
<div class="card-body">
  <div class="row ">
 <div class="col-md-6">
<h5 class="d-flex justify-content-left">{{$company->name}}</h5>
<h6 class="d-flex justify-content-left">{{$company->address}}</h6>
<h6 class="d-flex justify-content-left">{{$company->phone1}}, {{$company->phone2}}</h6>
</div>
 <div class="col-md-6">    

     <h5 class="d-flex justify-content-left"> Service Sale</h5>
     <h5> Issue: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 
 <div class="table-responsive">
    <table  class="table table-bordered ">
     <thead>
       <tr>
         <th>SL</th>
         <th>Date</th>
         <th>Total</th>
         <th>Payment</th>
         <th>Due</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $total=0; $payment=0; $due=0;  @endphp
     @foreach($service as $ex)
       <tr> 
      <td>{{$k++}}</td>
      <td>{{ date('d-M-Y', strtotime($ex->created_at)) }}</td>                          
      <td>{{$ex->total}}</td>                         
      <td>{{$ex->payment}}</td>                         
      <td> {{$ex->due}}</td>                         
      </tr>
     @php  $total=$total+$ex->total; @endphp
     @php  $payment=$payment+$ex->payment;  @endphp
     @php  $due=$due+$ex->due;  @endphp

      @endforeach
      <tr>
          <td colspan="2"><b>Total</b></td>
          <td><b>{{$total}}</b></td>
          <td><b>{{$payment}}</b></td>
          <td><b>{{$due}}</b></td>
      </tr>
     </tbody>
   </table>
   <form> 
    <input type="button" value="Print" 
           onclick="window.print()" /> 
</form>
 </div>
</div>
@else

@endif

@if($product)
<div class="card-body">
  <div class="row ">
 <div class="col-md-6">
<h5 class="d-flex justify-content-left">{{$company->name}}</h5>
<h6 class="d-flex justify-content-left">{{$company->address}}</h6>
<h6 class="d-flex justify-content-left">{{$company->phone1}}, {{$company->phone2}}</h6>
</div>
 <div class="col-md-6">   
     <h5 class="d-flex justify-content-left"> Product Sale</h5>
     <h5> Date: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 
 <div class="table-responsive">
    <table  class="table table-bordered ">
        <thead>
          <tr>
            <th>SL</th>
            <th>Date</th>
            <th>Total</th>
            <th>Payment</th>
            <th>Due</th>
          </tr>
        </thead>
        <tbody>
        @php $k=1;  $total=0; $payment=0; $due=0;  @endphp
        @foreach($product as $ex)
          <tr> 
         <td>{{$k++}}</td>
         <td>{{ date('d-M-Y', strtotime($ex->created_at)) }}</td>                          
         <td>{{$ex->total}}</td>                         
         <td>{{$ex->payment}}</td>                         
         <td> {{$ex->due}}</td>                         
         </tr>
        @php  $total=$total+$ex->total; @endphp
        @php  $payment=$payment+$ex->payment;  @endphp
        @php  $due=$due+$ex->due;  @endphp
   
         @endforeach
         <tr>
             <td colspan="2"><b>Total</b></td>
             <td><b>{{$total}}</b></td>
             <td><b>{{$payment}}</b></td>
             <td><b>{{$due}}</b></td>
         </tr>
        </tbody>
      </table>
      <form> 
        <input type="button" value="Print" 
               onclick="window.print()" /> 
    </form>
 </div>
</div>
@else

@endif



  </div>  
  @endsection