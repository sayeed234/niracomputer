@extends('admin.master')
@section('title')
 @php $world=DB::table('companies')->first(); @endphp
Stock Update || {{$world->name}}
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
    <form enctype="multipart/form-data" action="{{url('admin/stock_store')}}" method="post">
      @csrf
        <div class="modal-body">
            <div class="row">     
                <div class="col-sm-9 form-group">
                    <label>Product</label>
                <select name="product" required class="form-control select2bs4" style="width: 100%;">
                    <option value="">Select Product</option>
                    @foreach($product as $mem)
                    <option value="{{$mem->id}}">{{$mem->name}}={{$mem->code}}</option>
                    @endforeach
                    </select>
                </div>
            <div class="col-sm-3 form-group">
                <label>QTY</label>
                <input class="form-control" placeholder="20"  required min="0" type="number"  name="qty">
            </div>
            <div class="col-sm-12 form-group">
                <label>Supplier Name</label>
                <input class="form-control" placeholder="RFL "  required  type="text"  name="supplier">
            </div>
            <div class="col-sm-12 form-group">
                <label>Invoice</label>
                <input class="form-control" placeholder="4554"  required  type="text"  name="invoice">
            </div>
            <div class="col-sm-12 form-group">
                <label>Total Amount</label>
                <input class="form-control" placeholder="2000"  required min="0"  type="number"  name="amount">
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
          <form enctype="multipart/form-data" action="{{url('admin/stock_update')}}" method="post" >
            @csrf
        <div class="modal-body">
            <div class="row">           
                <div class="col-sm-9 form-group">
                    <label>Product</label>
                <select name="product" required class="form-control select2bs4 product" style="width: 100%;">
                    <option value="">Select Product</option>
                    @foreach($product2 as $mem)
                    <option value="{{$mem->id}}">{{$mem->name}}={{$mem->code}}</option>
                    @endforeach
                    </select>
                    <input class="cId" type="hidden" name="id" id="id">
                    <input class="qty" type="hidden" name="pastqty" id="qty">

                </div>
               <div class="col-sm-3 form-group">
                <label>QTY</label>
                <input class="form-control qty" placeholder="20"  required min="0" type="number"  name="qty">
               </div>
               <div class="col-sm-12 form-group">
                <label>Supplier Name</label>
                <input class="form-control supplier" placeholder="RFL "  required  type="text"  name="supplier">
               </div>
               <div class="col-sm-12 form-group">
                <label>Invoice</label>
                <input class="form-control invoice" placeholder="4554"  required  type="text"  name="invoice">
              </div>
              <div class="col-sm-12 form-group">
                <label>Total Amount</label>
                <input class="form-control amount" placeholder="2000"  required min="0"  type="number"  name="amount">
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
            <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Stock Update List</h5></div>   
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
                  <th>Name</th>
                  <th>QTY</th>
                  <th>Amount</th>
                  <th>Supplier</th>
                  <th>Invoice</th>
                  <th>Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                  @php $k=1; @endphp
              @foreach($stock as $blog)
             <tr>
              <td>{{$k++}}</td>
              <td>{{$blog->name}} ({{$blog->code}} )</td>            
              <td><b>{{$blog->qty}}</b></td>
              <td><b>{{$blog->amount}} Tk.</b></td>
              <td>{{$blog->supplier}} </td>
              <td>{{$blog->invoice}} </td>
              <td>{{ date('d-M-Y', strtotime($blog->created_at)) }}</td>              
              <td> <div class="dropdown show">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>    
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="" onclick= 'edit({{$blog->id}});' data-toggle="modal" id="edit" 
                            data-target="#exampleModalCenter_edit"> Edit</a>                   
                       <a  class="dropdown-item"  href="{{url('admin/stock_delete/'.$blog->id)}}" onclick='return confirm("Confirm Delete ??")' >Delete</a>
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
                  url:"{{url('/admin/stock_edit')}}/"+x,
                  success:function(response){
                      console.log(response);
                      $('.product').val(response.product);        
                      $('.amount').val(response.amount);                
                      $('.qty').val(response.qty);                
                      $('.supplier').val(response.supplier);                
                      $('.invoice').val(response.invoice);                              
                      $('.cId').val(response.id);
               
                  },
                      
              });
          }
      
      </script>
      @endsection