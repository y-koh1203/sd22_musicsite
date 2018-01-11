<?php
/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/07
 * Time: 9:20
 */
class dispatch
{
    function  dispatch200($url){
        header('Location :'.$url);
        exit();
    }

    function test(){
        $a = 'aa';
        return $a;
    }
}