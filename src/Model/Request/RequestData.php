<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of RequestData
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class RequestData
{
    const PARAMETER_API_USERNAME = 'username';
    const PARAMETER_API_KEY      = 'api_key';
    const PARAMETER_BINS         = 'bins';
    const PARAMETER_ITEMS        = 'items';
    const PARAMETER_PARAMS       = 'params';

    /**
     *
     * @var \ThreeDBinPacking\Model\Request\BinsCollection
     */
    protected $binsCollection;
    /**
     *
     * @var \ThreeDBinPacking\Model\Request\ItemsCollection
     */
    protected $itemsCollection;
    /**
     *
     * @var \ThreeDBinPacking\Model\Request\ParametersContainer
     */
    protected $parameters;
    protected $shippingFactor;
    
    protected $apiUser;
    protected $apiKey;
    
    public function __construct($apiUsername, $apiKey, array $params = null) {
        $this->binsCollection = new BinsCollection();
        $this->itemsCollection = new ItemsCollection();
        $this->parameters = new Parameters();
        $this->apiKey = $apiKey;
        $this->apiUser = $apiUsername;
        if($params){
            $this->parameters->setFromArray($params);
        }
    }

    /**
     * 
     * @return \ThreeDBinPacking\Model\Request\BinsCollection
     */
    public function getBinsCollection() {
        return $this->binsCollection;
    }

    /**
     * 
     * @return \ThreeDBinPacking\Model\Request\ItemsCollection
     */
    public function getItemsCollection() {
        return $this->itemsCollection;
    }

    /**
     * 
     * @return \ThreeDBinPacking\Model\Request\Parameters
     */
    public function getParameters() {
        return $this->parameters;
    }

    
    public function setBinsCollection(BinsCollection $binsCollection) {
        $this->binsCollection = $binsCollection;
        return $this;
    }

    public function setItemsCollection(ItemsCollection $itemsCollection) {
        $this->itemsCollection = $itemsCollection;
        return $this;
    }

    public function setParameters(Parameters $parameters) {
        $this->parameters = $parameters;
        return $this;
    }

    public function getAsArray(){
        $data = [];
        $data[self::PARAMETER_API_KEY]      = $this->apiKey;
        $data[self::PARAMETER_API_USERNAME] = $this->apiUser;
        $data[self::PARAMETER_BINS]         = $this->binsCollection->getAsArray();
        $data[self::PARAMETER_ITEMS]        = $this->itemsCollection->getAsArray();
        $data[self::PARAMETER_PARAMS]       = $this->parameters->getAsArray();
        return $data;
    }
    
    public function getShippingFactor() {
        return $this->shippingFactor;
    }

    public function setShippingFactor($shippingFactor) {
        $this->shippingFactor = $shippingFactor;
    }

}