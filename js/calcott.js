(function($) {

	function setupLayout() {
		$('body').addClass('js');

		if ( $('.infobox').length ) {
			$('.header').find('h2').append('<a title="Info" class="showinfo">Info</a>');
		}

	}

	function setupImage(index) {

		var thissrc = $('.slide:eq(' + index + ')').find('img').attr('src');
		$('#detailview').data('index',index);
		$('#detailview img').attr('src',thissrc);

		$('#detailview').find('.captionwrap').html('');
		$('.slide:eq(' + index + ')').find('.caption').clone().appendTo('#detailview .captionwrap');

	}

	function setupGrid() {

		var contentWidth = $('.content').outerWidth() + 20;
		$('.slideshow').width( contentWidth + 'px' );

		$('.slideshow').packery({
			itemSelector: '.slide',
			transitionDuration: "0"
		});
	}

	function closeInfobox() {
		$('.header').find('.showinfo').removeClass('active');
		$('.infobox').fadeOut('fast', function () {
		});
	}

	$(document).ready( function() {

		setupLayout();

		$('.header').find('.showinfo').on('click', function(event) {
			if ( $(this).hasClass('active') ) {
				closeInfobox();
			} else {
				$(this).addClass('active');
				$('.infobox').fadeIn('fast');
			}
		});

		$('.infobox').find('.close').on('click', function(event) {
			closeInfobox();
		});

		$('.slide a').on('click', function(event) {

			var listItem = $(this).parents('.slide');
			var theindex = $('.slide').index( listItem );

 			setupImage(theindex);

			$('#detailview').fadeIn('fast');

		});

		$('#detailview').find('.close').on('click', function(event) {
			$('#detailview').fadeOut('fast', function () {
				
			});
		});

		$('#detailview').find('.next').on('click', function(event) {

			var thisindex = $('#detailview').data('index');

			var slidecount = $('.slideshow .slide').length - 1;

			if ( thisindex == slidecount ) {
				var targetindex = 0;
			} else {
				var targetindex = thisindex + 1;
			}
			
			console.log(targetindex);
			setupImage(targetindex);

		});

		$('#detailview').find('.prev').on('click', function(event) {

			var thisindex = $('#detailview').data('index');

			var slidecount = $('.slideshow .slide').length - 1;

			if ( thisindex == 0 ) {
				var targetindex = slidecount;
			} else {
				var targetindex = thisindex - 1;
			}
			
			setupImage(targetindex);

		});


	});

	$(window).load( function() {
		setupGrid();
	});

	$(window).resize( function() {
		setupGrid();
	});

})(jQuery);
