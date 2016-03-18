<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Helper_Data extends Mage_Core_Helper_Abstract {

	/** ------------------------------ General Template Settings ------------------------------- */

	public function isActiveWishlist() {					
		return Mage::getStoreConfig('template_settings/general/wishlist');				
    }
	
	public function isActiveCompare() {					
		return Mage::getStoreConfig('template_settings/general/compare');				
    }	
	
	public function getAspectRatio() {			
		return Mage::getStoreConfig('template_settings/general/aspect_ratio');				
    }
	
	public function getcategoryastreeview() {			
		return Mage::getStoreConfig('template_settings/general/categorytreeview');				
    }
	
	public function getcrossssaleslider() {			
		return Mage::getStoreConfig('template_settings/general/crossproductslider');				
    }
	
	
	
	public function getcustomemenulink() {			
		return Mage::getStoreConfig('template_settings/general/custommenulink');				
    }
	
	public function getcustomemenulink1() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link1');				
    }
	public function getcustomemenulinkidentifier1() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link1_identifier');				
    }
	
	public function getcustomemenulink2() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link2');				
    }
	public function getcustomemenulinkidentifier2() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link2_identifier');				
    }
	
	public function getcustomemenulink3() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link3');				
    }
	public function getcustomemenulinkidentifier3() {			
		return Mage::getStoreConfig('template_settings/general/custom_menu_link3_identifier');				
    }
	
	
	/** ------------------------------ Header Setting ------------------------------ */
	
	public function getFrameworkLogo() {			
        if (Mage::getStoreConfig('template_settings/header_setting/logo')){
            $html = '';
            $logo = Mage::getBaseUrl('media')."wysiwyg"."/"."megnor"."/". Mage::getStoreConfig('template_settings/header_setting/logo');	
            $html .= '<a href="'.Mage::getBaseUrl().'"><img src="'.$logo.'" alt="" /></a>';
			return $html;
		}
    } 
	
	/** -- Header Checkout link Setting -- */
	public function getUrl($route, $params = array())
    {
        return $this->_getUrl($route, $params);
    }
	
	public function getStaticTopLinks() {			
		return Mage::getStoreConfig('template_settings/header_setting/statictoplinks');		
    }
	
	public function getTopCurrency() {			
		return Mage::getStoreConfig('template_settings/header_setting/currency');		
    }
	
	public function getHeaderLanguages() {			
		return Mage::getStoreConfig('template_settings/header_setting/languages');		
    }
	
	public function getHeaderSearchBar() {			
		return Mage::getStoreConfig('template_settings/header_setting/search_bar');		
    }
	
	public function getHeaderCartdropdown() {			
		return Mage::getStoreConfig('template_settings/header_setting/cart_drop_down');		
    }
	
	public function getHeaderStaticBlock() {			
		return Mage::getStoreConfig('template_settings/header_setting/custom_cms_block');		
    }
	
	/** ------------------------------ Products Listing Settings ------------------------------ */
	
	public function displayNewLabel() {			
		return Mage::getStoreConfig('template_settings/products_listing/new_label');		
    }
	
	public function isNewProduct($_product) {			
		$now = date("Y-m-d");
		$newsFrom= substr($_product->getData('news_from_date'),0,10);
		$newsTo=  substr($_product->getData('news_to_date'),0,10);		
		if($this->displayNewLabel() && ($now >= $newsFrom) && ($now <= $newsTo)){
			return true;
		}else{
			return false;
		}
    }
	
	public function displaySaleLabel() {			
		return Mage::getStoreConfig('template_settings/products_listing/sale_label');		
    }
	
	public function isSpecialProduct($_product) {			
		$now = date("Y-m-d");
		$specialFrom= substr($_product->getData('special_from_date'),0,10);
		$specialTo=  substr($_product->getData('special_to_date'),0,10);
		if($this->displaySaleLabel() && (($now >= $specialFrom) && ($now <= $specialTo) || ($_product->special_price !== null) || ($_product->_rule_price !== null))){
			return true;
		}else{
			return false;
		}
    }
	
	public function uploadNewLogo() {			
		return Mage::getStoreConfig('template_settings/products_listing/new_logo_upload');		
    }
	public function uploadSaleLogo() {			
		return Mage::getStoreConfig('template_settings/products_listing/sale_logo_upload');		
    }
	
	public function getAttribute_1() {			
		return Mage::getStoreConfig('template_settings/products_listing/attribute_1');		
    }
	
	public function getAttribute_2() {			
		return Mage::getStoreConfig('template_settings/products_listing/attribute_2');		
    }
	
	public function getAttribute_3() {			
		return Mage::getStoreConfig('template_settings/products_listing/attribute_3');		
    }
	
	public function getProductAttribute($_product, $_shortDescription) {			
	
		$html= '';
		
		if($this->getAttribute_1()){	
			if ($this->getAttribute_1() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';
				
			}else if($this->getAttribute_1() == 'short_description'){
				
				$html .= '<div class="display-attributes">'.$_shortDescription.'<a href="'.$_product->getProductUrl() .'" title="'.$_productNameStripped.'" class="link-learn">'.$this->__('Learn More').'</a></div>';		
				
			}else if($this->getAttribute_1() != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_1())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_1())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		if($this->getAttribute_2()){	
			if ($this->getAttribute_2() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';
				
			}else if($this->getAttribute_2() == 'short_description'){
				
				$html .= '<div class="display-attributes">'.$_shortDescription.'<a href="'.$_product->getProductUrl() .'" title="'.$_productNameStripped.'" class="link-learn">'.$this->__('Learn More').'</a></div>';		
				
			}else if($_product->getResource()->getAttribute($this->getAttribute_2())->getFrontend()->getValue($_product) != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_2())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_2())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		if($this->getAttribute_3()){	
			if ($this->getAttribute_3() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';
				
			}else if($this->getAttribute_3() == 'short_description'){
				
				$html .= '<div class="display-attributes">'.$_shortDescription.'<a href="'.$_product->getProductUrl() .'" title="'.$_productNameStripped.'" class="link-learn">'.$this->__('Learn More').'</a></div>';		
				
			}else if($_product->getResource()->getAttribute($this->getAttribute_3())->getFrontend()->getValue($_product) != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_3())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_3())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		return $html;				 
	
    }	
	
	public function getAddtoLinksGrid() {			
		return Mage::getStoreConfig('template_settings/products_listing/add_to_links_grid');		
    }
	
	public function getAddtoLinksGridIcon() {			
		return Mage::getStoreConfig('template_settings/products_listing/add_to_links_grid_icon');		
    }
	
	public function getAddtoLinksList() {			
		return Mage::getStoreConfig('template_settings/products_listing/add_to_links_list');		
    }
	
	public function getAddtoLinksListIcon() {			
		return Mage::getStoreConfig('template_settings/products_listing/add_to_links_list_icon');		
    }
	
	public function getProductPerRow() {			
		return Mage::getStoreConfig('template_settings/products_listing/diplay_product_per_row');		
    }
	public function getProductgridimagewidth() {			
		return Mage::getStoreConfig('template_settings/products_listing/grid_image_width');		
    }
	public function getProductgridimageheight() {			
		return Mage::getStoreConfig('template_settings/products_listing/grid_image_height');		
    }
	 
	/** ------------------------------ Product Info Page Setting ------------------------------ */ 
	
	/** ----- Media Image Setting ----- */
 
	public function getImageWidth() {			
		return Mage::getStoreConfig('template_settings/products_info_page/image_width');		
    }
	
	public function getImageHeight() {			
		return Mage::getStoreConfig('template_settings/products_info_page/image_height');		
    }
	
	public function getMoreImageWidth() {			
		return Mage::getStoreConfig('template_settings/products_info_page/moreimagewidth');		
    }
	
	public function getMoreImageHeight() {			
		return Mage::getStoreConfig('template_settings/products_info_page/moreimageheight');		
    }
	
	public function getZoomOption() {			
		return Mage::getStoreConfig('template_settings/products_info_page/zoom_option');		
    }
	
	public function getAdditionalImageView() {			
		return Mage::getStoreConfig('template_settings/products_info_page/additionalimage_view');		
    }
	
	public function getrelatedproducttab() {			
		return Mage::getStoreConfig('template_settings/products_info_page/related_tab');		
    }
	/** ------- LightBox Image Setting ------- */
	
	public function getOverlayOpacity() {			
		return Mage::getStoreConfig('template_settings/products_info_page/lightboxoverlayopacity');		
    }
	
	public function getResizeSpeed() {			
		return Mage::getStoreConfig('template_settings/products_info_page/lightboxresizespeed');		
    }	
	
	public function getLabelImage() {			
		return Mage::getStoreConfig('template_settings/products_info_page/lightboxlabelimage');		
    }
	
	public function getLabelOf() {			
		return Mage::getStoreConfig('template_settings/products_info_page/lightboxlabelof');		
    }
	
	/** ------- Cloud Image Zoom Setting ------- */
	
	public function getCloudPosition() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_position');		
    }
	
	public function getCloudShowTitle() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_show_title');		
    }
	
	public function getCloudTitleOpacity() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_title_opacity');		
    }
	
	public function getCloudLensOpacity() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_lens_opacity');		
    }
	
	public function getCloudZoomWidth() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_zoom_width');		
    }
	
	public function getCloudZoomHeight() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_zoom_height');		
    }
	
	public function getCloudBigImageWidth() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_big_image_width');		
    }
	
	public function getCloudBigImageHeight() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_big_image_height');		
    }
	
	public function getCloudTintColor() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_tint_color');		
    }
	
	public function getCloudTintOpacity() {			
		return Mage::getStoreConfig('template_settings/products_info_page/cloud_tint_opacity');		
    }
	
	/** ------- General Setting ------- */
	
	public function getEnableThirdColumn() {			
		return Mage::getStoreConfig('template_settings/products_info_page/enable_third_column');		
    }
	
	public function getColumnContent() {			
		return Mage::getStoreConfig('template_settings/products_info_page/column_content');		
    }
	
	public function getRelatedRandomProduct() {			
		$collection = Mage::getResourceModel('catalog/product_collection');
		Mage::getModel('catalog/layer')->prepareProductCollection($collection);
		$collection->getSelect()->order('rand()');
		$collection->addStoreFilter();
		$numProducts = 4;
		$collection->setPage(1, $numProducts);		
		return $collection;
    }
	
	public function displayquickview() {			
		return Mage::getStoreConfig('template_settings/products_info_page/quick_view');		
    }
	
	
	public function getRelatedProduct() {			
		return Mage::getStoreConfig('template_settings/products_info_page/related_product');		
    }
	
	public function getUpsellProduct() {			
		return Mage::getStoreConfig('template_settings/products_info_page/upsell_product');		
    }
	
	public function getprevnextbutton() {			
		return Mage::getStoreConfig('template_settings/products_info_page/prev_next_button');		
    }
	
	public function getSocialIcon() {
					
		return Mage::getStoreConfig('template_settings/products_info_page/social_icon');		
    }
	
	public function getSocialIconScript() {	
		if($this->getSocialIcon() == 'default_share'){	
			$html ='<!-- AddThis Button BEGIN -->
					<div class="addthis_toolbox addthis_default_style ">
						<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
						<a class="addthis_button_tweet"></a>
						<a class="addthis_button_pinterest_pinit"></a>
						<a class="addthis_counter addthis_pill_style"></a>
						</div>
						<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=xa-50daec4f45d7a292"></script>
						<!-- AddThis Button END -->';
			return $html;	
		}else {		
			return null;		
		}	
    }
	
	
	public function getAttribute_Code_1() {			
		return Mage::getStoreConfig('template_settings/products_info_page/attribute_code_1');		
    }
	
	public function getAttribute_Code_2() {			
		return Mage::getStoreConfig('template_settings/products_info_page/attribute_code_2');		
    }
	
	public function getAttribute_Code_3() {			
		return Mage::getStoreConfig('template_settings/products_info_page/attribute_code_3');		
    }
	
		
	public function getProductAttributeCode($_product) {				
		$html= '';		
		if($this->getAttribute_Code_1()){	
			if ($this->getAttribute_Code_1() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';			
							
			}else if($_product->getResource()->getAttribute($this->getAttribute_Code_1())->getFrontend()->getValue($_product) != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_Code_1())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_Code_1())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		if($this->getAttribute_Code_2()){	
			if ($this->getAttribute_Code_2() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';			
							
			}else if($_product->getResource()->getAttribute($this->getAttribute_Code_2())->getFrontend()->getValue($_product) != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_Code_2())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_Code_2())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		if($this->getAttribute_Code_3()){	
			if ($this->getAttribute_Code_3() == 'sku'){
			
				$html .= '<div class="display-attributes"><label><strong>Sku : </strong></label>'.$this->htmlEscape($_product->getData('sku')).'</div>';			
							
			}else if($_product->getResource()->getAttribute($this->getAttribute_Code_3())->getFrontend()->getValue($_product) != null){	
			
				$html .= '<div class="display-attributes"><label><strong>'.$_product->getResource()->getAttribute($this->getAttribute_Code_3())->getStoreLabel().' : </strong></label>'.$_product->getResource()->getAttribute($this->getAttribute_Code_3())->getFrontend()->getValue($_product).'</div>';	
			}	
		}
		
		return $html;				 
	
    }	
	
