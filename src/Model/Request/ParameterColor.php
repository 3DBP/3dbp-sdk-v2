<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Exception\WrongColorValueFormatException;
use ThreeDBinPacking\Exception\WrongColorValueRangeException;
use ThreeDBinPacking\Exception\WrongColorParameterException;
/**
 * Description of Color
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParameterColor
{
    protected $red = 0;
    protected $green = 0;
    protected $blue = 0;
    
    public function __construct($colors) {
        $this->checkParameter($colors);
        
        $red = $colors[0];
        $green = $colors[1];
        $blue = $colors[2];
        
        if($this->checkColorValue($red)){
            $this->red = $red;
        }
        if($this->checkColorValue($green)){
            $this->green = $green;
        }
        if($this->checkColorValue($blue)){
            $this->blue = $blue;
        }
    }
    
    public function getAsString(){
        return $this->red.','.$this->green.','.$this->blue;
    }
    
    protected function checkColorValue($value){
        if(!is_int($value)){
            throw new WrongColorValueFormatException();
        }
        if($value < 0 || $value > 255){
            throw new WrongColorValueRangeException();
        }
        return true;
    }
    
    protected function checkParameter($colors){
        if( !is_array($colors) || count($colors) != 3){
            throw new WrongColorParameterException();
        }
    }

}