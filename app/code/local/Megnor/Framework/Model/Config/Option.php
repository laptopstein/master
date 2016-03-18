<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Option
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=> 0, 'label'=>Mage::helper('adminhtml')->__('Enabled')),
            array('value'=> 1, 'label'=>Mage::helper('adminhtml')->__('Disabled')),
        );
    }
}
