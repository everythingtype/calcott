(function($) {

	function setupGrid() {

		var pagetitleHeight = $('.pagetitle').outerHeight();
		$('.infoboxspacer').height( pagetitleHeight + 'px' );

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
		$('.showinfo').addClass('active');
		$('.pagetitle').addClass('active');
		$('.infobox').show();
		$('.infobox .inner').fadeIn('fast');	
	}

	function closeInfobox() {
		$('.showinfo').removeClass('active');
		$('.pagetitle').removeClass('active');
		$('.infobox .inner').fadeOut('fast', function () {
			$('.infobox').hide();
		});
	}

	$(document).ready( function() {

		setupGrid();

		if ( $('.infobox').length ) {
			$('.pagetitle').find('h2').append('<span><a title="Info" class="showinfo">Info</a></span>');
			$('.infobox').draggable();
		}

		$('.showinfo').on('click', function(event) {
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
			title : function(){
			  return $(this).data('caption');
			}
		});

	});

	$(window).load( function() {
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);