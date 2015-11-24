<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Exception\WrongImageSourceException;
/**
 * Description of ImageSource
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParameterImageSource
{
    const SOURCE_FILE   = 'file';
    const SOURCE_BASE64 = 'base64';
    
    protected $source;
    
    public function __construct($source) {
        if($this->checkSource($source)){
            $this->source = $source;
        }
    }
    
    public function getSource() {
        return $this->source;
    }

    protected function checkSource($source){
        if($source != self::SOURCE_BASE64 && $source != self::SOURCE_FILE){
            throw new WrongImageSourceException();
        }
        return true;
    }
}