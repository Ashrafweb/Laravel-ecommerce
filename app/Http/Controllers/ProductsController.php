<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $result['data'] = Products::all();
        return view('admin.products',$result);
    }

  
    public function manage_products($id='')
    {
           if($id>0){
            $arr= Products::where(['id'=>$id])->get();
            $result['product_name'] = $arr['0']->product_name;
            $result['slug'] = $arr['0']->slug;
            $result['brand'] = $arr['0']->brand;
            $result['model'] = $arr['0']->model;
            $result['image'] = $arr['0']->image;
            $result['keywords'] = $arr['0']->keywords;
            $result['desc'] = $arr['0']->desc;
            $result['short_desc'] = $arr['0']->short_desc;
            $result['uses'] = $arr['0']->uses;
            $result['technical_specification'] = $arr['0']->technical_specification;
            $result['warranty'] = $arr['0']->warranty;
            $result['category_id'] = $arr['0']->category_id;
            $result['lead_time'] = $arr['0']->lead_time;
            $result['tax'] = $arr['0']->tax;
            $result['tax_type'] = $arr['0']->tax_type;
            $result['is_promo'] = $arr['0']->is_promo;
            $result['is_trending'] = $arr['0']->is_trending;
            $result['is_featured'] = $arr['0']->is_featured;
            $result['is_discounted'] = $arr['0']->is_discounted;
            $result['id'] = $arr['0']->id;

            $result['productsAttrArr'] = DB::table('products_attr')->where(["product_id"=>$id])->get();
            //print_r($result['productsAttrArr']);
            //die();
           
        }else{
            $result['product_name'] = "";
            $result['slug'] = "";
            $result['brand'] = "";
            $result['model'] = "";
            $result['image'] = "";
            $result['keywords'] ="" ;
            $result['desc'] = "";
            $result['short_desc'] = "";
            $result['uses'] = "";
            $result['technical_specification'] ="" ;
            $result['warranty'] = "";
            $result['category_id'] ="" ;
            $result['lead_time'] = "";
            $result['tax'] = "";
            $result['tax_type'] ="" ;
            $result['is_promo'] = "";
            $result['is_trending'] = "";
            $result['is_featured'] = "";
            $result['is_discounted'] = "";
            
            $result['id'] ="" ;

            $result['productsAttrArr'][0]['mrp']="";
            $result['productsAttrArr'][0]['price']="";
            $result['productsAttrArr'][0]['image']="";
            $result['productsAttrArr'][0]['sku']="";
            $result['productsAttrArr'][0]['color_id']="";
            $result['productsAttrArr'][0]['size_id']="";
            $result['productsAttrArr'][0]['qty']="";
           //print_r( $result['productsAttrArr']);
           //die();
          
         
           }
            $result['category'] = DB::table('categories')->where(['status'=>1])->get();
            $result['color'] = DB::table('colors')->where(['status'=>1])->get();
            $result['size'] = DB::table('sizes')->where(['status'=>1])->get();
            return view('admin.manage_products',$result);

}

  
public function insert(Request $request)
{
  if($request->post('id')>0){
    $image_required = 'mimes:jpeg,jpg,png';
    
   }else{
    $image_required = 'required|mimes:jpeg,jpg,png';
    
   }

    $request->validate([
        'product_name'=>'required',
        'sku'=>'required',
        'image'=> $image_required,
        'slug'=>'required|unique:products,slug,'.$request->post('id'),
    ]);

   if($request->post('id')>0){
    $model =Products::find($request->post('id'));
  
    $msg = "Product Updated";
   }else{
    $model = new Products();
   // $model->image=$request->post('image');
    $msg="Product Added";
   }
   
   if($request->hasfile('image')){
     $image=$request->file('image');
     $ext=$image->extension();
     $image_name=time().'.'.$ext;
     $image->storeAs('/public/media',$image_name);
     $model->image=$image_name;
   }
    $model->product_name=$request->post('product_name');
    $model->category_id=$request->post('category_id');
    $model->brand=$request->post('brand');
    $model->model=$request->post('model');
   
    $model->slug=$request->post('slug');
    $model->keywords=$request->post('keywords');
    $model->short_desc=$request->post('short_desc');
    $model->uses=$request->post('uses');
    $model->technical_specification=$request->post('technical_specification');
    $model->desc=$request->post('desc');
    $model->warranty=$request->post('warranty');
    $model->lead_time =$request->post('lead_time');
    $model->tax=$request->post('tax');
    $model->tax_type=$request->post('tax_type');
    $model->is_promo=$request->post('is_promo');
    $model->is_trending=$request->post('is_trending');
    $model->is_discounted=$request->post('is_discounted');
    $model->is_featured=$request->post('is_featured');
   
    
  

    // $model->price=$request->post('price');
    // $model->price=$request->post('price');
    // $model->price=$request->post('price');
    $model->status="1";
    $model->save();
    $pid = $model->id;
 /*Product Attr*/
if($request->post('id')>0){

  $result['productsAttrArr'] = DB::table('products_attr')->where(["product_id"=>$request->post('id')])->get();
  foreach($result['productsAttrArr'] as $key=>$val){
   
 $updatesku[] =  $result['productsAttrArr'][$key]->sku;
  }

  $skuArr = $request->post('sku');
  $mrpArr = $request->post('mrp');
  $priceArr = $request->post('price');
  $attr_image = $request->post('attr_image');
  $colorArr = $request->post('color_id');
  $sizeArr = $request->post('size_id');
  $qtyArr = $request->post('qty');

//   //  echo"<pre>";
// foreach($result['productsAttrArr'] as $key=>$val){
   
//  $editsku =  $result['productsAttrArr'][$key]->sku;

foreach($skuArr as $key=>$val){
  $productsAttrArr['sku'] = $skuArr[$key];
  $productsAttrArr['mrp'] = $mrpArr[$key];
  $productsAttrArr['price'] = $priceArr[$key];
  $productsAttrArr['image'] = "hhrfhs";
  $productsAttrArr['color_id'] = $colorArr[$key];
  $productsAttrArr['size_id'] = $sizeArr[$key];
  $productsAttrArr['qty'] = $qtyArr[$key];
  $productsAttrArr['product_id'] = $pid;

if(isset($updatesku[$key])){ DB::table('products_attr')->where(['sku'=>$updatesku[$key]])->update($productsAttrArr);
}else{
  DB::table('products_attr')->insert($productsAttrArr);

}

}

}else{
 $skuArr = $request->post('sku');
 $mrpArr = $request->post('mrp');
 $priceArr = $request->post('price');
 $attr_image = $request->post('attr_image');
 $colorArr = $request->post('color_id');
 $sizeArr = $request->post('size_id');
 $qtyArr = $request->post('qty');
 //$product_id_Arr = $request->post('sku');
 
foreach($skuArr as $key=>$val){
  $productsAttrArr['sku'] = $skuArr[$key];
  $productsAttrArr['mrp'] = $mrpArr[$key];
  $productsAttrArr['price'] = $priceArr[$key];
  $productsAttrArr['image'] = "hhrfhs";
  $productsAttrArr['color_id'] = $colorArr[$key];
  $productsAttrArr['size_id'] = $sizeArr[$key];
  $productsAttrArr['qty'] = $qtyArr[$key];
  $productsAttrArr['product_id'] = $pid;

  DB::table('products_attr')->insert($productsAttrArr);
}
}

    $request->session()->flash('message',$msg);
    return redirect('admin/products');
}



public function delete(Request $request,$id)
{
  $model = Products::find($id);
  $model->delete();
  $request->session()->flash('message',"product Deleted");
  return redirect('admin/products');

  
}

 
public function status(Request $request,$id)
{
  $model = Products::find($id);
  $status= $model->status;
  if($status=="0"){
      $model->status="1";
      $model->save();  
  }else{
    $model->status="0";
    $model->save();  
}
  $request->session()->flash('message',"Status Updated");
  return redirect('admin/products');

  
}



public function delete_attr(Request $request,$sku)
{
  $result =  DB::table('products_attr')->where(['sku'=>$sku])->get();
  $id = $result[0]->product_id;
  DB::table('products_attr')->where(['sku'=>$sku])->delete();
  $request->session()->flash('message',"Attribute Deleted.");
  return redirect('admin/products/manage_products/edit/'.$id);


 

  
}


// public function update(Request $request,$id)
// {
//     $model = Category::find($id);
//     $model->category_name=$request->post('category_name');
//     $model->category_slug=$request->post('category_slug');
//     $request->session()->flash('message',"Category Updated");
//     return redirect('admin/category');
// }

///////
}
