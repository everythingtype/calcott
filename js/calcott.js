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

		$('.infobox').find('.close').on('click', function(event) {
			closeInfobox();
		});

		$(".gallery").colorbox({
			rel : 'gallery', 
			transition:"fade",
			speed:200,
			opacity : '0.98',
			maxWidth : '90%;',
			maxHeight : '100%;',
			current : '',
		});

	});

	$(window).load( function() {
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);