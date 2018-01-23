<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/lib/util.php';

if(!isset($_SESSION)){ 
    session_start(); 
} 

$pdo = new database();
$path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
$art_path = '../../../assets/artwork';
$music_path = '../../../assets/musics';
$band_id = $_SESSION['uid'];

$img_ext_list = array("jpg","png","gif");
$music_ext_list = array("aac","mp3","mp4");

$img_filename = "";
$music_filename = "";
$emsg = "";
$eflg = 0;

for ($i=0; $i<count($_FILES['userfile']['name']); $i++) {
    $file_ext = pathinfo($_FILES["userfile"]["name"][$i], PATHINFO_EXTENSION);  
    if (!FileExtensionGetAllowUpload($file_ext)) {
        $emsg =  "対応していないファイルです。<br>";
        $eflg = 1;
    }else if(!is_uploaded_file($_FILES["userfile"]["tmp_name"][$i])){
        $emsg =  "ファイルが選択されていません。<br>";
        $eflg = 1;
    }
}

for ($i=0; $i<count($_FILES['userfile']['name']); $i++) {
    $file_ext = pathinfo($_FILES["userfile"]["name"][$i], PATHINFO_EXTENSION);  
    if (FileExtensionGetAllowUpload($file_ext) &&  is_uploaded_file($_FILES["userfile"]["tmp_name"][$i])) {
        if(in_array($file_ext,$img_ext_list)){
            if(move_uploaded_file($_FILES["userfile"]["tmp_name"][$i], $art_path.'/'.$_FILES["userfile"]["name"][$i])) {
                $emsg = $_FILES["userfile"]["name"][$i] . "をアップロードしました。<br>";
                $img_filename = $_FILES["userfile"]["name"][$i];
            } else {
                $emsg = "ファイルをアップロードできません。<br>";
                $eflg = 1;           
            }
        }else if(in_array($file_ext,$music_ext_list)){
            if(move_uploaded_file($_FILES["userfile"]["tmp_name"][$i], $music_path.'/'.$_FILES["userfile"]["name"][$i])) {
                $emsg = $_FILES["userfile"]["name"][$i] . "をアップロードしました。<br>";
                $music_filename = $_FILES["userfile"]["name"][$i];
            } else {
                $emsg = "ファイルをアップロードできません。<br>";
                $eflg = 1;
            }
        }   
    }else{
        $emsg = "ファイルが選択されていません。<br>";
        $eflg = 1;
    }
}

$url = '../../../views/musics/music_upload.php';

if($eflg == 1){
    $_SESSION['msg'] = $emsg;
    header('Location: '.$url);

    exit();
}

echo $title = filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
echo $price = filter_input(INPUT_POST,'price',FILTER_SANITIZE_STRING);
echo $genre_id = filter_input(INPUT_POST,'genre',FILTER_SANITIZE_STRING);
echo $time = filter_input(INPUT_POST,'play_time',FILTER_SANITIZE_STRING);
echo $lyric = filter_input(INPUT_POST,'lyric',FILTER_SANITIZE_STRING);
echo $today = date("Y-m-d H:i:s");   


$table = 'musics';
$col = array('band_id', 'genre_id', 'title', 'release_date', 'price', 'lyric', 'play_time', 'artwork_path', 'ex_status_id', 'release_status_id');
$value = array($band_id,$genre_id,$title,$today,$price,$lyric,$time,$img_filename,'01','00');
$pdo->insert($table,$col,$value);

$_SESSION['title'] = $title;
$_SESSION['msg'] = $emsg;

$url = '../../../views/musics/upload_success.php';
header('Location: '.$url);

exit();







