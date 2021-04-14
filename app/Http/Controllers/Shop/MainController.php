<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use App\Models\Shop\ServiceSale;
use App\Models\Shop\Customer;
use App\Models\Shop\Expense;
use App\Models\Shop\OrderDetails;
use App\Models\Shop\ProductSale;
use App\Models\Shop\DueReceive;
use App\Models\Admin\Product;
use App\Models\Admin\Company;
use Auth;
use DB;
use DateTime;
use Cart;
use Session;



use Illuminate\Support\Facades\Redis;

class MainController extends Controller
{

    //=================================My Work===========================================
    public function mywork(){
        $service=Service::all();
        $service2=Service::all();
        $date = new DateTime("now");  
        $sale=DB::table('service_sales')
            ->join('services','services.id','=','service_sales.service')
            ->where('user',Auth::user()->id)
            ->select('service_sales.*','services.service','services.servicecode')
            ->whereDate('service_sales.created_at', '=', $date)
            ->orderBy('service_sales.created_at','DESC')
            ->get();
            //dd($sale);
        return view('shop.mywork.mywork',compact('service','service2','sale'));
    }
    public function mywork_store(Request $request){
        $data=0;
        
          $check=Service::where('id',$request->service)->first();
          
        if($request->cusname && $request->cusmobile){
            $data=new Customer();
            $data->created=Auth::user()->id;
            $data->name=$request->cusname;
            $data->mobile=$request->cusmobile;
            $data->address=$request->cusaddress;
            $data->save();
         }
            $result=new ServiceSale();
            $result->user=Auth::user()->id;
            $result->service=$request->service;
            if($request->total){
                $result->total=$request->total;
            }else{
                $result->total=$request->payment;
            }
            $result->payment=$request->payment;
            $result->paidby=$request->paidby;
            if($request->total){
                $result->due=$request->total-$request->payment;
            }else{
                $result->due=$request->payment-$request->payment;
            }
            $result->status=$result->due;
            $result->com=($result->payment*$check->com)/100;
            if(!$data==0){
            $result->customer=$data->id;
            }
            $result->save();                 
            return redirect()->back()->with('success','Service Sale Successfully');
    
    }

    public function mywork_edit($id){
        $data=ServiceSale::find($id);
           return $data;
    }
    public function mywork_delete($id){
        $data=ServiceSale::find($id);
           $data->delete();
           return redirect()->back()->with('danger','Service Sale Deleted Successfully');
    }

    public function mywork_update(Request $request){

        $check=Service::where('id',$request->service)->first();
        
            $result=ServiceSale::find($request->id);
            $result->user=Auth::user()->id;
            $result->service=$request->service;
            if($request->total){
                $result->total=$request->total;
            }else{
                $result->total=$request->payment;
            }
            $result->payment=$request->payment;
            $result->paidby=$request->paidby;
            if($request->total){
                $result->due=$request->total-$request->payment;
            }else{
                $result->due=$request->payment-$request->payment;
            }
            $result->status=$result->due;
            $result->com=($result->payment*$check->com)/100;
            $result->save();
                 
            return redirect()->back()->with('info','Service Sale Updated Successfully');
    }
    //============================================Expense==================================================================
         public function expense(){
             $expense=Expense::orderBy('id','DESC')->where('user',Auth::user()->id)->get();
             return view('shop.expense.expense',compact('expense'));
         }

         public function expense_store(Request $request){
                  $expense=new Expense();
                  $expense->user=Auth::user()->id;
                  $expense->type=$request->type;
                  $expense->purpose=$request->purpose;
                  $expense->note=$request->note;
                  $expense->amount=$request->amount;
                  $expense->status=0;
                  $expense->save();
            return redirect()->back()->with('success','Expense Successfully');

         }
         public function expense_edit($id){
             $data=Expense::find($id);
             return $data;
         }
         public function expense_delete($id){
            $data=Expense::find($id);
            $data->delete();
            return redirect()->back()->with('danger','Expense Deleted Successfully');
        }
         public function expense_update(Request $request){
            $expense=Expense::find($request->id);
            $expense->user=Auth::user()->id;
            $expense->type=$request->type;
            $expense->purpose=$request->purpose;
            $expense->note=$request->note;
            $expense->amount=$request->amount;
            $expense->status=0;
            $expense->save();
      return redirect()->back()->with('info','Expense Updated Successfully');

   }

   //----------------------------------------Sale-------------------------------------------------
            public function sale(){
                $product=Product::all();
                return view('shop.sale.sale',compact('product'));
            }
            public function cart(Request $request){
                $products=Product::find($request->id);
                Cart::add([
                    'id'=>$request->id,
                    'qty'=>$request->qty,
                    'name'=>$products->name,
                    'price'=>$products->price,
                    'weight'=>1,
                    
                ]);
                return redirect()->back()->with('success','Product Added Successfully');  
            }
            public function cart_show(){
                    if(Cart::count()==0){
                        return redirect('/sale');
                    }else{
                        $cartProduct=Cart::content(); 
                        return view('shop.sale.cartshow',compact('cartProduct'));
                }
                
            }

            public function cartshow_delete($id){
                $cart = Cart::content()->where('rowId',$id);
                if($cart->isNotEmpty()){
                    Cart::remove($id);
                }
            return redirect()->back()->with('danger','Cart Product Removed');
            }



