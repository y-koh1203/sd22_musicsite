<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

    $err = "";

    if(!isset($_SESSION)){ 
        session_start(); 
    } 

    if(isset($_SESSION['msg'])){
        $err = $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    $pdo = new database();

    $sql = 'select * from genres ;';
    $genres = $pdo->select($sql);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOP</title>
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/foundation/foundation.min.css">
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/common/common.css">
    <style type="text/css">  

        a:link { color: #ffff; }
        
        .err_zone{
            margin:3% 0;
            color:red;
            text-align: center;
        }
    
        .form1{
            margin-top: 5%;
        }

        .btn_wrap{
            text-align: center;
        }

        .image-upload .preview {
            display: block;
            width: 100%;
            max-width: 200px;
            height: auto;
        }
    </style>
</head>
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
<script src="<?=$path?>/views/script/foundation/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        // アップロードボタン
        var fileSelector = '.image-upload';
         
        // プレビュー画像のクラス名
        var previewSelector = '.preview';
 
        // プレビューするファイルタイプ
        var fileTypes = [
            'image/jpeg', 'image/jpg', 'image/png',
            'image/gif', 'image/bmp'
        ];
 
        if( typeof FileReader == 'undefined' ){
            return;
        }
 
        var reader = new FileReader();
 
        reader.addEventListener('load', function(event) {
            preview.setAttribute('src', event.target.result);
        });
 
        var fileInputs = document.querySelectorAll(fileSelector);
 
        for(var i = 0; i < fileInputs.length; i++){
            var fileInput = fileInputs[i];
            var input = fileInput.querySelector('input');
            var preview = fileInput.querySelector(previewSelector);
 
            if(!preview) return;
            preview.setAttribute('data-fallback-src', preview.getAttribute('src'));
 
            input.addEventListener('change', function(){
                if(input.files && input.files[0]　&& fileTypes.indexOf(input.files[0].type) >= 0) {
                    reader.readAsDataURL(input.files[0]);
                } else {
                    preview.setAttribute('src', preview.getAttribute('data-fallback-src'));
                }
            });
        }
    });
</script>
<body>        
    <?php include '../tpl/header.php';?>
    <div class="content">
        <div class="row">
            <div class="large-12 columns">
                <h2>楽曲ファイルのアップロード</h2>
                <hr>
                <p class="err_zone">
                    <?=$err?>
                </p>
                <form action="<?=$path?>/modules/class/control/uploader.php" method="post" enctype="multipart/form-data"　class="form1">
                    <label for="">楽曲ファイル
                        <input type="file" name="userfile[]" id="">
                    </label>
                    <div class="image-upload">
                        <label for="">楽曲イメージ
                            <img class="preview" src="noimage.jpg" alt="Preview">
                            <input type="file" name="userfile[]" id="" class="file">
                        </label>
                    </div>
                    <label>タイトル
                        <input type="text" name="title" id="">
                    </label>
                    <label>価格(数値のみ)
                        <input type="text" name="price" id="">
                    </label>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>ジャンル
                                <select name="genre">
                                <?php
                                foreach($genres as $rec){
                                ?>
                                    <option value="<?=$rec['genre_id']?>"><?=$rec['genre_name']?></option>
                                <?php
                                }
                                ?>
                                </select>
                            </label>
                        </div>
                    </div>
                    <label>再生時間
                        <input type="time" name="play_time" id="" max="99:99">
                    </label>
                    <label>歌詞
                        <textarea name="lyric" id="" cols="30" rows="10"></textarea>
                    </label>
                    <p class="btn_wrap"><button type="submit">アップロードする</button></p>
                </form>
            </div>
        </div>
    </div>
    <?php include '../tpl/footer.php';?>
</body>
</html>