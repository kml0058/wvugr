jQuery(function ($) {

  /**
   * =========================
   * Accessibility codes start
   * =========================
   */
  $(document).on('mousemove', 'body', function (e) {
    $(this).removeClass('keyboard-nav-on');
  });
  $(document).on('keydown', 'body', function (e) {
    if (e.which == 9) {
      $(this).addClass('keyboard-nav-on');
    }
  });
  /**
   * =========================
   * Accessibility codes end
   * =========================
   */

  /**
   * =========================
   * mobile navigation codes start
   * =========================
   */

  /* button for subm-menu (work only on mobile) */

  $('#primary-menu')
    .find('li.menu-item-has-children')
    .prepend('<button class="btn_submenu_dropdown"><span><i class="drop-down-icon"></i></span></button>');

  /* submenu toggle */
  $(document).on('click ', '.btn_submenu_dropdown', function () {
    $(this).toggleClass('active');
    $(this).parent().find('.sub-menu').first().slideToggle();
  });


  /* menu toggle */
  var nav_menu = $('.main-navigation ul.nav-menu');
  $(document).on('click ', '.menu-toggle', function () {
    $('.main-navigation').addClass('toggled');
    $(this).toggleClass('menu-toggle--active');
    nav_menu.slideToggle();
  });

  /**
   * =========================
   * mobile navigation codes ended
   * =========================
   */

  /**
   * =========================
   * sticky navigation
   * =========================
   */

  $(window).on('scroll', function () {
    if ($(window).scrollTop() >= 50) {
      $('.heading-content').addClass('is-sticky-header');
    } else {
      $('.heading-content').removeClass('is-sticky-header', 1000, "easeInBack");
    }
  });
  /**
   * =========================
   * sticky navigation
   * =========================
   */

  /**
   * =========================
   * scroll up/back to top
   * =========================
   */

    var scroll = $(window).scrollTop(); 
    var $scroll_btn = $('#btn-scrollup');
    var $scroll_obj = $('.scrollup');
    $(window).on('scroll',function() {
      if ($(this).scrollTop() > 1) {
        $scroll_btn.css({bottom:"25px"});
      } 
      else {
        $scroll_btn.css({bottom:"-100px"});
      }
  });
  $scroll_obj.click(function() {
      $('html, body').animate({scrollTop: '0px'}, 800);
      return false;
  });
  /**
   * =========================
   * scroll up/back to top
   * =========================
   */

   /**
   * =========================
   * notice bar
   * =========================
   */
    $(document).on("click",'.notice-bar-cross',function(){
      $(".notice-bar").hide(1000);
    });
  /**
   * =========================
   * noticebar
   * =========================
   */

   /**
   * =========================
   * slick
   * =========================
   */
  function edulife_slick_slider() {
    $(".lazy").slick({
      lazyLoad: 'ondemand', // ondemand progressive anticipated
      infinite: true
    });
    /* $('.testimonial-slider').slick({
      slidesToShow: 1,
      dots:true,
      slidesToScroll: 1,
      arrows: false,
      speed: 500,
      fade: false,

    }); */

    
    $('.multiple-slider').not('.slick-initialized').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      centerPadding: '40px',
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
    $('.service-slider').not('.slick-initialized').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      centerPadding: '40px',
      slidesToScroll: 1,
      responsive: [{
          breakpoint: 1600,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true
          }
        },
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2
          }
        },
        {
          breakpoint: 530,
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

    $('.latest-news__slider').not('.slick-initialized').slick({
      dots: false,
      infinite: false,
      speed: 300,
      slidesToShow: 1,
      centerPadding: '40px',
      slidesToScroll: 1,
    });
    $('.testimonial-slider').not('.slick-initialized').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 3,
      centerPadding: '40px',
      slidesToScroll: 3,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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
    $('.instruction-slider').slick({
      dots: true,
      infinite: false,
      speed: 300,
      slidesToShow: 4,
      centerPadding: '40px',
      slidesToScroll: 4,
      responsive: [{
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 2,
            infinite: true,
            dots: false
          }
        },
        {
          breakpoint: 700,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
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

  }
  edulife_slick_slider();
   /**
   * =========================
   * slick
   * =========================
   */

});