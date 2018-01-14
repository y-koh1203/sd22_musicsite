<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    $pdo = new database();
   
    header('content-type: application/json; charset=utf-8');
    $checkname = $_GET['name'];
    $sql = 'select member_name from members where member_name like "'.$checkname.'" ;';
    $res = $pdo->select($sql);
    $data = 1;
    if(!isset($res)){
        $data = 0;
    }

    $arrData = array(
        'result' => $data
    );

    $resJSON = json_encode($arrData);
    echo $resJSON;
    exit;




