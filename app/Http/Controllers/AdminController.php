<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if($request->session()->has('ADMIN_LOGIN')){
            return redirect('admin/dashboard');
        }else{
        return view('admin.login');
    }
}

    public function auth(Request $request)
    {
            $email =  $request->post('email');
            $password = $request->post('password');

           // $result = Admin::where(['email'=>$email,'password'=>$password])->get();
          
            $result = Admin::where(['email'=>$email])->first();

         if($result){

             if(Hash::check($password,$result->password)){
                $request->session()->put('ADMIN_LOGIN',true);
                $request->session()->put('ADMIN_ID',$result->id);

                if($request->remember===null){
                   
                   if(Cookie::has('admin_pass')){
                        Cookie::queue(Cookie::forget('admin_email'));
                        Cookie::queue(Cookie::forget('admin_pass'));                     
                   }else{
        
                   }
                                 
                }else{
                   cookie::queue('admin_email',$request->email,time()+60*60*24);
                   cookie::queue('admin_pass',$request->password,time()+60*60*24);
        
        
                }
                return redirect('admin/dashboard');

             }else{

                $request->session()->flash('error','Please enter correct password');
                return redirect('admin');
             }

         }else{

            $request->session()->flash('error','Enter valid login details');
            return redirect('admin');
         }


    }



    public function dashboard()
    {
        return view('admin.dashboard');
    }


    public function updatepassword()
    {
        $r = Admin::find(1);
        $r->password=Hash::make('ash');
        $r->save();
    }

  
}
