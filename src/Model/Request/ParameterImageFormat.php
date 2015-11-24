<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Exception\WrongImageFormatException;
/**
 * Description of ImageSource
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParameterImageFormat
{
    const FORMAT_PNG = 'png';
    const FORMAT_SVG = 'svg';
    
    protected $format;
    
    public function __construct($format) {
        if($this->checkFormat($format)){
            $this->source = $format;
        }
    }
    
    public function getFormat() {
        return $this->format;
    }

    protected function checkFormat($format){
        if($format != self::FORMAT_PNG && $format != self::FORMAT_SVG){
            throw new WrongImageFormatException();
        }
        return true;
    }
}