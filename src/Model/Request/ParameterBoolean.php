<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of ParameterBoolean
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParameterBoolean
{
    protected $boolean;
    
    public function __construct($boolean) {
        if($this->checkIsBoolean($boolean)){
            $this->boolean = $boolean;
        }
    }
    
    protected function checkIsBoolean($boolean){
        if( ! is_bool($boolean)){
            
        }
        return true;
    }

    public function getValue(){
        return $this->boolean;
    }
}