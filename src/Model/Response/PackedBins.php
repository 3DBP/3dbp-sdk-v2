<?php

namespace ThreeDBinPacking\Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Response\Bin;
use ThreeDBinPacking\Model\Common\Collection;
/**
 * Description of PackedBins
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class PackedBins extends Collection
{

    public function addPackedBin(Bin $bin){
        $this->add($bin);
    }
    
    public function getBins() {
        return $this->toArray();
    }

}