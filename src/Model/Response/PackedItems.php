<?php

namespace ThreeDBinPacking\Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Response\Item;
use ThreeDBinPacking\Model\Common\Collection;
/**
 * Description of PackedBins
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class PackedItems extends Collection
{
    
    public function addPackedItem(Item $item){
        $this->add($item);
    }
    
    public function getBins() {
        return $this->toArray();
    }

}