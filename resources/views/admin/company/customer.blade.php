@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
All Sale || {{$world->name}}
@endsection
@section('content')

<div class="card-body">
<h3>Customer List</h3> 
 <div class="table-responsive">
    <table id="example" class="table table-bordered table-hover">
     <thead>
       <tr>
         <th>SL</th>
         <th>Join Date</th>
         <th>Name</th>
         <th>Mobile</th>
         <th>Address</th>
       </tr>
     </thead>
     <tbody>
     @php $k=1;  @endphp
     @foreach($data as $ex)
       <tr> 
      <td>{{$k++}}</td>
      <td>{{ date('d-M-Y', strtotime($ex->created_at)) }}</td>  
       <td>{{$ex->name}}  </td>        
      <td>{{$ex->mobile}}</td>                         
      <td>{{$ex->qtaddressy}}</td>                                                                         
      </tr>
      @endforeach    
     </tbody>
   </table>
 </div>
</div> 
  @endsection