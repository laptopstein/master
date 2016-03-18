<?php

/**
 * @category     Inchoo
 * @package     Inchoo Featured Products
 * @author        Domagoj Potkoc, Inchoo Team <web@inchoo.net>
 * @modified    Mladen Lotar <mladen.lotar@surgeworks.com>, Vedran Subotic <vedran.subotic@surgeworks.com>
 */
class Megnor_FeaturedProducts_Block_Display extends Mage_Core_Block_Template {
    
	public function _prepareLayout()  
	{
		if(Mage::getStoreConfig('featuredproducts/general/active') && Mage::getStoreConfig('featuredproducts/cmspage/slider')){
			$this->getLayout()->getBlock('head')->addItem('skin_css', 'css/featuredproducts/skin_feature.css');
		}
    }

}