<?php

namespace ThreeDBinPacking\Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of Response
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Response
{
    protected $rawResponse;
    protected $responseCode;
    
    public function getRawResponse() {
        return $this->rawResponse;
    }

    public function getResponseCode() {
        return $this->responseCode;
    }

    public function setRawResponse($rawResponse) {
        $this->rawResponse = $rawResponse;
        return $this;
    }

    public function setResponseCode($responseCode) {
        $this->responseCode = $responseCode;
        return $this;
    }
    
}