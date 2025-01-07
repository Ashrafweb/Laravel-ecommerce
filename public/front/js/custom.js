/** 
  * Template Name: Daily Shop
  * Version: 1.0  
  * Template Scripts
  * Author: MarkUps
  * Author URI: http://www.markups.io/

  Custom JS
  

  1. CARTBOX
  2. TOOLTIP
  3. PRODUCT VIEW SLIDER 
  4. POPULAR PRODUCT SLIDER (SLICK SLIDER) 
  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  6. LATEST PRODUCT SLIDER (SLICK SLIDER) 
  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  9. PRICE SLIDER  (noUiSlider SLIDER)
  10. SCROLL TOP BUTTON
  11. PRELOADER
  12. GRID AND LIST LAYOUT CHANGER 
  13. RELATED ITEM SLIDER (SLICK SLIDER)

  
**/

jQuery(function ($) {


  /* ----------------------------------------------------------- */
  /*  1. CARTBOX 
  /* ----------------------------------------------------------- */

  jQuery(".aa-cartbox").hover(function () {
    jQuery(this).find(".aa-cartbox-summary").fadeIn(500);
  }
    , function () {
      jQuery(this).find(".aa-cartbox-summary").fadeOut(500);
    }
  );

  /* ----------------------------------------------------------- */
  /*  2. TOOLTIP
  /* ----------------------------------------------------------- */
  jQuery('[data-toggle="tooltip"]').tooltip();
  jQuery('[data-toggle2="tooltip"]').tooltip();

  /* ----------------------------------------------------------- */
  /*  3. PRODUCT VIEW SLIDER 
  /* ----------------------------------------------------------- */

  jQuery('#demo-1 .simpleLens-thumbnails-container img').simpleGallery({
    loading_image: 'demo/images/loading.gif'
  });

  jQuery('#demo-1 .simpleLens-big-image').simpleLens({
    loading_image: 'demo/images/loading.gif'
  });

  /* ----------------------------------------------------------- */
  /*  4. POPULAR PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-popular-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  /* ----------------------------------------------------------- */
  /*  5. FEATURED PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-featured-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  6. LATEST PRODUCT SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */
  jQuery('.aa-latest-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  7. TESTIMONIAL SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-testimonial-slider').slick({
    dots: true,
    infinite: true,
    arrows: false,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
  });

  /* ----------------------------------------------------------- */
  /*  8. CLIENT BRAND SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-client-brand-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    autoplay: true,
    autoplaySpeed: 2000,
    slidesToShow: 5,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 4,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

  /* ----------------------------------------------------------- */
  /*  9. PRICE SLIDER  (noUiSlider SLIDER)
  /* ----------------------------------------------------------- */

  jQuery(function () {
    if ($('body').is('.productPage')) {
      var skipSlider = document.getElementById('skipstep');
      noUiSlider.create(skipSlider, {
        range: {
          'min': 0,
          '10%': 10,
          '20%': 20,
          '30%': 30,
          '40%': 40,
          '50%': 50,
          '60%': 60,
          '70%': 70,
          '80%': 80,
          '90%': 90,
          'max': 100
        },
        snap: true,
        connect: true,
        start: [20, 70]
      });
      // for value print
      var skipValues = [
        document.getElementById('skip-value-lower'),
        document.getElementById('skip-value-upper')
      ];

      skipSlider.noUiSlider.on('update', function (values, handle) {
        skipValues[handle].innerHTML = values[handle];
      });
    }
  });



  /* ----------------------------------------------------------- */
  /*  10. SCROLL TOP BUTTON
  /* ----------------------------------------------------------- */

  //Check to see if the window is top if not then display button

  jQuery(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.scrollToTop').fadeIn();
    } else {
      $('.scrollToTop').fadeOut();
    }
  });

  //Click event to scroll to top

  jQuery('.scrollToTop').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 800);
    return false;
  });

  /* ----------------------------------------------------------- */
  /*  11. PRELOADER
  /* ----------------------------------------------------------- */

  jQuery(window).load(function () { // makes sure the whole site is loaded      
    jQuery('#wpf-loader-two').delay(200).fadeOut('slow'); // will fade out      
  })

  /* ----------------------------------------------------------- */
  /*  12. GRID AND LIST LAYOUT CHANGER 
  /* ----------------------------------------------------------- */

  jQuery("#list-catg").click(function (e) {
    e.preventDefault(e);
    jQuery(".aa-product-catg").addClass("list");
  });
  jQuery("#grid-catg").click(function (e) {
    e.preventDefault(e);
    jQuery(".aa-product-catg").removeClass("list");
  });


  /* ----------------------------------------------------------- */
  /*  13. RELATED ITEM SLIDER (SLICK SLIDER)
  /* ----------------------------------------------------------- */

  jQuery('.aa-related-item-slider').slick({
    dots: false,
    infinite: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 4,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
          infinite: true,
          dots: true
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 2
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });

});

