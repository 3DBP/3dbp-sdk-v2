<?php

namespace ThreeDBinPacking\Services;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Api\Algorithm;
/**
 * Description of SingleBinPackingService
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class SingleBinPackingService extends AbstractPackingService
{
    public function getAlgorithmName() {
        return Algorithm::SINGLE_BIN_PACKING;
    }
}