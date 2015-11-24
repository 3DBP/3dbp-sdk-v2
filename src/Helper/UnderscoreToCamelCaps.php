<?php

namespace ThreeDBinPacking\Helper;

//<editor-fold defaultstate="collapsed" desc="Use block.">
/**
 * Description of UnderscoreToCamelCaps
 *
 * @author Albert Rybacki <rybacki.albert@gmail.com>
 */
// </editor-fold>

class UnderscoreToCamelCaps
{
    static public function getCamelCaps($string, $first_char_caps = false){
        if( $first_char_caps == true ){
            $string[0] = strtoupper($string[0]);
        }
        $func = create_function('$c', 'return strtoupper($c[1]);');
        return preg_replace_callback('/_([a-z])/', $func, $string);
    }
}