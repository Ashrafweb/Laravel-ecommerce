<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Brand::all();
        return view('admin.brand',$result);
    }

    // public function manage_category(){
        
    //     return view('admin.manage_category');
    // }


    public function manage_brand($id='')
    {
           if($id>0){
            $arr= Brand::where(['id'=>$id])->get();
            $result['brand_name'] = $arr['0']->brand_name;
            $result['brand_slug'] = $arr['0']->brand_slug;
            $result['image'] = $arr['0']->image;
            $result['is_home'] = $arr['0']->is_home;
            $result['id'] = $arr['0']->id;
           
        }else{
            $result['brand_name'] ="";
            $result['brand_slug'] ="";
            $result['image'] ="";
            $result['is_home'] ="0";
            $result['id'] = "";
         
           }

            return view('admin.manage_brand',$result);

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
            'brand_name'=>'required',
            'brand_slug'=>'required|unique:brands,brand_slug,'.$request->post('id'),
        ]);
       if($request->post('id')>0){
        $model =Brand::find($request->post('id'));
        $msg = "Brand Updated";
       }else{
        $model = new Brand();
        $msg="Brand Inserted";
       }
       
       if($request->hasfile('image')){
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $model->image=$image_name;
       }
       
        $model->brand_name=$request->post('brand_name');
        $model->brand_slug=$request->post('brand_slug');
        $model->is_home = $request->post('is_home');
        $model->status="1";
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/brand');
    }

   
    
    public function delete(Request $request,$id)
    {
      $model = Brand::find($id);
      $model->delete();
      $request->session()->flash('message',"Brand Deleted");
      return redirect('admin/brand');

      
    }
    
     
    public function status(Request $request,$id)
    {
      $model = Brand::find($id);
      $status= $model->status;
      if($status=="0"){
          $model->status="1";
          $model->save();  
      }else{
        $model->status="0";
        $model->save();  
    }
      $request->session()->flash('message',"Status Updated");
      return redirect('admin/brand');

      
    }
   


    // public function update(Request $request,$id)
    // {
    //     $model = Category::find($id);
    //     $model->category_name=$request->post('category_name');
    //     $model->category_slug=$request->post('category_slug');
    //     $request->session()->flash('message',"Category Updated");
    //     return redirect('admin/category');
   
}
