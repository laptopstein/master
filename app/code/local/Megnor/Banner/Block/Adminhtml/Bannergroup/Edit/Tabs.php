<?php

class Megnor_Banner_Block_Adminhtml_Bannergroup_Edit_Tabs extends Mage_Adminhtml_Block_Widget_Tabs {

    public function __construct() {
        parent::__construct();
        $this->setId('bannergroup_tabs');
        $this->setDestElementId('edit_form');
        $this->setTitle(Mage::helper('banner')->__('Banner Group Information'));
    }

    protected function _beforeToHtml() {
        $this->addTab('form_section', array(
            'label' => Mage::helper('banner')->__('Banner Group'),
            'alt' => Mage::helper('banner')->__('Banner Group'),
            'content' => $this->getLayout()->createBlock('banner/adminhtml_bannergroup_edit_tab_form')->toHtml(),
        ));

        $this->addTab('grid_section', array(
            'label' => Mage::helper('banner')->__('Banners'),
            'alt' => Mage::helper('banner')->__('Banners'),
            'content' => $this->getLayout()->createBlock('banner/adminhtml_bannergroup_edit_tab_gridbanner')->toHtml(),
        ));

        return parent::_beforeToHtml();
    }

}