/** ------------------------------ General Body Settings ------------------------------- */
	public function getTemplateWidth() {					
			return Mage::getStoreConfig('template_design/general/templatewidth');				
	}	
	public function getTemplateLeftColWidth() {					
			return Mage::getStoreConfig('template_design/general/leftcolwidth');				
	}
	public function getTemplateRightColWidth() {					
			return Mage::getStoreConfig('template_design/general/rightcolwidth');				
	}
	public function getTemplateshowcontrolpanel() {					
			return Mage::getStoreConfig('template_design/general/showcontrolpanel');				
	}
	public function showtoptobottombutton() {			
		return Mage::getStoreConfig('template_design/general/toptobottom');				
    }
	public function uploadtoptobottombutton() {			
		return Mage::getStoreConfig('template_design/general/upload_toptobottomimage');				
    }
	public function getTemplateRagularFontType() {					
			return Mage::getStoreConfig('template_design/general/ragularfontfamily');				
	}	
	public function getTemplateRagularspecifiedFontType() {					
			return Mage::getStoreConfig('template_design/general/ragularotherfontfamily');				
	}	
	public function getTemplateHeadingFontType() {					
			return Mage::getStoreConfig('template_design/general/headingfontfamily');				
	}
	public function getTemplateHeadingspecifiedFontType() {					
			return Mage::getStoreConfig('template_design/general/headingotherfontfamily');				
	}
	public function getTemplateBasicFontSize() {					
			return Mage::getStoreConfig('template_design/general/basicfontsize');				
	}
	public function getTemplateRegulareTextColor() {					
			return Mage::getStoreConfig('template_design/general/ragulartextcolor');				
	}
	public function getTemplateRegularePriceColor() {					
			return Mage::getStoreConfig('template_design/general/regularepricecolor');				
	}
	public function getTemplateSpecialPriceColor() {					
			return Mage::getStoreConfig('template_design/general/specialpricecolor');				
	}
	public function getTemplateLinkColor() {					
			return Mage::getStoreConfig('template_design/general/linkcolor');				
	}
	public function getTemplateLinkHoverColor() {					
			return Mage::getStoreConfig('template_design/general/linkhovercolor');				
	}
	public function getTemplateBackgroundColor() {					
			return Mage::getStoreConfig('template_design/general/bgcolor');				
	}
	public function getTemplateBackgroundrepeatXY() {					
			return Mage::getStoreConfig('template_design/general/backgroundrepeat');				
	}
	public function getTemplateBackgroundImage() {					
			return Mage::getStoreConfig('template_design/general/upload_bgimage');				
	}
	public function getTemplateBackgroundPosX() {					
			return Mage::getStoreConfig('template_design/general/bgposition_x');				
	}
	public function getTemplateBackgroundPosY() {					
			return Mage::getStoreConfig('template_design/general/bgposition_y');				
	}
	public function getTemplateButtonFontType() {					
			return Mage::getStoreConfig('template_design/general/button_fontfamily');				
	}
	public function getTemplateButtonotherFontType() {					
			return Mage::getStoreConfig('template_design/general/button_otherfontfamily');				
	}
	public function getTemplateButtonBackgroundColor() {					
			return Mage::getStoreConfig('template_design/general/button_bgcolor');				
	}
	public function getTemplateButtonTextColor() {					
			return Mage::getStoreConfig('template_design/general/button_textcolor');				
	}
	public function getTemplateButtonBackgroundHoverColor() {					
			return Mage::getStoreConfig('template_design/general/button_hoverbgcolor');				
	}
	public function getTemplateButtonTextHoverColor() {					
			return Mage::getStoreConfig('template_design/general/button_hovertextcolor');				
	}
	public function getTemplateButtonCustom() {					
		return Mage::getStoreConfig('template_design/general/custom_cssbutton');				
	}
	public function getTemplateButtonHoverCustom() {					
		return Mage::getStoreConfig('template_design/general/custom_cssbuttonhover');				
	}
	
