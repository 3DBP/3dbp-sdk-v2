<?php

namespace ThreeDBinPacking\Model\Common;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\Parameters;
/**
 * Description of Color
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Color
{
    const BACKGROUND_COLOR           = Parameters::PARAM_IMAGES_BACKGROUND_COLOR;//'images_background_color';
    const BIN_BORDER_COLOR           = Parameters::PARAM_IMAGES_BIN_BORDER_COLOR;
    const BIN_FILL_COLOR             = Parameters::PARAM_IMAGES_BIN_FILL_COLOR;
    const BIN_DASHED_LINE_COLOR      = Parameters::PARAM_IMAGES_BIN_DASHED_LINE_COLOR;
    const ITEM_BORDER_COLOR          = Parameters::PARAM_IMAGES_ITEM_BORDER_COLOR;
    const ITEM_FILL_COLOR            = Parameters::PARAM_IMAGES_ITEM_FILL_COLOR;
    const ITEM_BACK_BORDER_COLOR     = Parameters::PARAM_IMAGES_ITEM_BACK_BORDER_COLOR;
    const SBS_LAST_ITEM_FILL_COLOR   = Parameters::PARAM_IMAGES_SBS_LAST_ITEM_FILL_COLOR;
    const SBS_LAST_ITEM_BORDER_COLOR = Parameters::PARAM_IMAGES_SBS_LAST_ITEM_BORDER_COLOR;
    
    protected $red;
    protected $green;
    protected $blue;
    
    public function __construct($red, $green, $blue) {
        $this->red      = (int)$red;
        $this->green    = (int)$green;
        $this->blue     = (int)$blue;
        $this->validate();
    }
    
    protected function validate(){
        if($this->red < 0 || $this->red > 255 
                || $this->green < 0 || $this->green > 255
                || $this->blue < 0 || $this->blue > 255){
            throw new Exception('Invalid color data. Available "Color" components values: 0-255. ');
        }
    }

    public function getRGB(){
        return $this->red.','.$this->green.','.$this->blue;
    }
    
    public function getAsArray(){
        return [$this->red, $this->green, $this->blue];
    }
    
}