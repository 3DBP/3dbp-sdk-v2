<?php

namespace ThreeDBinPacking\Helper;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of UnderscoreToCamelCaps
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class CamelCapsToUnderscore
{
    static public function getUnderscored($string){
        return strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string));
//        $func = create_function('$c', 'return strtoupper($c[1]);');
//        return preg_replace_callback('/_([a-z])/', $func, $string);
    }
}