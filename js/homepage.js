var TUMBLR_API_KEY = "mUToHQDSR9P5JVXm62TDSIPPiYYZh1y1Q7jdhbgmCBrgEeAtkX";
var TUMBLR_HOSTNAME = "blog.nicholascalcott.com";

(function($) {

	function instaDate(time) {
		console.log(time);
	}

	function openNews() {
		$('#news').show();
		$('#news .inner').fadeIn('fast');
		$('#newsbutton').addClass('active');
	}

	function closeNews() {
		$('#news .inner').fadeOut('fast', function () {
			$('#news').hide();
		});
		$('#newsbutton').removeClass('active');
		$('#newsbutton').addClass('inactive');
	}

	$(document).ready( function() {

		$.localScroll({
			'duration' : 300,
			'hash' : true,
		});

		$('#news').draggable();

		$('#newsbutton').on('click', function(event) {
			event.preventDefault();

			if ( $(this).hasClass('active') ) {
				closeNews();
			} else {
				openNews();
			}
		});

		$('#news .close').on('click', function(event) {
			event.preventDefault();
			closeNews();
		});

		$("#tumblr").getTumblrPosts({
			type: "photo",
			limit: 1,
			template: "#tmpl-photo",
		});

		var feed = new Instafeed({
			get: 'user',
			userId: 636337139,
		    accessToken: '262351.467ede5.176ab1984b1d47e6b8dea518109d7a5e',
			link: 'true',
			clientId: '80aeda87e8c44281b83ce6f542a30933',
			limit: '1',
			sortBy: 'most-recent',
			resolution: 'standard_resolution',
			links: false,
			template: '<h3>{{model.created_time}} {{model.tagsFormatted}}</h3><img src="{{image}}" />',
			filter: function(image) {

				var date = new Date(image.created_time*1000);

				m = date.getMonth();
				d = date.getDate();
				y = date.getFullYear();
				
				var month_names = new Array ( );
				month_names[month_names.length] = "Jan";
				month_names[month_names.length] = "Feb";
				month_names[month_names.length] = "Mar";
				month_names[month_names.length] = "Apr";
				month_names[month_names.length] = "May";
				month_names[month_names.length] = "Jun";
				month_names[month_names.length] = "Jul";
				month_names[month_names.length] = "Aug";
				month_names[month_names.length] = "Sep";
				month_names[month_names.length] = "Oct";
				month_names[month_names.length] = "Nov";
				month_names[month_names.length] = "Dec";

				var thetime = month_names[m] + ' ' + d + ' ' + y;

				image.created_time = thetime;

				return true;
			}

		});
		feed.run();

	});

})(jQuery);