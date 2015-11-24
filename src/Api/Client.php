<?php

namespace ThreeDBinPacking\Api;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of Client
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Client
{
    protected $location;
    protected $algorithmName;

    public function __construct($location, $algorithmName) {
        $this->location = $location;
        $this->algorithmName = $algorithmName;
    }


    public function getLocation() {
        return $this->location;
    }

    public function getRequestUrl($https = true) {
        $protocol = ($https)?'https://':'http//';
        return $protocol.$this->location.'/packer/'.$this->algorithmName;
    }
 
}