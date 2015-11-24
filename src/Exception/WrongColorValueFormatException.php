<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongColorValueFormatException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong color value format. Integer expected.');
    }
    
}