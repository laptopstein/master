<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Navigation
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'categories', 'label'=>Mage::helper('adminhtml')->__('Categories')),
            array('value'=>'top_links', 'label'=>Mage::helper('adminhtml')->__('Top Links'))
        );
    }
}
