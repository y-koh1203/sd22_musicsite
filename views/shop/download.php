<?php
mb_internal_encoding("UTF-8");

$path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
$img_path = '../../assets/artwork/';
$mus_path = '../../assets/musics/';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

$pdo = new database();
$res = array();

if(isset($_POST)){
    $music_id = $_POST['music_id'];
}

$sql = 'select artwork_path,title,band_name,music_path,file_ext from musics inner join bands on musics.band_id = bands.band_id where music_id = '.$music_id;
$res = $pdo->select($sql);

// ファイルのパス
$filepath = $mus_path.$res[0]['music_path'];
header('Content-Length:' . filesize($filepath));

// リネーム後のファイル名
$filename = $res[0]['band_name'].'_'.$res[0]['title'].'.'.$res[0]['file_ext'];
header('Content-Type: application/force-download');
header('Content-Disposition: filename="'.$filename.'"');

// ファイルを読み込みダウンロードを実行
readfile($filepath);
exit();
?>