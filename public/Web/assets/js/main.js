(function ($) {
	"use strict";

/*=============================================
	=    		 Preloader			      =
=============================================*/
function preloader() {
	$('#ctn-preloader').addClass('loaded');
	$("#loading").fadeOut(500);
	// Una vez haya terminado el preloader aparezca el scroll

	if ($('#ctn-preloader').hasClass('loaded')) {
		// Es para que una vez que se haya ido el preloader se elimine toda la seccion preloader
		$('#preloader').delay(900).queue(function () {
			$(this).remove();
		});
	}
}
$(window).on('load', function () {
	preloader();
	mainSlider();
	aosAnimation();
	// popupModal();
	wowAnimation();
});



/*=============================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.menu-area li.dropdown ul').length) {
	$('.menu-area .navigation li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');

}
if ($('.menu-area li.dropdown ul').length) {
	$('.menu-area .navigation1 li.dropdown').append('<div class="dropdown-btn"><span class="fas fa-angle-down"></span></div>');

}

//Mobile Nav Hide Show
if ($('.mobile-menu').length) {

	var mobileMenuContent = $('.menu-area .main-menu').html();
	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);

	//Dropdown Button
	$('.mobile-menu li.dropdown .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(500);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
}


/*=============================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');

	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
	}
});



/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);

  });
}


/*=============================================
	=    	   Data Background  	         =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})



/*=============================================
	=    	   Like Active  	         =
=============================================*/
	$('.like').each(function () {
		$(this).on('click', function (e) {
			e.preventDefault()
			$(this).toggleClass('active')
		})
	})
/*=============================================
	=    	   Toggle Active  	         =
=============================================*/
$('.cat-toggle').on('click', function () {
	$('.category-menu').slideToggle(500);
	return false;
});
$('.more_slide_open').slideUp();
$('.more_categories').on('click', function () {
	$(this).toggleClass('show');
	$('.more_slide_open').slideToggle();
});



/*=============================================
	=    		 Main Slider		      =
=============================================*/
function mainSlider() {
	var BasicSlider = $('.slider-active');
	BasicSlider.on('init', function (e, slick) {
		var $firstAnimatingElements = $('.single-slider:first-child').find('[data-animation]');
		doAnimations($firstAnimatingElements);
	});
	BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
		var $animatingElements = $('.single-slider[data-slick-index="' + nextSlide + '"]').find('[data-animation]');
		doAnimations($animatingElements);
	});
	BasicSlider.slick({
		rtl:true,
		autoplay: true,
		autoplaySpeed: 10000,
		dots: false,
		fade: true,
		arrows: false,
		responsive: [
			{ breakpoint: 767, settings: { dots: false, arrows: false } }
		]
	});

	function doAnimations(elements) {
		var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
		elements.each(function () {
			var $this = $(this);
			var $animationDelay = $this.data('delay');
			var $animationType = 'animated ' + $this.data('animation');
			$this.css({
				'animation-delay': $animationDelay,
				'-webkit-animation-delay': $animationDelay
			});
			$this.addClass($animationType).one(animationEndEvents, function () {
				$this.removeClass($animationType);
			});
		});
	}
}


/*=============================================
	=    		Top Selling Active		     =
=============================================*/
$('.top-selling-active').owlCarousel({
	loop: true,
	margin: 15,
	items: 4,
	autoplay: false,
	autoplayTimeout: 5000,
	autoplaySpeed: 1000,
	navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	nav: true,
	dots: false,
	responsive: {
		0: {
			items: 1,
			center: false,
			nav: false,
		},
		575: {
			items: 2,
			center: false,
			nav: false,
		},
		768: {
			items: 3,
			center: false,
		},
		992: {
			items: 4,
			center: false,
		},
		1200: {
			items: 4
		},
	}
})


