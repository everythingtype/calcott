var TUMBLR_API_KEY = "mUToHQDSR9P5JVXm62TDSIPPiYYZh1y1Q7jdhbgmCBrgEeAtkX";
var TUMBLR_HOSTNAME = "blog.nicholascalcott.com";

(function($) {

	$(document).ready( function() {

		$("#tumblr").getTumblrPosts({
			type: "photo",
			limit: 1,
			template: "#tmpl-photo",
		});

	});

	$.views.converters({
		datetime: function (date) {

			var date = new Date(date);

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
	
			return month_names[m] + ' ' + d + ' ' + y;

		}

	});


})(jQuery);