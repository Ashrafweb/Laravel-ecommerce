<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Banner::all();
        return view('admin.banner',$result);
    }

    // public function manage_category(){
        
    //     return view('admin.manage_category');
    // }


    public function manage_banner($id='')
    {
           if($id>0){
            $arr= Banner::where(['id'=>$id])->get();
            $result['banner_name'] = $arr['0']->banner_name;
            $result['banner_heading'] = $arr['0']->banner_heading;
            $result['banner_text'] = $arr['0']->banner_text;

            $result['image'] = $arr['0']->image;
            
            $result['id'] = $arr['0']->id;
           
        }else{
            $result['banner_name'] ="";
            $result['banner_heading'] = "";
            $result['banner_text'] = "";

            $result['image'] ="";
          
            $result['id'] = "";
         
           }

            return view('admin.manage_banner',$result);

}



    public function insert(Request $request)
    {
        if($request->post('id')>0){
            $image_required = 'mimes:jpeg,jpg,png';
            
           }else{
            $image_required = 'required|mimes:jpeg,jpg,png';
            
           }
        $request->validate([
            'image'=> $image_required,
            'banner_name'=>'required',
        ]);
       if($request->post('id')>0){
        $model =Banner::find($request->post('id'));
        $msg = "Banner Updated";
       }else{
        $model = new Banner();
        $msg="Banner Inserted";
       }
       
       if($request->hasfile('image')){
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $model->image=$image_name;
       }
       
        $model->banner_name=$request->post('banner_name');
        $model->banner_heading=$request->post('banner_heading');
        $model->banner_text=$request->post('banner_text');
        $model->status="1";
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/banner');
    }

   
    
    public function delete(Request $request,$id)
    {
      $model = Banner::find($id);
      $model->delete();
      $request->session()->flash('message',"banner Deleted");
      return redirect('admin/banner');

      
    }
    
     
    public function status(Request $request,$id)
    {
      $model = Banner::find($id);
      $status= $model->status;
      if($status=="0"){
          $model->status="1";
          $model->save();  
      }else{
        $model->status="0";
        $model->save();  
    }
      $request->session()->flash('message',"Status Updated");
      return redirect('admin/banner');

      
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
