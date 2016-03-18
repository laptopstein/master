<?php 
class Megnor_Bestseller_Block_Bestseller extends Mage_Core_Block_Template { 

	const DEFAULT_PRODUCTS_COUNT = 5;	
	
	public function _prepareLayout()
    {
		/*if( Mage::getStoreConfig('bestseller/general/active') && Mage::getStoreConfig('bestseller/sidebar/bestseller_slider') || Mage::getStoreConfig('bestseller/listing_home/slider')){
			$this->getLayout()->getBlock('head')->addItem('skin_js', 'js/bestseller/jquery.jcarousel.min.js');
			}*/
		
		if(Mage::getStoreConfig('bestseller/general/active') && Mage::getStoreConfig('bestseller/listing_home/slider')){
			$this->getLayout()->getBlock('head')->addItem('skin_css', 'css/bestseller/skin_bestseller.css');
			//$this->getLayout()->getBlock('head')->addItem('skin_js', 'js/bestseller/jcarousel_script.js');
		}
		if( Mage::getStoreConfig('bestseller/general/active') && Mage::getStoreConfig('bestseller/sidebar/bestseller_slider')){
			$this->getLayout()->getBlock('head')->addItem('skin_css', 'css/bestseller/skin_vartical.css');
			$this->getLayout()->getBlock('head')->addItem('skin_js', 'js/bestseller/jcarousel_vertical.js');
		}
		
		
    }
	
	public function getBestProductCollection()
    {    	
        $storeId    = Mage::app()->getStore()->getId();       
		
		if(Mage::registry('current_category') && Mage::getStoreConfig('bestseller/general/categorywised')):
		
			$products = Mage::getResourceModel('reports/product_collection')
				->addOrderedQty()
				->addUrlRewrite()
				->addAttributeToSelect(array('name', 'price', 'thumbnail', 'short_description','image','small_image','url_key'), 'inner')
				->addAttributeToFilter('status','1')
				->addCategoryFilter(Mage::registry('current_category'))
				->setStoreId($storeId)
				->addStoreFilter($storeId)
				->setPageSize($this->getProductsCount())
				->setOrder('ordered_qty', 'desc'); 
		else:
			$products = Mage::getResourceModel('reports/product_collection')
				->addOrderedQty()
				->addUrlRewrite()
				->addAttributeToSelect(array('name', 'price', 'thumbnail', 'short_description','image','small_image','url_key'), 'inner')
				->addAttributeToFilter('status','1')
				->setStoreId($storeId)
				->addStoreFilter($storeId)
				->setPageSize($this->getProductsCount())	
				->setOrder('ordered_qty', 'desc'); 
		endif;

		Mage::getSingleton('catalog/product_status')->addVisibleFilterToCollection($products);
		Mage::getSingleton('catalog/product_visibility')->addVisibleInCatalogFilterToCollection($products);

		return $products; 				
    }		
	
	protected function _toHtml() {
        if (!$this->helper('bestseller')->getIsActive()) {
            return '';
        }
        return parent::_toHtml();
    }

	
	public function setProductsCount($count) {
        $this->_productsCount = $count;
        return $this;
    }

    public function getProductsCount() {		
		$count = Mage::getStoreConfig('bestseller/sidebar/number_of_items');
				
		if($count) 		
			return $count;
			
        if (null === $this->_productsCount) {
            $this->_productsCount = self::DEFAULT_PRODUCTS_COUNT;
        }
        return $this->_productsCount;
    }
	
	public function getSidebarHeading() {		
		return Mage::getStoreConfig('bestseller/sidebar/heading');		
    }
	
	public function getPriceDisplay() {		
		return Mage::getStoreConfig('bestseller/sidebar/price');		
    }
	
	public function getAddtocart() {		
		return  Mage::getStoreConfig('bestseller/sidebar/add_to_cart');		
    }
	public function getbestsellerslider() {		
		return  Mage::getStoreConfig('bestseller/sidebar/bestseller_slider');		
    }

}  