<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Categorysidebox
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'default', 'label'=>Mage::helper('adminhtml')->__('Default Magento')),
            array('value'=>'treeview', 'label'=>Mage::helper('adminhtml')->__('Tree View')),
			array('value'=>'vertical_css', 'label'=>Mage::helper('adminhtml')->__('Vertical Css'))
        );
    }
}
