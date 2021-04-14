<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Auth;
use App\Models\User;
use App\Models\Admin\Company;

class ProfileController extends Controller
{
    public function index(){
        return view('admin.page.profile');
    }
    public function password(Request  $request){
        
               // dd($request->all());
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
    public function company(){
		$comapny=Company::first();
		return view('admin.company.company',compact('comapny'));

	}
	public function company_edit($id){
		$result=Company::find($id);
		return $result;
	}
	public function company_update(Request $request) {
      
		$companyById = Company::find( $request->id);
		$image=$request->file('image');
	  
		if ($image) {
			$name=$image->getClientOriginalName();
			$uploadPath='public/image/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;
		  
		} else {
			$imageUrl = $companyById->image;
		}
		 $this->imageExistStatus($request,$imageUrl);
		 return redirect()->back()->with('success','Update Your Company');
	  } 
	  private function imageExistStatus($request,$imageUrl) {
	  
		$company=Company::find($request->id);
		$company->name=$request->name;
		$company->phone1=$request->phone1;
		$company->phone2=$request->phone2;
		$company->address=$request->address;
		$company->email=$request->email;
		$company->owner=$request->owner;
		$company->tin=$request->tin;
		$company->balance=$request->balance;
		$company->register=$request->register;
		$company->image=$imageUrl;
		$company->save(); 
		
	  }
}
