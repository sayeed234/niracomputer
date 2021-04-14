@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Today Sale || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('admin/todaysale')}}" method="get"> 
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
     <h5 class="d-flex justify-content-left">Today Service Sale</h5>
     <h5> Date: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 
 <div class="table-responsive">
  <table  class="table table-bordered ">
     <thead>
       <tr>
         <th>SL</th>
         <th>User</th>
         <th>Service</th>
         <th>Commission</th>
         <th>Total</th>
         <th>Payment</th>
         <th>Due</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $save=0; @endphp
     @foreach($service as $ex)
       <tr> 
      <td>{{$k++}}</td>
       <td>{{$ex->name}} <br> {{$ex->mobile}} </td>        
      <td>{{$ex->service}}</td>                         
      <td>{{$ex->com}}</td>                         
      <td>{{$ex->total}}</td>                         
      <td>{{$ex->payment}}</td>                         
      <td>{{$ex->due}}</td>                         
      </tr>
      @php $save=$save+$ex->payment; @endphp
      @endforeach
      <tr>
          <td colspan="5" class="text-right"><b>Total Income</b></td>
          <td colspan="2"><b>{{$save}} TK.</b></td>
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
     <h5 class="d-flex justify-content-left">Today Product Sale</h5>
     <h5> Date: <?php echo date('d-M-Y'); ?></h5>
</div>
</div>
 
 <div class="table-responsive">
  <table  class="table table-bordered ">
     <thead>
       <tr>
         <th>SL</th>
         <th>User</th>
         <th>Invoice</th>
         <th>Qty</th>
         <th>Total</th>
         <th>Payment</th>
         <th>Due</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  $save=0; @endphp
     @foreach($product as $ex)
       <tr> 
      <td>{{$k++}}</td>
       <td>{{$ex->name}} <br> {{$ex->mobile}} </td>        
      <td>{{$ex->orderid}}</td>                         
      <td>{{$ex->qty}}</td>                         
      <td>{{$ex->total}}</td>                         
      <td>{{$ex->payment}}</td>                         
      <td>{{$ex->due}}</td>                         
      </tr>
      @php $save=$save+$ex->payment; @endphp
      @endforeach
      <tr>
          <td colspan="5" class="text-right"><b>Total Income</b></td>
          <td colspan="2"><b>{{$save}} TK.</b></td>
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