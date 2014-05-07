(function($) {

	var navVisible = true;
	var navHeight = 0;

	function hideNav() {
		if ( navVisible == true ) {

			$( ".sitenav .inner" ).stop().animate({
			    height: 0
			  }, "fast", function() {
				    // Animation complete.
			});

			navVisible = false;

		}
	}

	function showNav() {
		if ( navVisible == false ) {

			$( ".sitenav .inner" ).stop().animate({
			    height: navHeight
			  }, "fast", function() {
				    // Animation complete.
			});

			navVisible = true;

		}
	}

	function setupLayout() {

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

//		navHeight = $( ".sitenav .inner ul" ).outerHeight();
//		Returns incorrect value in FF.

//		navWidth = $( ".sitenav .inner ul" ).outerWidth(); 
//		Returns incorrect value. Font not loaded?

		navHeight = 190;
		navWidth = 185;

		$( ".sitenav .inner" ).height(navHeight);
		$( ".sitenav .inner" ).width(navWidth);

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
		}

		var headerPadding = $('.header .padding').outerHeight();

		$('.layout').css('margin-top', headerPadding + 'px');

	}

	$(document).ready( function() {
		setupLayout();

		$('h1').on('hover', function(event) {
			event.preventDefault();
			showNav();
		});

	});

	$(window).load( function() {
		$('#loading').hide();
	});

	$(window).scroll(function() {
		var viewportHeight = $(window).height();
		var scrolltop = $(window).scrollTop();

		if ( scrolltop > viewportHeight * 0.66 ) {
			hideNav();
		} else {
			showNav();
		}
	});

})(jQuery);