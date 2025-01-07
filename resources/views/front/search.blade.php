@extends('front/layout')

@section('container') 

<section id="aa-popular-category">
    <div class="container-fluid pl-4">
      
        <div class="col-md-12">
          <div class="row ">
          
           
                 @if($products->isEmpty())
                          
                             <h3 class="text-center m-0 py-4">
                               No products available in this category.
                             </h3>
                        
                          @else  
                          <ul class="aa-product-catg">  
                        @foreach($products as $product)              
                              
                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{url('/product_detail/'.$product->id)}}"><img src="{{asset('storage/media/'.$product->image)}}" width="250px" height="300px" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                                  <figcaption>
                                  <h4 class="aa-product-title"><a href="#">{{$product->product_name}}</a></h4>
                                  <span class="aa-product-price">${{$products_attribute[$product->id][0]->price}}</span><span class="aa-product-price"><del>${{$products_attribute[$product->id][0]->mrp}}</del></span>
                                </figcaption>
                              </figure>                        
                              <div class="aa-product-hvr-content">
                                <a href="{{url('wishlist/add/'.$product->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                          
                              </div>
                              <!-- product badge -->
                              <span class="aa-badge aa-sale" href="#">SALE!</span>
                            </li>

                     
                        @endforeach
                        </ul>
                        @endif
            

         </div>
       
      </div>
    </div>
</section>

@endsection