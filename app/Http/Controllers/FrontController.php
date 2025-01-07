<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Arr;

use Mail ;
class FrontController extends Controller
{
   
    public function index(Request $request,$id=" ")
    {
        $result['home_categories'] = getTopNavCat();
        
        foreach($result['home_categories'] as $list){
            $result['home_categories_product'][$list->id] = DB::table('products')
                                                    ->where(['status'=>'1'])
                                                    ->where(['category_id'=>$list->id])
                                                    ->get()
                                                    ;

            foreach( $result['home_categories_product'][$list->id] as $product){
                $result['products_attribute'][$product->id] = DB::table('products_attr')   
                        ->leftJoin('products','products.id','=','products_attr.product_id')                                         
                        ->leftJoin('colors','colors.id','=','products_attr.color_id')
                        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                        ->where(['products_attr.product_id'=>$product->id])
                        ->get();
            }                                        
        
        };


        // foreach($result['home_categories_product'] as $list){
        //    if(isset($list[0])){
        //        foreach($list as $proattr){
        //         $result['products_attribute'][$proattr->id] = DB::table('products_attr')   
        //         ->leftJoin('products','products.id','=','products_attr.product_id')                                         
        //         ->leftJoin('colors','colors.id','=','products_attr.color_id')
        //         ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
        //         ->where(['products_attr.product_id'=>$proattr->id])
        //         ->get();

        //        }
        //    }
        // }      
            
        $result['home_featured_products'] = DB::table('products')
                                ->where(['status'=>'1'])
                                ->where(['is_featured'=>'1'])
                                ->get()
                                ;
       
        $result['home_trending_products'] = DB::table('products')
                                ->where(['status'=>'1'])
                                ->where(['is_trending'=>'1'])
                                ->get()
        ;
        $result['home_popular_products'] = DB::table('products')
                                ->where(['status'=>'1'])
                                ->where(['is_promo'=>'1'])
                                ->get()
        ;

        $result['brands'] = DB::table('brands')
                            ->where(['status'=>'1'])
                            ->where(['is_home'=>'1'])
                            ->get();
       
        $result['banners'] = DB::table('banners')
                            ->where(['status'=>'1'])
                            ->get();

  
                            if(session()->has('USER_LOGIN')){

                                $result['cart'] = DB::table('products')
                                ->leftJoin('cart','cart.product_id','=','products.id')
                                ->where(["user"=>session('USER_ID')]) 
                                ->get();
                            
                            
                                foreach( $result['cart'] as $product){
                                    $result['cart_details'][$product->product_id] =  DB::table('products_attr')   
                                    ->leftJoin('products','products.id','=','products_attr.product_id')                                         
                                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                                    ->where(['products_attr.product_id'=>$product->product_id])
                                    ->get();
                                   
                                }
                                    
                               }else{
                                if(session()->has('UNIQUE_ID')){
                            
                                    $result['cart'] = DB::table('products')
                                                      ->where(["unique_id"=>session('UNIQUE_ID')])
                                                      ->leftJoin('cart','cart.product_id','=','products.id')
                                                      ->get();
                                        
                                 
                                foreach( $result['cart'] as $product){
                                    $result['cart_details'][$product->product_id] =  DB::table('products_attr')   
                                    ->leftJoin('products','products.id','=','products_attr.product_id')                                         
                                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                                    ->where(['products_attr.product_id'=>$product->product_id])
                                    ->get();
                                 ;
                            
                                }   
                                              
                                   }
                               }
        if($id>0){
            
            $result['id'] = $id ;
            $result['product_details'][$id] = DB::table('products_attr')   
            ->leftJoin('products','products.id','=','products_attr.product_id')                                         
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->where(['products_attr.product_id'=>$id])
            ->get();
           
            
            return view('front.product_detail',$result);   
        }else{              
          
            
      return view('front.home',$result);
    // dd($result);
    // echo "<pre>";
    // print_r($result['home_categories_product'][6]);
    // echo "</pre>";
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

  public function add_to_cart(REQUEST $request,$id=" " ){

        if(session()->has('USER_LOGIN')){
            $user_type = "reg";
            $user = session('USER_ID');
            $unique_id = "0";

            $cart = DB::table('cart')
            ->where(["user"=>session('USER_ID')])
            ->where(["product_id"=>$id])
            ->first();
        
        }else{
        if(session()->has('UNIQUE_ID')){
            $user_type = "guest";
            $user = '0' ;
            $unique_id =session('UNIQUE_ID');

            $cart = DB::table('cart')
            ->where(["unique_id"=>session('UNIQUE_ID')])
            ->where(["product_id"=>$id])
            ->first();
            
        }else{
            $user_type = "guest";
            $user = '0' ;
            $unique_id = rand(11111111,99999999);
            $request->session()->put('UNIQUE_ID',$unique_id);

        }
        }

        $size= strtoupper($request->post('size'));
        $color= strtoupper($request->post('color'));
        $result["attr_id"] = DB::table('colors')
                            ->leftJoin('products_attr','products_attr.color_id','=','colors.id')                 
                            ->where(['color_name'=>$color])
                            ->where(['product_id'=>$id])
                            ->first();
        $arr = [
            "product_id"=>$id,
            "user"=>$user,
            "user_type"=>$user_type,
            "unique_id"=>$unique_id,
            "attr_id"=>$result["attr_id"]->id,
            "qty"=>$request->post('qty'),
            "color"=>$request->post('color'),
            "size"=>$request->post('size'),
            "price"=>$result["attr_id"]->price
        ];

        if(!$cart){
            DB::table('cart')->insert($arr);
            echo "Product added to cart";
        }else{
            echo "Product already added to cart";
        }
        

    
    
    
        $request-> session()->forget('CART_TOTAL');
  //  echo "<pre>";
   // print_r($result);             

}

public function front_add_to_cart($id='')
{ 
   if($id!=null && $id > 0)
   {
                  
            if(session()->has('USER_LOGIN')){

                $user_type = "reg";
                $user = session('USER_ID');
                $unique_id = "0";
                
                $cart = DB::table('cart')
                    ->where(["user"=>session('USER_ID')])
                    ->where(["product_id"=>$id])
                    ->first();
                   
            
            }else{

                if(session()->has('UNIQUE_ID')){

                    $user_type = "guest";
                    $user = '0' ;
                    $unique_id =session('UNIQUE_ID');

                    $cart = DB::table('cart')
                        ->where(["unique_id"=>session('UNIQUE_ID')])
                        ->where(["product_id"=>$id])
                        ->first();
                    
                }else{

                    $user_type = "guest";
                    $user = '0' ;
                    $unique_id = rand(11111111,99999999);
                    session()->put('UNIQUE_ID',$unique_id);

                }
            }

           
            $result["attr"] = DB::table('products_attr')
                                ->where(['product_id'=>$id])
                                ->first();

             $color = DB::table('colors')->where(['id'=>$result["attr"]->color_id])->first('color_name');
             $size = DB::table('sizes')->where(['id'=>$result["attr"]->size_id])->first('size_name');
                            
            $arr = [
                "product_id"=>$id,
                "user"=>$user,
                "user_type"=>$user_type,
                "unique_id"=>$unique_id,
                "attr_id"=>$result["attr"]->id,
                "qty"=>1,
                "color"=>$color->color_name,
                "size"=>$size->size_name,
                "price"=>$result["attr"]->price
            ];
        
            if(!$cart){
                DB::table('cart')->insert($arr);
                return back();
            }else{
                return back();
            }
            
            
          
            session()->forget('CART_TOTAL');
            
   }  
}


    public function account(){
        $result['home_categories'] = getTopNavCat();
        return view('front.account',$result);
    }

    public function account_register(Request $request){

        $result['user_accounts'] = DB::table('users')
        ->where(['email'=>$request->post('email')])
        ->get();

        if(isset($result['user_accounts'][0])){
        echo "fail";
        }else{
            $rand_id = rand(111111111,999999999) ;
            $user=[
                'name'=>$request->post('username'),
                'email'=>$request->post('email'),
                'password'=>Hash::make($request->post('password')),
                'is_verify'=>'0',
                'rand_id'=>$rand_id 
            ];
        
            $query = DB::table('users')->insert($user);
            if($query){

                $data = ['name'=>$request->username,'rand_id'=>$rand_id] ;
                $user['to'] = $request->email ;
                Mail::send('front/email_verification', $data , function($messages) use ($user){
                                    $messages->to($user['to']) ;
                                    $messages->subject('Email verification');
                }); 

            };
            $result = DB::table('users')
            ->where(['email'=>$request->post('email')])
            ->first();
            $request->session()->put('USER_LOGIN',true);
            $request->session()->put('USER_ID',$result->id);
            echo "success";
        }

    }


function account_login(Request $request){
    $result = DB::table('users')
    ->where(['email'=>$request->post('email')])
    ->first();

    if($result){
        if(Hash::check($request->post('password'),$result->password)){
            $request->session()->put('USER_LOGIN',true);
            $request->session()->put('USER_ID',$result->id);

        // if($request->session()->has("UNIQUE_ID")){
        //     session()->forget('UNIQUE_ID');
        // }
        if($request->rememberme===null){
            // setcookie('login_email',$request->email,time() - 100);
            // setcookie('login_pass',$request->password,time() - 100);
            
           if(Cookie::has('login_pass')){
                Cookie::queue(Cookie::forget('login_email'));
                Cookie::queue(Cookie::forget('login_pass'));    
           }else{

           }

          
           
        }else{
           cookie::queue('login_email',$request->email,time()+60*60*24);
           cookie::queue('login_pass',$request->password,time()+60*60*24);


        }
 //echo $_COOKIE['login_pass']; 
 //die();
        echo "success";
        }else{
            echo "wrong";
        }
    }else{
        echo "fail";
    }
}

function user_logout(Request $request){
    session()->forget('USER_LOGIN',true);
    session()->forget('USER_ID');
    return redirect("/");
}

///////////////// cart ////////////////////

function cart(Request $request,$id=" "){
    if($id>0){
        DB::table('cart')
       ->where(['id'=>$id])
       ->delete();
            
       return redirect('/cart')  ;      
    }
      
    $result['home_categories'] = getTopNavCat();

  
   if(session()->has('USER_LOGIN')){

    $result['cart'] = DB::table('products')
    ->leftJoin('cart','cart.product_id','=','products.id')
    ->where(["user"=>session('USER_ID')]) 
    ->get();


    foreach( $result['cart'] as $product){
        $result['cart_details'][$product->product_id] =  DB::table('products_attr')   
        ->leftJoin('products','products.id','=','products_attr.product_id')                                         
        ->leftJoin('colors','colors.id','=','products_attr.color_id')
        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
        ->where(['products_attr.product_id'=>$product->product_id])
        ->get();
       
    }
        
   }else{
    if(session()->has('UNIQUE_ID')){

        $result['cart'] = DB::table('products')
                          ->where(["unique_id"=>session('UNIQUE_ID')])
                          ->leftJoin('cart','cart.product_id','=','products.id')
                          ->get();
            
     
    foreach( $result['cart'] as $product){
        $result['cart_details'][$product->product_id] =  DB::table('products_attr')   
        ->leftJoin('products','products.id','=','products_attr.product_id')                                         
        ->leftJoin('colors','colors.id','=','products_attr.color_id')
        ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
        ->where(['products_attr.product_id'=>$product->product_id])
        ->get();
     ;

    }   
                  
       }
   }
   //$request->session()->put('CART','yes'); 
  return view('front.cart',$result);    
    // echo "<pre>";
  //   print_r($result);
  
}

function checkout(){

    $result['home_categories'] = getTopNavCat();

    
    if(session()->has('USER_LOGIN')){

        $result['cart'] = DB::table('products')
        ->leftJoin('cart','cart.product_id','=','products.id')
        ->where(["user"=>session('USER_ID')]) 
        ->get();
      
        $result['user_details'] = DB::table('users')
                                  ->where(['id'=>session('USER_ID')])
                                  ->get(); 
    }elseif(session()->has('UNIQUE_ID')){

        $result['cart'] = DB::table('products')
        ->leftJoin('cart','cart.product_id','=','products.id')
        ->where(["unique_id"=>session('UNIQUE_ID')]) 
        ->get();
      
    }else{
        return view('front/checkout',$result);
        die();
    }
    
        foreach( $result['cart'] as $product){
            $result['cart_details'][$product->product_id] =  DB::table('products_attr')   
            ->leftJoin('products','products.id','=','products_attr.product_id')                                         
            ->leftJoin('colors','colors.id','=','products_attr.color_id')
            ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
            ->where(['products_attr.product_id'=>$product->product_id])
            ->get();
           
        }
   
    
   return view('front/checkout',$result);
   // echo "<pre>";
   // print_r($result);
}

public function confirm_checkout(REQUEST $request)
{
    
        

        if(!$request->post('coupon')==null){
            $coupon = $request->post('coupon');
            $total_price = $request->post('total_price');
            
            $result = DB::table('coupons')
                    ->where(['code'=>$coupon])
                    ->first();

            if(isset($result)){

                $type = $result->Type ;

                if($type=="Per"){

                    $discount = $total_price * $result->price/100 ;

                }elseif($type=="Value"){

                    $discount = $result->price ;

                }
    
                $res['discount'] = $discount;
                $res['total'] = $total_price - $discount;
                return response()->json(array('discount'=> $discount,'total'=> $res['total'],'coupon'=>$coupon), 200);

            }else{
                echo "fail";
            }          
        

        }else{
            $unique_order_id = rand(111111111,999999999);

            $arr = [
                'user_id' => session('USER_ID'),
                'unique_order_id' => $unique_order_id,
                'name' => $request->post('name'),
                'email' => $request->post('email'),
                'mobile' => $request->post('phone'),
                'address' => $request->post('address'),
                'country' => $request->post('country'),
                'city' => $request->post('city'),
                'zip_post_code' => $request->post('postcode'),
                'special_notes' => $request->post('special_notes'),
                'payment_method' => $request->post('payment'),
                'coupon' => $request->post('coupon_code'),
                'apartment_suite'=>$request->post('appartment'),
                'total_price'=>$request->post('total_price'),
                'status'=>'pending'
            
                ];
        
                DB::table('orders')->insert($arr);

                $result['data'] = DB::table('cart')
                        ->where(['user'=>session('USER_ID')])
                        ->get();

                foreach($result['data'] as $data){
                $arr= [
                    "order_id"=> $unique_order_id,
                    "product_id"=>$data->product_id,
                    'attr_id'=>$data->attr_id,
                    "qty"=>$data->qty,
                    "price"=>$data->price


                ];
             DB::table('order_detail')->insert($arr);    

                
            }  
                DB::table('cart')->where(['user'=>session('USER_ID')])->delete();
                DB::table('wishlist')->where(['user_id'=>session('USER_ID')])->delete();
                return redirect('/');


        // if( DB::table('orders')->insert($arr)){
        //  return redirect('/');
        //};
        //print_r($arr);
        }

}


 public function category(REQUEST $request,$slug){

 $result['home_categories'] = getTopNavCat();
if($slug!==""){
  
            
        $result['slug'] = $slug ;
        
        $result['products']= DB::table('categories')

                    ->leftJoin('products','products.category_id','=','categories.id')                                             
                    ->where(['categories.category_slug'=>$slug])
                    ->where(['products.status'=>'1'])
                    ->get()
                                ;

        foreach($result['products'] as $product){

            $result['product_details'][$product->id] = DB::table('products_attr')   

                    ->leftJoin('products','products.id','=','products_attr.product_id')                                         
                    ->leftJoin('colors','colors.id','=','products_attr.color_id')
                    ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                    ->where(['products_attr.product_id'=>$product->id])
                    ->get();
        }                                        

    
    return view('front.category',$result);
//      echo "<pre>";
//    print_r($result);
}
 }

 public function verify_email(REQUEST $request,$rand_id){
    $result['home_categories'] = getTopNavCat();

    $user_id = session('USER_ID');
    $result['user'] = DB::table('users')
                     
                      ->where(['id'=>$user_id])
                      ->get();
                    //   echo $result['user'][0]->rand_id;
                    //   echo " ".$rand_id;
                    //   die();
          
     if($result['user'][0]->rand_id==$rand_id){
          
               $result['msg'] = "Email Id Verified.";            
               $result['username'] = $result['user'][0]->name ;
    }else{
        $result['msg'] = "Email verification Failed .";
    }                  

    return view('front.verification',$result);
 }

 public function wishlist_view()
 {
     $result['home_categories'] = getTopNavCat();
     
    
     if(session('USER_ID')){
        $result['wishlist'] = DB::table('wishlist')->where(['user_id'=>session('USER_ID')])->get();
     }else{

     };

     return view('front.wishlist',$result);
 }

 public function add_to_wishlist(REQUEST $request ,$id='')
 {
    if($id > 0)
    {
      
        $wishlist_product = DB::table('products')
                            ->where(['id'=>$id])
                            ->first();

        if($wishlist_product){

          $details = DB::table('products_attr')->where(['product_id'=> $wishlist_product->id])->first();
      

          if(session('USER_LOGIN'))
          {
            $arr = [
                'product_id' => $wishlist_product->id,
                'product_name' => $wishlist_product->product_name,
                'product_price'=> $details->price,
                'image'=>$wishlist_product->image,
                'user_id'=>session('USER_ID'),
            ];
            DB::table('wishlist')->insert($arr);

            return back();
          }
          else
          {
            $arr = [
                'product_id' => $wishlist_product->id,
                'product_name' => $wishlist_product->product_name,
                'product_price'=> $details->price,
                'image'=>$wishlist_product->image,
                'user_id'=>'',
            ];

                if(!session('wishlist')){
                    
                    $wishlist_array = [$id => $arr];
                    session()->put('wishlist',$wishlist_array);
            
                }else{

                   // session()->put('wishlist',array_add(session('wishlist'),$id,$arr));
                   $arras = Arr::add(session('wishlist'),$id,$arr);
                   session()->put('wishlist',$arras);
                   
                   
                    
                }
        
                $result['home_categories'] = getTopNavCat();
        
                return view('front.wishlist',$result);
             
             
          }

        }
        else
        
        {
            return back()->with('404',"Couidn't add product to wishlist");
        }                 
    }
 }


 public function wishlist_remove($id='')
 {
    if($id > 0){
        if(session('USER_LOGIN')){
            DB::table('wishlist')->where(['id'=>$id])->delete();
        }else{
           if(session('wishlist')){
               $arr = Arr::except(session('wishlist'),[$id]);
               session()->put('wishlist',$arr);
               
           }
        }
    };

    return back();
 }


 public function search_product(REQUEST $request)
 {
        $this->validate($request,[
            'search_query' => 'required|max:25|min:2'
        ]);

        $result['products'] = DB::table('products')
                            ->where('product_name','LIKE','%'.$request->search_query.'%')
                            ->orwhere('short_desc','LIKE','%'.$request->search_query.'%')
                            ->orwhere('desc','LIKE','%'.$request->search_query.'%')
                            ->get();

        
        $result['home_categories'] = getTopNavCat();
        
        foreach( $result['products'] as $product){

            $result['products_attribute'][$product->id] =  DB::table('products_attr')   
            
                                ->leftJoin('products','products.id','=','products_attr.product_id')                                         
                                ->leftJoin('colors','colors.id','=','products_attr.color_id')
                                ->leftJoin('sizes','sizes.id','=','products_attr.size_id')
                                ->where(['products_attr.product_id'=>$product->id])
                                ->get();
            
                                }                       
        return view('front.search',$result);                       
 }
}