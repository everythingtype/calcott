(function($) {

	function setupLayout() {
		$('body').addClass('js');

		if ( $('.infobox').length ) {
			$('.header').find('h2').append('<a title="Info" class="showinfo">Info</a>');
		}

	}

	function setupImage(index) {

		$('.detailview').data('index',index);
		$('.enlargement').hide();
		$('.enlargement:eq(' + index + ')').show();

	}


	function crossFade(index) {
		$('.detailview').data('index',index);
		$('.enlargement:eq(' + index + ')').addClass('incoming');

		$('.incoming').find('img').hide().fadeIn('fast');
		$('.incoming').find('.caption').hide().fadeIn('fast');
		$('.incoming').show();

		$('.enlargement').not('.incoming').fadeOut('fast');
		$('.incoming').removeClass('incoming');
	}

	function setupGrid() {

		var contentWidth = $('.content').outerWidth() + 20;
		$('.slideshow').width( contentWidth + 'px' );

		$('.slideshow').packery({
			itemSelector: '.slide',
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

	function openDetail() {
		$('.detailview').fadeIn('fast');
	}


	function closeDetail() {
		$('.detailview').fadeOut('fast', function () {
			$('.detailview .enlargement').hide();
		});
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

		$('.infobox').find('.close').on('click', function(event) {
			closeInfobox();
		});

		$('.slide a').on('click', function(event) {

			var listItem = $(this).parents('.slide');
			var theindex = $('.slide').index( listItem );

 			setupImage(theindex);

			openDetail();

		});

		$('.enlargement').find('.close').live('click', function(event) {
			closeDetail();
		});

		$('.enlargement').find('.next').live('click', function(event) {

			var thisindex = $('.detailview').data('index');

			var slidecount = $('.slideshow .slide').length - 1;

			if ( thisindex == slidecount ) {
				var targetindex = 0;
			} else {
				var targetindex = thisindex + 1;
			}
			
			console.log(targetindex);
			crossFade(targetindex);

		});

		$('.enlargement').find('.prev').live('click', function(event) {

			var thisindex = $('.detailview').data('index');

			var slidecount = $('.slideshow .slide').length - 1;

			if ( thisindex == 0 ) {
				var targetindex = slidecount;
			} else {
				var targetindex = thisindex - 1;
			}
			
			crossFade(targetindex);

		});


	});

	$(window).load( function() {
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);