/** ------------------------------ Header Settings ------------------------------- */
	
	public function getTemplateHeaderBackgroundColor() {					
		return Mage::getStoreConfig('template_design/header_setting/header_bgcolor');				
	}
	public function getTemplateHeaderBackgroundImage() {					
		return Mage::getStoreConfig('template_design/header_setting/upload_header_bgimage');				
	}
	public function getTemplateHeaderBackgroundImagerepeatoption() {					
		return Mage::getStoreConfig('template_design/header_setting/headerbackgroundrepeat');				
	}
	
	public function getTemplateHeaderBackgroundPosX() {					
		return Mage::getStoreConfig('template_design/header_setting/header_bgpostion_x');				
	}
	public function getTemplateHeaderBackgroundPosY() {					
		return Mage::getStoreConfig('template_design/header_setting/header_bgpostion_y');				
	}
	public function getTemplateHeaderTopLinkFontType() {					
		return Mage::getStoreConfig('template_design/header_setting/header_toplinkfonttype');				
	}
	public function getTemplateHeaderTopLinkotherFontType() {					
		return Mage::getStoreConfig('template_design/header_setting/header_toplinkotherfonttype');				
	}
	public function getTemplateHeaderTopLinkColor() {					
		return Mage::getStoreConfig('template_design/header_setting/header_toplinkcolor');				
	}
	public function getTemplateHeaderTopLinkHoverColor() {					
		return Mage::getStoreConfig('template_design/header_setting/header_toplinkhovercolor');				
	}
	
