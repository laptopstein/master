<?php
//include_once 'Bnr/Api.php';

/**
 * George Babarus extension for Magento
 *
 * Long description of this file (if any...)
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade
 * the Bb TopMenu module to newer versions in the future.
 * If you wish to customize the Bb TopMenu module for your needs
 * please refer to http://www.magentocommerce.com for more information.
 *
 * @category   Bb
 * @package    Bb_TopMenu
 * @copyright  Copyright (C) 2014 http://www.babarus.ro
 * @license    http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
/**
 *
 * Currency rate import model (From www.bnr.net)
 *
 * @category   Bb
 * @package    Bb_Bnr
 * @subpackage Block
 * @author     George Babarus <george.babarus@gmail.com>
 */
class Bb_Bnr_Model_Currency_Import_Bnr extends Mage_Directory_Model_Currency_Import_Abstract
{
    protected $_url = 'http://www.bnr.ro/nbrfxrates.xml';
    protected $_messages = array();

    /**
     * HTTP client
     *
     * @var Varien_Http_Client
     */
    protected $_httpClient;

    public function __construct()
    {
        $this->_httpClient = new Bnr_Api();
        $this->_httpClient->load($this->_url);
    }

    protected function _convert($currencyFrom, $currencyTo, $retry=0)
    {
        if (strtoupper($currencyFrom) != 'RON' && strtoupper($currencyTo) != 'RON' ){
            return null;
        }

        try {
            if (strtoupper($currencyFrom) === 'RON') {
                $value = 1 / floatval($this->_httpClient->getRate($currencyTo));
            }elseif(strtoupper($currencyTo) === 'RON') {
                $value = floatval($this->_httpClient->getRate($currencyFrom));
            } else {
                $this->_messages[] = Mage::helper('directory')->__('Bnr method is applied only for %s <> %s',$currencyFrom, $currencyTo);
            }

            if( empty($value)) {
                $this->_messages[] = Mage::helper('directory')->__('Cannot retrieve rate from %s. ( %s <> %s)', $this->_url, $currencyFrom, $currencyTo);
                return null;

            }
            return (float) $value;
        }
        catch (Exception $e) {
            if( $retry === 0 ) {
                $this->_convert($currencyFrom, $currencyTo, 1);
            } else {
                $this->_messages[] = Mage::helper('directory')->__('Cannot retrieve rate from %s. ( %s <> %s)', $this->_url, $currencyFrom, $currencyTo);
            }
        }
        return floatval(0);
    }


    /**
     * Saving currency rates
     *
     * @param   array $rates
     * @return  Mage_Directory_Model_Currency_Import_Abstract
     */
    protected function _saveRates($rates)
    {
        Mage::getModel('directory/currency')
            ->saveRates($rates);

        return $this;
    }


}

