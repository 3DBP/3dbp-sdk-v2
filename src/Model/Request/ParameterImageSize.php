<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of ImageSize
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParameterImageSize
{
    const SIZE_MAX = 250;
    const SIZE_MIN = 1;
    
    protected $size;
    
    public function __construct($size) {
        if($this->checkSize($size)){
            $this->size = $size;
        }
    }
    
    public function getSize(){
        return $this->size;
    }

    protected function checkSize($value){
        if(!is_int($value)){
            throw new WrongImageSizeFormatException();
        }
        if($value < self::SIZE_MIN || $value > self::SIZE_MAX){
            throw new WrongImageSizeRangeException();
        }
        return true;
    }

}