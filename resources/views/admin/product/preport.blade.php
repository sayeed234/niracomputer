@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Purchase Report || {{$world->name}}
@endsection
@section('content')

<div class="card shadow">
    <div class="card-header ">
<form action="{{url('admin/preport')}}" method="get"> 
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
  
     </div>
     <div class="col-md-6">Products Purchase  Report</div>
     <div class="col-md-6"> <h6 class="text-right">Date: <?php echo  date("d-M-Y "); ?></h6> </div>
     </div>
      
      <div class="table-responsive">
       <table  class="table table-bordered ">
          <thead>
            <tr>
              <th>SL</th>
              <th>Date</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
          @php  $k=1; $save=0; $ins=0; @endphp
          @foreach($result as $col)
           <tr> 
           <td>{{$k++}}</td>
           <td>{{ date('d-M-Y', strtotime($col->created_at)) }}</td>
           <td>{{$col->amount}}</td>      
           </tr>
           @php $save=$save+$col->amount @endphp
           @endforeach
           <tr>
           <td colspan=2><b>Total Amount</b></td>
           <td><b>{{$save}} Tk.</b> </td>
           </tr>
          </tbody>
        </table>
          {{ $result->links() }}
        <form> 
        <input type="button" value="Print" 
               onclick="window.print()" /> 
    </form>
      </div>
    </div>

  </div>  


@endsection