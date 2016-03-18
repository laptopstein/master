<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Zoomtype
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'default_magento', 'label'=>Mage::helper('adminhtml')->__('Default Magento')),
            array('value'=>'lightbox_zoom', 'label'=>Mage::helper('adminhtml')->__('Lightbox Zoom')),
			array('value'=>'cloud_zoom', 'label'=>Mage::helper('adminhtml')->__('Cloud Zoom'))
        );
    }
}
