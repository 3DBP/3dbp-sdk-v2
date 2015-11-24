<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongColorValueRangeException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong color value range. Color value must be between 0 and 255.');
    }
    
}