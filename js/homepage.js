var TUMBLR_API_KEY = "mUToHQDSR9P5JVXm62TDSIPPiYYZh1y1Q7jdhbgmCBrgEeAtkX";
var TUMBLR_HOSTNAME = "blog.nicholascalcott.com";

(function($) {

	var currentTitle = "none";

	jQuery.fn.setHeight = function () {

		var windowheight = $(window).height();

		thisHeight = $(this).outerHeight();

		if ( thisHeight <= windowheight ) {
			$(this).height(windowheight);
		} else {
			$(this).height('auto');
		}

	}

	jQuery.fn.isScrolledIntoView = function () {

		var heightToThis = $(this).offset().top;
		var thisHeight = $(this).height();
		var thisRange = heightToThis + thisHeight;

		var headerHeight = $('.header').outerHeight();

		var scrollPosition = $(window).scrollTop() + headerHeight + 1;

		if ( (scrollPosition >= heightToThis ) && (scrollPosition <= thisRange ) ) {
			return true;
		}

	}

	jQuery.fn.pinTitle = function () {

		var thestripeheader = $(this).find('.stripeheader').clone();
		$('#fixedtitle').html(thestripeheader);

	}

	function setupFixedTitles() {

		if ( $('#projectsblock').isScrolledIntoView() ) {

			if ( currentTitle != 'projects' ) {
				currentTitle = 'projects';
				$('#projectsblock').pinTitle();	
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

	function setupGrid() {

		$('.thumbnails').packery({
			itemSelector: '.thumb',
			transitionDuration: "0"
		});

		$('#portfoliosblock').setHeight();
		$('#projectsblock').setHeight();
		$('#updatesblock').setHeight();
		$('#infoblock').setHeight();
		$('#otherblock').setHeight();

	}

	function openNews() {
		$('#news').show();
		$('#news .inner').fadeIn('fast');
		$('#newsbutton').addClass('active');
	}

	function closeNews() {
		$('#news .inner').fadeOut('fast', function () {
			$('#news').hide();
		});
		$('#newsbutton').removeClass('active');
		$('#newsbutton').addClass('inactive');
	}

	$(document).ready( function() {

		var topHeaderHeight = $('.header').outerHeight();

		$('.blockanchor').css('top','-' + topHeaderHeight + 'px');
		$('#fixedtitle').css('top', topHeaderHeight + 'px');

		$.localScroll({
			'duration' : 300,
			'hash' : true,
		});

		$('#news').draggable();

		$('#newsbutton').on('click', function(event) {
			event.preventDefault();

			if ( $(this).hasClass('active') ) {
				closeNews();
			} else {
				openNews();
			}
		});

		$('#news .close').on('click', function(event) {
			event.preventDefault();
			closeNews();
		});

		$("#tumblr").getTumblrPosts({
			type: "photo",
			limit: 1,
			template: "#tmpl-photo",
		});

		var feed = new Instafeed({
			get: 'user',
			userId: 636337139,
		    accessToken: '262351.467ede5.176ab1984b1d47e6b8dea518109d7a5e',
			link: 'true',
			clientId: '80aeda87e8c44281b83ce6f542a30933',
			limit: '1',
			sortBy: 'most-recent',
			resolution: 'standard_resolution',
			links: false,
			template: '<h3>{{model.created_time}} {{model.tagsFormatted}}</h3><img src="{{image}}" />',
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

		setupGrid();
		setupFixedTitles();

	});

	$(window).load( function() {
		setupGrid();
		setupFixedTitles();

		var anchor = $.param.fragment();

		if (anchor !== '') {
			$.scrollTo(
				'#'+anchor,
				300
			);
		}

	});

	$(window).resize( function() {
		setupGrid();
		setupFixedTitles();
	});

	$(window).scroll( function() {
		setupFixedTitles();
	});

})(jQuery);