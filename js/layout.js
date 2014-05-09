(function($) {

	function setupLayout() {

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
		}

		var headerPadding = $('.header .padding').outerHeight();

		$('.layout').css('margin-top', headerPadding + 'px');

	}

	$(document).ready( function() {
		setupLayout();
	});

	$(window).load( function() {
		$('#loading').hide();
	});

})(jQuery);