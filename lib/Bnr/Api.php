<?php
/*
 * Class cursBnrXML v1.0
 * Author: Ciuca Valeriu
 * E-mail: vali.ciuca@gmail.com
 * This class parses BNR's XML and returns the current exchange rate
 *
 * Requirements: PHP5
 *
 * Last update: October 2011, 27
 * More info: www.curs-valutar-bnr.ro
 *
 */

class Bnr_Api
{
    /**
     * xml document
     * @var string
     */
    var $xmlDocument = "";


    /**
     * exchange date
     * BNR date format is Y-m-d
     * @var string
     */
    var $date = "";


    /**
     * currency
     * @var associative array
     */
    var $currency = array();


    /**
     * cursBnrXML class constructor
     *
     * @access        public
     * @param         $url        string
     * @return        void
     */
    public function load($url)
    {
        $this->xmlDocument = file_get_contents($url);
        $this->parseXMLDocument();
    }

    /**
     * parseXMLDocument method
     *
     * @access        public
     * @return         void
     */
    public function parseXMLDocument()
    {
        $xml = new SimpleXMLElement($this->xmlDocument);

        $this->date=$xml->Header->PublishingDate;

        foreach($xml->Body->Cube->Rate as $line)
        {
            $this->currency[]=array("name"=>$line["currency"], "value"=>$line, "multiplier"=>$line["multiplier"]);
        }
    }

    /**
     * getRate method
     *
     * get current exchange rate: example getRate("USD")
     *
     * @access        public
     * @return         double
     */
    public function getRate($currency)
    {
        foreach($this->currency as $line)
        {
            if($line["name"]==$currency)
            {
                return $line["value"];
            }
        }

        return "Incorrect currency!";
    }
}
     