@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
User List || {{$world->name}} 
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
    <form enctype="multipart/form-data" action="{{route('admin.user.store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
            <div class="col-sm-12 form-group">
                <label>Name</label>
                <input class="form-control"  required type="text"  name="name">
            </div> 
            <div class="col-sm-7 form-group">
                <label>Mobile</label>
                <input class="form-control"  required type="number"  name="mobile">
            </div>
            <div class="col-sm-5 form-group">
                <label>Select Status</label>
               <select class="form-control select2bs4" name="status" style="width: 100%;">
                   <option value="1">Active</option>
                   <option value="0">Deactive</option>             
                 </select>
           </div>
            <div class="col-sm-12 form-group">
                <label>Email</label>
                <input class="form-control"  required type="email"  name="email">
            </div>
            <div class="col-sm-12 form-group">
                <label>Address</label>
                <input class="form-control"   type="text"  name="address">
            </div>           
            <div class="col-sm-12 form-group">
                <label>Image</label>
                <input class="form-control" required  type="file"  name="image">
            </div>
            <div class="col-sm-12 form-group">
                <label>Password</label>
                <input class="form-control" required  type="text"  name="password">
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
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle"> Update</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
          <form enctype="multipart/form-data" action="{{route('admin.user.update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">
                <div class="col-sm-12 form-group">
                    <label>Name</label>
                    <input class="form-control name"  required type="text"  name="name">
                    <input class="cId" type="hidden" name="id" id="id">
                </div> 
                <div class="col-sm-7 form-group">
                    <label>Mobile</label>
                    <input class="form-control mobile"  required type="number"  name="mobile">
                </div>
                <div class="col-sm-5 form-group">
                    <label>Select Status</label>
                   <select class="form-control select2bs4 status" name="status" style="width: 100%;">
                       <option value="1">Active</option>
                       <option value="0">Deactive</option>             
                     </select>
               </div>
                <div class="col-sm-12 form-group">
                    <label>Email</label>
                    <input class="form-control email"  required type="email"  name="email">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <input class="form-control address"   type="text"  name="address">
                </div>           
                <div class="col-sm-12 form-group">
                    <label>Image</label>
                    <input class="form-control"  type="file"  name="image">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Password</label>
                    <input class="form-control password" type="text"  name="password">
                </div>
                <div class="col-sm-4 form-group">
                    <label>Employee Type</label>
                    <select class="form-control  com" name="com" style="width: 100%;">
                        <option value="1">Commision</option>
                        <option value="0">Salary</option>             
                      </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Product Sale</label>
                    <select class="form-control  sale" name="sale" style="width: 100%;">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>             
                      </select>
                </div>
                <div class="col-sm-4 form-group">
                    <label>Loan </label>
                    <select class="form-control  loan" name="loan" style="width: 100%;">
                        <option value="1">Show</option>
                        <option value="0">Hide</option>             
                      </select>
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">User List</h5></div>   
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
                  <th>Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th>Join</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($result as $blog)
             <tr>
              <td>{{$blog->name}}</td>
              <td>{{$blog->mobile}}</td>
              <td>{{$blog->email}}</td>
              <td> @if($blog->type==1) <b>Admin</b>  @else User @endif</td>
              <td> @if($blog->status==1) Active @else <span style="color:red">Deactive</span> @endif</td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }}</td>
              <td><img src="{{asset($blog->profile_photo_path)}}" style="height:50px; width:80px;"></td>
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>
    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('admin/user/delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
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
                  url:"{{url('/admin/user/edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.name').val(response.name);
                      $('.mobile').val(response.mobile);
                      $('.email').val(response.email);
                      $('.status').val(response.status);
                      $('.com').val(response.com);
                      $('.sale').val(response.sale);
                      $('.loan').val(response.loan);
                      $('.address').val(response.address);
                      $('.password').val(response.password);
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      @endsection