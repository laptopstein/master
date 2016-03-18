<?php
/**
 * TemplateMela
 * @copyright  Copyright (c) 2010 TemplateMela. (http://www.templatemela.com)
 * @license    http://www.templatemela.com/license/
 */

class Megnor_Framework_Model_Config_Fontfamily
{
   
    private $gfonts = "--Please Select--,Antic,Allerta,Andika,Bitter,Droid Serif,Philosopher,Oxygen,Rokkitt,Galdeano,Open Sans,Droid Sans,Oswald,Play,Varela,Other Font";
	 
    public function toOptionArray()
    {
        $fonts = explode(',', $this->gfonts);
        $options = array();
        foreach ($fonts as $f )
		{
            $options[] = array(
                'value' => $f,
                'label' => $f,
            );
        } 
        return $options;
    }
}
