<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Position
{
       
    public function toOptionArray()
    {
       return array(
            array('value'=>'right', 'label'=>Mage::helper('adminhtml')->__('Right')),
            array('value'=>'left', 'label'=>Mage::helper('adminhtml')->__('Left')),
			array('value'=>'top', 'label'=>Mage::helper('adminhtml')->__('top')),
			array('value'=>'bottom', 'label'=>Mage::helper('adminhtml')->__('Bottom')),
			array('value'=>'inside', 'label'=>Mage::helper('adminhtml')->__('Inside'))
        );
    }
}
