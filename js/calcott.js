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

		resizeControls();

	}

	function resizeControls() {
		var imageWidth = $('#enlargement').find('img').outerWidth();
		var imageHeight =$('#enlargement').find('img').outerHeight();

		console.log('width: ' + imageWidth + '. height: ' + imageHeight + '.');

		$('#enlargement .controls .inner').css('width',imageWidth + 'px');
		$('#enlargement .controls .inner').css('height',imageHeight + 'px');

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
		$('#detailview').fadeIn('fast');
		resizeControls();
	}


	function closeDetail() {
		$('#detailview').fadeOut('fast', function () {
		
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

		$('#detailview').find('.close').on('click', function(event) {
			closeDetail();
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
		resizeControls();
	});

})(jQuery);
