<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of ItemsCollection
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ItemsCollection
{
    protected $items = [];
    
    public function addItem(Item $item){
        $this->items[] = $item;
    }
    
    /**
     * 
     * @return Item []
     */
    public function getItems(){
        return $this->items;
    }
    
    public function setItems($items) {
        $this->items = $items;
        return $this;
    }
    
    public function getAsArray(){
        $data = [];
        foreach($this->items as $bin){
            $data[] = $bin->getAsArray();
        }
        return $data;
    }
    
    public function setFromArray(array $data){
        foreach($data as $item){
            if(is_array($item)){
                $itemObj = new Item();
                if(isset($item['width'])){
                    $itemObj->setWidth($item['width']);
                }
                if(isset($item['height'])){
                    $itemObj->setHeight($item['height']);
                }
                if(isset($item['depth'])){
                    $itemObj->setDepth($item['depth']);
                }
                if(isset($item['weight'])){
                    $itemObj->setWeight($item['weight']);
                }
                if(isset($item['quantity'])){
                    $itemObj->setQuantity($item['quantity']);
                }
                if(isset($item['limit_per_container'])){
                    $itemObj->setLimitPerContainer($item['limit_per_container']);
                }
                if(isset($item['vertical_rotation'])){
                    $itemObj->setVerticalRotation($item['vertical_rotation']);
                }
                if(isset($item['separate'])){
                    $itemObj->setSeparate($item['separate']);
                }
                if(isset($item['group'])){
                    $itemObj->setGroup($item['group']);
                }
                if(isset($item['id'])){
                    $itemObj->setId($item['id']);
                }
                if(isset($item['name'])){
                    $itemObj->setName($item['name']);
                }
                $this->addItem($itemObj);
            }
        }
    }
}