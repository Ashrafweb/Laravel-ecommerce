<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">    
    <title>Daily Shop | Home</title>
    
    <!-- Font awesome -->
    <link href="{{asset('front/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('front/css/bootstrap.css')}}" rel="stylesheet">   
  
    <link href="{{asset('front/css/jquery.smartmenus.bootstrap.css')}}" rel="stylesheet">
    <
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/jquery.simpleLens.css')}}">    

    <link rel="stylesheet" type="text/css" href="{{asset('front/css/slick.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('front/css/nouislider.css')}}">

    <link id="switcher" href="{{asset('front/css/theme-color/default-theme.css')}}" rel="stylesheet">
    
    <!-- Top Slider CSS -->
    <link href="{{asset('front/css/sequence-theme.modern-slide-in.css')}}" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="{{asset('front/css/style.css')}}" rel="stylesheet">    



  

  </head>
  <body> 
   <!-- wpf loader Two -->
    <div id="wpf-loader-two">          
      <div class="wpf-loader-two-inner">
        <span>Loading</span>
      </div>
    </div> 
    <!-- / wpf loader Two -->       
  <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
  <!-- END SCROLL TOP BUTTON -->


  <!-- Start header section -->
  <header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="{{asset('front/img/flag/english.jpg')}}" alt="english flag">ENGLISH
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><img src="{{asset('front/img/flag/french.jpg')}}" alt="">FRENCH</a></li>
                      <li><a href="#"><img src="{{asset('front/img/flag/english.jpg')}}" alt="">ENGLISH</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <i class="fa fa-usd"></i>USD
                      <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                      <li><a href="#"><i class="fa fa-euro"></i>EURO</a></li>
                      <li><a href="#"><i class="fa fa-jpy"></i>YEN</a></li>
                    </ul>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>00-62-658-658</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li><a href="{{url("account")}}">My Account</a></li>
                  <li class="hidden-xs"><a href="{{url('wishlist')}}">Wishlist</a></li>
                  <li class="hidden-xs"><a href="/cart">My Cart</a></li>
                  <li class="hidden-xs"><a href="/checkout">Checkout</a></li>
                  @if(Session::has('USER_LOGIN'))
                  <li><a href="/user_logout">Logout</a></li>
                  @else
                  <li><a href="" data-toggle="modal" data-target="#login-modal">Login</a></li>
                  @endif
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="/">
                  <span class="fa fa-shopping-cart"></span>
                  <p>aRK <strong>Shop</strong> <span>Your Shopping Partner</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="#">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">SHOPPING CART</span>
                 @if(Session::has('CART_TOTAL'))
                 <span class="aa-cart-notify">
                     {{
                       
                       session('CART_TOTAL')}}
                  </span>
                  @else
                  
                  @endif
                </a>
                <div class="aa-cartbox-summary">
                 @if(isset($cart[0]))
                 <ul>
                    @foreach($cart as $cartproduct)
                    <li>
                    <a  class="aa-cartbox-img" ><img src="{{asset('front/img/woman-small-2.jpg')}}" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">{{$cartproduct->product_name}}</a></h4>
                        <p>{{$cartproduct->qty}} x  {{$cart_details[$cartproduct->product_id][0]->price}}</p>
                      </div>
                      <a class="aa-remove-product"href="{{url('cart/delete/'.$cartproduct->id)}}"><span class="fa fa-times"></span></a>
                    </li>
                   @endforeach
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="/checkout">Checkout</a>
                 @else
                 <h4>Cart is empty</h4>
                 @endif
                </div>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <form id="search_form" action="{{url('search')}}" method="post">
                  @csrf
                  <input type="text" name="search_query" id="search_query" placeholder="Search here" required>
                  <button type="submit"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>
  <!-- / header section -->
  <!-- menu -->
  <section id="menu">
    <div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="/">Home</a></li>
              @foreach($home_categories as $list)
              <li><a href="{{url('/category/'.$list->category_slug)}}">{{$list->category_name}} 
              @if(isset($sub_category))
              <span class="caret"></span>
              @endif
              </a>
              
              </li>
              @endforeach
             <!-- <li><a href="#">Women <span class="caret"></span></a>
                 <ul class="dropdown-menu">  
                  <li><a href="#">Kurta & Kurti</a></li>                                                                
                  <li><a href="#">Trousers</a></li>              
                 
                  <li><a href="#">Shoes</a></li>
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                      <li><a href="#">Sandals</a></li>
                      <li><a href="#">Loafers</a></li>
                      <li><a href="#">And more.. <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Rings</a></li>
                          <li><a href="#">Earrings</a></li>
                          <li><a href="#">Jewellery Sets</a></li>
                          <li><a href="#">Lockets</a></li>
                          <li class="disabled"><a class="disabled" href="#">Disabled item</a></li>                       
                          <li><a href="#">Jeans</a></li>
                          <li><a href="#">Polo T-Shirts</a></li>
                       
                       
                          <li><a href="#">Nail</a></li>                       
                        </ul>
                      </li>   
                    </ul>
                  </li>
                </ul>
               </li>
              <li><a href="#">Kids <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                 <li><a href="#">Casual</a></li>
                 
                  <li><a href="#">And more.. <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Sleep Wear</a></li>
                                                
                    </ul>
                  </li>
                </ul> 
              </li>
              <li><a href="#">Sports</a></li>
             <li><a href="#">Digital <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="#">Camera</a></li> 
                   <li><a href="#">Mobile</a></li>
                              
                </ul> 
              </li>
              <li><a href="#">Furniture</a></li>            
              <li><a href="blog-archive.html">Blog <span class="caret"></span></a> 
                 <ul class="dropdown-menu">                 
                 <li><a href="blog-archive.html">Blog Style 1</a></li>
                  
               </ul> 
             </li>-->
              <li><a href="contact.html">Contact</a></li>
              <li><a href="#">Pages <span class="caret"></span></a>
                <ul class="dropdown-menu">                
                  <li><a href="product.html">Shop Page</a></li>
                             
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>
  </section>
  <!-- / menu -->
  <!-- Start slider -->
  


