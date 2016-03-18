jQuery(document).ready(function() {
							
	jQuery('#tm-panel-switch').click(function(){
		if ( jQuery(this).hasClass('panel-open') ) {
			jQuery('#tm-control-panel').animate( { left: 0 } );
			jQuery(this).removeClass('panel-open');
			jQuery.cookie('tm_panel_open', 0);
			
		} else {
			jQuery('#tm-control-panel').animate( { left: -225 } );
			jQuery(this).addClass('panel-open');
			jQuery.cookie('tm_panel_open', 1);
			
		}
		return false;
	});
		
	if ( jQuery.cookie('tm_panel_open') == 1 ) { 
		jQuery('#tm-control-panel').css({left: -225});
		jQuery('#tm-panel-switch').addClass('panel-open');
	}	

});

(function($){
	var initLayout = function() {
		var hash = window.location.hash.replace('#', '');

		$('#tm-panel-bkgcolor').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#mainbody').css('backgroundColor', '#' + hex);
				$('#tm-panel-bkgcolor').css('backgroundColor', '#' + hex);
				$('#panel_form').submit(function() {
				$.cookie('tm-panel-bkgcolor', hex);
		    });
			}
		});
		
		
		$('#tm-panel-colorscheme-color').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('.social_block div.icon, #newslatter div.icon, #block_3 div.icon, #block_2 div.icon, #block_1 div.icon, .cart_icon,.nav-container,.block .block-title,.sub_banner .active,#first_3col .custom_icon').css('backgroundColor', '#' + hex);
				$('#tm-panel-colorscheme-color').css('backgroundColor', '#' + hex);

			}
		});	
		
		
		$('#tm-panel-body-font-color').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#mainbody').css('color', '#' + hex);
				$('#tm-panel-body-font-color').css('backgroundColor', '#' + hex);
			}
		});	
		
		$('#tm-panel-nav-font-color').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				jQuery('#nav a, div.menu a, div.megnor-advanced-menu-popup a').css('color', '#' + hex);
			}
		});	

		$('#tm-panel-linkcolor').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('a').css('color', '#' + hex);
				$('#tm-panel-linkcolor').css('backgroundColor', '#' + hex);
			}
		});	

		$('#tm-panel-footercolor').ColorPicker({
			color: '#0000ff',
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('.footer a').css('color', '#' + hex);
				$('#tm-panel-footercolor').css('backgroundColor', '#' + hex);
			}
		});	
		
		
	//=================== TEXTURE SETTINGS ========================//
	/*jQuery('#tm-control-panel a.tm-panel-item').click(function(){
			alert("asdfsadfsdf");
		var tm_texture_value = jQuery(this).attr('rel'),
			//tm_theme_path = jQuery("meta[name=tm_theme_path]").attr('content');
			tm_theme_path = 'http://192.168.0.101/user12/Magento/Magento_module/skin/frontend/default/tempmela_2colleft';
			//alert(tm_theme_path);

		//jQuery('#mainbody').css('backgroundImage', 'url(' + tm_theme_path + '/images/colorpicker/patterns/' + tm_texture_value + '.png)' );
		jQuery('#panel_form').submit(function() {
			jQuery.cookie('tm_texture', tm_texture_value);
		});
	});*/
	
	
	//=================== BODY FONT SETTINGS ========================//
	var tm_bodyfont_tag = '#mainbody';

	jQuery('#tm-panel-body-font').change(function(){

		var tm_bodyfont_encoded = jQuery(this).val(),
			tm_bodyfont_value = jQuery(this).val().replace(' ','+');

		jQuery('head').append('<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=' + tm_bodyfont_value + '" />');
		jQuery('head').append('<style type="text/css">' + tm_bodyfont_tag + ' { font-family: "' + tm_bodyfont_encoded + '"; }</style>');
	});
	
	//=================== NAVIGATION  FONTSETTINGS ========================//
	var tm_navfont_tag = '#nav a';

	jQuery('#tm-panel-nav-font').change(function(){

		var tm_navfont_encoded = jQuery(this).val(),
			tm_navfont_value = jQuery(this).val().replace(' ','+');

		jQuery('head').append('<link type="text/css" rel="stylesheet" href="http://fonts.googleapis.com/css?family=' + tm_navfont_value + '" />');
		jQuery('head').append('<style type="text/css">' + tm_navfont_tag + ' { font-family: "' + tm_navfont_encoded + '" !important; }</style>');
	
	});
		
	};
	EYE.register(initLayout, 'init');
})(jQuery)

