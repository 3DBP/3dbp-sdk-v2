<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongBooleanParameterException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong boolean parameter value. It needs to be true|false.');
    }
    
}