@section('container')
@show








  <!-- footer -->  
  <footer id="aa-footer">
    <!-- footer bottom -->
    <div class="aa-footer-top">
     <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-top-area">
            <div class="row">
              <div class="col-md-3 col-sm-6">
                <div class="aa-footer-widget">
                  <h3>Main Menu</h3>
                  <ul class="aa-footer-nav">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Our Services</a></li>
                    <li><a href="#">Our Products</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us</a></li>
                  </ul>
                </div>
              </div>
          
          
          
            </div>
          </div>
        </div>
      </div>
     </div>
    </div>
    <!-- footer-bottom -->
    <div class="aa-footer-bottom">
      <div class="container">
        <div class="row">
        <div class="col-md-12">
          <div class="aa-footer-bottom-area">
            <p>Designed by <a href="http://www.markups.io/">MarkUps.io</a></p>
            <div class="aa-footer-payment">
              <span class="fa fa-cc-mastercard"></span>
              <span class="fa fa-cc-visa"></span>
              <span class="fa fa-paypal"></span>
              <span class="fa fa-cc-discover"></span>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </footer>
  <!-- / footer -->
  @php 
        if(isset($_COOKIE['login_email']) && isset($_COOKIE['login_pass'])){
          $email =$_COOKIE['login_email'] ;
          $pass =$_COOKIE['login_pass'] ;
          $remember ="checked" ;
        } else{
          $email = "" ;
          $pass = "" ;
          $remember = "";
        }
       
  @endphp
  <!-- Login Modal -->  
  <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">                     
        <div class="modal-body">
        
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <div id="loginmodal">  
        <h4>Login</h4>
      
          <form class="aa-login-form" id="loginform">
            @csrf
            <label for="">Email address<span>*</span></label>
            <input type="text" id="email" name="email" placeholder="Email" value="{{Cookie::get('login_email')}}">
            <div id="emailerror"></div>
            <label for="">Password<span>*</span></label>
            <input type="password" id="password" name="password" placeholder="Password" value="{{Cookie::get('login_pass')}}">
            <div id="formerror"></div>
            <button class="aa-browse-btn" type="submit" id="loginfrmsubmit">Login</button>
            <label for="rememberme" class="rememberme">
            <input type="checkbox" id="rememberme" name ="rememberme" {{$remember}}> Remember me </label>
            <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
            <div class="aa-register-now">
               <h6></h6>
              <a href="{{url('/account')}}">Register now!</a>
            </div>
          </form>
          </div>
          <div id="msg"></div> 
        </div>                        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>    

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="{{asset('front/js/bootstrap.js')}}"></script>  
  <!-- SmartMenus jQuery plugin -->
  <script type="text/javascript" src="{{asset('front/js/jquery.smartmenus.js')}}"></script>
  <!-- SmartMenus jQuery Bootstrap Addon -->
  <script type="text/javascript" src="{{asset('front/js/jquery.smartmenus.bootstrap.js')}}"></script>  
  <!-- To Slider JS -->
  <script src="{{asset('front/js/sequence.js')}}"></script>
  <script src="{{asset('front/js/sequence-theme.modern-slide-in.js')}}"></script>  
  <!-- Product view slider -->
  <script type="text/javascript" src="{{asset('front/js/jquery.simpleGallery.js')}}"></script>
  <script type="text/javascript" src="{{asset('front/js/jquery.simpleLens.js')}}"></script>
  <!-- slick slider -->
  <script type="text/javascript" src="{{asset('front/js/slick.js')}}"></script>
  <!-- Price picker slider -->
  <script type="text/javascript" src="{{asset('front/js/nouislider.js')}}"></script>
  <!-- Custom js -->
  <script src="{{asset('front/js/custom.js')}}"></script> 

  </body>
</html>