<?php
$path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
$title = "";

if(!isset($_SESSION)){ 
    session_start(); 

    if(isset($_SESSION['title']));{
        $title = $_SESSION['title'];
        //unset($_SESSION['title']);
    }
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/foundation/foundation.min.css">
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/common/common.css">
    <title>Document</title>
    <style>
        .text-center{
            text-align:center;
        }

        .btn_area{
            margin-top: 5%;
        }

        .btn_wrap{
            text-align:center;
        }
    </style>
</head>
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
<script src="<?=$path?>/views/script/foundation/foundation.min.js"></script>
<body>
    <?php include '../tpl/header.php';?>
    <div class="content">
        <div class="row">
            <div class="large-12 column">
                <h2>アップロード完了</h2>
                <hr>
                <p class="text-center">楽曲の登録が完了しました。</p>
                <p class="text-center">検閲の完了までお待ちください。</p>
                <h3 class="text-center">楽曲タイトル：<?=$title?></h3>
                <div class="btn_area">
                    <p class="btn_wrap">
                        <button type="button"><a href="<?=$path?>/views/user/band_mypage.php">バンドマイページへ</a></button>
                    </p>
                    <p class="btn_wrap">
                        <button type="button"><a href="<?=$path?>/views/">トップページへ</a></button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <?php include '../tpl/footer.php';?>    
</body>
</html>