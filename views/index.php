<?php
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>まさる堂トップ</title>
    <link rel="stylesheet" href="stylesheet/foundation/foundation.min.css">

    <script src="script/jquery-3.2.1.min.js"></script>
    <script src="script/foundation/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</head>
<body>        
    <?php 
    include 'tpl/header.php';
    require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    ?>
    <?php
        $pdo = new database();
        $res = $pdo->select('select artwork_path,title,band_name from musics inner join bands on musics.band_id = bands.band_id');
        foreach($res as $youso){
            foreach($youso as $val){
                echo $val."<br>"; 
            }
        }
    ?>

    <img src=<?=$_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/assets/artwork/sc.png'?> alt="">
</body>
</html>