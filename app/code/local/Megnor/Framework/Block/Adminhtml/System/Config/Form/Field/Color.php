<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php 
class Megnor_Framework_Block_Adminhtml_System_Config_Form_Field_Color extends Mage_Adminhtml_Block_System_Config_Form_Field
{
   
    protected function _getElementHtml(Varien_Data_Form_Element_Abstract $element)
    {

        // Get the default HTML for this option
        $html = parent::_getElementHtml($element);

        if ( !Mage::registry('jQColorPicker') ) {
            $html .= '
                <script type="text/javascript" src="'.$this->getJsUrl('megnor/jquery-1.8.3.min.js').'"></script>
                <script type="text/javascript" src="'.$this->getJsUrl('megnor/jqconflict.js').'"></script>
				<script type="text/javascript" src="'.$this->getJsUrl('megnor/colorpicker.js').'"></script>
				<script type="text/javascript" src="'.$this->getJsUrl('megnor/eye.js').'"></script>
				<script type="text/javascript" src="'.$this->getJsUrl('megnor/layout.js').'"></script>
                ';
            Mage::register('jQColorPicker', 1);
        }
		
		$html .= '
        <script type="text/javascript">
			(function($){
				
				var currentColor = $("#'.$element->getHtmlId().'").val() ;
				$("#'.$element->getHtmlId().'").css("backgroundColor", "#" + currentColor);
				var initLayout = function() {
					var hash = window.location.hash.replace("#", "");
					$("#'.$element->getHtmlId().'").ColorPicker({
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
							$("#'.$element->getHtmlId().'").css("backgroundColor", "#" + hex);
							$("#'.$element->getHtmlId().'").val(hex);
						}
					})
					.bind("keyup", function(){
						$(this).ColorPickerSetColor(this.value);
					});
			
				};
				EYE.register(initLayout, "init");
			})(jQuery)
        </script>';
        return $html;
    }
}