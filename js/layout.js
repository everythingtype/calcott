(function($) {

	function setupLayout() {

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
			pagetitleTop += adminbarheight;
		}

		var headerPadding = $('.header .padding').outerHeight();

		$('.layout').css('padding-top', headerPadding + 'px');

		pagetitleTop += headerPadding;
		$('.pagetitle').css('top', pagetitleTop + 'px');

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