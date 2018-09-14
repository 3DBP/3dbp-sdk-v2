<?php

namespace ThreeDBinPacking\Api;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\RequestData;
use ThreeDBinPacking\Model\Response\Response;
/**
 * Description of Connection
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Connection
{
    protected $client;
    protected $response;


    public function __construct(Client $client) {
        $this->client = $client;
        $this->response = new Response();
    }

    public function sendRequest(RequestData $requestData){
        $url_query = 'query='.json_encode($requestData->getAsArray(), JSON_HEX_AMP);
        $ch = curl_init($this->client->getRequestUrl());
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $url_query);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER  , true);
        $resp = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $this->response->setRawResponse(substr($resp, $header_size));
        $this->response->setResponseCode(curl_getinfo($ch, CURLINFO_HTTP_CODE));
        curl_close($ch);
    }
    
    public function getResponse(){
        return $this->response;
    }
    
}