<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TaxController extends Controller
{
   
    public function index()
    {
       $result['data'] = DB::table('tax')
                         ->get();

       return view('admin.tax',$result);
    }

  
    public function manage_tax($id='')
    {
        if($id>0){
              //
            
        }else{
            $result['type'] = "";
            $result['per'] = "";
            $result['id'] = "";
            return view('admin.manage_tax',$result);
        }
         
}

  
public function insert(Request $request)
{

    
}



public function delete(Request $request,$id)
{

  
}

 
public function status(Request $request,$id)
{
 
  
}





}
