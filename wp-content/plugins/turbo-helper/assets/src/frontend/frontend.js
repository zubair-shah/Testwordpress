jQuery( function($) {
  //progress bar
  $('.progress-bar').on('inview', function (event, isInView) {
    if (isInView) {
      var value = $(this).find('.pro-bar').val();
      // console.log(value);
      $(this).css({ 'width': value+'%' });
    } else {
      $(this).css({ 'width': '0%' });
    }
  });

  //count down
    var countStart = $('.count-start').val();
    var countEnds  = $('.count-ends').val();
    $("#given_date").countdowntimer({
      startDate : countStart,
      dateAndTime : countEnds,
      size : "lg"
    });

  //popular cars owl carousel
  $('.owl-loop').owlCarousel({
    center: true,
    items: 1,
    loop: true,
    nav: true,
    navText: ['&#xf3d2;', '&#xf3d3;'],
    margin: 20,
    responsive: {
      600: {
        items: 1
      },
      1000: {
        items: 3
      },
      1400: {
        items: 5
      }
    }
  });
});