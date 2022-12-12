import './bootstrap';
// import * as bootstrap from 'bootstrap';
import jQuery from 'jquery';
// import AOS from 'aos';
// import 'aos/dist/aos.css';

(function ($) {
  "use strict";

  // AOS.init()

  // Spinner
  var spinner = function () {
    setTimeout(function () {
      if ($('#spinner').length > 0) {
        $('#spinner').removeClass('show');
      }
    }, 1);
  };
  spinner();

  // Fixed Navbar
  $(window).scroll(function () {
    if ($(window).width() < 992) {
      if ($(this).scrollTop() > 45) {
        $('.fixed-top').addClass('bg-white shadow');
      } else {
        $('.fixed-top').removeClass('bg-white shadow');
      }
    } else {
      if ($(this).scrollTop() > 45) {
        $('.fixed-top').addClass('bg-white shadow').css('top', -45);
      } else {
        $('.fixed-top').removeClass('bg-white shadow').css('top', 0);
      }
    }
  });

  // Back to top button
  $(window).scroll(function () {
    if ($(this).scrollTop() > 300) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 1500, 'easeInOutExpo');
    return false;
  });

})(jQuery);
