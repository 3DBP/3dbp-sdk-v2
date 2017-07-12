<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of BinsCollection
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class BinsCollection
{
    protected $bins = [];
    
    public function addBin(Bin $bin){
        $this->bins[] = $bin;
    }
    
    public function getBins(){
        return $this->bins;
    }
    
    public function getAsArray(){
        $data = [];
        foreach($this->bins as $bin){
            $data[] = $bin->getAsArray();
        }
        return $data;
    }
    
    public function setFromArray(array $data){
        foreach($data as $bin){
            if(is_array($bin)){
                if(key_exists('find', $bin)){
                    $binObj = new BinFindThirdDim();
                    $binObj->setFind($bin['find']);
                }else{
                    $binObj = new Bin();
                }
                if(isset($bin['width'])){
                    $binObj->setWidth($bin['width']);  
                }
                if(isset($bin['height'])){
                    $binObj->setHeight($bin['height']);
                }
                if(isset($bin['depth'])){
                    $binObj->setDepth($bin['depth']);
                }
                if(isset($bin['max_weight'])){
                    $binObj->setMaxWeight($bin['max_weight']);
                }
                if(isset($bin['id'])){
                    $binObj->setId($bin['id']);    
                }
                if(isset($bin['name'])){
                    $binObj->setName($bin['name']);
                }
                if(isset($bin['quantity'])){
                    $binObj->setQuantity($bin['quantity']);
                }
                $this->addBin($binObj);
            }
        }
    }
}