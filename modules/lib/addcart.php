<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    $pdo = new database();
    
    header('content-type: application/json; charset=utf-8');
    $status = 0;//初期状態は成功
    $music_id= $_GET['id'];

    if(!isset($_SESSION)){
        session_start();
    }

    if(!is_array($_SESSION['music_id'])){
        $_SESSION['music_id'] = array();
    }
    
    if(isset($_SESSION['music_id'])){
        if(in_array($music_id,$_SESSION['music_id'])){
            $status = 1;
        }else{
            $_SESSION['music_id'][] = $music_id;
        }
    }else{
        $status = 1; 
    }

    $arrData = array(
        'status' => $status
    );
    
    $resJSON = json_encode($arrData);
    echo $resJSON;
    exit;