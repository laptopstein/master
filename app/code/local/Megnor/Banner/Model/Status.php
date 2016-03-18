<?php

class Megnor_Banner_Model_Status extends Varien_Object {
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

    static public function getOptionArray() {
        return array(
            self::STATUS_ENABLED => Mage::helper('banner')->__('Enabled'),
            self::STATUS_DISABLED => Mage::helper('banner')->__('Disabled')
        );
    }

    static public function getAnimationArray() {
        $animations = array();
        $animations = array(
            array(
                'value' => 'Fade/Appear',
                'label' => Mage::helper('banner')->__('Fade / Appear'),
            ),
            array(
                'value' => 'Shake',
                'label' => Mage::helper('banner')->__('Shake'),
            ),
           array(
                'value' => 'Grow',
                'label' => Mage::helper('banner')->__('Grow'),
            ),
            array(
                'value' => 'BlindDown',
                'label' => Mage::helper('banner')->__('BlindDown'),
            ),            
            array(
                'value' => 'DropOut',
                'label' => Mage::helper('banner')->__('DropOut'),
            ),
        );
        array_unshift($animations, array('label' => '--Select--', 'value' => ''));
        return $animations;
    }

    static public function getPreAnimationArray() {
        $animations = array();
        $animations = array(

			array(
                'value' => 'simple banner',
                'label' => Mage::helper('banner')->__('Simple Banner'),
            ),
			array(
                'value' => 'Flex Slider',
                'label' => Mage::helper('banner')->__('Flex Slider'),
            ),
         
            array(
                'value' => 'Play And Pause Slide Show',
                'label' => Mage::helper('banner')->__('Play And Pause Slide Show'),
            ),
            array(
                'value' => 'Numbered Banner',
                'label' => Mage::helper('banner')->__('Numbered Banner'),
            ),
                  
        );
        array_unshift($animations, array('label' => '--Select--', 'value' => ''));
        return $animations;
    }

}