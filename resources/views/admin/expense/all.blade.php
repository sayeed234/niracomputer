@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Expense  List || {{$world->name}}
@endsection
@section('content')
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-12"><h5 class="m-0 font-weight-bold ">User Expense History</h5></div>
                </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>User</th>
                  <th>Type</th>
                  <th>Purpose</th>
                  <th>Note</th>
                  <th>Created</th>
                  <th>Updated</th>
                  <th>Amount</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $k=1; @endphp
              @foreach($expense as $blog)
             <tr>
              <td>{{$k++}}</td>
              <td>{{@$blog->name}} <br>{{@$blog->mobile}}</td>
              <td>{{$blog->type}}</td>
              <td>{{$blog->purpose}}</td>
              <td>{{$blog->note}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }}</td>              
              <td>{{ date('d-M-Y', strtotime($blog->updated_at)) }}</td>              
              <td>{{$blog->amount}} Tk.</td>
              <td> <a  href="{{url('admin/pendings_expense/'.$blog->id)}}" onclick='return confirm("Confirm Pending This Expense ??")' ><button class="btn btn-warning btn-sm">Pending</button></a></td>
               </tr>
             </tr>
             @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>  
      @endsection