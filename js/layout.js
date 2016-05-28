// Nicolas Calcott

(function($) {

	var resizeTimer = null;
	var menuopen = false;
	var wasDesktop = true;
	var myScrollTop = 0;

	jQuery.fn.openLightbox = function() {

		menuopen = true;

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {
			myScrollTop = $('body').scrollTop();

			var wpadminbar = 0; 
			if ($('#wpadminbar').length != 0) {
				wpadminbar = $('#wpadminbar').outerHeight();
			}

			thisOffset = myScrollTop - wpadminbar;
			offsetString = "-" + thisOffset + "px";

			$('.scrollingcontent').css({
			    'top': offsetString,
			    'position':'fixed'
			});

		}

		$('body').addClass('haslightbox');
		$(this).stop().slideDown("fast");
	}

	jQuery.fn.closeLightbox = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );

			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().slideUp("fast");
	}

	jQuery.fn.resetLightbox = function() {

		if (/iPhone|iPad|iPod/i.test(navigator.userAgent)) {

			$('.scrollingcontent').css({
			    'top': "auto",
			    'position':'static'
			});

			$( "body" ).scrollTop( myScrollTop );

			myScrollTop = 0;

		}

		$('body').removeClass('haslightbox');
		$(this).stop().hide();
	}


	function setupLayout() {

		console.log('setupLayout');

		$('body').addClass('js');

		$('#loading').html('<span>Loading...</span>');

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
			pagetitleTop += adminbarheight;
		}

		var headerPadding = $('.header .padding').outerHeight();

		pagetitleTop += headerPadding;

		$('.pagetitle').css('top', pagetitleTop + 'px');

	}


	function setupNavPadding() {

		var pagetitleTop = 0;

		if ($('#wpadminbar').length != 0) {
			var adminbarheight = $('#wpadminbar').outerHeight();
			$('.header').css('top', adminbarheight + 'px');
			pagetitleTop += adminbarheight;
		}

		var headerPadding = $('.header .padding').outerHeight();

		$('.mobilenavpadding').css('padding-top', headerPadding + 'px');
		$('.layout').css('padding-top', headerPadding + 'px');

		pagetitleTop += headerPadding;

		$('.pagetitle').css('top', pagetitleTop + 'px');

	}

	function handleResize() {

	    resizeTimer = null;

		setupNavPadding();


		if ( wasDesktop == true ) {

			menuopen = false;

			if ( isMobile() ) {
				wasDesktop = false;
			}

		} else {

			if( !isMobile() ) {
				wasDesktop = true;
				resetNav();
			}

		}
	}

	function isMobile() {
		if ( $(".responsivecue").css("float") == "right" ) { 
			return false;
		} else {
			return true;
		}
	}

	function openNav() {
		$("#navshade").openLightbox();
		$('.menutoggle').removeClass('openmenu');
		$('.menutoggle').addClass('closemenu');
	}

	function closeNav() {
		$("#navshade").closeLightbox();
		$('.menutoggle').removeClass('closemenu');
		$('.menutoggle').addClass('openmenu');
	}

	function resetNav() {
		$("#navshade").resetLightbox();
		$('.menutoggle').removeClass('closemenu');
		$('.menutoggle').addClass('openmenu');
	}

	function handleHomeMobileNav() {

		$('.homemobilenav a').on('click', function(event) {
			resetNav();
		});

	}

	$(document).ready( function() {

		setupLayout();

		resetNav();
		handleResize();

		handleHomeMobileNav();

		$('.menutoggle').on("click", function(event) {
			event.preventDefault();

			if ( $(this).hasClass('openmenu') ) {
				openNav();
			} else {
				closeNav();
			}

		});

		
		$.localScroll({
			'duration' : 300,
			'hash' : true,
		});


	});


	$(window).load( function() {
		handleResize();

		$('#loading').hide();

	});

	$(window).resize(function(){
		// Resize actions are in handleResize()
	    if (resizeTimer) {
	        clearTimeout(resizeTimer);   // clear any previous pending timer
	    }
	    resizeTimer = setTimeout(handleResize, 25);   // set new timer

	});


})(jQuery);