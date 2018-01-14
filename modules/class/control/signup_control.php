<?php
/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/06
 * Time: 16:45
 */

require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/dispatch.php';

$pdo = new database();

if(!empty($_POST)){
    $name = filter_input(INPUT_POST,'user_name',FILTER_SANITIZE_STRING);
    $nickname = filter_input(INPUT_POST,'nickname',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $login_id = filter_input(INPUT_POST,'login_id',FILTER_SANITIZE_STRING);

    if(!isset($name)){
        //エラー遷移
    }

    if(!isset($nickname)){
        //エラー遷移
    }

    if(!isset($pass)){
        //エラー遷移
    }

    if(!isset($name)){
        //エラー遷移
    }

    if(!isset($login_id)){
        //エラー遷移
    }

    $tbl = 'members';
    $col = array('member_name','nickname','password','mail_address','login_id','m_status_id');
    $member_status = array(
        $name,$nickname,$pass,$mail,$login_id,'1'
    );

    $pdo->insert($tbl,$col,$member_status);

    $url = '../../../views/signup/signup_success.php';
    header('Location: '.$url);
    exit;
}else{
    echo 'aaa';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?= $name?> 
    <?=$num?>
</body>
</html>
