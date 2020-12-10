$(window).scroll(function() { $(this).scrollTop() >= 50 ? $("#return-to-top").fadeIn(200) : $("#return-to-top").fadeOut(200) }), $("#return-to-top").click(function() { $("body,html").animate({ scrollTop: 0 }, 500) }), $(document).ready(function() { $(".tabs li a").click(function() { $(".tabs li a").removeClass("active"), $(this).addClass("active"), $(".tab_content_container > .tab_content_active").removeClass("tab_content_active").fadeOut(200), $(this.rel).fadeIn(200).addClass("tab_content_active") }) }), $(".nav a").click(function(a) {
        a.preventDefault();
        var t = "#" + $(this).data("scroll"),
            e = $(t);
        $("html, body").stop().animate({ scrollTop: e.offset().top - 10 }, -800, "swing")
    }), WebFontConfig = { google: { families: ["Noto+Serif:400", "Montserrat:400,700:latin"] } },
    function() {
        var a = document.createElement("script");
        a.src = ("https:" == document.location.protocol ? "https" : "http") + "://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js", a.type = "text/javascript", a.async = "true";
        var t = document.getElementsByTagName("script")[0];
        t.parentNode.insertBefore(a, t)
    }(), $(function() {
        $(".matchheight").matchHeight(), $(".hero-slider").slick({ dots: !0, arrows: !1, autoplay: !1, autoplaySpeed: 2e3, infinite: !0, slidesToShow: 3, slidesToScroll: 1, speed: 500, pauseOnHover: !1, vertical: !1, verticalSwiping: !1, verticalReverse: !1, responsive: [{ breakpoint: 991, settings: { slidesToShow: 2, autoplay: !0, arrows: !1, draggable: !0, swipe: !0 } }, { breakpoint: 767, settings: { slidesToShow: 1, autoplay: !0, arrows: !1, draggable: !0, swipe: !0 } }, { breakpoint: 640, settings: { slidesToShow: 1, autoplay: !0, arrows: !1, draggable: !0, swipe: !0, dots: !1 } }] });
        $.each({ 1: { slider: ".difference-slider" } }, function() { $(this.slider).slick({ arrows: !1, dots: !0, autoplay: !0, settings: "unslick", responsive: [{ breakpoint: 2e3, settings: "unslick" }, { breakpoint: 991, settings: { unslick: !0 } }] }) }), $.each({ 1: { slider: ".res-slider" } }, function() { $(this.slider).slick({ arrows: !1, dots: !0, autoplay: !0, settings: "unslick", responsive: [{ breakpoint: 2e3, settings: "unslick" }, { breakpoint: 767, settings: { unslick: !0 } }] }) }), $(".parallaxing1").parallax("50%", .1), $(".parallaxing2").parallax("50%", .2), $(".parallaxing3").parallax("50%", .3), $(".parallaxing4").parallax("50%", .4), $(".parallaxing5").parallax("50%", .5), $(".parallaxing6").parallax("50%", .6), $(".parallaxing7").parallax("50%", .7), $(".parallaxing8").parallax("50%", .8), $(".parallaxing9").parallax("50%", .9), $(".parallaxing10").parallax("50%", .1)
    }), $(".mobile-nav-btn").click(function() {
        $(".mobile-nav-btn, .mobile-nav, .app-container").toggleClass("active"), $(document).mouseup(function(a) {
            var t = $(".mobile-nav, .mobile-nav-btn");
            t.is(a.target) || 0 !== t.has(a.target).length || $(".mobile-nav-btn, .mobile-nav, .app-container").removeClass("active")
        })
    }), $(function() { $(window).scroll(function() { $(window).scrollTop() >= 100 ? $("header").addClass("scrolled") : $("header").removeClass("scrolled") }) });