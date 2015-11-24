<?php

namespace ThreeDBinPacking\Exception;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\ParametersContainer;
/**
 * Description of WrongColorValueFormatException
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class UnknownPackingRequestParameterException extends \Exception
{
    
    public function __construct($paramName) {
        parent::__construct('Wrong packing request parameter "'.$paramName.'". Available parameters: ['.implode(', ',ParametersContainer::getParametersList()).'].');
    }
    
}