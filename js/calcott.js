(function($) {

	function setupGrid() {

		var contentWidth = $('.content').outerWidth() + 20;
		$('.slideshow').width( contentWidth + 'px' );

		$('.slideshow').packery({
			itemSelector: '.slide',
			transitionDuration: "0"
		});
	}

	$(document).ready( function() {

	});

	$(window).load( function() {

		setupGrid();

	});

	$(window).resize( function() {

		setupGrid();

	});

})(jQuery);
