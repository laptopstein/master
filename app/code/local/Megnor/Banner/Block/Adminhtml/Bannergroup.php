<?php

class Megnor_Banner_Block_Adminhtml_Bannergroup extends Mage_Adminhtml_Block_Widget_Grid_Container {

    public function __construct() {
        $this->_controller = 'adminhtml_bannergroup';
        $this->_blockGroup = 'banner';
        $this->_headerText = Mage::helper('banner')->__('Banner Group Manager');
        $this->_addButtonLabel = Mage::helper('banner')->__('Add Banner Group');
        parent::__construct();
    }

}