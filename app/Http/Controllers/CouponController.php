<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $result['data'] = Coupon::all();
        return view('admin.coupon',$result);
    }

  
    public function manage_coupon($id='')
    {
           if($id>0){
            $arr= Coupon::where(['id'=>$id])->get();
            $result['coupon_name'] = $arr['0']->coupon_name;
            $result['code'] = $arr['0']->code;
            $result['price'] = $arr['0']->price;
            $result['min_order_amount'] = $arr['0']->min_order_amt;
            $result['is_one_time'] = $arr['0']->is_one_time;
            $result['id'] = $arr['0']->id;
            $result['type'] = $arr['0']->Type;
           
        }else{
            $result['coupon_name'] ="";
            $result['code'] ="";
            $result['price'] = "";
            $result['min_order_amount'] = "";
            $result['is_one_time'] = "";        
            $result['type'] = "";
            $result['id'] = "";
         
           }

            return view('admin.manage_coupon',$result);

}

  
public function insert(Request $request)
{
 
    $request->validate([
        
        'coupon_name'=>'required|unique:coupons,coupon_name,'.$request->post('id'),
    ]);
   if($request->post('id')>0){
    $model =Coupon::find($request->post('id'));
    $msg = "Coupon Updated";
   }else{
    $model = new Coupon();
    $msg="Coupon Inserted";
   }
   
    $model->coupon_name=$request->post('coupon_name');
    $model->code=$request->post("code");
    $model->min_order_amt=$request->post("min_order_amount");
    $model->is_one_time=$request->post("is_one_time");
    $model->price=$request->post('price');
    $model->Type=$request->post("type");
    $model->status="1";
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/coupon');
}



public function delete(Request $request,$id)
{
  $model = Coupon::find($id);
  $model->delete();
  $request->session()->flash('message',"coupon Deleted");
  return redirect('admin/coupon');

  
}

 
public function status(Request $request,$id)
{
  $model = Coupon::find($id);
  $status= $model->status;
  if($status=="0"){
      $model->status="1";
      $model->save();  
  }else{
    $model->status="0";
    $model->save();  
}
  $request->session()->flash('message',"Status Updated");
  return redirect('admin/coupon');

  
}



// public function update(Request $request,$id)
// {
//     $model = Category::find($id);
//     $model->category_name=$request->post('category_name');
//     $model->category_slug=$request->post('category_slug');
//     $request->session()->flash('message',"Category Updated");
//     return redirect('admin/category');
// }

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Models\Category  $category
 * @return \Illuminate\Http\Response
 */
public function destroy(Category $category)
{
    //
}
}
