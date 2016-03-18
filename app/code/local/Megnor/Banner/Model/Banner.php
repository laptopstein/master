<?php

class Megnor_Banner_Model_Banner extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('banner/banner');
    }

    public function getAllAvailBannerIds(){
        $collection = Mage::getResourceModel('banner/banner_collection')
                        ->getAllIds();
        return $collection;
    }

    public function getAllBanners() {
        $collection = Mage::getResourceModel('banner/banner_collection');
        $collection->getSelect()->where('status = ?', 1);
        $data = array();
        foreach ($collection as $record) {
            $data[$record->getId()] = array('value' => $record->getId(), 'label' => $record->getfilename());
        }
        return $data;
    }

    public function getDataByBannerIds($bannerIds) {
        $data = array();
        if ($bannerIds != '') {
            $collection = Mage::getResourceModel('banner/banner_collection');
            $collection->getSelect()->where('banner_id IN (' . $bannerIds . ')')->order('sort_order');
            foreach ($collection as $record) {
                $status = $record->getStatus();
                if ($status == 1) {
                    $data[] = $record;
                }
            }
        }
        return $data;
    }

}