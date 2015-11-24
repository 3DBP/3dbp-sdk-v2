<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\ParameterImageFormat;
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongImageFormatException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong image format parameter. Only '.  ParameterImageFormat::FORMAT_PNG.' or '.ParameterImageFormat::FORMAT_SVG.' supported.');
    }
    
}