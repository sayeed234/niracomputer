@extends('shop.master')
@section('title')
@php $world=DB::table('companies')->first(); @endphp
Peoduct Sale || {{$world->name}}
@endsection
@section('content')
<div class="card shadow">
    <div class="card-header ">
    <div class="row">
        <div class="col-md-6"><h5 class="m-0 font-weight-bold ">Our Products</h5></div>  
        <div class="col-md-6"> 
            @if(Cart::count()==0)
            @else
              <a href="{{url('/cart_show')}}"> <button class="btn btn-outline-success">Checkout</button></a>
            @endif
    </div> 
    </div> 
    <div class="card-body">
        <div class="row">
@foreach($product as $product)
            <div class="col-md-4 col-lg-4 col-12 col-xl-2 col-sm-4">
            <div class="card" >
            <img class="card-img-top" src="{{ asset($product->image) }}" height="200px" alt="{{$product->name}}">
            <form action="{{url('cart')}}" method="post" >
                @csrf
            <div class="card-body">
               <h6><b>{{$product->name}}</b></h6>
               <h6>Price: {{$product->price}} Tk ( {{$product->qty}} )</h6>
               <input type="hidden" name="id" value="{{$product->id }}"/>
               <input type="hidden" name="qty" value="1"/>
               @if($product->qty>0)
               <button type="submit" class="btn btn-primary btn-sm btn-block">Add To Cart</button>
               @else
               <button type="button" class="btn btn-danger btn-sm btn-block">Stock Out</button>
               @endif
            </div>
        </form>
          </div>
    </div>
@endforeach

    </div>
</div>
  </div>
@endsection