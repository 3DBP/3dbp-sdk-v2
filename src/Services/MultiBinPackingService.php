<?php

namespace ThreeDBinPacking\Services;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Api\Algorithm;
/**
 * Description of MultiBinPackingService
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class MultiBinPackingService extends AbstractPackingService
{
    public function getAlgorithmName() {
        return Algorithm::MULTI_BIN_PACKING;
    }
}