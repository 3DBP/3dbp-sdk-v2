<?php

namespace ThreeDBinPacking\Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\Item as RequestItem;
/**
 * Description of Item
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Item extends RequestItem
{
    protected $coordinates;
    protected $sbsImage;
    protected $separatedImage;
    
    public function getCoordinates() {
        return $this->coordinates;
    }

    public function getSbsImage() {
        return $this->sbsImage;
    }

    public function getSeparatedImage() {
        return $this->separatedImage;
    }

    public function setCoordinates($coordinates) {
        $this->coordinates = $coordinates;
        return $this;
    }

    public function setSbsImage($sbsImage) {
        $this->sbsImage = $sbsImage;
        return $this;
    }

    public function setSeparatedImage($separatedImage) {
        $this->separatedImage = $separatedImage;
        return $this;
    }
    
}