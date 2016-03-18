<?php
class Megnor_Manufacturer_IndexController extends Mage_Core_Controller_Front_Action
{

    public function indexAction()
    {
    	if (!Mage::helper('manufacturer')->getIsEnable()) {
            $this->_forward('noRoute');
            return;
        }
		
		$this->loadLayout();    
        $this->getLayout()->createBlock('catalog/breadcrumbs');

        if($breadcrumbsBlock = $this->getLayout()->getBlock('breadcrumbs'))
        {
            $breadcrumbsBlock->addCrumb('manufacturer', array(
                'label' => $this->__('Manufacturers'),
            ));
        }
        $title = $this->__('Manufacturers');
        
        $this->getLayout()->getBlock('head')->setTitle($title);
        
        $this->renderLayout();
			
    }
	
    public function viewAction(){
        $id = $this->getRequest()->getParam('id');
        if (!Mage::helper('manufacturer/manufacturer')->renderPage($this, $id)) {
            $this->_forward('index', 'index', 'manufacturer');
        }
    }
	

}