/** ------------------------------ Navigation Settings ------------------------------- */
	
	public function getTemplateNavBackgroundColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_bgcolor');				
	}
	public function getTemplateNavBackgroundImage() {					
		return Mage::getStoreConfig('template_design/header_setting/upload_navigation_bgimage');				
	}
	public function getTemplateNavBackgroundImageRepeatXY() {					
		return Mage::getStoreConfig('template_design/header_setting/navigationbackgroundrepeat');				
	}
	public function getTemplateNavBackgroundPosX() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_bgpostion_x');				
	}
	public function getTemplateNavBackgroundPosY() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_bgpostion_y');				
	}
	public function getTemplateNavLinkFontType() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_linkfonttype');				
	}
	public function getTemplateNavLinkotherFontType() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_linkotherfonttype');				
	}
	
	public function getTemplateNavLinkBackgroundcolor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_bglinkcolor');				
	}
	public function getTemplateNavLinkTextcolor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_textlinkcolor');				
	}
	public function getTemplateNavLinkBackgroundHovercolor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_hoverlinkbgcolor');				
	}
	public function getTemplateNavLinkTextHovercolor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_hoverlinktextcolor');				
	}
	public function getTemplateNavActiveBackgroundColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_activelinkbgcolor');				
	}
	public function getTemplateNavActiveLinkColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_activelinktextcolor');				
	}
	public function getTemplateNavCustomCss() {					
		return Mage::getStoreConfig('template_design/header_setting/custom_cssnavigation');				
	}
	public function getTemplateNavDropDownBackColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_dropdownbgcolor');				
	}
	public function getTemplateNavDropDownLinkColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_dropdownlinkcolor');				
	}
	public function getTemplateNavDropDownLinkHoverColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_dropdownhoverlinkcolor');				
	}
	public function getTemplateNavDropDownbkgHoverColor() {					
		return Mage::getStoreConfig('template_design/header_setting/navigation_dropdownhoverbkgcolor');				
	}
	public function getTemplateNavDropDownCustomCss() {					
		return Mage::getStoreConfig('template_design/header_setting/custom_cssdropdownnavigation');				
	}
	
