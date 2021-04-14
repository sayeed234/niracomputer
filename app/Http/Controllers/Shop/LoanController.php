<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Shop\Loan;
use Auth;

class LoanController extends Controller
{
    public function loan(){
        $data=Loan::orderBy('id','DESC')->get();

        return view('shop.expense.loan',compact('data'));
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
