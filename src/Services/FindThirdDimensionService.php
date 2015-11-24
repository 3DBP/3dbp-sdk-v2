<?php

namespace ThreeDBinPacking\Services;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Api\Algorithm;
/**
 * Description of FindThirdDimensionService
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class FindThirdDimensionService extends AbstractPackingService
{
    public function getAlgorithmName() {
        return Algorithm::FIND_THIRD_DIMENSION;
    }
}