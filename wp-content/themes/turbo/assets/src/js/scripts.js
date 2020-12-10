jQuery(function ($) {
	'use strict';

	$('.rq-listing-nav-close').on('click', function (e) {
		$('.navbar-collapse').collapse('hide');
	});

	// navbar sticky offset
	window.setInterval(function () {
		var navHeight = $('.navbar#sticker').outerHeight();
		$('.sticky-nav-offset').css({ height: navHeight });
		if ($('.rq-listing-ps-img-wrapper').hasClass('is-affixed')) {
			$('.ls-ps-sb-offset').css({ height: navHeight });
		} else {
			setTimeout(function () {
				$('.ls-ps-sb-offset').css({ height: 0 });
			}, 200);
		}
	});

	// sticky sidebar
	if ($('.rq-listing-ps-img-wrapper').length > 0) {
		var listingSingleSidebar = document.querySelector(
			'.rq-listing-ps-img-wrapper'
		);

		var stickySidebar = new StickySidebar(listingSingleSidebar, {
			topSpacing: 20,
			minWidth: 990,
		});
	}

	$('.btn-group .dropdown-menu').on('click', function (e) {
		e.stopPropagation();
	});

	// counter
	$('.count-result').countTo();
	$('.fact-box-count').countTo();
	// progres bar

	$('.progress-bar.one').on('inview', function (event, isInView) {
		if (isInView) {
			$(this).css({ width: '70%' });
		} else {
			$(this).css({ width: '0%' });
		}
	});

	$('.progress-bar.two').on('inview', function (event, isInView) {
		if (isInView) {
			$(this).css({ width: '95%' });
		} else {
			$(this).css({ width: '0%' });
		}
	});

	$('.progress-bar.three').on('inview', function (event, isInView) {
		if (isInView) {
			$(this).css({ width: '50%' });
		} else {
			$(this).css({ width: '0%' });
		}
	});

	// Sticky menu
	$('#elements-menu').sticky({ topSpacing: 120 });

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll >= 20) {
			$('.home-two-nav').addClass('nav-two-bg');
		}
		if (scroll === 0) {
			$('.home-two-nav').removeClass('nav-two-bg');
		}
	});

	$(window).scroll(function () {
		var scroll = $(window).scrollTop();
		if (scroll >= 20) {
			$('.single-post-nav').addClass('nav-two-bg');
		}
		if (scroll === 0) {
			$('.single-post-nav').removeClass('nav-two-bg');
		}
	});

	// Elements page sidevar menu sticky
	$(window).scroll(function () {
		if (
			$(this).scrollTop() >
			$(document).height() - $('.rq-footer').height() - $(window).height()
		) {
			$('#elements-menu').css('visibility', 'hidden');
		} else {
			$('#elements-menu').css('visibility', 'visible');
		}
	});

	// Footer toggle widget
	$('.toggle-widget').on('click', function () {
		$('.footer-widget').slideToggle(300);
		$(this).toggleClass('active');
	});

	// Range sdlier jquery ui
	$('#slider-range').slider({
		range: true,
		min: 0,
		max: 500,
		values: [75, 300],
		slide(event, ui) {
			$('#amount').val('$' + ui.values[0] + ' - $' + ui.values[1]);
		},
	});
	$('#amount').val(
		'$' +
			$('#slider-range').slider('values', 0) +
			' - $' +
			$('#slider-range').slider('values', 1)
	);

	// Nice scroll plugin customizatin
	$('.child-tab-wrapper .nav-tabs').niceScroll({
		scrollspeed: 10,
		mousescrollstep: 100,
		autohidemode: true,
		cursorcolor: '#0a252e',
		background: '#efeeee',
		cursorborderradius: 3,
		cursorborder: 0,
	});
	$('.rq-listing-choose.rq-listing-list-two .listing-single').niceScroll({});

	// Custom select box
	$('.rq-home-search select').select2();
	$('.rq-cart-options-content select').select2();

	// faq accordion
	$('.faq-single .hidden-content').hide();
	$('.faq-single').on('click', 'a.faq-title', function (e) {
		e.preventDefault();
		const item = $(this);
		const row = item.next('p.hidden-content');
		const contentHide = $('p.hidden-content');
		const titleHide = $('a.faq-title');

		if (item.hasClass('active') !== false) {
			contentHide.slideUp();
			item.removeClass('active');
		} else {
			titleHide.removeClass('active');
			item.toggleClass('active');
			contentHide.slideUp();
			row.slideToggle();
		}
	});

	// owl carousel
	$('.owl-loop').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		nav: true,
		navText: [
			"<i class='fas fa-chevron-left'></i>",
			"<i class='fas fa-chevron-right'></i>",
		],
		margin: 20,
		responsive: {
			767: {
				items: 1,
			},
			1024: {
				items: 3,
			},
			1400: {
				items: 5,
			},
		},
	});

	$('.details-slider').owlCarousel({
		center: true,
		items: 1,
		loop: $('.item').length > 1 ? true : false,
		nav: true,
		autoHeight: false,
		lazyLoad: true,
		navText: [
			"<i class='fas fa-chevron-left'></i>",
			"<i class='fas fa-chevron-right'></i>",
		],
	});

	$(window).on('resize', function () {
		let $owlCar = jQuery('.details-slider');

		$owlCar.trigger('destroy.owl.carousel');
		$owlCar
			.html($owlCar.find('.owl-stage-outer').html())
			.removeClass('owl-loaded');
		$owlCar.owlCarousel({
			center: true,
			items: 1,
			loop: $('.item').length > 1 ? true : false,
			nav: true,
			autoHeight: false,
			lazyLoad: true,
			navText: [
				"<i class='fas fa-chevron-left'></i>",
				"<i class='fas fa-chevron-right'></i>",
			],
		});
	});

	$('.details-slider-data').owlCarousel({
		center: true,
		items: 1,
		loop: true,
	});

	$('.testimonial-wrapper').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		autoplay: true,
		nav: true,
		dots: false,
		lazyLoad: true,
		navText: [
			"<i class='fas fa-chevron-left'></i>",
			"<i class='fas fa-chevron-right'></i>",
		],
		margin: 20,
	});

	$('.testimonial-wrapper-two').owlCarousel({
		items: 3,
		center: true,
		loop: true,
		autoplay: true,
		nav: true,
		dots: false,
		lazyLoad: true,
		navText: [
			"<i class='fas fa-chevron-left'></i>",
			"<i class='fas fa-chevron-right'></i>",
		],
		responsive: {
			0: {
				items: 1,
				margin: 0,
				center: false,
			},
			768: {
				items: 2,
				margin: 20,
				center: false,
			},
			1070: {
				items: 3,
				margin: 30,
			},
		},
	});

	$('.testimonial-wrapper-three').owlCarousel({
		center: true,
		items: 1,
		loop: true,
		autoplay: true,
		nav: false,
		dots: true,
		dotsData: true,
		lazyLoad: true,
		margin: 0,
		responsive: {
			0: {
				center: false,
			},
			767: {
				center: false,
			},
		},
	});

	$('.rq-feature-product-block .related-products').owlCarousel({
		loop: true,
		autoplay: false,
		nav: true,
		dots: false,
		margin: 20,
		navText: [
			"<i class='fas fa-angle-left'></i>",
			"<i class='fas fa-angle-right'></i>",
		],
		responsive: {
			0: {
				center: false,
				items: 2,
			},
			768: {
				items: 3,
			},
		},
	});

	// var arrowHeight = function () {
	// 	jQuery(
	// 		'.testimonial-wrapper-two .owl-next, .testimonial-wrapper-two .owl-prev'
	// 	).css({
	// 		width: $('.owl-item').width() + 'px',
	// 		height: $('.owl-item').height() + 'px',
	// 	});
	// };
	// setTimeout(arrowHeight);

	// responsive video
	$('.post-content').fitVids();

	//Footer stay bottom deprecated
	// $(document).ready(function () {
	//   var header_height = $("nav.navbar").outerHeight();
	//   var footer_height = $("footer").outerHeight();
	//   var desired_content_height =
	//     $(window).height() - header_height - footer_height - 0;
	//   $(".rq-page-content").css("min-height", desired_content_height);
	// });

	//
});
