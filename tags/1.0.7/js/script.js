jQuery(function($) {
	var $container = $('#content');

	$container.imagesLoaded( function(){
	  $container.masonry({
	    itemSelector : '.item'
	  });
	});
	if ( ! $("header .menu").parent().hasClass("main-navigation")) {
			$("header .menu").removeClass('menu').addClass("main-navigation").find("ul:first").addClass("menu");
	} 
});
