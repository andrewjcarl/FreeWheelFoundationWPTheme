/*!
 * joomanji-child v1.0.0
 * Build date: 2015-02-15
 * Copyright 2014.
 */jQuery(document).ready(function ($) {

  var navContainers = $('[nav-panel]'),
      navMenuItems = $('[nav-panel-toggle]');

  //  hide our first panel and set the first menu item to active
  navContainers.not(':first').hide();
  navMenuItems.filter(':first').addClass('active');

  //  our click event
  navMenuItems.click(function(e) {
    navMenuItems.removeClass('active');
    $(this).addClass('active');
    navContainers.hide();
    navContainers.filter($(this).attr('nav-panel-toggle')).show();
  });

}); 

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

        console.log(attr,input,img);

		wp.media.editor.send.attachment = function(props, attachment) {
            console.log(props,attachment);

			input.value = attachment.url;

            if (img && img !== "") {
                var imgNode = document.getElementById(img.replace('#',''));
                if (imgNode)
                    imgNode.src = attachment.url;
            }

		};
		wp.media.editor.open(this);
		return false;
	});


// Stop jQuery Functions	
	
});	
	




