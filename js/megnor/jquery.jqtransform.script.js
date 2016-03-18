var $k = jQuery.noConflict();
$k(function($) {
    $k('.toolbar').jqTransform();				
	$k('.header_top_right').jqTransform();				
	$k('.block-brand-nav-left').jqTransform();
	$k('.pager .limiter').jqTransform();
})


/*=========== Js For Footer Toggle =========== */
jQuery(document).ready(function() {
jQuery('#footer .mobile_togglemenu').click(function () {
		jQuery(this).parent().toggleClass('tm_togglemenu');
		jQuery(this).parent().children('ul').toggleClass('tm_togglemenu').slideToggle();
	});
});	

/*=========== Js For Header Toggle =========== */
jQuery(document).ready(function(){
	jQuery(".toggle_img").click(function(){
	jQuery(".links").toggle('slow');
	});
}); 
