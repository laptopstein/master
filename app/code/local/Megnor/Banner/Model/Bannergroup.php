<?php

class Megnor_Banner_Model_Bannergroup extends Mage_Core_Model_Abstract {

    public function _construct() {
        parent::_construct();
        $this->_init('banner/bannergroup');
    }

    public function getDataByGroupCode($groupCode) {        
        $groupData = array();
        $bannerData = array();
        $result = array('group_data'=>$groupData,'banner_data'=>$bannerData);
        $collection = Mage::getResourceModel('banner/bannergroup_collection');
        $collection->getSelect()->where('group_code = ?', $groupCode)->where('status = 1');
        foreach ($collection as $record) {
            $bannerIds = $record->getBannerIds();
            $bannerModel = Mage::getModel('banner/banner');
            $bannerData = $bannerModel->getDataByBannerIds($bannerIds);
            $result = array('group_data' => $record, 'banner_data' => $bannerData);
        }
        return $result;
    }

}