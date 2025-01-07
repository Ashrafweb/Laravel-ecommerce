<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $result['orders'] = DB::table('orders')
                            ->get();
       return view('admin.order',$result) ;
}

    public function order_details(Request $request,$id='')
    {
            
       if($id>0){

          $result['details'] = DB::table('order_detail')
                               ->where(['order_id'=>$id])
                               ->get();

       }
        $result['id'] = $id ;
        $result['status'] =  DB::table('orders')
        ->select('status')
        ->where(['unique_order_id'=>$id])
        ->get(); 
       return view('admin.order_detail',$result);

    }

    public function update(REQUEST $request){

        if(isset($_POST)){
            $status = $request->post('status') ;
            DB::table('orders')         
            ->where(['unique_order_id'=>$request->post('id')])
            ->update(['status'=>$status]);
        }
       
        return redirect('/admin/order/order_detail/'.$request->post('id'));

    }



  
}
