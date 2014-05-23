(function($) {

	function setupLayout() {

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
		}

		var headerPadding = $('.header .padding').outerHeight();

		$('.layout').css('padding-top', headerPadding + 'px');

	}

	$(document).ready( function() {
		setupLayout();

		$.localScroll({
			'duration' : 300,
			'hash' : true,
		});


	});

	$(window).load( function() {
		$('#loading').hide();
	});

})(jQuery);