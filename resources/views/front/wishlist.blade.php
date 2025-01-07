@extends("front/layout")
@section('container')
<section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th>Product</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th>Add</th>
                      </tr>
                    </thead>
                    <tbody>

@if(isset($wishlist)) 

                    @foreach($wishlist as $product)
                      <tr>
                        <td><a class="remove" href="{{url('wishlist/delete/'.$product->id)}}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('storage/media/'.$product->image)}}" alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$product->product_name}}</a></td>
                        <td>${{$product->product_price}}</td>
                        <td>In Stock</td>
                        <td><a  href="{{url('add_to_cart/'.$product->product_id)}}" class="aa-add-to-cart-btn">Add To Cart</a></td>
                      </tr>
                    @endforeach  

@elseif(Session::has('wishlist'))
   
   @foreach(session('wishlist') as $product)
     <tr>
       <td><a class="remove" href="{{url('wishlist/delete/'.$product['product_id'])}}"><fa class="fa fa-close"></fa></a></td>
       <td><a href="#"><img src="{{asset('storage/media/'.$product['image'])}}" alt="img"></a></td>
       <td><a class="aa-cart-title" href="#">{{$product['product_name']}}</a></td>
       <td>${{$product['product_price']}}</td>
       <td>In Stock</td>
       <td><a  href="{{url('add_to_cart/'.$product['product_id'])}}" class="aa-add-to-cart-btn">Add To Cart</a></td>
     </tr>
   @endforeach  

@endif                                    
                      </tbody>
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@endsection