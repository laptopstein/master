jQuery(document).ready(function () {
jQuery(".btn-slide").hover(
function () {
jQuery('#panel').stop(true, true).slideDown('medium');
},
function () {
jQuery('#panel').stop(true, true).slideUp('medium');
}
);
}); 


