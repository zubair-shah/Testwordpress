(function ($) {
	var locations = turbo_data ? turbo_data.locations : [];

	var $owl = $('.details-slider'),
		customMap = $('.rq-custom-map');

	$owl.css({
		height: 'auto',
	});


	$('.rq-change-button span').click(function () {
		$('.rq-change-button span').removeClass('active');
		$(this).addClass('active');

		if ($('.rq-change-button .slide').hasClass('active')) {
			$('.rq-custom-map').css('display', 'none');
			$('.rq-listing-gallery-post').css('display', 'block');
			var $owl = $('.details-slider');

			$('.details-slider').owlCarousel({
				center: true,
				items: 1,
				loop: $('.item').length > 1 ? true : false,
				nav: true,
				lazyLoad: true,
				autoHeight: true,
				navText: ['&#xf3d2', '&#xf3d3;'],
			});
		} else {
			$('.rq-listing-gallery-post').css('display', 'none');
		}

		if ($('.rq-change-button .map').hasClass('active')) {
			$('.rq-listing-gallery-post').css('display', 'none');
			$('.rq-custom-map').css('display', 'block');
			new Maplace({
				locations,
				map_div: '#listing-map',
				controls_type: 'list',
				controls_title: 'Choose a location:',
			}).Load();
		} else {
			$('.rq-custom-map').css('display', 'none');
		}
	});

	if ($('.rq-ps-listing-product-contact').hasClass('active')) {
		$('.rq-custom-map').css('display', 'block');
		new Maplace({
			locations,
			map_div: '#listing-map',
			controls_type: 'list',
			controls_title: 'Choose a location:',
		}).Load();
	}
})(jQuery);