/** ------------------------------ BreadCrumbs Settings ------------------------------- */
	
	public function getTemplateBreadcrumbBackgroundColor() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumb_bgcolor');				
	}
	public function getTemplateBreadcrumbBackgroundImage() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/upload_breadcrumb_bgimage');				
	}
	public function getTemplateBreadcrumbBackgroundImageRepeatXY() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumbsbackgroundrepeat');				
	}	
	public function getTemplateBreadcrumbBackgroundPosX() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumb_bgpostion_x');				
	}
	public function getTemplateBreadcrumbBackgroundPosY() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumb_bgpostion_y');				
	}
	public function getTemplateBreadcrumbDeviderImage() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/upload_breadcrumb_deviderimage');				
	}
	public function getTemplateBreadcrumbDeviderImageRepeatXY() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumbsdividerbackgroundrepeat');				
	}	
	public function getTemplateBreadcrumbFontType() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumbfontfamily');				
	}
	public function getTemplateBreadcrumbotherFontType() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumbotherfontfamily');				
	}
	
	public function getTemplateBreadcrumbLinkColor() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumb_linkcolor');				
	}
	public function getTemplateBreadcrumbLinkHoverColor() {					
		return Mage::getStoreConfig('template_design/breadcrumb_setting/breadcrumb_hoverlinkcolor');				
	}
	
