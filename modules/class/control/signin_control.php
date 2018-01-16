<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    $pdo = new database();
    
    $login_id = filter_input(INPUT_POST,'login_id',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
    $utype = filter_input(INPUT_POST,'user_type',FILTER_SANITIZE_STRING);
    
    if($utype == 1){
        $sql = 'select member_name,member_id from members where login_id = "'.$login_id.'" AND password = "'.$pass.'" ;';
        $url = '../../../views/signin/signin.php?error_flg=1';
    }else if($utype == 2){
        $sql = 'select band_name,band_id from bands where login_id = "'.$login_id.'" AND password = "'.$pass.'" ;';
        $url = '../../../views/signin/signin_band.php?error_flg=1';
    }

    $res = $pdo->select($sql);

    if(count($res) == 0){
        //エラー遷移
        header('Location: '.$url);
        exit();        
    }

    session_start();
    $_SESSION['name'] = $res[0]['member_name'];
    $_SESSION['uid'] = $res[0]['user_id'];
    $_SESSION['type'] = '1';

    $url = '../../../views/index.php';
    header('Location: '.$url);
    exit();        