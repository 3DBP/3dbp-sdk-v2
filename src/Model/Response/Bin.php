<?php

namespace ThreeDBinPacking\Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Response\Item as PackedItem;
use ThreeDBinPacking\Model\Common\Bin as CommonBin;
/**
 * Description of Bin
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Bin extends CommonBin
{
    
    protected $packedItems;
    protected $notPackedItems = [];
    protected $completeImage;
    protected $usedSpace;
    protected $weight;
    protected $usedWeight;
    protected $packingTime;
    protected $imagesGenerationTime;
    protected $grossWeight;
    
    public function __construct() {
        $this->packedItems = new PackedItems();
    }

    public function getPackedItems() {
        return $this->packedItems;
    }

    public function getCompleteImage() {
        return $this->completeImage;
    }

    public function getUsedSpace() {
        return $this->usedSpace;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getUsedWeight() {
        return $this->usedWeight;
    }
    
    public function getPackingTime() {
        return $this->packingTime;
    }

    public function getImagesGenerationTime() {
        return $this->imagesGenerationTime;
    }
    
    public function getNotPackedItems() {
        return $this->notPackedItems;
    }
    
    public function addPackedItem(PackedItem $packedItem) {
        $this->packedItems->addPackedItem($packedItem);
        return $this;
    }
    
    public function addNotPackedItems($items){
        $this->notPackedItems[] = $items;
    }

    public function setPackedItems(array $packedItems) {
        $this->packedItems = $packedItems;
        return $this;
    }

    public function setCompleteImage($completeImage) {
        $this->completeImage = $completeImage;
        return $this;
    }

    public function setUsedSpace($usedSpace) {
        $this->usedSpace = $usedSpace;
        return $this;
    }

    public function setWeight($weight) {
        $this->weight = $weight;
        return $this;
    }

    public function setUsedWeight($usedWeight) {
        $this->usedWeight = $usedWeight;
        return $this;
    }

    public function setPackingTime($packingTime) {
        $this->packingTime = $packingTime;
        return $this;
    }

    public function setImagesGenerationTime($imagesGenerationTime) {
        $this->imagesGenerationTime = $imagesGenerationTime;
        return $this;
    }
    
    public function getGrossWeight() {
        return $this->grossWeight;
    }

    public function setGrossWeight($grossWeight) {
        $this->grossWeight = $grossWeight;
    }
    
}