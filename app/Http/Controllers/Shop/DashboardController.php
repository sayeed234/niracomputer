<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Admin\Company;
use App\Models\Admin\Service;
use App\Models\Shop\ServiceSale;
use App\Models\Shop\Customer;
use App\Models\Shop\Expense;
use App\Models\Shop\OrderDetails;
use App\Models\Shop\ProductSale;
use App\Models\Admin\Product;
use DB;
use DateTime;

class DashboardController extends Controller
{
    public function index(){
        $date = new DateTime("now");
    $tss=DB::table('service_sales')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();
    $tps=DB::table('product_sales')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();

    $tsss=DB::table('service_sales')
                ->where('user',Auth::user()->id)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();
                
   $tpss=DB::table('product_sales')
                ->where('user',Auth::user()->id)
                ->select(DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->first();
    $latestss=DB::table('service_sales')
                ->join('services','services.id','=','service_sales.service')
                ->select('service_sales.*','services.service','services.servicecode')
                ->where('user',Auth::user()->id)
                ->orderBy('created_at','DESC')
                ->limit(10)
                ->get();
   $latestps=DB::table('product_sales')
                ->join('customers','customers.id','=','product_sales.customer')
                ->select('product_sales.*','customers.name','customers.mobile')
                ->where('user',Auth::user()->id)
                ->orderBy('created_at','DESC')
                ->limit(10)
                ->get();

     $todayduer=DB::table('due_receives')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(amount) as total'))
                ->first(); 
     $totalduer=DB::table('due_receives')
                ->where('user',Auth::user()->id)
                ->select(DB::raw('SUM(amount) as total'))
                ->first();       

        return view('shop.dashboard',compact('tss','tps','tsss','tpss','latestss','latestps','todayduer','totalduer'));
    }
}
