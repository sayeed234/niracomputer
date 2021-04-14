@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Service List || {{$world->name}}
@endsection
@section('content')
<div class="page-content fade-in-up">
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Create</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <form enctype="multipart/form-data" action="{{url('admin/service_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
            <div class="col-sm-12 form-group">
                <label>Service Name</label>
                <input class="form-control" placeholder="Photocopy"  required type="text"  name="service">
            </div>
            <div class="col-sm-12 form-group">
                <label>Service Commission (%)</label>
                <input class="form-control" placeholder="2"  required type="number"  name="com">
            </div> 
            @php $m=rand(000,999); @endphp
            <div class="col-sm-12 form-group">
                <label>Service Code</label>
                <input class="form-control"  readonly value="{{$m}}" type="number"  name="servicecode">
            </div>
         
            </div>
           </div>
        <div class="modal-footer">
            <button type="reset" class="btn btn-primary" >Clear</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    
    {{-- Edit slider Modal --}}
    
    <div class="modal fade" id="exampleModalCenter_edit" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{url('admin/service_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
                <div class="col-sm-12 form-group">
                    <label>Service Name</label>
                    <input class="form-control service" placeholder="Photocopy"  required type="text"  name="service">
                    <input class="cId" type="hidden" name="id" id="id">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Service Commission (%)</label>
                    <input class="form-control com" placeholder="2"  required type="number"  name="com">
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
    </div>
    <div class="card shadow">
        <div class="card-header ">
        <div class="row">
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Service  List</h5></div>   
            <div class="col-md-6">
                    <button type="button" class="btn btn-info btn-sm fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter" >
                        Add New
                </button>
            </div>
        </div> 
        </div> 
        <div class="card-body">
          <div class="table-responsive">
           <table id="example" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Service Name</th>
                  <th>Commission</th>
                  <th>Service Code</th>
                  <th>Starting</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $k=1; @endphp
              @foreach($result as $blog)
             <tr>
              <td>{{$k++}}</td>
              <td>{{$blog->service}}</td>
              <td>{{$blog->com}}</td>
              <td>{{$blog->servicecode}}</td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }}</td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('admin/service_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
                    </div>
                    </div>
                </td>
               </tr>
             </tr>
             @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>  
    <script>
      function edit(id) {
              var x =id;
              
              $.ajax({
                  type:'GET',
                  url:"{{url('/admin/service_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.service').val(response.service);        
                      $('.com').val(response.com);        
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      @endsection