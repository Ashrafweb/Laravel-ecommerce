<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $result['data'] = Size::all();
        return view('admin.size',$result);
    }

  
    public function manage_size($id='')
    {
           if($id>0){
            $arr= Size::where(['id'=>$id])->get();
            $result['size_name'] = $arr['0']->size_name;
            $result['id'] = $arr['0']->id;
           
        }else{
            $result['size_name'] ="";
            $result['id'] = "";
         
           }

            return view('admin.manage_size',$result);

}

  
public function insert(Request $request)
{
 
    $request->validate([
        
        'size_name'=>'required|unique:sizes,size_name,'.$request->post('id'),
    ]);

   if($request->post('id')>0){
    $model =Size::find($request->post('id'));
    $msg = "Size Updated";
   }else{
    $model = new Size();
    $msg="Size Inserted";
   }
   
    $model->size_name=$request->post('size_name');
    $model->status="1";
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/size');
}



public function delete(Request $request,$id)
{
  $model = Size::find($id);
  $model->delete();
  $request->session()->flash('message',"size Deleted");
  return redirect('admin/size');

  
}

 
public function status(Request $request,$id)
{
  $model = Size::find($id);
  $status= $model->status;
  if($status=="0"){
      $model->status="1";
      $model->save();  
  }else{
    $model->status="0";
    $model->save();  
}
  $request->session()->flash('message',"Status Updated");
  return redirect('admin/size');

  
}



// public function update(Request $request,$id)
// {
//     $model = Category::find($id);
//     $model->category_name=$request->post('category_name');
//     $model->category_slug=$request->post('category_slug');
//     $request->session()->flash('message',"Category Updated");
//     return redirect('admin/category');
// }

}
