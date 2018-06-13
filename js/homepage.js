var TUMBLR_API_KEY = "mUToHQDSR9P5JVXm62TDSIPPiYYZh1y1Q7jdhbgmCBrgEeAtkX";
var TUMBLR_HOSTNAME = "blog.nicholascalcott.com";

(function($) {

	var homeResizeTimer = null;
	var currentTitle = "none";


	jQuery.fn.isScrolledIntoView = function () {

		var heightToThis = $(this).offset().top;
		var thisHeight = $(this).height();
		var thisRange = heightToThis + thisHeight;

		var headerHeight = $('.header').outerHeight();

		if ($('#wpadminbar').length != 0) {
			headerHeight = headerHeight + $('#wpadminbar').outerHeight();
		}

		var scrollPosition = $(window).scrollTop() + headerHeight + 1;

		scrollPosition = scrollPosition + 61; // Shim so that titles switch over stripe breaks

		if ( (scrollPosition >= heightToThis ) && (scrollPosition <= thisRange ) ) {
			return true;
		}

	}

	jQuery.fn.pinTitle = function () {

		var thestripeheader = $(this).find('h2').clone();
		$('#fixedtitle').html(thestripeheader);

	}

	function homeIsMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function setupHomeHeights() {

		var windowheight = window.innerHeight;

		var topHeaderHeight = $('.header').outerHeight();
		if ($('#wpadminbar').length != 0) {
			topHeaderHeight = topHeaderHeight + $('#wpadminbar').outerHeight();
		}

		$('.blockanchor').css('top','-' + topHeaderHeight + 'px');


		if ( !homeIsMobile() ) {

			var carouselheight = windowheight - topHeaderHeight;

//			$('.frame').css({'height': carouselheight + 'px'});

			$('.frame').each( function() {

				var captionheight = $(this).find('.carouselcaption').outerHeight();
				var frameheight = carouselheight - captionheight;

				$(this).find('.frameimagewrap').css({'height': frameheight + 'px'});
				$(this).css({'height': carouselheight + 'px'});

			});

			$('#fixedtitle').css('top', topHeaderHeight + 'px');

		} else {
			
			$('.frame').css({'height': 'auto'});
			
		}

	}

	function setupFixedTitles() {

		if ( !homeIsMobile() ) {

			if ( $('#portfoliosblock').isScrolledIntoView() ) {

				if ( currentTitle != 'portfolio' ) {
					currentTitle = 'portfolio';
					$('#portfoliosblock').pinTitle();
				}

			} else if ( $('#updatesblock').isScrolledIntoView() ) {

				if ( currentTitle != 'updates' ) {
					currentTitle = 'updates';
					$('#updatesblock').pinTitle();
				}

			} else if ( $('#infoblock').isScrolledIntoView() ) {

				if ( currentTitle != 'info' ) {
					currentTitle = 'info';
					$('#infoblock').pinTitle();
				}

			} else if ( $('#otherblock').isScrolledIntoView() ) {

				if ( currentTitle != 'other' ) {
					currentTitle = 'other';
					$('#otherblock').pinTitle();
				}

			} else {

				if ( currentTitle != 'none' ) {
					currentTitle = 'none';
					$('#fixedtitle').html('');

				}

			}

		}

	}

	function setupGrid() {

		$('.thumbnails').packery({
			itemSelector: '.thumb',
			transitionDuration: "0"
		});

	}

	function openNews() {
		$('#news').show();
		$('#news .inner').fadeIn('fast');
	}

	function closeNews() {
		$('#news .inner').fadeOut('fast', function () {
			$('#news').hide();
		});
	}

	function handleHomeResize() {
		setupGrid();
		setupFixedTitles();
		setupHomeHeights();
	}

	$(document).ready( function() {


		handleHomeResize();


		$('#news').draggable();

		$('#news .close').on('click', function(event) {
			event.preventDefault();
			closeNews();
		});


		$('.frames').flickity({
			cellSelector: '.frame',
			cellAlign: 'left',
//		  	contain: true,
			wrapAround: true,
			imagesLoaded: true,
			pageDots: false,
			// prevNextButtons: false,
			// autoPlay: 3500,
//			watchCSS: true,
//			pauseAutoPlayOnHover: false
		});

		$("#tumblr").getTumblrPosts({
			type: "photo",
			limit: 1,
			template: "#tmpl-photo",
		});

		var feed = new Instafeed({
			get: 'user',
			userId: 636337139,
		    accessToken: '636337139.1677ed0.b742b254e0ed4a50aa8369074a5b47ab',
			link: 'true',
			clientId: '80aeda87e8c44281b83ce6f542a30933',
			limit: '1',
			sortBy: 'most-recent',
			resolution: 'standard_resolution',
			links: false,
			template: '<img src="{{image}}" />',
			filter: function(image) {

				var date = new Date(image.created_time*1000);

				m = date.getMonth();
				d = date.getDate();
				y = date.getFullYear();
				
				var month_names = new Array ( );
				month_names[month_names.length] = "Jan";
				month_names[month_names.length] = "Feb";
				month_names[month_names.length] = "Mar";
				month_names[month_names.length] = "Apr";
				month_names[month_names.length] = "May";
				month_names[month_names.length] = "Jun";
				month_names[month_names.length] = "Jul";
				month_names[month_names.length] = "Aug";
				month_names[month_names.length] = "Sep";
				month_names[month_names.length] = "Oct";
				month_names[month_names.length] = "Nov";
				month_names[month_names.length] = "Dec";

				var thetime = month_names[m] + ' ' + d + ' ' + y;

				image.created_time = thetime;

				return true;
			}

		});

		feed.run();

	});

	$(window).load( function() {

		handleHomeResize();

		var anchor = $.param.fragment();

		if (anchor !== '') {
			$.scrollTo(
				'#'+anchor,
				300
			);
		}

	});

	$(window).resize( function() {

	    if (homeResizeTimer) {
	        clearTimeout(homeResizeTimer);   // clear any previous pending timer
	    }
	    resizeTimer = setTimeout(handleHomeResize, 25);   // set new timer

	});

	$(window).scroll( function() {
		setupFixedTitles();
	});

})(jQuery);