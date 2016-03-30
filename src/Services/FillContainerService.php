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

class FillContainerService extends AbstractPackingService
{
    public function getAlgorithmName() {
        return Algorithm::FILL_CONTAINER;
    }
}