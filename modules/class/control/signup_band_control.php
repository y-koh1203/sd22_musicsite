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
    $name = filter_input(INPUT_POST,'band_name',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST,'pass',FILTER_SANITIZE_STRING);
    $mail = filter_input(INPUT_POST,'email',FILTER_SANITIZE_EMAIL);
    $login_id = filter_input(INPUT_POST,'login_id',FILTER_SANITIZE_STRING);

    if(!isset($name)){
        //
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

    $tbl = 'bands';
    $col = array('band_name','mail_address','password','login_id','b_status_id');
    $member_status = array(
        $name,$mail,$pass,$login_id,'1'
    );

    $pdo->insert($tbl,$col,$member_status);

    $url = '../../../views/signup/signup_success.php?prev=2';
    header('Location: '.$url);
    exit;
}else{
    //不正遷移
    header();
}

