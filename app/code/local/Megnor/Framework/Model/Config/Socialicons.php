<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Socialicons
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'default_share', 'label'=>Mage::helper('adminhtml')->__('Default Share')),
            array('value'=>'static_custom_block', 'label'=>Mage::helper('adminhtml')->__('Static Custom Block'))
        );
    }
}
