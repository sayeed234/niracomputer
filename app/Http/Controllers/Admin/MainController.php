<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\Expense;
use App\Models\Admin\Company;
use App\Models\Admin\Service;
use App\Models\Shop\ServiceSale;
use App\Models\Shop\Customer;
use App\Models\Shop\OrderDetails;
use App\Models\Shop\ProductSale;
use App\Models\Shop\Loan;
use App\Models\Admin\Product;
use App\Models\User;
use Auth;
use DB;
use DateTime;

class MainController extends Controller
{
    public function pending_expense(){
        $expense=DB::table('expenses')
                ->join('users','users.id','=','expenses.user')
                ->select('expenses.*','users.name','users.mobile')
                ->where('expenses.status',0)
                ->get();
        return view('admin.expense.pending',compact('expense'));
    }
    public function approved_expense($id){
        $data=Expense::find($id);
        $data->status=1;
        $data->save();
        return redirect()->back()->with('warning','Approved This Expense');
        
    }
    public function pendings_expense($id){
        $data=Expense::find($id);
        $data->status=0;
        $data->save();
        return redirect()->back()->with('success','Again Pending This Expense');
        
    }
    public function all_expense(){
        $expense=DB::table('expenses')
                ->join('users','users.id','=','expenses.user')
                ->select('expenses.*','users.name','users.mobile')
                ->where('expenses.status',1)
                ->get();
        return view('admin.expense.all',compact('expense'));
    }
    public function expense_report(Request $request){
        $company=Company::first();
        $fromDate=0;
        $kaka='All';

        if($request->type && $request->fromDate){
            $expense=DB::table('expenses')
                  ->whereDate('created_at', '>=', $request->fromDate)
                  ->whereDate('created_at', '<=', $request->toDate)
                  ->select('created_at',DB::raw('SUM(amount) as amount'))
                  ->where('type',$request->type)
                  ->where('status',1)
                  ->groupBy('created_at')
                  ->orderBy('created_at','DESC')
                  ->get();
                  $fromDate=$request->fromDate;
                  $kaka=$request->type;
        }else{
            $expense=DB::table('expenses')
                ->select('created_at',DB::raw('SUM(amount) as amount'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->where('status',1)
                ->limit(500)
                ->get();
        }
        return view('admin.expense.report',compact('company','fromDate','expense','kaka'));
    }
    //---------------------------------Sale Management----------------------------------------------------------

    public function todaysale(Request $request){
           $company=Company::first();
           $date = new DateTime("now");
           $product='';
           $service='';
           if($request->type==1){
            $service=DB::table('service_sales')
                    ->join('users','users.id','=','service_sales.user')
                    ->join('services','services.id','=','service_sales.service')
                    ->select('service_sales.*','users.name','users.mobile','services.service')
                    ->whereDate('service_sales.created_at', '=', $date)
                    ->orderBy('created_at','DESC')
                    ->get();                    
           }else{
            $product=DB::table('product_sales')
                    ->join('users','users.id','=','product_sales.user')
                    ->select('product_sales.*','users.name','users.mobile')
                    ->whereDate('product_sales.created_at', '=', $date)
                    ->orderBy('created_at','DESC')
                    ->get();

           }

        return view('admin.sale.todaysale',compact('company','service','product'));
    }
    public function pending(Request $request){
        $company=Company::first();
        $date = new DateTime("now");
        $product='';
        $service='';
        if($request->type==1){
         $service=DB::table('service_sales')
                 ->join('users','users.id','=','service_sales.user')
                 ->join('services','services.id','=','service_sales.service')
                 ->select('service_sales.*','users.name','users.mobile','services.service')
                 ->where('service_sales.due','>',0)
                 ->orderBy('created_at','DESC')
                 ->get();                    
        }else{
         $product=DB::table('product_sales')
                 ->join('users','users.id','=','product_sales.user')
                 ->select('product_sales.*','users.name','users.mobile')
                 ->where('product_sales.due','>',0)
                 ->orderBy('created_at','DESC')
                 ->get();
        }

     return view('admin.sale.pending',compact('company','service','product'));
 }

        public function saleview($id){
            $data=DB::table('product_sales')
                    ->join('customers','customers.id','=','product_sales.customer')
                    ->select('product_sales.*','customers.name','customers.mobile','customers.address')
                    ->where('product_sales.id',$id)
                    ->first();

            $details=DB::table('order_details')
                    ->where('order',$id)
                    ->get();
                return view('admin.sale.view',compact('data','details'));
        }

        public function alltimesale(Request $request){
            $company=Company::first();
            $date = new DateTime("now");
            $product='';
            $service='';
            if($request->type==1){
             $service=DB::table('service_sales')
                     ->join('users','users.id','=','service_sales.user')
                     ->join('services','services.id','=','service_sales.service')
                     ->select('service_sales.*','users.name','users.mobile','services.service')
                     ->orderBy('created_at','DESC')
                     ->get();                    
            }else{
             $product=DB::table('product_sales')
                     ->join('users','users.id','=','product_sales.user')
                     ->select('product_sales.*','users.name','users.mobile')
                     ->orderBy('created_at','DESC')
                     ->get();
            }
    
         return view('admin.sale.alltimesale',compact('company','service','product'));
     }

     public function userwise(Request $request){
        $company=Company::first();
        $user=User::where('status',1)->where('type',2)->get();
        $userinfo=User::find($request->user);
        $fromDate=0;
        $product='';
        $service='';
        if($request->type==1){
         $service=DB::table('service_sales')
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at',DB::raw('SUM(com) as com'),DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(due) as due'))
                ->where('service_sales.user',$request->user)
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get(); 
                $fromDate=$request->fromDate;             
        }elseif($request->type==2){
         $product=DB::table('product_sales')
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at',DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(due) as due'))
                ->where('product_sales.user',$request->user)
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get();
                $fromDate=$request->fromDate;             
        }

     return view('admin.sale.userwise',compact('company','service','product','fromDate','user','userinfo'));
 }
    public function datewise(Request $request){
        $company=Company::first();
        $fromDate=0;
        $product='';
        $service='';
        if($request->type==1){
        $service=DB::table('service_sales')
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at',DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(due) as due'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get(); 
                $fromDate=$request->fromDate;             
        }elseif($request->type==2){
        $product=DB::table('product_sales')
                ->whereDate('created_at', '>=', $request->fromDate)
                ->whereDate('created_at', '<=', $request->toDate)
                ->select('created_at',DB::raw('SUM(total) as total'),DB::raw('SUM(payment) as payment'),DB::raw('SUM(due) as due'))
                ->groupBy('created_at')
                ->orderBy('created_at','DESC')
                ->get();
                $fromDate=$request->fromDate;             
        }

    return view('admin.sale.datewise',compact('company','service','product','fromDate'));
    }

    public function productwise(Request $request){
        $company=Company::first();
        $fromDate=0;
        $product='';
        if($request->fromDate){
            $product=DB::table('order_details')
                    ->whereDate('created_at', '>=', $request->fromDate)
                   ->whereDate('created_at', '<=', $request->toDate)
                    ->select('name',DB::raw('SUM(qty) as qty'),DB::raw('SUM(total) as total'))
                    ->groupBy('name')
                    ->get();
                $fromDate=$request->fromDate;             
        }else{
         $product=DB::table('order_details')
                ->select('name',DB::raw('SUM(qty) as qty'),DB::raw('SUM(total) as total'))
                ->groupBy('name')
                ->get();
                         
        }
    
     return view('admin.sale.productwise',compact('company','product','fromDate'));
    }

    public function summary(Request $request){
            $fromDate=0;
            if($request->fromDate){
              $productsale=DB::table('product_sales')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select(DB::raw('SUM(payment) as amount'))
                    ->first();
              $servicesale=DB::table('service_sales')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select(DB::raw('SUM(payment) as amount'))
                    ->first();
              $expense=DB::table('expenses')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select(DB::raw('SUM(amount) as amount'))
                    ->first();
              $due=DB::table('due_receives')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select(DB::raw('SUM(amount) as amount'))
                    ->first(); 
              $purchase=DB::table('stocks')
                    ->whereDate('created_at', '>=', $request->fromDate)
                    ->whereDate('created_at', '<=', $request->toDate)
                    ->select(DB::raw('SUM(amount) as amount'))
                    ->first(); 
            }else{
                $date = new DateTime("now");

          $productsale=DB::table('product_sales')
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(payment) as amount'))
                ->first();
           $servicesale=DB::table('service_sales')
                 ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(payment) as amount'))
                ->first();
          $expense=DB::table('expenses')
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(amount) as amount'))
                ->first();
          $due=DB::table('due_receives')
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(amount) as amount'))
                ->first(); 
          $purchase=DB::table('stocks')
                ->whereDate('created_at', '=', $date)
                ->select(DB::raw('SUM(amount) as amount'))
                ->first(); 
            }

        return view('admin.page.summary',compact('fromDate','purchase','due','expense','servicesale','productsale'));
    }
    //Loan-----------------------------------------------------------------------------------------------------------------------
    public function loan(){
        $data=Loan::orderBy('id','DESC')->get();

        return view('admin.page.loan',compact('data'));
    }
    public function loan_store (Request $request){
        $loan=new Loan();
        $loan->user=Auth::user()->id;
        $loan->name=$request->name;
        $loan->mobile=$request->mobile;
        $loan->address=$request->address;
        $loan->amount=$request->amount;
        $loan->save();
    return redirect()->back()->with('success','Loan Created Successfully');
    }
    public function loan_edit($id){
        $data=Loan::find($id);
        return $data;
    }
    public function loan_delete($id){
        $data=Loan::find($id);
        $data->delete();
    return redirect()->back()->with('danger','Loan Delete Successfully');

    }
    public function loan_update(Request $request){
        $loan=Loan::find($request->id);
        $loan->user=Auth::user()->id;
        $loan->name=$request->name;
        $loan->mobile=$request->mobile;
        $loan->address=$request->address;
        $loan->amount=$request->amount;
        $loan->save();
    return redirect()->back()->with('info','Loan Update Successfully');
    }
}
