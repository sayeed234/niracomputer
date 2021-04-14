@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
My Report || {{$world->name}}
Dashboard
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
<form action="{{url('report')}}" method="get"> 
        @csrf 
     <div class="row">
        <div class="col-md-4 ">
            <div class="row">
                <div class="col-md-4">
                    <label style="float: center;">Report Type:</label>
                </div>
            <div class="col-md-8">
                 <select class="form-control" name="type">
                  <option class="form-control" value="1">Service Sale</option>
                  <option class="form-control" value="2">Product Sale</option>
                  <option class="form-control" value="3">Expense</option>
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
    <div class="card-body">
       <div class="row ">
      <div class="col-md-6">
     <h5 class="d-flex justify-content-left">{{$company->name}}</h5>
     <h6 class="d-flex justify-content-left">{{$company->address}}</h6>
     <h6 class="d-flex justify-content-left">{{$company->phone1}}, {{$company->phone2}}</h6>
     </div>
      <div class="col-md-6">
  
     </div>
     <div class="col-md-6">{{$data}}  Report</div>
     <div class="col-md-6"> <h6 class="text-right">Date: <?php echo  date("d-M-Y "); ?></h6> </div>
     </div>
      
      <div class="table-responsive">
       <table  class="table table-bordered ">
          <thead>
            <tr>
              <th>SL</th>
              <th>Date</th>
              @if(Auth::user()->com==1)
              <th>Com.</th>
              @endif
              <th>Total</th>
              <th>Payment</th>
              <th>Due</th>
            </tr>
          </thead>
          <tbody>
          @php  $k=1; $save=0; $ins=0; $com=0; @endphp
          @foreach($result as $col)
           <tr> 
           <td>{{$k++}}</td>
           <td>{{ date('d-M-Y', strtotime($col->created_at)) }}</td>
           @if(Auth::user()->com==1)
           <td>{{@$col->com}}</td>
           @endif
           <td>{{$col->total}}</td>    
          <td>{{@$col->payment}}</td>      
           <td>{{$col->total-$col->payment}}</td>      
           </tr>
           @php $save=$save+$col->total; @endphp
           @php $ins=$ins+$col->payment; @endphp
           @php $com=$com+@$col->com; @endphp
           @endforeach
           <tr>
            @if(Auth::user()->com==1)
           <td colspan=2><b>Total Amount</b></td>
           <td><b>{{$com}} Tk.</b> </td>
           @else 
           <td colspan=2><b>Total Amount</b></td>
           @endif
           <td><b>{{$save}} Tk.</b> </td>
           <td><b>{{$ins}} Tk.</b> </td>
           <td><b>{{$save-$ins}} Tk.</b> </td>
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