(function($) {

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

	$(document).ready( function() {

		if ( $('.infobox').length ) {
			$('.header').find('h2').append('<a title="Info" class="showinfo">Info</a>');
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

})(jQuery);