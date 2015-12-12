<?php

namespace ThreeDBinPacking\Api;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of Algorithm
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Algorithm
{
    const SINGLE_BIN_PACKING    = 'pack';
    const MULTI_BIN_PACKING     = 'packIntoMany';
    const FIND_THIRD_DIMENSION  = 'findSmallestBin';
    const FIND_BIN_DIMENSIONS   = 'findBinSize';
    
    static public function getAlgorithmsNames(){
        return [self::SINGLE_BIN_PACKING,
                self::MULTI_BIN_PACKING,
                self::FIND_THIRD_DIMENSION,
                self::FIND_BIN_DIMENSIONS];
    }
}