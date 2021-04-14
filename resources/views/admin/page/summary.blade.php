@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Summary Report || {{$world->name}}
@endsection
@section('content')

<style>
    .box {
      box-shadow:0 1px 4px rgba(0, 0, 0, 0.3), 0 0 40px rgba(0, 0, 0, 0.1) inset;
  }
  </style>
  <div class="card shadow">
      <div class="card-header ">
  <form action="{{url('admin/summary')}}" method="get"> 
          @csrf 
       <div class="row">
       <div class="col-md-2"></div>
                  <div class="col-md-8">
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
       <div class="col-md-2"></div>
              </div>
          </form>
      </div> 
      <div class="card-body">
      <div class="row">
      <div class="col-md-3 "> </div>
        <div class="col-md-6 box"> 
      <div class="table-responsive">
      <table class="table table-bordered ">
    <tbody style="font-size:20px;">
      <tr class="text-center">
        <td colspan="2"><b>Income Statement</b></td>
      </tr>
      <tr class="bg-success">
        <td >Total Service Sale </td>
        <td>{{$servicesale->amount}}</td>
      </tr>
      <tr class="bg-success">
        <td>Total Product Sale</td>
        <td>{{$productsale->amount}}</td>
      </tr>
      <tr class="bg-success">
        <td>Total Due Recieved</td>
        <td>{{$due->amount}}</td>
      </tr>
      <tr class="bg-danger">
        <td>Product Purchase </td>
        <td>{{$purchase->amount}}</td>
      </tr>
      <tr class="bg-danger">
        <td>Total Expenses</td>
        <td>{{$expense->amount}}</td>
      </tr>
      <tr class="bg-success">
          <td><b>Total Deposit Amount</b></td>
          <td><b>{{$a=$servicesale->amount+$productsale->amount+$due->amount}}</b></td>
      </tr>
      <tr class="bg-danger">
        <td><b>Total Expenses</b> </td>
        <td><b>{{$b=$purchase->amount+$expense->amount}}</b></td>
      </tr>
      <tr class="bg-info">
        <td><b> Loss / Profit</b> </td>
        <td><b>{{$a-$b}}</b></td>
      </tr>
    </tbody>
  </table>
      </div> 
      </div> 
      <div class="col-md-3 "> </div> 
           <form> 
          <input type="button" value="Print" 
                 onclick="window.print()" /> 
      </form>
     </div>  
    </div>  
  @endsection