function sendcolor(color) {

  jQuery("#color").val(color);
  jQuery(".color_link").css('border', '1px solid #ccc');
  jQuery("#color" + color).css('border', '1.5px solid black');


}

function sendsize(size) {

  jQuery("#size").val(size);
  jQuery(".size_link").css('border', '0px');
  jQuery("#size" + size).css('border', '1px solid black');


}

function add_to_cart(id) {

  var color = jQuery("#color").val();
  var size = jQuery("#size").val();
  var qty = jQuery("#qty").val();

  if (size == '' && color == '') {
    jQuery("#adderror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#adderror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Please select size & color");
  }
  else if (size == '') {
    jQuery("#adderror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#adderror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Please select size");
  } else if (color == '') {
    jQuery("#adderror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#adderror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Please select color");
  } else {
    jQuery("#adderror").removeClass("alert alert-danger fade in alert-dismissible mt10");
    jQuery("#adderror").html(" ");
    jQuery.ajax({
      url: '/add_to_cart/' + id,
      type: 'post',
      data: jQuery("#add_product").serialize(),
      success: function (result) {
        jQuery("#adderror").addClass("alert alert-success  fade in alert-dismissible mt10");
        jQuery("#adderror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>" + result + " ");

      }
    })


  }

}






jQuery("#frmsubmit").click(function (e) {
  e.preventDefault();
  var email = jQuery("#regemail").val();
  var password = jQuery("#regpassword").val();
  var username = jQuery("#username").val();
  if (email == "" && password == "" && username == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Username,Email & Password ");
  } else if (email == "" && password == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Email & Password ");
  } else if (username == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Username");
  } else if (email == "") {
    jQuery("#emailerror").addClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html("Please enter Email");
    jQuery("#formerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#formerror").html(" ");

  }
  else if (password == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Password");

  } else {
    jQuery("#formerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html(" ");


    jQuery.ajax({
      url: "/account_register/",
      type: 'post',
      data: jQuery("#registerform").serialize(),
      success: function (result) {
        if (result == "success") {
          // jQuery("#register_area").html(""); 
          // jQuery("#msg").addClass("alert alert-success  fade in alert-dismissible mt10");
          // jQuery("#msg").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Successfully Registered.");
          window.location.href = "/"
        } else if (result == "fail") {
          jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
          jQuery("#formerror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Email already exists.");
        }
      }
    })

  }
})




jQuery("#loginfrmsubmit").click(function (e) {
  e.preventDefault();
  var email = jQuery("#email").val();
  var password = jQuery("#password").val();

  if (email == "" && password == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Email & Password ");
  } else if (email == "") {
    jQuery("#emailerror").addClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html("Please enter Email");
    jQuery("#formerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#formerror").html(" ");

  }
  else if (password == "") {
    jQuery("#formerror").addClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html("Please enter Password");

  } else {
    jQuery("#formerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").removeClass("alert alert-danger  fade in  mt10");
    jQuery("#emailerror").html(" ");
    jQuery("#formerror").html(" ");


    jQuery.ajax({
      url: "/account_login/",
      type: 'post',
      data: jQuery("#loginform").serialize(),
      success: function (result) {
        if (result == "success") {
          location.reload();
        } else if (result == "fail") {
          jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
          jQuery("#formerror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Email not registered.");
        } else if (result == "wrong") {
          jQuery("#formerror").addClass("alert alert-danger  fade in alert-dismissible mt10");
          jQuery("#formerror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Incorrect password.");

        }
      }
    })

  }
})

function update_qty(price) {
  var qty = jQuery("#qty").val();

  var total = qty * price;
  jQuery("#total_price").html(total);



}
;
function add_coupon() {
  //e.preventDefault();
  var coupon = jQuery("#coupon_code").val();
  var token = jQuery("input[name='_token']").val();
  var total = jQuery("#total_price").val();
  if (coupon == "") {
    alert("Please enter coupon code");
  } else {
    jQuery.ajax({
      url: 'checkout/confirm',
      data: {
        "coupon": coupon,
        "total_price": total
      },
      headers: { 'X-CSRF-Token': token },
      type: 'post',
      success: function (result) {
        if (result == "fail") {
          jQuery("#coupon_code").css('border', "2px solid red");
          jQuery("#adderror").addClass("alert alert-danger  fade in alert-dismissible mt10");
          jQuery("#adderror").html("<a href='' class='close'  title='close'>x</a>This coupon doesn't exist.");

        } else {

          jQuery("#adderror").removeClass("alert alert-danger");
          jQuery("#adderror").addClass("alert alert-success  fade in alert-dismissible mt10");
          jQuery("#adderror").html("<a href='#' class='close' data-dismiss='alert' aria-label='close' title='close'>x</a>Coupon applied ");

          jQuery("#discount").html("$" + result.discount);
          jQuery("#total").html("$" + result.total);
          jQuery("#total_price").val(result.total);
          jQuery(".coupon_code").val(result.coupon);

          //  jQuery("#coupon_code").val(" ");
          // window.location.href = "/checkout";

        }
      }
    })
  }

}

