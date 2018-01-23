<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    
    $del_id = array($_GET['del_id']);

    if(!isset($_SESSION)){ 
        session_start();
    }

    $arr = $_SESSION['music_id'];

    $res = array_diff($arr,$del_id);
    $res = array_values($res);
    
    $_SESSION['music_id'] = $res;
    
    header('Location: cart.php');
    exit();
    