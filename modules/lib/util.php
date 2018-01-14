<?php

/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/11
 * Time: 16:00
 */
function checkLength($string){

}

function arrayDepth($arr, $blank=false, $depth=0){
    if(!is_array($arr)){
        return $depth;
    } else {
        $depth++;
        $tmp = ($blank) ? array($depth) : array(0);
        foreach($arr as $value){
            $tmp[] = arrayDepth($value, $blank, $depth);
        }
        return max($tmp);
    }
}