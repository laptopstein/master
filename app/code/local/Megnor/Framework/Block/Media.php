<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */
?>
<?php

class Megnor_Framework_Block_Media extends Mage_Core_Block_Template
{
	public function _prepareLayout()
    {
        if( $this->getRequest()->getControllerName()=='product'){
			
		if (Mage::getStoreConfig('template_settings/products_info_page/zoom_option') == "lightbox_zoom"){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');        
			$head->addItem('skin_css', 'css/framework/zoom/lightbox/lightbox.css');
			$head->addItem('skin_js', 'js/framework/zoom/lightbox/lightbox.js');
		}
		if (Mage::getStoreConfig('template_settings/products_info_page/zoom_option') == "cloud_zoom"){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');        
			$head->addItem('skin_css', 'css/framework/zoom/cloudzoom/cloud-zoom.css');
			//$head->addItem('skin_js', 'js/framework/zoom/cloudzoom/jquery-1.4.2.min.js');
			$head->addItem('skin_js', 'js/framework/zoom/cloudzoom/cloud-zoom.1.0.2.min.js');
		}
		
	 
		
		/*========== Extra ==========*/
		$layout = $this->getLayout();  
		$head = $layout->getBlock('head'); 
		$head->addItem('skin_css', 'css/framework/upsale_related/upsale_slider.css');
		$head->addItem('skin_js', 'js/framework/upsale_related/upsale_jcarousel.js');
		$head->addItem('skin_css', 'css/framework/upsale_related/related_slider.css');
		$head->addItem('skin_js', 'js/framework/upsale_related/related_jcarousel.js');
		
		}
		
		if (Mage::getStoreConfig('template_settings/header_setting/cart_drop_down')){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');        
			$head->addItem('skin_css', 'css/framework/cartdropdown/dropdown.css');
			$head->addItem('skin_js', 'js/framework/cartdropdown/cartdropdown.js');
		}
		
		if (Mage::getStoreConfig('template_design/general/toptobottom')){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');        
			$head->addItem('skin_js', 'js/framework/topbutton/scrolltopcontrol.js');
		}
		
		if (Mage::getStoreConfig('template_design/general/showcontrolpanel')){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');  
			$head->addItem('skin_css', 'css/framework/colorpicker/tm-style.css');   
			$head->addItem('skin_css', 'css/framework/colorpicker/colorpicker.css');      
			$head->addItem('skin_js', 'js/framework/colorpicker/colorpicker.js');
			$head->addItem('skin_js', 'js/framework/colorpicker/eye.js');
			$head->addItem('skin_js', 'js/framework/colorpicker/pscript.js');
		}
		
		if (Mage::getStoreConfig('template_settings/general/categorytreeview') == "treeview" ){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');  
			$head->addItem('skin_css', 'css/framework/categorysidebox/treeview/jquery.treeview.css');     
			
		}
		if (Mage::getStoreConfig('template_settings/general/categorytreeview') == "vertical_css" ){
			$layout = $this->getLayout();       
			$head = $layout->getBlock('head');  
			$head->addItem('skin_css', 'css/framework/categorysidebox/verticalcss/vertcal_css.css');      
			$head->addItem('skin_js', 'js/framework/categorysidebox/verticalcss/vertcalcss_js.js');
		}
		
		if( $this->getRequest()->getControllerName()=='cart'){
			if (Mage::getStoreConfig('template_settings/general/crossproductslider'))
			{
				$layout = $this->getLayout();       
				$head = $layout->getBlock('head');  
				$head->addItem('skin_css', 'css/crosssale/skin.css');      
		}
		} //$this->getRequest()->getControllerName()=='cart'
		
		
					
    }
		
	
}