/** ------------------------------ Footer Settings ------------------------------- */

	public function getTemplateFooterTextFontType() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_fontfamily');				
	}
	public function getTemplateFooterotherTextFontType() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_otherfontfamily');				
	}
	
	public function getTemplateFooterTextFontSize() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_fontsize');				
	}
	public function getTemplateFooterBackgroundColor() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_bgcolor');				
	}
	public function getTemplateFooterBackgroundImage() {					
		return Mage::getStoreConfig('template_design/footer_setting/upload_footer_bgimage');				
	}
	public function getTemplateFooterBackgroundPosX() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_bgpostion_x');				
	}
	public function getTemplateFooterBackgroundPosY() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_bgpostion_y');				
	}
	public function getTemplateFooterLinkFontType() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_linkfonttype');				
	}
	public function getTemplateFooterLinkotherFontType() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_linkotherfonttype');				
	}
	public function getTemplateFooterLinkFontColor() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_linkcolor');				
	}
	public function getTemplateFooterLinkFontHoverColor() {					
		return Mage::getStoreConfig('template_design/footer_setting/footer_hoverlinkcolor');				
	}
	public function getTemplateFooterCustomCSS() {					
		return Mage::getStoreConfig('template_design/footer_setting/custom_cssfooter');				
	}
	
	
}
