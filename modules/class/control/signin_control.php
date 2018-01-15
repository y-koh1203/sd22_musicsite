<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    $pdo = new database();
    
    $login_id = filter_input(INPUT_POST,'login_id',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);

    $sql = 'select member_name from members where login_id = "'.$login_id.'" AND password = "'.$pass.'" ;';

    $res = $pdo->select($sql);

    if(count($res) == 0){
        $url = '../../../views/signin/signin.php?error_flg=1';
        header('Location: '.$url);
        exit();        
        //エラー処理
    }

    session_start();
    $_SESSION['name'] = $res[0]['member_name'];

    $url = '../../../views/index.php';
    header('Location: '.$url);
    exit();        