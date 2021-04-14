@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Peoduct Sale || {{$world->name}}
@endsection
@section('content')
<div class="page-content fade-in-up">
    <div class="col-md-12">
            <div class="ibox">                  
                <div class="ibox-body">
                    <div class="row">
                  <div class="table-responsive">
                    <table class="table">
                    <thead>
                    <tr class="btn-info">
                        <th scope="col"># </th>
                        <th scope="col" >Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Update</th>
                        <th scope="col">Total</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                    <?php $subtotal=0; ?>
                    <?php $total=0; ?>
                    @foreach($cartProduct as $cartProduct)
                    <tr>
                        <th scope="row">{{$i++}}</th>
                        <td><b>{{$cartProduct->name}}</b><br>
                        </td>
    
                        <form action="{{url('/cartupdate')}}">
                              @csrf
                        <td><input type="text"  name="price" value="{{$cartProduct->price}}"style="width:75px;" /></td>                                               
                        <?php
                        $stock=DB::table('products')
                              ->where('id',$cartProduct->id)
                              ->first();  
                             // dd($cartProduct->id);                                  
                        ?>
    
                      <td> <input type="number" max="{{$stock->qty}}" min="1"  name="qty" value="{{$cartProduct->qty}}"style="width:75px;" /></td>
    
                    <input type="hidden" name="rowId" value="{{$cartProduct->rowId}}" />                           
                  <td><button class="btn btn-success btn-sm" type="submit" name="btn">Update</button> </td>
                          </form>
    
                        <td>{{$total=$cartProduct->price*$cartProduct->qty}} TK.</td>
                        <td><a href="{{ url('/deletecart',['rowId'=>$cartProduct->rowId]) }}" onclick="return confirm('Confirm Remove This Product ?');" class="btn btn-danger btn-sm">Remove</a></td>
                    </tr>
                    <?php $subtotal=$subtotal+$total ?>
    
                    @endforeach
                    <tr>
                        <td colspan="5" class="text-right"><b>Subtotal = </b></td>
                        <td colspan="3" class="text-left"><b>{{$subtotal}} TK.</b></td>
                    <?php 
                      Session::put('subtotal',$subtotal);
                      ?>
                    </tr>
                    </tbody>
                    </table>
                    </div>
                </div>
              </div>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3"><a href="{{url('sale')}}"><button class="btn btn-info btn-sm">Product List</button></a></div>
        <div class="col-md-3"><a href="{{url('destroy')}}"><button class="btn btn-danger btn-sm">All Clear Cart</button></a></div>
        <div class="col-md-3"></div>
    </div>
    <hr>
    <div class="page-content fade-in-up">
            <div class="col-md-12">
            <div class="col-md-12 text-center">
            <h5><b>Customer Information</b></h5>
            </div>
     <div id="accordion">
      <div class="card">
        <div class="card-header " id="headingOne" data-toggle="collapse" data-target="#collapseOne">
          <h5 class="mb-0">
            <button class="btn btn-link "  aria-expanded="true" aria-controls="collapseOne">
              <b>Regular Sale</b> 
            </button>
          </h5>
        </div>
    
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
          <div class="card-body">
              <div class="ibox-body">
                        <form method="POST" action="{{route('order')}} ">
                        @csrf
                    <div class="row">
                        <div class="col-sm-4 form-group">
                            <label>Customer Name</label>
                            <input class="form-control " type="text" required  name="name" placeholder="Full Name">
                            <input type="hidden" name="sale" value="1">
                        </div> 
                        <div class="col-sm-4 form-group">
                            <label>Mobile No.</label>
                            <input class="form-control" type="number" name="mobile" required  placeholder="+880">
                        </div>
                        <div class="col-sm-4 form-group">
                            <label>Address</label>
                            <input class="form-control" type="text" name="address" required  placeholder="Present Address">
                        </div> 
                        <hr> 
                          <div class="col-sm-3 form-group">
                            <label>Subtotal</label>
                            <input class="form-control" type="text" name="subtotal" value="{{$subtotal}}" readonly >
                        </div> 
                          <div class="col-sm-3 form-group">
                            <label>Payment</label>
                            <input class="form-control" required type="number" max="{{$subtotal}}" min="0" value="0" name="payment"   >
                        </div> 
                        <div class="col-sm-6 form-group text-center">
                        <br> 
                       <button class="btn btn-info"  type="submit">Confirm Sale</button>             
                            </div>
                            </div>
                        </form>
                </div>
          </div>
        </div>
      </div>
         </div>
         </div>
        </div>
@endsection