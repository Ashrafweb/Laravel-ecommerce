<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $result['data'] = Color::all();
        return view('admin.color',$result);
    }

  
    public function manage_color($id='')
    {
           if($id>0){
            $arr= Color::where(['id'=>$id])->get();
            $result['color_name'] = $arr['0']->color_name;
          
            $result['id'] = $arr['0']->id;
           
        }else{
            $result['color_name'] ="";
            
            $result['id'] = "";
         
           }

            return view('admin.manage_color',$result);

}

  
public function insert(Request $request)
{
 
    $request->validate([
        
        'color_name'=>'required|unique:colors,color_name,'.$request->post('id'),
    ]);
   if($request->post('id')>0){
    $model = Color::find($request->post('id'));
    $msg = "Color Updated";
   }else{
    $model = new Color();
    $msg="Color Inserted";
   }
   
    $model->color_name=$request->post('color_name');
    $model->status="1";
    $model->save();
    $request->session()->flash('message',$msg);
    return redirect('admin/color');
}



public function delete(Request $request,$id)
{
  $model = Color::find($id);
  $model->delete();
  $request->session()->flash('message',"color Deleted");
  return redirect('admin/color');

  
}

 
public function status(Request $request,$id)
{
  $model = Color::find($id);
  $status= $model->status;
  if($status=="0"){
      $model->status="1";
      $model->save();  
  }else{
    $model->status="0";
    $model->save();  
}
  $request->session()->flash('message',"Status Updated");
  return redirect('admin/color');

  
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
