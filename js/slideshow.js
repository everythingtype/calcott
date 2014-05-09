(function($) {

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
		$('.header').find('.pagetitle').addClass('active');
		$('.infobox').show();
		$('.infobox .inner').fadeIn('fast');	
	}

	function closeInfobox() {
		$('.header').find('.showinfo').removeClass('active');
		$('.header').find('.pagetitle').removeClass('active');
		$('.infobox .inner').fadeOut('fast', function () {
			$('.infobox').hide();
		});
	}

	$(document).ready( function() {

		setupGrid();

		if ( $('.infobox').length ) {
			$('.header').find('h2').append('<a title="Info" class="showinfo">Info</a>');
			$('.infobox').draggable();
		}

		$('.header').find('.showinfo').on('click', function(event) {
			if ( $(this).hasClass('active') ) {
				closeInfobox();
			} else {
				openInfobox();
			}
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