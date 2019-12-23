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
    protected $weight = 0;
    protected $quantity = null;
    protected $cost = 0;

    public function getMaxWeight() {
        return $this->maxWeight;
    }

    public function setMaxWeight($weight) {
        $this->maxWeight = (float)$weight;
        return $this;
    }
    
    public function getWeight() {
        return $this->weight;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

        
    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = (int)$quantity;
        return $this;
    }
    
    public function getCost() {
        return $this->cost;
    }

    public function setCost($cost) {
        $this->cost = $cost;
        return $this;
    }

    public function getAsArray(){
        $data = [];
        $data['id'] = $this->id?$this->id:self::$lastRandomId++;
        $data['w'] = $this->width;
        $data['h'] = $this->height;
        $data['d'] = $this->depth;
        $data['q'] = $this->quantity; 
        $data['max_wg'] = $this->maxWeight;
        $data['wg'] = $this->weight;
        $data['cost'] = $this->cost;
        return $data;
    }

}