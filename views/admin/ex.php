<?php

try {
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=sd_master;charset=utf8','root','',
    array(PDO::ATTR_EMULATE_PREPARES => false));
} catch (PDOException $e) {
    exit('データベース接続失敗。'.$e->getMessage());
}

$id = '';

$select = $_POST['st'];
$mid = $_POST['mid'];

$sql = 'update musics set ex_status_id = :id where music_id = :value';
$stmt = $pdo -> prepare($sql);

if($select == 1){
    $id = '02';
}else{
    $id = '03';
}

$stmt->bindParam(':id', $id, PDO::PARAM_STR);
$stmt->bindValue(':value', $mid, PDO::PARAM_INT);

$stmt->execute();

header('Location: music_list.php');
exit();