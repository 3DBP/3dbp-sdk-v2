<?php

namespace Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\Bin as RequestBin;
/**
 * Description of Bin
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Bin extends RequestBin
{
    
    protected $packedItems;
    protected $completeImage;
    
    
}