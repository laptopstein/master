<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */


class Megnor_Framework_Model_Config_Menutype
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'mega_wide_menu', 'label'=>Mage::helper('adminhtml')->__('Mega Wide Menu')),
            array('value'=>'default_classic_menu', 'label'=>Mage::helper('adminhtml')->__('Default Classic Menu'))
        );
    }
}
