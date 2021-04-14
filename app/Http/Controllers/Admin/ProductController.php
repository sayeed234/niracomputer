<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Admin\Stock;
use App\Models\Admin\Company;
use Auth;
use DB;
use DateTime;

class ProductController extends Controller
{
    public function product(){
        $product=Product::orderBy('id','DESC')->get();
        return view('admin.product.product',compact('product'));
    }
    public function product_store(Request $request) {      
		   $image=$request->file('image');	  
			$name=$image->getClientOriginalName();
			$uploadPath='public/image/product/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;		  
	
		 $this->imageExistStatus($request,$imageUrl);
		 return redirect()->back()->with('success','New Product Added');
	  } 
	  private function imageExistStatus($request,$imageUrl) {	  
            $company=new Product();
            $company->name=$request->name;
            $company->code=$request->code;
            $company->qty=$request->qty;
            $company->price=$request->price;
            $company->image=$imageUrl;
            $company->save(); 
		
	  }
      public function product_update(Request $request) {    
          $check=Product::find($request->id);  
        $image=$request->file('image');	
        if($image){  
         $name=$image->getClientOriginalName();
         $uploadPath='public/image/product/';
         $image->move($uploadPath,$name);
         $imageUrl=$uploadPath.$name;		  
        }else{
         $imageUrl=$check->image;		  
        }
      $this->imag($request,$imageUrl);
      return redirect()->back()->with('info','Product Updated');
   } 
   private function imag($request,$imageUrl) {	  
         $company=Product::find($request->id);
         $company->name=$request->name;
         $company->price=$request->price;
         $company->image=$imageUrl;
         $company->save(); 
     
        }
        public function product_delete($id){
            $data=Product::find($id);
            $data->delete();
            return redirect()->back()->with('danger','Product Deleted');
        }
        public function product_edit($id){
            $data=Product::find($id);
            return $data;
        }
        public function stock(){
            $product=Product::all();
            $product2=Product::all();
            $stock=DB::table('stocks')->join('products','stocks.product','=','products.id')
                   ->select('stocks.*','products.name','products.code')
                   ->orderBy('id','DESC')
                   ->get();
            return view('admin.product.stock',compact('product','product2','stock'));
        }
        public function stock_store(Request $request){
              $store=new Stock();
              $store->product=$request->product;
              $store->qty=$request->qty;
              $store->supplier=$request->supplier;
              $store->invoice=$request->invoice;
              $store->amount=$request->amount;
              $store->save();

              $data=Product::where('id',$request->product)->first();
              $data->qty=$data->qty+$request->qty;
              $data->save();
            return redirect()->back()->with('success','Stock Product Update');

        }
        public function stock_edit($id){
            $data=Stock::find($id);
            return $data;
        }
        public function stock_delete($id){
            $data=Stock::find($id);
            $data->delete();
            return redirect()->back()->with('danger','Deleted Successfully');

        }
        public function stock_update(Request $request){
            $store=Stock::find($request->id);
            $store->product=$request->product;
            $store->qty=$request->qty;
            $store->supplier=$request->supplier;
            $store->invoice=$request->invoice;
            $store->amount=$request->amount;
            $store->save();

            $data=Product::where('id',$request->product)->first();
            $data->qty=($data->qty-$request->pastqty)+$request->qty;
            $data->save();
          return redirect()->back()->with('info','Stock  Update');

      }
      public function preport(Request $request){
                $company=Company::first();
                $fromDate=0;
                $date = new DateTime("now");  
                if($request->fromDate){
                $result=DB::table('stocks')
                      ->whereDate('created_at', '>=', $request->fromDate)
                      ->whereDate('created_at', '<=', $request->toDate)
                      ->select('created_at',DB::raw('SUM(amount) as amount'))
                      ->groupBy('created_at')
                      ->paginate(500);
                }else{
                    $result=DB::table('stocks')->whereDate('created_at', '=', $date)->paginate(100);
                }
        return view('admin.product.preport',compact('company','fromDate','result'));
      }
}