                public function cartshow_update(Request $request){
                    Cart::update($request->rowId, [
                        'qty' => $request->qty,
                        'price'=> $request->price
                    ]);
                    return redirect()->back()->with('info','Cart Updated Successfully');
                }
                public function destroy(){
                    Cart::destroy();
                    return redirect('/sale');
                }

                public function order(Request $request){
                    $m=rand(00000,99999);
                    $cartProducts= Cart::content();

                    $customer=new Customer();
                    $customer->created=Auth::user()->id;
                    $customer->name=$request->name;
                    $customer->mobile=$request->mobile;
                    $customer->address=$request->address;                    
                  
                    if($customer->save()){
                        $order=new ProductSale();
                        $order->user=Auth::user()->id;
                        $order->customer=$customer->id;
                        $order->orderid=$m;
                        $order->qty=Cart::count();
                        $order->total=$request->subtotal;
                        $order->payment=$request->payment;
                        $order->due=($request->subtotal-$request->payment);
                        $order->status=($request->subtotal-$request->payment);
                        $order->save();
                        }
                    foreach($cartProducts as $cartProduct){
                        $orderdetails=new OrderDetails();
                        $orderdetails->customer=$customer->id;
                        $orderdetails->order=$order->id;
                        $orderdetails->name=$cartProduct->name;
                        $orderdetails->qty=$cartProduct->qty;
                        $orderdetails->price=$cartProduct->price;
                        $orderdetails->total=($cartProduct->qty*$cartProduct->price);

                        if($orderdetails->save()){
                        $stock=Product::where('id',$cartProduct->id)->first();
                        $stock->qty=$stock->qty-$cartProduct->qty;
                        $stock->save();
                            }
                                                    
                        }
                        Session::put('order_id',$order->id);
                        Cart::destroy();
                        return redirect('/sale/invoice');
                }
              
                public function invoice(){
                    $company=Company::first();
                    $order=ProductSale::find(Session::get('order_id'));                    
                    $customer=Customer::find($order->customer);                  
                    $orderdetails=DB::table('order_details')
                        ->where('order',$order->id)
                        ->get(); 
             
                    return view('shop.sale.invoice',compact('order','customer','orderdetails','company'));
                }
              
                //Sale List------------------------------------------------------------------------------

                public function sale_list(){
                    $data=DB::table('product_sales')
                            ->join('customers','customers.id','=','product_sales.customer')
                            ->select('product_sales.*','customers.name','customers.mobile')
                            ->where('user',Auth::user()->id)
                            ->get();
                    return view('shop.sale.salelist',compact('data'));
                }
                public function salelist_view($id){
                        $company=Company::first();
                        $data=DB::table('product_sales')
                                    ->join('customers','customers.id','=','product_sales.customer')
                                    ->select('product_sales.*','customers.name','customers.mobile','customers.address')
                                    ->where('product_sales.id',$id)
                                    ->first();
                         $customer=Customer::find($data->customer);  
                           $details=DB::table('order_details')
                                   ->where('order',$id)
                                   ->get();
                                   return view('shop.sale.view',compact('data','details','customer','company'));
                }

                //Pending Sale------------------------------------------------------------------------

                public function pendings(){
                        $data=DB::table('service_sales')
                             ->join('customers','customers.id','=','service_sales.customer')
                             ->join('services','services.id','=','service_sales.service')
                             ->select('service_sales.*','customers.name','customers.mobile','services.service')
                             ->where('user',Auth::user()->id)
                             ->where('status','>', 0)
                             ->get();
                             //dd($data);
                    return view('shop.sale.pendings',compact('data'));
                }
              public function pendings_update(Request $request){                          
                    
                          $service=ServiceSale::find($request->id);
                          if(($service->payment+$request->payment) <= $service->total){                
                          $service->payment=$service->payment+$request->payment;
                          $service->due=$service->due-$request->payment;
                          $service->status=$service->status-$request->payment;
                          $service->paidby=$request->paidby;
                         if($service->save()) {
                          $due=new DueReceive();
                          $due->user=Auth::user()->id;
                          $due->amount=$request->payment;
                          $due->free=$service->id;
                          $due->save();
                         }
                         
                return redirect()->back()->with('success','Payment Added Successfully');
                        }else{

                            return redirect()->back()->with('danger','Invalid Payment Amount');
                        }
              }

                public function pendingp(){
                    $data=DB::table('product_sales')
                            ->join('customers','customers.id','=','product_sales.customer')
                            ->select('product_sales.*','customers.name','customers.mobile')
                            ->where('user',Auth::user()->id)
                            ->where('due','>',0)
                            ->get();
                           // dd($data);
                    return view('shop.sale.pendingp',compact('data'));
                }
                public function productsale_edit($id){
                    $data=ProductSale::find($id);
                    return $data;
                }
                public function pendingp_update(Request $request){

                        $sale=ProductSale::find($request->id);
                        if(($sale->payment+$request->payment) <= $sale->total){  
                        $sale->payment=$sale->payment+$request->payment;
                        $sale->due=$sale->due-$request->payment;
                        $sale->status=$sale->status-$request->payment;

                        if($sale->save()) {
                            $due=new DueReceive();
                            $due->user=Auth::user()->id;
                            $due->amount=$request->payment;
                            $due->free=$sale->id;
                            $due->save();
                           }
                return redirect()->back()->with('success','Payment Added Successfully');
                        }else{

                            return redirect()->back()->with('danger','Invalid Payment Amount');
                        }
                  }
}   
