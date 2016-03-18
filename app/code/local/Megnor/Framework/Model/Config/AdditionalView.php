<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_AdditionalView
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'list', 'label'=>Mage::helper('adminhtml')->__('Listing')),
            array('value'=>'slider', 'label'=>Mage::helper('adminhtml')->__('Slider')),
        );
    }
}
