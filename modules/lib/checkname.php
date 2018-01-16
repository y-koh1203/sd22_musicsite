<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    $pdo = new database();
   
    header('content-type: application/json; charset=utf-8');
    $checkname = $_GET['name'];
    $type = $_GET['type'];
    if($type == 1){
        $tbl = 'members';
    }else{
        $tbl = 'bands';
    }
    $sql = 'select login_id from '.$tbl.' where login_id = "'.$checkname.'" ;';
    $res = $pdo->select($sql);
    $data = 0;

    if(!isset($res[0]['member_name'])){
        $data = 1;
    }

    $arrData = array(
        'result' => $data
    );
    
    $resJSON = json_encode($arrData);
    echo $resJSON;
    exit;




