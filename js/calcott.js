(function($) {

	function setupLayout() {
		$('body').addClass('js');

		if ( $('.infobox').length ) {
			$('.header').find('h2').append('<a title="Info" class="showinfo">Info</a>');
		}

	}

	function setupGrid() {

		var contentWidth = $('.content').outerWidth() + 20;
		$('.slideshow').width( contentWidth + 'px' );

		$('.slideshow').packery({
			itemSelector: '.slide',
			transitionDuration: "0"
		});

		$('.thumbnails').packery({
			itemSelector: '.thumb',
			transitionDuration: "0"
		});

	}

	function openInfobox() {
		$('.header').find('.showinfo').addClass('active');
		$('.infobox').show();
		$('.infobox .inner').fadeIn('fast');	
	}

	function closeInfobox() {
		$('.header').find('.showinfo').removeClass('active');
		$('.infobox .inner').fadeOut('fast', function () {
			$('.infobox').hide();
		});
	}

	function openNews() {
		$('#news').show();
		$('#news .inner').fadeIn('fast');
		$('#newsbutton').addClass('active');
		$('#newsbutton').removeClass('inactive');
	}

	function closeNews() {
		$('#news .inner').fadeOut('fast', function () {
			$('#news').hide();
		});
		$('#newsbutton').removeClass('active');
		$('#newsbutton').addClass('inactive');
	}

	$(document).ready( function() {

		setupLayout();

		$('.header').find('.showinfo').on('click', function(event) {
			if ( $(this).hasClass('active') ) {
				closeInfobox();
			} else {

				openInfobox();
			}
		});

		$('#newsbutton').on('click', function(event) {
			if ( $(this).hasClass('active') ) {
				event.preventDefault();
				closeNews();
			} else if ( $(this).hasClass('inactive') ) {
				event.preventDefault();
				openNews();
			}
		});

		$('#news .close').on('click', function(event) {
				event.preventDefault();
				closeNews();
		});

		$('.infobox').find('.close').on('click', function(event) {
			closeInfobox();
		});


		// Height of header, for Colorbox position

		var headertop = 0;

		if ($('.header').length != 0) {
			headertop += $('.header').outerHeight();
			console.log(headertop);
		}

		if ($('#wpadminbar').length != 0) {
			headertop += $('#wpadminbar').outerHeight();
			console.log(headertop);
		}


		$(".gallery").colorbox({
			rel : 'gallery', 
			transition : "fade",
			opacity : '0.98',
			top : headertop + 'px',
		});



	});

	$(window).load( function() {
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);