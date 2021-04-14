<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin\Company;
class OutletController extends Controller
{
    public function outlet(){
        $result=User::orderBy('id','DESC')->where('id','>',1)->get();
        return view('admin.user.user',compact('result'));
    }

    public function user_store(Request $request) {
        $check=User::where('email',$request->email)->first();
         if($check){
            return redirect()->back()->with('danger','User Email Already Existing ');
         }
            $image=$request->file('image');
			$name=$image->getClientOriginalName();
			$uploadPath='public/image/user/';
			$image->move($uploadPath,$name);
			$imageUrl=$uploadPath.$name;

		 $this->imageExist($request,$imageUrl);
		 return redirect()->back()->with('success','User Created Succesfully ');
	  } 
	  private function imageExist($request,$imageUrl) {
                $store=new User();
                $store->name=$request->name;
                $store->mobile=$request->mobile;
                $store->status=$request->status;
                $store->email=$request->email;
                $store->com=0;
                $store->sale=0;
                $store->loan=0;
                $store->address=$request->address;
                $store->profile_photo_path=$imageUrl;
                $store->password=bcrypt($request->password);
                $store->save(); 
		
	  }
      public function user_edit($id){
                $data=User::find($id);
                return $data;
      }
      public function user_delete($id){
        $data=User::find($id);
        $data->delete();
        return redirect()->back()->with('danger','User Deleted Succesfully ');
}
        public function user_update(Request $request) {
          //  dd($request->all());
            $data=User::find($request->id);
            $image=$request->file('image');
        if($image){
            $name=$image->getClientOriginalName();
            $uploadPath='public/image/user/';
            $image->move($uploadPath,$name);
            $imageUrl=$uploadPath.$name;
        }else{
            $imageUrl=$data->profile_photo_path;
        }
            
        $this->imageExists($request,$imageUrl);
        return redirect()->back()->with('info','User Updated Succesfully ');
        } 
    private function imageExists($request,$imageUrl) {
            $store=User::find($request->id);
            $store->name=$request->name;
            $store->mobile=$request->mobile;
            $store->status=$request->status;
            $store->email=$request->email;
            $store->com=$request->com;
            $store->sale=$request->sale;
            $store->loan=$request->loan;
            $store->address=$request->address;
            $store->profile_photo_path=$imageUrl;
            if($request->password){
            $store->password=bcrypt($request->password);
            }            
            $store->save(); 

    }
}
