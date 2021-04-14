<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Service;
use Auth;

class ServiceController extends Controller
{
   public function service_list(){
       $result=Service::orderBy('id','DESC')->get();
       return view('admin.service.service',compact('result'));
   }
   public function service_store(Request $request){
                   $store=new Service();
                   $store->service=$request->service;
                   $store->com=$request->com;
                   $store->servicecode=$request->servicecode;
                   $store->save();
    return redirect()->back()->with('success','New Service Added');
   }
        public function service_delete($id){
                $data=Service::find($id);
                $data->delete();
            return redirect()->back()->with('danger','Service Deleted');
        }
        public function service_edit($id){
            $data=Service::find($id);
            return $data;
        }
   public function service_update(Request $request){
            $store=Service::find($request->id);
            $store->com=$request->com;
            $store->service=$request->service;
            $store->save();
return redirect()->back()->with('info','Service Updated');
}
}
     