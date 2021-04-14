<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\Expense;
use App\Models\Admin\Company;
use App\Models\Admin\Service;
use App\Models\Shop\Loan;
use App\Models\Shop\Customer;
use App\Models\Shop\OrderDetails;
use App\Models\Shop\ProductSale;
use App\Models\Admin\Stock;
use App\Models\Admin\Product;
use App\Models\User;
use Auth;
use DB;
use DateTime;
use Cache;

class DashboardController extends Controller
{
    public function index(){
    $date = new DateTime("now");

    $userphoto=User::where('status',1)->where('type',2)->get();
    $user=User::where('status',1)->where('type',2)->get();
     $latestorder=DB::table('product_sales')
            ->join('customers','customers.id','=','product_sales.customer')
            ->select('product_sales.*','customers.name')
            ->orderBy('created_at','DESC')
            ->limit(12)
            ->get();
     $recentsale=DB::table('order_details')->orderBy('created_at','DESC')->limit(12)->get();   

     $todayss=DB::table('service_sales')
                 ->whereDate('created_at', '=', $date)
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                 ->first();
     $todayps=DB::table('product_sales')
                 ->whereDate('created_at', '=', $date)
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                 ->first();
    $allss=DB::table('service_sales')
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                 ->first();
     $allps=DB::table('product_sales')
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                 ->first();

     $productsale=DB::table('product_sales')
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as amount'))
                 ->first();
    $servicesale=DB::table('service_sales')
                 ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as amount'))
                 ->first();
    $expense=DB::table('expenses')
                 ->select(DB::raw('SUM(amount) as amount'))
                 ->first();
    $due=DB::table('due_receives')
                 ->select(DB::raw('SUM(amount) as amount'))
                 ->first(); 
    $purchase=DB::table('stocks')
                 ->select(DB::raw('SUM(amount) as amount'))
                 ->first(); 

     $stock=Product::select(DB::raw('SUM(qty) as qty'))->first();
     $sale=ProductSale::select(DB::raw('SUM(qty) as qty'))->first();
     $purchase=Stock::select(DB::raw('SUM(amount) as amount'))->first();
    $customer=Customer::count();
    $totalproduct=Product::count();
    $salesc=DB::table('service_sales')->count();
    $salepc=DB::table('product_sales')->count();
    $loan=Loan::select(DB::raw('SUM(amount) as amount'))->first();


        return view('admin.dashboard',compact('userphoto','latestorder','recentsale','todayss','todayps','allss','allps','stock','sale','purchase','user','purchase','due','expense','servicesale','productsale','customer','totalproduct','salesc','salepc','loan'));
    }

    public function customer(){
        $data=Customer::orderBy('id','DESC')->get();
        return view('admin.company.customer',compact('data'));
    }
}
