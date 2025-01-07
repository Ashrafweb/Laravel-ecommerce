@extends('front/layout')

@section('container')
 <!-- Start slider -->
 <section id="aa-slider">
    <div class="aa-slider-area">
      <div id="sequence" class="seq">
        <div class="seq-screen">
          <ul class="seq-canvas">
            <!-- single slide item -->
            @foreach($banners as $banner)
            <li>
              <div class="seq-model">
                <img data-seq src="{{asset('storage/media/'.$banner->image)}}"  alt="Men slide img" />
              </div>
              <div class="seq-title">
               <!-- <span data-seq></span>                
                <h2 data-seq></h2>                 -->
                <h2>{{$banner->banner_heading}}</h2>
                <p data-seq>{{$banner->banner_text}}</p>
                <a data-seq href="#" class="aa-shop-now-btn aa-secondary-btn">SHOP NOW</a>
              </div>
            </li>
          @endforeach
                   
          </ul>
        </div>
        <!-- slider navigation btn -->
        <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
          <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
          <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
        </fieldset>
      </div>
    </div>
  </section>
  <!-- / slider -->
  <!-- Start Promo section -->
  <section id="aa-promo">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-promo-area">
            <div class="row" style="display:flex;">
              <div class="aa-promo-left">
                  <div class="aa-single-promo-left">
                        <div class="aa-promo-banner">                      
                        <img src="{{asset('storage/media/'.$home_categories[2]->image)}}"   />                     
                          <div class="aa-prom-content">
                            <h4><a href="{{url('category/'.$home_categories[2]->category_slug)}}">{{$home_categories[2]->category_name}}</a></h4>                        
                          </div>        
                      </div>
                    </div>
              </div>
                <div class="aa-promo-right">
            @foreach($home_categories as $list)
                  <div class="aa-single-promo-right">
                    <div class="aa-promo-banner">                      
                    <img src="{{asset('storage/media/'.$list->image)}}"  width="60px"/>                     
                      <div class="aa-prom-content">
                        <h4><a href="{{url('category/'.$list->category_slug)}}">{{$list->category_name}}</a></h4>                        
                      </div>        
                  </div>
                </div>
            @endforeach    
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Promo section -->
  <!-- Products section -->
  <section id="aa-product">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-product-area">
              <div class="aa-product-inner">
                <!-- start prduct navigation -->
                 <ul class="nav nav-tabs aa-products-tab">
                 <?php
                 $pro_loop = 1 ;
                
                   $cat_class = "active";
                 
                 ?>  
                 @foreach($home_categories as $list)
                    
                    <li class="{{$cat_class}}"id="cat{{$pro_loop}}"><a href="#cat{{$list->id}}" data-toggle="tab">
                    {{$list->category_name}}</a></li>
                  
                  @php
                  $pro_loop++;
                  if($pro_loop>1){
                    $cat_class="";
                  }
                  @endphp
                  @endforeach
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                  <?php
                  $catpro_loop = 1 ;
                
                   $catpro_class = "in active";
                 
                 ?>  
                  @foreach($home_categories as $list)
                 
                   
                  <div class="tab-pane fade {{$catpro_class}}" id="cat{{$list->id}}">
               
                    
                         
                            
                          @if($home_categories_product[$list->id]->isEmpty())
                          
                             <h3 class="text-center m-0 py-4">
                               No products available in this category.
                             </h3>
                        
                          @else  
                          <ul class="aa-product-catg">  
                        @foreach($home_categories_product[$list->id] as $product)              
                              
                            <li>
                              <figure>
                                <a class="aa-product-img" href="{{url('/product_detail/'.$product->id)}}"><img src="{{asset('storage/media/'.$product->image)}}" width="250px" height="300px" alt="polo shirt img"></a>
                                <a class="aa-add-card-btn" href="{{url('add_to_cart/'.$product->id)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
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
               
                  @php
                  $catpro_loop++ ;
                  $catpro_class = ""; 
                  @endphp
                  @endforeach
         
           
                            
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Products section -->
  <!-- banner section -->
  <section id="aa-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">        
          <div class="row">
            <div class="aa-banner-area">
            <a href="#"><img src="{{asset('front/img/men-banner.jpg')}}" alt="fashion banner img"></a>
          </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- popular section -->
  <section id="aa-popular-category">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="row">
            <div class="aa-popular-category-area">
              <!-- start prduct navigation -->
             <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#popular" data-toggle="tab">Popular</a></li>
                <li><a href="#featured" data-toggle="tab">Featured</a></li>
                <li><a href="#latest" data-toggle="tab">Latest</a></li>                    
              </ul>
              <!-- Tab panes -->
              <div class="tab-content">
                <!-- Start men popular category -->
                <div class="tab-pane fade in active" id="popular">
                  <ul class="aa-product-catg aa-popular-slider">
                    <!-- start single product item -->
                    @foreach($home_popular_products as $fprod)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('/product_detail/'.$fprod->id)}}"><img src="{{asset('storage/media/'.$fprod->image)}}" width="250px" height="300px" alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="{{url('add_to_cart/'.$fprod->id)}}" ><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$fprod->product_name}}</a></h4>
                          <span class="aa-product-price">${{$products_attribute[$fprod->id][0]->price}}</span><span class="aa-product-price"><del>${{$products_attribute[$fprod->id][0]->mrp}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="{{url('wishlist/add/'.$fprod->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->
                      @if($fprod->is_discounted=='1')
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                      @elseif($fprod->is_trending=='1')
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach
                                                                                         
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / popular product category -->
                
                <!-- start featured product category -->
                <div class="tab-pane fade" id="featured">
                 <ul class="aa-product-catg aa-featured-slider">
                    <!-- start single product item -->
                    @foreach($home_featured_products as $fprod)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('/product_detail/'.$fprod->id)}}"><img src="{{asset('storage/media/'.$fprod->image)}}"  width="250px" height="300px"alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="{{url('add_to_cart/'.$fprod->id)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$fprod->product_name}}</a></h4>
                          <span class="aa-product-price">${{$products_attribute[$fprod->id][0]->price}}</span><span class="aa-product-price"><del>${{$products_attribute[$fprod->id][0]->mrp}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="{{url('wishlist/add/'.$fprod->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      @if($fprod->is_discounted=='1')
                      <span class="aa-badge aa-sale" href="#">SALE!</span>
                      @elseif($fprod->is_trending=='1')
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach
                    <!-- start single product item -->
                                                                                                  
                  </ul>
                  <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / featured product category -->

                <!-- start latest product category -->
                <div class="tab-pane fade" id="latest">
                  <ul class="aa-product-catg aa-latest-slider">
                    <!-- start single product item -->
                    @foreach($home_trending_products as $fprod)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('/product_detail/'.$fprod->id)}}"><img src="{{asset('storage/media/'.$fprod->image)}}"  width="250px" height="300px"alt="polo shirt img"></a>
                        <a class="aa-add-card-btn" href="{{url('add_to_cart/'.$fprod->id)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                         <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$fprod->product_name}}</a></h4>
                          <span class="aa-product-price">${{$products_attribute[$fprod->id][0]->price}}</span><span class="aa-product-price"><del>${{$products_attribute[$fprod->id][0]->mrp}}</del></span>
                        </figcaption>
                      </figure>                     
                      <div class="aa-product-hvr-content">
                        <a href="{{url('wishlist/add/'.$fprod->id)}}" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span class="fa fa-heart-o"></span></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a>
                        <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View" data-toggle="modal" data-target="#quick-view-modal"><span class="fa fa-search"></span></a>                            
                      </div>
                      <!-- product badge -->

                     
                      @if($fprod->is_trending='1')
                      <span class="aa-badge aa-hot" href="#">HOT!</span>
                      @endif
                    </li>
                    @endforeach
                    <!-- start single product item -->
                  
                  
              
                                                                                             
                  </ul>
                   <a class="aa-browse-btn" href="#">Browse all Product <span class="fa fa-long-arrow-right"></span></a>
                </div>
                <!-- / latest product category -->              
              </div>
            </div>
          </div> 
        </div>
      </div>
    </div>
  </section>
  <!-- / popular section -->
  <!-- Support section -->
  <section id="aa-support">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-support-area">
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-truck"></span>
                <h4>FREE SHIPPING</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-clock-o"></span>
                <h4>30 DAYS MONEY BACK</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
            <!-- single support -->
            <div class="col-md-4 col-sm-4 col-xs-12">
              <div class="aa-support-single">
                <span class="fa fa-phone"></span>
                <h4>SUPPORT 24/7</h4>
                <P>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, nobis.</P>
              </div>
            </div>
           
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Support section -->
  <!-- Testimonial -->
  <section id="aa-testimonial">  
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-testimonial-area">
            <ul class="aa-testimonial-slider">
              <!-- single slide -->
              <li>
                <div class="aa-testimonial-single">
                <img class="aa-testimonial-img" src="{{asset('front/img/testimonial_img.jpg')}}" alt="testimonial img">
                  <span class="fa fa-quote-left aa-testimonial-quote"></span>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui!consectetur adipisicing elit. Sunt distinctio omnis possimus, facere, quidem qui.</p>
                  <div class="aa-testimonial-info">
                    <p>Allison</p>
                    <span>Designer</span>
                    <a href="#">Dribble.com</a>
                  </div>
                </div>
              </li>
              <!-- single slide -->
        
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Testimonial -->

  <!-- Latest Blog -->
  <section id="aa-latest-blog">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-latest-blog-area">
            <h2>LATEST BLOG</h2>
            <div class="row">
              <!-- single latest blog -->
              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('front/img/blog_image_1.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>5K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>126</a>
                      <a href="#"><i class="fa fa-comment-o"></i>34</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing eltae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('front/img/blog_image_2.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>1K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>126</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adip fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>

              <div class="col-md-4 col-sm-4">
                <div class="aa-latest-blog-single">
                  <figure class="aa-blog-img">                    
                    <a href="#"><img src="{{asset('front/img/blog_image_3.jpg')}}" alt="img"></a>  
                      <figcaption class="aa-blog-img-caption">
                      <span href="#"><i class="fa fa-eye"></i>2K</span>
                      <a href="#"><i class="fa fa-thumbs-o-up"></i>526</a>
                      <a href="#"><i class="fa fa-comment-o"></i>20</a>
                      <span href="#"><i class="fa fa-clock-o"></i>June 26, 2021</span>
                    </figcaption>                          
                  </figure>
                  <div class="aa-blog-info">
                    <h3 class="aa-blog-title"><a href="#">Lorem ipsum dolor sit amet</a></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur beatae, fugiat odit vel impedit dicta enim repellendus animi. Expedita quas reprehenderit incidunt, voluptates corporis.</p> 
                    <a href="#" class="aa-read-mor-btn">Read more <span class="fa fa-long-arrow-right"></span></a>
                  </div>
                </div>
              </div>
       
            </div>
          </div>
        </div>    
      </div>
    </div>
  </section>
  <!-- / Latest Blog -->

  <!-- Client Brand -->
  <section id="aa-client-brand">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-client-brand-area">
            <ul class="aa-client-brand-slider">
            @foreach($brands as $brand)
              <li class="brand_item"><a href="#"><img src="{{asset('storage/media/'.$brand->image)}}" height="60px" alt="java img"></a></li>
            @endforeach  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / Client Brand -->

  <!-- Subscribe section -->
  <section id="aa-subscribe">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-subscribe-area">
            <h3>Subscribe our newsletter </h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex, velit! okay finre galactico</p>
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