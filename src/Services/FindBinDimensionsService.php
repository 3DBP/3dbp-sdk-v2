<?php

namespace ThreeDBinPacking\Services;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Api\Algorithm;
/**
 * Description of FinBinDimensionService
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class FindBinDimensionsService extends AbstractPackingService
{
    public function getAlgorithmName() {
        return Algorithm::FIND_BIN_DIMENSIONS;
    }
}