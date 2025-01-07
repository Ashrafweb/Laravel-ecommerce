@extends('front/layout')
@section('container')
 
  <!-- catg header banner section -->
 
  <!-- / catg header banner section -->
@if(isset($cart[0]))
 <!-- Cart view section -->
 <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Remove</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cart_total = "0";
                    ?>
                      @foreach($cart as $cartproduct)
                        @php
                        $price = $cart_details[$cartproduct->product_id][0]->price ;
                        $total = $price * $cartproduct->qty ;
                        $cart_total += $total;
                      
                        @endphp
                      <tr>
                        <td><a class="remove" href="cart/delete/{{$cartproduct->id}}"><fa class="fa fa-close"></fa></a></td>
                        <td><a href="#"><img src="{{asset('storage/media/'.$cartproduct->image)}}"  alt="img"></a></td>
                        <td><a class="aa-cart-title" href="#">{{$cartproduct->product_name}}</a><br>
                        {{$cartproduct->color}}<br>{{$cartproduct->id}}
                        </td>
                        <td id="prod_price">{{$price}}</td>
                      
                        <td>
                        <input class="aa-cart-quantity" id="qty" type="number" onchange="update_qty(`{{$price}}`)"
                         value="{{$cartproduct->qty}}">
                        </td>
                        <td id="total_price">{{$total}}</td>
                      </tr>
                    @endforeach
                      </tbody>
                  </table>
                </div>
             </form>
             <!-- Cart Total view -->
             <div class="cart-view-total">
               <h4>Cart Totals</h4>
               <table class="aa-totals-table">
                 <tbody>
                   <tr>
                     <th>Subtotal</th>
                     <td>$450</td>
                   </tr>
                   <tr>
                     <th>Total</th>
                     <td>{{$cart_total}}</td>
                   </tr>
                 </tbody>
               </table>
               <a href="{{url('checkout')}}" class="aa-cart-view-btn">Proceed to Checkout</a>
             </div>
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>
 

        @else
      <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area text-center">
            <h3>Cart is empty </h3>
           
           
          </div>
        </div>
      </div>
    </div>
        @endif

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit!</p>
            <form action="" class="aa-subscribe-form">
              <input type="email" name="" id="" placeholder="Enter your Email">
              <input type="submit" value="Subscribe">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Subscribe section -->

@endsection