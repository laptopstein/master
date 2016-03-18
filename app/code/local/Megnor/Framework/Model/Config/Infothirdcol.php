<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Infothirdcol
{
       
    public function toOptionArray()
    {
       return array(            
		   	array('value'=>'dynamic_attribute_content', 'label'=>Mage::helper('adminhtml')->__('Dynamic Attribute Content')),
            array('value'=>'static_block_content', 'label'=>Mage::helper('adminhtml')->__('Static Block Content')),			
			array('value'=>'related_products', 'label'=>Mage::helper('adminhtml')->__('Related Products')),
			array('value'=>'upsell_product', 'label'=>Mage::helper('adminhtml')->__('Up-Sell Product'))
        );
    }
}
