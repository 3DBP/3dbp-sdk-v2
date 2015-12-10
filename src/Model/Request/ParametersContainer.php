<?php

namespace ThreeDBinPacking\Model\Request;

//<editor-fold defaultstate="collapsed" desc="Use block.">
use ThreeDBinPacking\Exception\UnknownPackingRequestParameterException;
use ThreeDBinPacking\Helper\UnderscoreToCamelCaps;
/**
 * Description of ParametersContainer
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class ParametersContainer
{
    const PARAM_IMAGES_BACKGROUND_COLOR           = 'images_background_color';
    const PARAM_IMAGES_BIN_BORDER_COLOR           = 'images_bin_border_color';
    const PARAM_IMAGES_BIN_FILL_COLOR             = "images_bin_fill_color";
    const PARAM_IMAGES_BIN_DASHED_LINE_COLOR      = "images_bin_dashed_line_color";
    const PARAM_IMAGES_ITEM_BORDER_COLOR          = "images_item_border_color";
    const PARAM_IMAGES_ITEM_FILL_COLOR            = "images_item_fill_color";
    const PARAM_IMAGES_ITEM_BACK_BORDER_COLOR     = "images_item_back_border_color";
    const PARAM_IMAGES_SBS_LAST_ITEM_FILL_COLOR   = "images_sbs_last_item_fill_color";
    const PARAM_IMAGES_SBS_LAST_ITEM_BORDER_COLOR = "images_sbs_last_item_border_color";
    const PARAM_IMAGES_WIDTH                      = "images_width";
    const PARAM_IMAGES_HEIGHT                     = "images_height";
    const PARAM_IMAGES_SOURCE                     = "images_source";
    const PARAM_IMAGES_SBS                        = "images_sbs";
    const PARAM_IMAGES_COMPLETE                   = "images_complete";
    const PARAM_IMAGES_SEPARATED                  = "images_separated";
    const PARAM_IMAGES_FORMAT                     = "images_format";
    const PARAM_STATS                             = "stats";
    const PARAM_ITEM_COORDINATES                  = "item_coordinates";
    
    protected $parameters = [];
    protected static $parametersList;


    public function __construct(array $parameters = null) {
        if($parameters){
            $this->setFromArray($parameters);
        }
    }
    
    public function setFromArray(array $parameters){
        foreach($parameters as $name=>$value){
            $this->setParameter($name, $value);
        }
        return $this;
    }
    
    public function setParameter($name, $value){
        $paramsList = self::getParametersList();
        if( !in_array($name, $paramsList)){
            throw new UnknownPackingRequestParameterException($name);
        }
        $method = 'set'.UnderscoreToCamelCaps::getCamelCaps($name, true);
        if( ! method_exists($this, $method) ){
            throw new \Exception("Method '$method' doesn't exists.");
        }
        $methodReflection = new \ReflectionMethod($this, $method);
        $methodParameters = $methodReflection->getParameters();
        $parameterClass = $methodParameters[0]->getClass()->getName();

        $parameterObject = new $parameterClass($value);
        $this->$method($parameterObject);
        return $this;

    }
    
    static public function getParametersList(){
        if(self::$parametersList === null){
            $reflection = new \ReflectionClass(get_class());
            $constants = $reflection->getConstants();
            self::$parametersList = [];
            foreach($constants as $const){
                self::$parametersList[] = $const;
            }
        }
        return self::$parametersList;
    }

    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesBackgroundColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_BACKGROUND_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesBinBorderColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_BIN_BORDER_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesBinFillColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_BIN_FILL_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesBinDashedLineColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_BIN_DASHED_LINE_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesItemBorderColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_ITEM_BORDER_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesItemFillColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_ITEM_FILL_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesItemBackBorderColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_ITEM_BACK_BORDER_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterColor $color
     */
    public function setImagesSbsLastItemFillColor(ParameterColor $color){
        $this->parameters[self::PARAM_IMAGES_SBS_LAST_ITEM_FILL_COLOR] = $color->getAsString();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterImageSize $imageSize
     */
    public function setImagesWidth(ParameterImageSize $imageSize){
        $this->parameters[self::PARAM_IMAGES_WIDTH] = $imageSize->getSize();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterImageSize $imageSize
     */
    public function setImagesHeight(ParameterImageSize $imageSize){
        $this->parameters[self::PARAM_IMAGES_HEIGHT] = $imageSize->getSize();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterImageSource $source
     */
    public function setImagesSource(ParameterImageSource $source){
        $this->parameters[self::PARAM_IMAGES_SOURCE] = $source->getSource();
        return $this;
    }
    
    /**
     * 
     * @param bool $bool
     */
    public function setImagesSbs(ParameterBoolean $bool){
        $this->parameters[self::PARAM_IMAGES_SBS] = $bool->getValue();
        return $this;
    }
    
    /**
     * 
     * @param bool $bool
     */
    public function setImagesComplete(ParameterBoolean $bool){
        $this->parameters[self::PARAM_IMAGES_COMPLETE] = $bool->getValue();
        return $this;
    }
    
    /**
     * 
     * @param bool $bool
     */
    public function setImagesSeparated(ParameterBoolean $bool){
        $this->parameters[self::PARAM_IMAGES_SEPARATED] = $bool->getValue();
        return $this;
    }
    
    /**
     * 
     * @param \ThreeDBinPacking\Model\Request\ParameterImageFormat $format
     */
    public function setImagesFormat(ParameterImageFormat $format){
        $this->parameters[self::PARAM_IMAGES_FORMAT] = $format->getFormat();
        return $this;
    }
    
    /**
     * 
     * @param bool $bool
     */
    public function setStats(ParameterBoolean $bool){
        $this->parameters[self::PARAM_STATS] = $bool->getValue();
        return $this;
    }
    
    /**
     * 
     * @param bool $bool
     */
    public function setItemCoordinates(ParameterBoolean $bool){
        $this->parameters[self::PARAM_ITEM_COORDINATES] = $bool->getValue();
        return $this;
    }
    
    public function getAsArray(){
        $data = [];
        foreach($this->parameters as $key=>$value){
            $data[$key] = $value;
        }
        return $data;
    }
}