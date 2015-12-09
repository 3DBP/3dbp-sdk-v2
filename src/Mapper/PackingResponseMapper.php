<?php

namespace ThreeDBinPacking\Mapper;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\RequestData;
use ThreeDBinPacking\Model\Response\Response;
use ThreeDBinPacking\Model\Response\PackingResult;
use ThreeDBinPacking\Model\Response\Bin as PackedBin;
use ThreeDBinPacking\Model\Response\Item as PackedItem;
use ThreeDBinPacking\Model\Response\PackedBins;
use ThreeDBinPacking\Model\Response\PackedItems;

/**
 * Description of ResponseMapper
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class PackingResponseMapper
{

    protected $responseData;
    
    /**
     *
     * @var PackingResult
     */
    protected $packingResult;

    public function map(Response $responseData, RequestData $requestData){
        $this->packingResult = new PackingResult();
        $this->packingResult->setStatus($responseData->getResponseCode());
        if($responseData->getResponseCode() !== 200){
            $this->packingResult->setIsResponseValid(false);
        }else{
            $this->packingResult->setIsResponseValid(true);
            $this->responseData = json_decode($responseData->getRawResponse(), true);
            p($this->responseData);
            $this->mapStatus();
            $this->mapErrors();
            $this->mapId();
            $this->mapBins();
        }
        return $this->packingResult;
    }
    
    protected function mapId(){
        if(isset($this->responseData['response']['id'])){
            $this->packingResult->setId($this->responseData['response']['id']);
        }
    }

    protected function mapStatus(){
        if(isset($this->responseData['response']['status'])){
            $this->packingResult->setStatus($this->responseData['response']['status']);
        }
    }
    
    protected function mapBins(){
        $packedBins = new PackedBins();
        $this->packingResult->setPackedBins($packedBins);
        if(isset($this->responseData['response']['bins_packed'])){
            foreach($this->responseData['response']['bins_packed'] as $packedBinArray){
                $packedBin = new PackedBin();
                $packedBin->setWidth($packedBinArray['bin_data']['w']);
                $packedBin->setHeight($packedBinArray['bin_data']['h']);
                $packedBin->setDepth($packedBinArray['bin_data']['d']);
                $packedBin->setWeight($packedBinArray['bin_data']['weight']);
                $packedBin->setId($packedBinArray['bin_data']['id']);
                $packedBin->setUsedSpace($packedBinArray['bin_data']['used_space']);
                $packedBin->setUsedWeight($packedBinArray['bin_data']['used_weight']);
                if(isset($packedBinArray['image_complete'])){
                    $packedBin->setCompleteImage($packedBinArray['image_complete']);
                }
                if(isset($packedBinArray['images_generation_time'])){
                    $packedBin->setImagesGenerationTime($packedBinArray['images_generation_time']);
                }
                if(isset($packedBinArray['packing_time'])){
                    $packedBin->setPackingTime($packedBinArray['packing_time']);
                }
                if(isset($packedBinArray['items'])){
                    $this->mapPackedItems($packedBin, $packedBinArray['items']);
                }
                $packedBins->addPackedBin($packedBin);
            }
        }
    }
    
    protected function mapPackedItems(PackedBin $packedBin, array $items){
        foreach($items as $item){
            $packedItem = new PackedItem();
            $packedItem->setDepth($item['d']);
            $packedItem->setHeight($item['h']);
            $packedItem->setWidth($item['w']);
            $packedItem->setId($item['id']);
//            $packedItem->setName($name);
            $packedItem->setWeight($item['wg']);
            
            $packedBin->addPackedItem($packedItem);
        }
    }
    
    protected function mapUnpackedItem(){
        
    }
    
    protected function mapErrors(){
        if(isset($this->responseData['response']['errors'])){
            $this->packingResult->setStatus($this->responseData['response']['errors']);
        }
    }
    
}