<?php

namespace ThreeDBinPacking\Mapper;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\RequestData;
use ThreeDBinPacking\Model\Response\Response;
use ThreeDBinPacking\Model\Response\PackingResult;
use ThreeDBinPacking\Model\Response\Bin as PackedBin;
use ThreeDBinPacking\Model\Response\Item as PackedItem;
use ThreeDBinPacking\Model\Response\PackedBins;

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
        $this->packingResult->setResponseCode($responseData->getResponseCode());
        if($responseData->getResponseCode() !== 200){
            $this->packingResult->setIsResponseValid(false);
        }else{
            $this->packingResult->setIsResponseValid(true);
            $this->responseData = json_decode($responseData->getRawResponse(), true);
            $this->mapStatus();
            $this->mapResponseTime();
            $this->mapResponseUrl();
            $this->mapErrors();
            $this->mapId();
            $this->mapBins();
            $this->mapUnpackedItem();
        }
        return $this->packingResult;
    }
    
    protected function mapId(){
        if(isset($this->responseData['response']['id'])){
            $this->packingResult->setId($this->responseData['response']['id']);
        }
    }
    
    protected function mapResponseTime(){
        if(isset($this->responseData['response']['response_time'])){
            $this->packingResult->setResponseTime($this->responseData['response']['response_time']);
        }
    }
    
    protected function mapResponseUrl(){
        if(isset($this->responseData['response']['response_url'])){
            $this->packingResult->setResponseUrl($this->responseData['response']['response_url']);
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
                if(isset($packedBinArray['not_packed_items']) && is_array($packedBinArray['not_packed_items'])){
                    foreach($packedBinArray['not_packed_items'] as $notPackedItems){
                        $packedBin->addNotPackedItems($notPackedItems);
                    }
                }
                $packedBins->addPackedBin($packedBin);
            }
        }
    }
    
    protected function mapPackedItems(PackedBin $packedBin, array $items){
        foreach($items as $item){
            $packedItem = new PackedItem();
            $packedItem->setDepth(  $item['d']);
            $packedItem->setHeight( $item['h']);
            $packedItem->setWidth(  $item['w']);
            $packedItem->setId(     $item['id']);
            $packedItem->setWeight( $item['wg']);
            if(isset($item['coordinates'])){
                $packedItem->setCoordinates($item['coordinates']);
            }
            if(isset($item['image_separated'])){
                $packedItem->setSeparatedImage($item['image_separated']);
            }
            if(isset($item['image_sbs'])){
                $packedItem->setSbsImage($item['image_sbs']);
            }
            $packedBin->addPackedItem($packedItem);
        }
    }
    
    protected function mapUnpackedItem(){
        if(isset($this->responseData['response']['not_packed_items']) && is_array($this->responseData['response']['not_packed_items'])){
            $notPackedItems = [];
            foreach($this->responseData['response']['not_packed_items'] as $notPackedItems){
                $this->packingResult->addNotPackedItems($notPackedItems);
            }          
        }
    }
    
    protected function mapErrors(){
        if(isset($this->responseData['response']['errors'])){
            $this->packingResult->setErrors($this->responseData['response']['errors']);
        }
    }
    
}