/*=============================================
	=    		Popular Active		      =
=============================================*/
$('.popular-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: true,
	prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-angle-left"></i></button>',
	nextArrow: '<button type="button" class="slick-next"><i class="fas fa-angle-right"></i></button>',
	slidesToShow: 4,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		Deal Day Active		      =
=============================================*/
$('.deal-day-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 3,
	rtl:true,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		Brand Active		      =
=============================================*/
$('.brand-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 6,
	slidesToScroll: 2,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    	   Date Time Lift		    =
=============================================*/

// setTimeout(window.randomize, 200);
// $('.ko-progress-circle').click(window.randomize);
// Timer function ::
	var temp1 = 0;
	function counterTemp() {
		temp1 += 1;
	}
	setInterval(counterTemp,1000)
	// var price = 0;
	// let timer2=$('.data-left-time');
	// timer2.each(function () { 
	// 	var maxPrice = $(this).data("maxprice");
	// 	price = maxPrice
	// })
	function updateTimer() {
		let timer=$('.data-left-time');
		timer.each(function () {
			var thisItem = $(this)
			var maxPrice = $(this).data("maxprice");
			var minPrice = $(this).data("minprice");
			var currentPrice;
			var decreasePrice = $(this).data("decreaseprice");
			var decreseTime = parseInt($(this).data("decresetime"));
			var thisItemPrice = $(this).parents('.exclusive-item').find('.new-price span')
			var endTime = $(this).data("endtime");
			
			
			var dataStart= $(this).data("start");
			var dataEnd= $(this).data("end");
			var future = Date.parse(dataEnd);
			var past = Date.parse(dataStart);
			var now = new Date();
			var now1 = Date.parse(now);
			var diff = parseFloat($(this).data('diff')) * 1000 * 60 * 60;
			var diffSecs = diff / 1000;
			var left = now - past;
			// console.log(diffSecs)
			var diffCounter = future - now;
			var leftTime = left * 100 / diff ;
			var days = Math.floor(diffCounter / (1000 * 60 * 60 * 24));
			var hours = Math.floor(diffCounter / (1000 * 60 * 60));
			var minutes = Math.floor(diffCounter / (1000 * 60 ));
			// console.log(hours)
			// Count the seconds that have passed
			var secsPassed = Math.floor(left / (1000));
			// Count how many groups of 20 minutes that have passed
			var secs2 = (secsPassed / (decreseTime));
			// floor value
			var secs3 = Math.floor(secsPassed / (decreseTime));
			// Subtracting these values we get rate of seconds for the current 20 minutes group
			var secLeft = secs2 - secs3
			// Count how many seconds that have passed in the current 20 minutes group
			var secsCount = Math.round(decreseTime - secLeft * decreseTime);
			// console.log(secsCount)
			if ( temp1 == 1 ) {
				currentPrice = (maxPrice - (secs3 * decreasePrice)).toFixed(3);
				$(this).attr('data-currentprice', currentPrice);
				thisItemPrice.text(currentPrice);
			}
			if ( secsCount == 1 ) {
				var currentPrice1 = parseFloat(thisItemPrice.text());
				// console.log(currentPrice1)
				if ( currentPrice1 > minPrice ) {
					currentPrice1 = (currentPrice1 - decreasePrice).toFixed(3);
					// console.log(decreasePrice)
					if (currentPrice1 < minPrice) {
						currentPrice1 = minPrice;
					}
					$(this).attr('data-currentprice', currentPrice1);
					// console.log(currentPrice)
				} else if ( currentPrice1 < minPrice ){
					currentPrice1 = minPrice;
				}
				thisItemPrice.text(currentPrice1);
				// console.log(currentPrice)
			}
			// $(this).attr('data-currentprice', currentPrice);
			var mins = Math.floor(diffCounter / (1000 * 60));
			var secs = Math.floor(diffCounter / 1000);
			if(diffCounter > 0 ){
				$(this).attr('data-progress', Math.floor(leftTime));
				var D = days;
				var H = hours - days * 24;
				var M = mins - hours * 60;
				var S = secs - mins * 60;
			}else if (diffCounter <= 0) {
				$(this).attr('data-progress', '100');
				var D = 0;
				var H = 0;
				var M = 0;
				var S = 0;
				parseFloat(thisItemPrice.text(minPrice))
			}
			if (minutes <= -120) {
				thisItem.attr('data-endtime', 'true')
			}
			$(this).parents(".exclusive-item").find(".coming-time").html('<div class="time-count sec"><span>'+ S +'</span>Sec</div><div class="time-count min"><span>'+ M +'</span>Min</div><div class="time-count hour"><span>'+ H +'</span>Hr</div><div class="time-count day"><span>'+ D +'</span>Day</div>');
		})
};
	// Call timer function
setInterval(updateTimer, 1000);

	// $('.fast-sell-section .exclusive-item').each(function () {
	// 	var thisItemPrice = $(this)
	// 	var itemInfo = $(this).find('.data-left-time');
	// 	var maxPrice = itemInfo.data("maxprice");
	// 	var minPrice = itemInfo.data("minprice");
	// 	var decreasePrice = itemInfo.data("decreaseprice");
	// 	var decreseTime = parseInt(itemInfo.data("decresetime"))*60*1000;
	// 	$(this).find('.new-price span').text(maxPrice);
	// 	var price = maxPrice
	// 	function updatePrice() {
	// 		if (price > minPrice) {
	// 			price = price - decreasePrice;
	// 		} else if (price < minPrice ){
	// 			price = minPrice;
	// 		}
	// 		thisItemPrice.find('.new-price span').text(price);
	// 	}
	// 	setInterval( updatePrice , 1000);
	// })
/*=============================================
	=    	   Testimonial Active		    =
=============================================*/
$('.testimonial-active').slick({
	dots: true,
	infinite: true,
	speed: 1000,
	autoplay: false,
	centerMode: true,
	centerPadding: '0px',
	arrows: false,
	rtl:true,
	slidesToShow: 3,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=         Sidebar Product Active        =
=============================================*/
$('.sidebar-product-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: false,
	arrows: true,
	slidesToShow: 1,
	slidesToScroll: 1,
	prevArrow: '<span class="slick-prev"><i class="fas fa-angle-left"></i></span>',
	nextArrow: '<span class="slick-next"><i class="fas fa-angle-right"></i></span>',
	appendArrows: ".slider-nav",
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
	]
});


/*=============================================
	=         Related Product Active        =
=============================================*/
$('.related-product-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: false,
	arrows: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	prevArrow: '<span class="slick-prev"><i class="fas fa-angle-left"></i></span>',
	nextArrow: '<span class="slick-next"><i class="fas fa-angle-right"></i></span>',
	appendArrows: ".slider-nav",
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=         Product Rating Active        =
=============================================*/
var options = {
	max_value: 5,
	step_size: 1,
	initial_value: 0,
	selected_symbol_type: 'fontawesome_star', // Must be a key from symbols
	cursor: 'default',
	readonly: false,
	change_once: false, // Determines if the rating can only be set once
	ajax_method: 'POST',
	additional_data: {} // Additional data to send to the server
}
$(".rising-rating").rate(options);


/*=============================================
	=    		Odometer Active  	       =
=============================================*/
$('.odometer').appear(function (e) {
	var odo = $(".odometer");
	odo.each(function () {
		var countNumber = $(this).attr("data-count");
		$(this).html(countNumber);
	});
});


/*=============================================
	=    		Magnific Popup		      =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
		enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


/*=============================================
	=    		Isotope	Active  	      =
=============================================*/
$('.exclusive-active').imagesLoaded(function () {
	// init Isotope
	var $grid = $('.exclusive-active').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		originLeft: false,
		masonry: {
			columnWidth: '.grid-sizer',
		}
	});
	// filter items on button click
	$('.product-menu').on('click', 'button', function () {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});

});
//for menu active class
$('.product-menu button').on('click', function (event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


/*=============================================
	=    	  Countdown Active  	         =
=============================================*/
// $('[data-countdown]').each(function () {
// 	var $this = $(this), finalDate = $(this).data('countdown');
// 	$this.countdown(finalDate, function (event) {
// 		$this.html(event.strftime('<div class="time-count sec"><span>%S</span>Sec</div><div class="time-count min"><span>%M</span>Min</div><div class="time-count hour"><span>%H</span>Hr</div><div class="time-count day"><span>%D</span>Day</div>'));
// 	});
// });


/*=============================================
	=    	Shop Details Active  	       =
=============================================*/
$('.shop-details-active').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	dots: false,
	fade: true,
	asNavFor: '.shop-details-nav'
});
$('.shop-details-nav').slick({
	slidesToShow: 4,
	slidesToScroll: 1,
	asNavFor: '.shop-details-active',
	arrows: false,
	dots: false,
	centerMode: true,
	centerPadding: '0px',
	vertical: true,
	focusOnSelect: true,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
				vertical: false,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		 Search Error  	         =
=============================================*/
	$('.header-style-two .header-search-wrap form button').on('click', function (e) {
		if ($('.header-style-two .header-search-wrap form input').val() === '') {
			e.preventDefault()
			$('#wrong-search').modal('show')
		}
		// console.log($('.header-style-two .header-search-wrap form .custom-select').val() )
		// if ($('.header-style-two .header-search-wrap form .custom-select').val() === '') {
		// }
	})
/*=============================================
	=    		 Cart Active  	         =
=============================================*/
$(".cart-plus-minus").append('<div class="dec qtybutton">-</div><div class="inc qtybutton">+</div>');
$(".qtybutton").on("click", function () {
	var $button = $(this);
	var oldValue = $button.parent().find("input").val();
	var maxValue = $button.parent().find("input").attr('max');
	// console.log(oldValue)
	console.log(maxValue)
	if ($button.text() == "+") {
		// Don't allow incrementing more than Max value
		if (oldValue < parseInt(maxValue) ) {
			// console.log(newVal)
			var newVal = parseInt(oldValue) + 1;
		} else {
			newVal = maxValue;
		}
	} else {
		
		// Don't allow decrementing below zero
		if (oldValue > 1) {
			var newVal = parseInt(oldValue) - 1;
			// console.log(newVal)
		} else {
			newVal = 1;
		}
	}
	$button.parent().find("input").val(newVal);
	var proPrice = $button.parents('.product-quantity').siblings(".product-price").find('span').text();
	$button.parents('.product-quantity').siblings(".product-subtotal").find('span').text((newVal * proPrice));
	totalPriceCalc()
});
function totalPriceCalc(){
	var totalPrice = 0 ;
$('.wishlist-area tbody .product-subtotal span').each(function(){
	totalPrice += parseInt($(this).text().replace('ر.س',''));
})
$('.shop-cart-widget form ul li span.sub-price').text(totalPrice+'ر.س')
}
totalPriceCalc()
/*=============================================
	=    	 Slider Range Active  	         =
=============================================*/
$("#slider-range").slider({
	range: true,
	min: 40,
	max: 600,
	values: [120, 570],
	slide: function (event, ui) {
		$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
	}
});
$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));


/*=============================================
	=    		 Aos Active  	         =
=============================================*/
function aosAnimation() {
	AOS.init({
		duration: 1000,
		mirror: true,
		once: true,
		disable: 'mobile',
	});
}

/*=============================================
	=      Newsletter Modal Active  	     =
=============================================*/
// function popupModal() {
// 	setTimeout(function () {
// 		$('#exampleModal').modal('show');
// 	}, 5000);
// }

/*=============================================
	=      Show/Hide Password  	         =
=============================================*/
$('.login-form .form-grp .show-hide').on("click",function(){
	if ($(this).parent().hasClass("visible")) {
		$(this).parent().toggleClass("visible");
		$(this).find('i').toggleClass("fa-eye-slash fa-eye");
		$("#password").attr("type", "password");
	  } else {
		$(this).parent().toggleClass("visible");
		$(this).find('i').toggleClass("fa-eye-slash fa-eye");
		$("#password").attr("type", "text");
	  }
})
// $("#showpassword").on("click", function () {
//     if ($(this).parent().hasClass("visible")) {
//       $(this).parent().toggleClass("visible");
//       $(this).toggleClass("fa-eye-slash fa-eye");
//       $("#password").attr("type", "password");
//     } else {
//       $(this).parent().toggleClass("visible");
//       $(this).toggleClass("fa-eye-slash fa-eye");
//       $("#password").attr("type", "text");
//     }
//   })
/*=============================================
	=    		 Wow Active  	         =
=============================================*/
function wowAnimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}
$(".testi-avatar-info a").each(function(){
	$(this).on("click",function(){
		/* Get the text field */
		var copyText = $(this).siblings("#myInput");
		console.log(copyText)
		/* Select the text field */ /* For mobile devices */
		
		/* Copy the text inside the text field */
		navigator.clipboard.writeText(copyText.val());
		$(this).siblings("span.copy-messege").fadeIn(400).delay(2000).fadeOut(400)
	})
})


})(jQuery);
