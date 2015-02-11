jQuery(document).ready(function ($) {

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