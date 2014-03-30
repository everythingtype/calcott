// Instagram
/*
var feed = new Instafeed({
    get: 'tagged',
    tagName: 'awesome',
    clientId: 'YOUR_CLIENT_ID'
});
feed.run();

*/

// Tumblr

var TUMBLR_API_KEY = "mUToHQDSR9P5JVXm62TDSIPPiYYZh1y1Q7jdhbgmCBrgEeAtkX";
var TUMBLR_HOSTNAME = "blog.nicholascalcott.com";

(function($) {
	$(document).ready( function() {



		$("#posts").getTumblrPosts({
			limit: 1,
			type: 'photo',
			template: "#tmpl-photo",
		});
	});	
})(jQuery);