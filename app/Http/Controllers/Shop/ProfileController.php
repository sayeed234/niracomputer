<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Admin\Company;

use DB;

class ProfileController extends Controller
{
    public function index(){
        return view('shop.include.profile');
    }
    public function password(Request  $request){
        
        if(Hash::check($request->password,Auth::user()->password)){
               if($request->newpassword===$request->confirmpassword){
                      $user=User::find(Auth::user()->id);
                       $user->password=bcrypt($request->confirmpassword);
                       $user->save();
            return redirect()->back()->with('success','Successfully Change Password '); 
               }else{
                return redirect()->back()->with('danger','New Password And Confirm Password Never Match '); 
               }
        }else{
            return redirect()->back()->with('danger','Your Old Password Never Match '); 
        }
    } 

    public function report(Request $request){
        $company=Company::first();
        $fromDate=0;
        $data='All Service Sale';
        if($request->type==1){
        $result=DB::table('service_sales')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at' ,DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(com) as com'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get();
                $data='Service Sale';
                $fromDate=$request->fromDate;
        }elseif($request->type==2){
            $result=DB::table('product_sales')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at' ,DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get();
                $data='Product Sale';
                $fromDate=$request->fromDate;

        }elseif($request->type==3){
            $result=DB::table('expenses')
                ->where('user',Auth::user()->id)
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->where('status',1)
                ->select('created_at' ,DB::raw('SUM(amount) as total'),DB::raw('SUM(amount) as payment'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get();
                $data='All Expense';
                $fromDate=$request->fromDate;

        }else{
            $result=DB::table('service_sales')
                ->where('user',Auth::user()->id)
                ->select('created_at' ,DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(com) as com'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->limit(50)
                ->get();
        }
        return view('shop.report.report',compact('company','fromDate','result','data'));
    }
   
} 


