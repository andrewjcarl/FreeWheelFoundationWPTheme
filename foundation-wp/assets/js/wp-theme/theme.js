jQuery(document).ready(function ($) {

// Inside of this function, $() will work as an alias for jQuery()
// and other libraries also using $ will not be accessible under this shortcut

     // Media Upload Function for Wordpress
    //
    //	@source http://codestag.com/how-to-use-wordpress-3-5-media-uploader-in-theme-options/
    //	@source	http://mikejolley.com/2012/12/using-the-new-wordpress-3-5-media-uploader-in-plugins/
    //	@source http://pastebin.com/tpwsY1iu
    //	@source http://www.webmaster-source.com/2010/01/08/using-the-wordpress-uploader-in-your-plugin-or-theme/#comment-11610
    //

	$('[wp-upload]').click(function() {
		var attr = $(this).attr('wp-upload'),
        input = $(attr),
        img = $(this).attr('wp-upload-img'),
        audio = $(this).attr('wp-upload-audio');

		wp.media.editor.send.attachment = function(props, attachment) {
			input.val(attachment.url);

      if (img && img !== "") {
        var _i = document.getElementById(img.replace('#',''));
        _i.src = attachment.url;}

		};
		wp.media.editor.open(this);
		return false;
	});


// Stop jQuery Functions	
	
});	
	




