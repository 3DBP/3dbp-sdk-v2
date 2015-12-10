<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Common\Bin as CommonBin;
/**
 * Description of Bin
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Bin extends CommonBin
{
    
    protected $maxWeight;
    
    public function getMaxWeight() {
        return $this->maxWeight;
    }

    public function setMaxWeight($weight) {
        $this->maxWeight = $weight;
        return $this;
    }

    public function getAsArray(){
        $data = [];
        $data['id'] = $this->id?$this->id:self::$lastRandomId++;
        $data['w'] = $this->width;
        $data['h'] = $this->height;
        $data['d'] = $this->depth;
        $data['max_wg'] = $this->maxWeight;
        return $data;
    }

}