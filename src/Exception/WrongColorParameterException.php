<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongColorParameterException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong color parameter. It needs to be an array and must contains 3 integer values.');
    }
    
}