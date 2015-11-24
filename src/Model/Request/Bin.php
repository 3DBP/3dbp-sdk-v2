<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of Bin
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Bin
{
    static $lastRandomId = 0;
    
    protected $id;
    protected $name;
    protected $width;
    protected $height;
    protected $depth;
    protected $maxWeight;
    
    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getWidth() {
        return $this->width;
    }

    public function getHeight() {
        return $this->height;
    }

    public function getDepth() {
        return $this->depth;
    }

    public function getMaxWeight() {
        return $this->maxWeight;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setWidth($width) {
        $this->width = $width;
        return $this;
    }

    public function setHeight($height) {
        $this->height = $height;
        return $this;
    }

    public function setDepth($depth) {
        $this->depth = $depth;
        return $this;
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