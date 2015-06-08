jQuery(document).ready(function($) {
 
	var $container = $('.mymasonry');

	$container.imagesLoaded( function(){
	  $container.masonry({
	    itemSelector : '.mymasonry .grid'
	  });
	});

});