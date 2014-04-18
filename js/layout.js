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

	$(document).ready( function() {
		$('body').addClass('js');
		$('#loading').html('<span>Loading...</span>');
	});

	$(window).load( function() {
		setupGrid();
		$('#loading').hide();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);