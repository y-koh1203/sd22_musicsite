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
    <title>Document</title>
</head>
<body>
    <img src=<?=$address?> alt="">
<<<<<<< HEAD
    <h1>楽曲一覧</h1>
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
=======
    
>>>>>>> bde2eb96d032c0bab0b4f2bf0dee55d1053de66d
</body>
</html>