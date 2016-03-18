(function($){
	var initLayout = function() {
		var hash = window.location.hash.replace("#", "");
		$("#template_style_header_setting_template_color").ColorPicker({
			onSubmit: function(hsb, hex, rgb, el) {
				$(el).val(hex);
				$(el).ColorPickerHide();
				$(el).css("backgroundColor", "#" + hex);
			},
			onBeforeShow: function () {
				$(this).ColorPickerSetColor(this.value);
			},
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
		
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				
			},
			onChange: function (hsb, hex, rgb) {
				$("#template_style_header_setting_template_color").css("backgroundColor", "#" + hex);
				$("#template_style_header_setting_template_color").val(hex);
			}
		})
		.bind("keyup", function(){
			$(this).ColorPickerSetColor(this.value);
		});

	};
	EYE.register(initLayout, "init");
})(jQuery)