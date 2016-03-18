<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Repeat
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=> 'no-repeat', 'label'=>Mage::helper('adminhtml')->__('No-Repeat')),
            array('value'=> 'repeat', 'label'=>Mage::helper('adminhtml')->__('Repeat')),
			array('value'=> 'repeat-x', 'label'=>Mage::helper('adminhtml')->__('Repeat-X')),
			array('value'=> 'repeat-y', 'label'=>Mage::helper('adminhtml')->__('Repeat-Y')),
        );
    }
}
