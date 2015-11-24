<?php

namespace ThreeDBinPacking\Mapper;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\RequestData;
use ThreeDBinPacking\Model\Response\Response;
use ThreeDBinPacking\Model\Response\PackingResult;
/**
 * Description of ResponseMapper
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class PackingResponseMapper
{
    protected $responseData;
    protected $packingResult;

    public function map(Response $responseData, RequestData $requestData){
        $this->packingResult = new PackingResult();
        $this->packingResult->setStatus($responseData->getResponseCode());
        if($responseData->getResponseCode() !== 200){
            $this->packingResult->setIsResponseValid(false);
        }else{
            $this->packingResult->setIsResponseValid(true);
            $this->responseData = json_decode($responseData->getRawResponse());
        }
    }
    
    protected function mapStatus(){
        
    }
    
    protected function mapBin(){
        
    }
    
    protected function mapPackedItem(){
        
    }
    
    protected function mapUnpackedItem(){
        
    }
    
}