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


  // Sidebar Toggler
  $('.sidebar-toggler').click(function () {
    $('.sidebar, .content').toggleClass("open");
    return false;
  });

  var optionsCustom = {
    series: [
      {
        name: 'Earnings',
        data: [
          {
            x: "Ruth O\'Ryan",
            y: 13300
          },
          {
            x: "Eric Jonathan",
            y: 10000
          },
          {
            x: "Enya Larson",
            y: 11600
          },
          {
            x: "Chistina Vaughan",
            y: 16000
          },
          {
            x: "John Ilves",
            y: 14300
          },
          {
            x: "Jacy Hawkins",
            y: 15200
          },
          {
            x: "Keth Stephens",
            y: 11800
          }
        ]
      }
    ],
    chart: {
      type: "bar",
      height: 350
    },
    plotOptions: {
      bar: {
        horizontal: false,
        distributed: true
      }
    },
    dataLabels: {
      enabled: false
    },
    legend: {
      show: false
    }
  };


  var chartLeaderBoard = new ApexCharts(document.querySelector("#chart-leaderboard"), optionsCustom);

  chartLeaderBoard.render();


})(jQuery);
