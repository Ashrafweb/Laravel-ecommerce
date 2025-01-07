<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result['data'] = Category::all();
        return view('admin.category',$result);
    }

    // public function manage_category(){
        
    //     return view('admin.manage_category');
    // }


    public function manage_category($id='')
    {
           if($id>0){
            $arr= Category::where(['id'=>$id])->get();
            $result['category_name'] = $arr['0']->category_name;
            $result['category_slug'] = $arr['0']->category_slug;
            $result['image'] = $arr['0']->image;
            $result['is_home'] = $arr['0']->is_home;
            $result['id'] = $arr['0']->id;
           
        }else{
            $result['category_name'] ="";
            $result['category_slug'] ="";
            $result['image'] ="";
            $result['is_home'] ="0";
            $result['id'] = "";
         
           }

            return view('admin.manage_category',$result);

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
            'category_name'=>'required',
            'category_slug'=>'required|unique:categories,category_slug,'.$request->post('id'),
        ]);
       if($request->post('id')>0){
        $model =Category::find($request->post('id'));
        $msg = "Category Updated";
       }else{
        $model = new Category();
        $msg="Category Inserted";
       }
       
       if($request->hasfile('image')){
        $image=$request->file('image');
        $ext=$image->extension();
        $image_name=time().'.'.$ext;
        $image->storeAs('/public/media',$image_name);
        $model->image=$image_name;
       }
       
        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->is_home = "1";
        $model->status="1";
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');
    }

   
    
    public function delete(Request $request,$id)
    {
      $model = Category::find($id);
      $model->delete();
      $request->session()->flash('message',"Category Deleted");
      return redirect('admin/category');

      
    }
    
     
    public function status(Request $request,$id)
    {
      $model = Category::find($id);
      $status= $model->status;
      if($status=="0"){
          $model->status="1";
          $model->save();  
      }else{
        $model->status="0";
        $model->save();  
    }
      $request->session()->flash('message',"Status Updated");
      return redirect('admin/category');

      
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
