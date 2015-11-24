<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\ParameterImageSource;
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongImageSourceException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong image source parameter. Only '.ParameterImageSource::SOURCE_BASE64.' or '.ParameterImageSource::SOURCE_FILE.' supported.');
    }
    
}