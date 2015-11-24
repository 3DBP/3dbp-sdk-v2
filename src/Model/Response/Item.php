<?php

namespace Model\Response;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Model\Request\Item as RequestItem;
/**
 * Description of Item
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class Item extends RequestItem
{
    protected $coordinates;
    protected $sbsImage;
    protected $separatedImage;
    
}