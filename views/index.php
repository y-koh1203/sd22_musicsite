<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    $img_path = '../assets/artwork/';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';
    
    $pdo = new database();
    $utype="";
    $res = array();

    $sql = 'select music_id,artwork_path,title,band_name from musics inner join bands on musics.band_id = bands.band_id';
    if(!isset($_SESSION)){ 
        session_start();
        //$utype = $_SESSION['type'];
        if(!isset($_SESSION['search_param'])){
            $res = $pdo->select($sql);
        }

        if(isset($_SESSION['type'])){
            $utype = $_SESSION['type'];
        }
    }

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
    <style>
        ul,li{
            list-style:none;
        }
        /* 親パネル */
        .grid {  
            display: flex;
            flex-flow: row wrap;
            justify-content: space-around;
        }

        /*
        * 空の子パネル
        * padding, margin の左右も 0 に指定してしまうと、
        * 最後の行のレイアウトが崩れるので注意。
        */
        .cell.is-empty {
            height: 0;
            padding-top: 0;
            padding-bottom: 0;
            margin-top: 0;
            margin-bottom: 0;
        }

        .thumb{
            width:120px;
            height:120px;
            object-fit:contain;
        }

        .wrap{
            text-align:center;
        }
    </style>
</head>
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
<script src="<?=$path?>/views/script/foundation/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<script>
    $(document).ready(function(){
        var $grid = $('.grid'),   
        emptyCells = [],
        i;

        // 子パネル (ul.cell) の数だけ空の子パネル (ul.cell.is-empty) を追加する。
        for (i = 0; i < $grid.find('.cell').length; i++) {
            emptyCells.push($('<ul>', { class: 'cell is-empty' }));
        }

        $grid.append(emptyCells);
    });
  
</script>
<body>        
    <?php include 'tpl/header.php';?>
    <div class="content">
        <div class="row">
            <div class="large-12 column">
                <ul class="grid">
                <?php
                foreach($res as $v){
                ?>
                    <li class="cell">
                        <p class="wrap"><a href="musics/music_detail.php?music_id=<?=$v['music_id']?>"><img src="<?=$img_path?><?=$v['artwork_path']?>" alt="" class="thumb"></a></p>
                        <p class="wrap"><a href="musics/music_detail.php"><?=$v['title']?></a></p>
                        <p class="wrap"><a href="musics/music_detail.php"><?=$v['band_name']?></a></p>
                    </li>
                <?php
                }
                ?>
                </ul>
            </div>
        </div>
    </div>
    <?php include 'tpl/footer.php';?>
</body>
</html>