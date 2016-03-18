jQuery(document).ready(function(){
 //if this is not the first tab, hide it
 jQuery(".tab:not(:first)").hide();
 
 //to fix u know who
 jQuery(".tab:first").show();
 
 //when we click one of the tabs
 jQuery(".tabbernav  li  a").click(function(){
 
 //get the ID of the element we need to show
 stringref = jQuery(this).attr("href").split('#')[1];
 
 //hide the tabs that doesn't match the ID
 jQuery('.tab:not(#'+stringref+')').hide();
 //fix
 if (jQuery.browser.msie && jQuery.browser.version.substr(0,3) == "6.0") {
 jQuery('.tab#' + stringref).show();
 }
 else
 //display our tab fading it in
 jQuery('.tab#' + stringref).fadeIn();
 //stay with me
 return false;
 });
 
});


