<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Common\Item as CommonItem;
/**
 * Description of Item
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Item extends CommonItem
{
    const ITEM_COLOR_SCHEMA_SOURCE_DEFAUL = 'default';
    const ITEM_COLOR_SCHEMA_SOURCE_RANDOM = 'random';
    const ITEM_COLOR_SCHEMA_SOURCE_ITEM = 'item';
    
    protected $quantity = 0;
    protected $fillColor = null;
    protected $borderColor = null;
    protected $backBorderColor = null;
    protected $colorsSchemeSource = 'default'; // default|random|item
    protected $limitPerContainer = null;
    protected $group = null;
    protected $separate = false;

    public function getWeight() {
        return $this->weight;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
        return $this;
    }
    
    public function getLimitPerContainer() {
        return $this->limitPerContainer;
    }

    public function setLimitPerContainer($limitPerContainer) {
        $this->limitPerContainer = $limitPerContainer;
        return $this;
    }
    
    public function getGroup() {
        return $this->group;
    }

    public function getSeparate() {
        return $this->separate;
    }

    public function setGroup($group) {
        $this->group = $group;
        return $this;
    }

    public function setSeparate($separate) {
        $this->separate = $separate;
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
        $data['limit_per_bin'] = $this->limitPerContainer;
        $data['separate'] = $this->separate;
        $data['group'] = $this->group;
        return $data;
    }
}