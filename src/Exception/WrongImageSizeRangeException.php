<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\ParameterImageSize;
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class WrongImageSizeRangeException extends \Exception
{
    
    public function __construct() {
        parent::__construct('Wrong size for image file. Color value must be between '.ParameterImageSize::SIZE_MIN.' and '.ParameterImageSize::SIZE_MAX.'.');
    }
    
}