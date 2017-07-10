<?php

namespace ThreeDBinPacking\Model\Common;

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

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    public function setWidth($width) {
        $this->width = (float)$width;
        return $this;
    }

    public function setHeight($height) {
        $this->height = (float)$height;
        return $this;
    }

    public function setDepth($depth) {
        $this->depth = (float)$depth;
        return $this;
    }

}