<?php

namespace ThreeDBinPacking\Services;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\RequestData;
use ThreeDBinPacking\Model\Request\Bin;
use ThreeDBinPacking\Model\Request\Item;
use ThreeDBinPacking\Mapper\PackingResponseMapper;
use ThreeDBinPacking\Model\Request\ParameterBoolean;
use ThreeDBinPacking\Model\Request\ParameterImageSize;
/**
 * Description of AbstractPackingService
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

abstract class AbstractPackingService
{
    protected $requestData;
    protected $connector;
    protected $packingResponse;
    
    public function __construct($apiUsername, $apiKey) {
        $this->requestData = new RequestData($apiUsername, $apiKey);
    }
    
    abstract public function getAlgorithmName();

    public function setBinsFromArray(array $bins){
        $this->requestData
                ->getBinsCollection()
                ->setFromArray($bins);
    }
    
    public function setItemsFromArray(array $items){
        $this->requestData
                ->getItemsCollection()
                ->setFromArray($items);
    }
    
    public function addBin(Bin $bin){
        $this->requestData
                ->getBinsCollection()
                ->addBin($bin);
    }
    
    public function addItem(Item $item){
        $this->requestData
                ->getItemsCollection()
                ->addItem($item);
    }
    
    public function enableGetCoordinates(){
        $this->requestData
                ->getParameters()
                ->setItemCoordinates(new ParameterBoolean(true));
    }
    
    public function enableGetSbSImages(){
        $this->requestData
                ->getParameters()
                ->setImagesSbs(new ParameterBoolean(true));
    }
    
    public function enableGetCompleteImages(){
        $this->requestData
                ->getParameters()
                ->setImagesComplete(new ParameterBoolean(true));
    }

    public function enableGetSeparatedImages(){
        $this->requestData
                ->getParameters()
                ->setImagesSeparated(new ParameterBoolean(true));
    }
    
    public function enableGetStatistics(){
        $this->requestData
                ->getParameters()
                ->setStats(new ParameterBoolean(true));
    }
    
    public function setImagesSizes($width, $height){
        $this->requestData
                ->getParameters()
                ->setImagesHeight(new ParameterImageSize($height))
                ->setImagesWidth(new ParameterImageSize($width));
    }
    
    public function execute($location){
        $algorithmName = $this->getAlgorithmName();
        $client = new \ThreeDBinPacking\Api\Client($location, $algorithmName);
        
        $connection = new \ThreeDBinPacking\Api\Connection($client);
        $connection->sendRequest($this->requestData);
        $connectionResponse = $connection->getResponse();
        $mapper = new PackingResponseMapper();
        $this->packingResponse = $mapper->map($connectionResponse, $this->requestData);
    }
    
    public function getResult(){
        return $this->packingResponse;
    }
}