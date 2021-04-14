@extends('admin.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Company || {{$world->name}}
@endsection
@section('content')
<div class="page-content fade-in-up">

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
      <form enctype="multipart/form-data" action="{{url('admin/comapny/update')}}" method="post" >
        @csrf
    <div class="modal-body">
        <div class="row">

         <div class="col-sm-12 form-group">
            <label>Name</label>
            <input class="form-control name"  required type="text"  name="name">
            <input class="cId" type="hidden" name="id" id="id">

        </div> 
        <div class="col-sm-12 form-group">
            <label>Owner Name</label>
            <input class="form-control owner"  required type="text"  name="owner">
        </div> 
        <div class="col-sm-12 form-group">
            <label>Address</label>
            <input class="form-control address"  required type="text"  name="address">
        </div> 
        <div class="col-sm-6 form-group">
            <label>Phone-1</label>
            <input class="form-control phone1"  required type="text"  name="phone1">
        </div> 
          <div class="col-sm-6 form-group">
            <label>Phone-2</label>
            <input class="form-control phone2"  type="text"  name="phone2">
        </div> 
         <div class="col-sm-6 form-group">
            <label>Email</label>
            <input class="form-control email"  required type="text"  name="email">
        </div> 
        <div class="col-sm-6 form-group">
            <label>Register No</label>
            <input class="form-control register"  required type="text"  name="register">
        </div> 
        <div class="col-sm-6 form-group">
            <label>Tin No</label>
            <input class="form-control tin"  required type="text"  name="tin">
        </div> 
        <div class="col-sm-6 form-group">
            <label>Balance</label>
            <input class="form-control balance"  required type="text"  name="balance">
        </div>
         <div class="col-sm-6 form-group">
            <label>Logo</label>
            <input class="form-control"   type="file"  name="image">
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
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">My Company Info</h5></div>   
        <div class="col-md-6">
                <button type="button" onclick= 'edit(1);' class="btn btn-success fa-pull-right" data-toggle="modal" data-target="#exampleModalCenter_edit" >
                    Edit Company      
            </button>
        </div>
    </div> 
    </div> 
    <div class="card-body">
      <div class="table-responsive">
       <table  class="table table-bordered table-hover">
           
          <tbody>
             <tr>
              <td>Company Name</td>
              <td>{{$comapny->name}}</td>
             </tr>
             <tr>
                <td>Owner Name</td>
                <td>{{$comapny->owner}}</td>
               </tr>
              <tr>
              <td>Address</td>
              <td>{{$comapny->address}}</td>
             </tr>
              <tr>
              <td>Phone-1</td>
              <td>{{$comapny->phone1}}</td>
             </tr>
             <tr>
              <td>Phone-2</td>
              <td>{{$comapny->phone2}}</td>
             </tr>
             <tr>
              <td>Email</td>
              <td>{{$comapny->email}}</td>
             </tr>
             <tr>
              <td>Register</td>
              <td>{{$comapny->register}}</td>
             </tr>
             <tr>
                <td>Tin</td>
                <td>{{$comapny->tin}}</td>
               </tr>
               <tr>
                <td>Balance</td>
                <td>{{$comapny->balance}} Tk.</td>
               </tr>
             <tr>
              <td colspan="2">
             <img src="{{ asset($comapny->image) }}" alt="{{ $comapny->name }}" height="250" width="250" >
              
              </td>
             </tr>
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
              url:"{{url('admin/company/edit')}}/"+x,
              success:function(response){
                  console.log(response);
                  $('.name').val(response.name);
                  $('.address').val(response.address);
                  $('.phone1').val(response.phone1);
                  $('.phone2').val(response.phone2);
                  $('.email').val(response.email);
                  $('.register').val(response.register);
                  $('.owner').val(response.owner);
                  $('.tin').val(response.tin);
                  $('.balance').val(response.balance);
                  $('.cId').val(response.id);
           
              },
              error:function(xhr,status,error){
                  console.log(error);
                  
              }
  
          });
      }
   
          
  </script>

@endsection