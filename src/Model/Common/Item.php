<?php

namespace ThreeDBinPacking\Model\Common;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of Item
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Item
{
    static $lastRandomId = 0;
    
    protected $id;
    protected $name     = 0;
    protected $width    = 0;
    protected $height   = 0;
    protected $depth    = 0;
    protected $weight   = 0;
    protected $verticalRotation = true;
    
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

    public function getWeight() {
        return $this->weight;
    }

    public function getVerticalRotation() {
        return $this->verticalRotation;
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

    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }
    
    public function setVerticalRotation($vertical_rotation) {
        $this->verticalRotation = $vertical_rotation;
        return $this;
    }

    public function getAsArray(){
        $data = [];
        $data['id'] = $this->id?$this->id:self::$lastRandomId++;
        $data['w']  = $this->width;
        $data['h']  = $this->height;
        $data['d']  = $this->depth;
        $data['wg'] = $this->weight;
        $data['q']  = $this->quantity;
        $data['vr'] = $this->verticalRotation;
        return $data;
    }
}