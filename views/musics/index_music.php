<?php

//ルートへのパス
$root = "../../";
$address =  $root.'assets/artwork/sc.png';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
    <title>Document</title>
</head>
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
    <h1>楽曲一覧</h1>
    <div class="image-upload">
        <img class="preview" src="noimage.jpg" alt="Preview">
        <input name="image" type="file">
    </div>
    <table border="1">
        <tr>
            <?php
                // foreach文で配列の中身を一行ずつ出力
                foreach ($stmt as $row) {    
                    
                // データベースのフィールド名で出力
                echo '<th>'.$row['title'].'<br>'.$row['band_name'].'<br>'.$row['price'].'</th>';
                }
            ?>
        </tr>
    </table>
</body>
</html>