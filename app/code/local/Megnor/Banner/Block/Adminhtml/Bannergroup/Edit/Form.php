<?php

class Megnor_Banner_Block_Adminhtml_Bannergroup_Edit_Form extends Mage_Adminhtml_Block_Widget_Form {

    protected function _prepareForm() {
        $form = new Varien_Data_Form(array(
                    'id' => 'edit_form',
                    'action' => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
                    'method' => 'post',
                    'enctype' => 'multipart/form-data'
                        )
        );

        $form->setUseContainer(true);
        $this->setForm($form);
        $form->addField('in_bannergroup_banners', 'hidden', array(
            'name' => 'bannergroup_banners',
            'required' => false,
        ));
        return parent::_prepareForm();
    }

}