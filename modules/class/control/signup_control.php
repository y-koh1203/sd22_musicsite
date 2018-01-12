<?php
/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/06
 * Time: 16:45
 */

require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/models/database.php';
require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/models/dispatch.php';
require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/util.php';

$pdo = new database();

if(!empty($_POST)){
    $name = filter_input(INPUT_POST,'name',FILTER_NULL_ON_FAILURE);
    $pass = filter_input(INPUT_POST,'pass',FILTER_NULL_ON_FAILURE);

    if(!isset($name)){
        //エラー遷移
    }

    if(!isset($pass)){
        //エラー遷移
    }

    $sql = 'select member_id from members where member_id = 00000';

    $tbl = 'members';
    $col = array('member_id','member_name','nickname','user_pass','mail_address','login_id','m_status_id');
    $member_status = array(
        array(
            '00002','山もちょ','yamamo','12345678','aaa@nrnr.jp','mmm111122','1'
        ),
        array(
            '00003','山もちょ','yamamo','12345678','aaa@nrnr.jp','mmm111122','1'
        )
    );

    $res = $pdo->select($sql);

    $pdo->insert($tbl,$col,$member_status);

    $url = '../../../views/signup_success.php';
    header('Location: '.$url);
    exit;
}else{
    echo 'aaa';
}
