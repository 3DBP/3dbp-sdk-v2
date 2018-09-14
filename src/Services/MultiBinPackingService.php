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
    const OPTIMIZATION_MODE_BINS_NUMBER      = 'bins_number';
    const OPTIMIZATION_MODE_COST             = 'cost';
    const OPTIMIZATION_MODE_BINS_UTILIZATION = 'bins_utilization';
    
    public function getAlgorithmName() {
        return Algorithm::MULTI_BIN_PACKING;
    }
    
    public function setOptimizationMode($optimizationMode){
        $this->requestData
                ->getParameters()
                ->setOptimizationMode($optimizationMode);
    }
    
    static public function getOptimizationModesList(){
        return [self::OPTIMIZATION_MODE_BINS_NUMBER,
                self::OPTIMIZATION_MODE_BINS_UTILIZATION,
                self::OPTIMIZATION_MODE_COST];
    }
}