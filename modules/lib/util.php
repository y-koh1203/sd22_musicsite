<?php
/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/11
 * Time: 16:00
 */

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

//アップロードできるファイルに拡張子の制限をかけたい時
function FileExtensionGetAllowUpload($ext){
    $allow_ext = array("gif","jpg","jpeg","png","eps");
    $music_ext_list = array("aac","mp3","mp4");

    if(in_array($ext,$allow_ext)){
        foreach($allow_ext as $v){
            if ($v === $ext){
                return 1;
            }
        }
    }

    if(in_array($ext,$music_ext_list)){
        foreach($music_ext_list as $v){
            if ($v === $ext){
                return 1;
            }
        }
    }
    
    return 0;
}