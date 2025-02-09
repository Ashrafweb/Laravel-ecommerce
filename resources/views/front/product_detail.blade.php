@extends('front/layout')

@section('container')
  <!-- catg header banner section -->
  <section id="aa-catg-head-banner">
   <img src="{{asset('storage/media/1.jpg')}}" width="100%" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>T-Shirt</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
          <li class="active">T-shirt</li>
        </ol>
      </div>
     </div>
   </div>
  </section>
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                     <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container">
                            <a data-lens-image="{{asset('storage/media/'.$product_details[$id][0]->image)}}" 
                            class="simpleLens-lens-image">
                        <img src="{{asset('storage/media/'.$product_details[$id][0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                      <div class="simpleLens-thumbnails-container">
                          <a data-big-image="{{asset('storage/media/'.$product_details[$id][0]->image)}}"
                           data-lens-image="{{asset('storage/media/'.$product_details[$id][0]->image)}}"class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="{{asset('storage/media/'.$product_details[$id][0]->image)}}" width="50px">
                          </a>                                    
                         
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product_details[$id][0]->product_name}}</h3>
                    <div class="aa-price-block">
                    <span class="aa-product-view-price"><del>${{$product_details[$id][0]->mrp}}</del></span>
                    <span class="aa-product-view-price">${{$product_details[$id][0]->price}}</span>
                    <p class="aa-product-avilability">In stock</p>
                    </div>
                    <p>{{$product_details[$id][0]->short_desc}}</p>
                    <h4>Size</h4>
                    <form id="add_product">
                    <div class="aa-prod-view-size">
                     
                      @foreach($product_details[$id] as $products)
                      <a id="size{{strtolower($products->size_name)}}" class="size_link"
                       onclick="sendsize(`{{strtolower($products->size_name)}}`);">{{$products->size_name}}</a>
                      
                      @endforeach  
                    
                    </div>
                    <h4>Color</h4>
                    <div class="aa-color-tag">
                                          
                      @foreach($product_details[$id] as $products)
                      <a href="javascript:void(0);" onclick="sendcolor(`{{strtolower($products->color_name)}}`);"
                      id="color{{strtolower($products->color_name)}}"
                      class="color_link aa-color-{{strtolower($products->color_name)}}"></a>
                      @endforeach                     
                    </div>
                    <div class="aa-prod-quantity">
                    
                        <select id="qty" name="qty">
                          <option selected="1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                        </select>
                      
                      <p class="aa-prod-category">
                        Category: <a href="#">
                        @foreach($home_categories as $categories)
                        @if($product_details[$id][0]->category_id==$categories->id)
                        {{$categories->category_name}}
                        @endif
                        @endforeach
                        </a>
                      </p>
                    </div>
                    <input  type="hidden"id="size" name="size" />
                    <input type="hidden" id="color" name="color" />
                    

                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" id="" onclick="add_to_cart(`{{$id}}`)" href="javascript:void(0);">Add To Cart</a>
                      <a class="aa-add-to-cart-btn" href="#">Wishlist</a>
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div>
                    <div class=" " id='adderror'></div>
                   
 
                    @csrf
                  </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                <li><a href="#description" data-toggle="tab">Description</a></li>
                <li><a href="#technical_spec" data-toggle="tab">Technical Specifications</a></li>                
                <li><a href="#uses" data-toggle="tab">Uses</a></li>  
                <li><a href="#warranty" data-toggle="tab">Warranty</a></li>                              
                <li><a href="#review" data-toggle="tab">Reviews</a></li>    

              </ul>

              <!-- Tab panes -->
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                            <p>{{$product_details[$id][0]->desc}}</p>
                   </div>
                   <div class="tab-pane fade" id="technical_spec">
                            <p>{{$product_details[$id][0]->technical_specification}}</p>
                   </div>
                   <div class="tab-pane fade" id="uses">
                            <p>{{$product_details[$id][0]->uses}}</p>
                   </div>
                   <div class="tab-pane fade" id="warranty">
                            <p>{{$product_details[$id][0]->warranty}}</p>
                   </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="{{asset('front/img/testimonial-img-3.jpg')}}" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                    
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
                <!-- start single product item -->
           
             
                <li>
                  <figure>
                    <a class="aa-product-img" href="#"><img src="{{asset('front/img/women/girl-1.png')}}" alt="polo shirt img"></a>
                    <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                     <figcaption>
                      <h4 class="aa-product-title"><a href="#">This is Title</a></h4>
                      <span class="aa-product-price">$45.50</span><span class="aa-product-price"><del>$65.50</del></span>
                    </figcaption>
                  </figure>                     
                  <div class="aa-product-hvr-content">
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                    <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                  </div>
                  <!-- product badge -->
                  <span class="aa-badge aa-sale" href="#">SALE!</span>
                </li>    
                
                
              </ul>


             
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->


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