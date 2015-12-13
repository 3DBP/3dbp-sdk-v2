<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of BinFindThirdDim
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class BinFindThirdDim extends Bin
{
    protected $find;
    
    public function getFind() {
        return $this->find;
    }

    public function setFind($find) {
        $this->find = $find;
        return $this;
    }
    
    public function getAsArray() {
        $data = parent::getAsArray();
        $data['find'] = $this->find;
        return $data;
    }
}