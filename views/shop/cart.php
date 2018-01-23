<?php
$path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
$img_path = '../../assets/artwork/';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

$pdo = new database();
$res = array();
$all_music = array();

if(!isset($_SESSION)){
    session_start();

    if(isset($_SESSION['music_id'])){
        $all_music = $_SESSION['music_id'];
    }
}

$lim = count($all_music) - 1;
$cnt = count($all_music);
if($cnt != 0){
    $sql = 'select music_id,artwork_path,title,band_name,price from musics inner join bands on musics.band_id = bands.band_id where music_id = ';
    if($cnt != 1){
        for($i = 0;$i < $cnt;$i++){
            if($i == $lim){
                $sql .= ' OR music_id = '.$all_music[$i];  
            }else if($i == 0){
                $sql .= $all_music[0];
            }else if($i >= 1){
                $sql .= ' OR music_id = '.$all_music[$i];  
            }
        }
    }else{
        $sql .= $all_music[0];
    }
    $sql .= ' ;';

    $res = $pdo->select($sql);
}
//var_dump($res);
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

        .flex_col{
            display:flex;
            flex-direction: column;
            justify-content: space-between;
            vertical-align: middle;
        }        
        
        .flex_col2{
            display:flex;
            flex-direction: column;
            align-items:center;
        }

        .thumb{
            max-width:200px;
            max-height:200px;
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
<body>
    <?php include '../tpl/header.php';?>
    <div class="content">
        <div class="content">
            <div class="row">
                <div class="large-12 column">
                    <h2>カート</h2>
                    <hr>
                </div>
                <?php
                if($cnt != 0){
                ?>
                <div class="large-12 column">
                    <div class="flex_col">
                        <?php 
                        foreach($res as $v){
                        ?>
                        <div class="flex_row">
                            <div class="large-6 column flex_col">
                                <img src="<?=$img_path?><?=$v['artwork_path']?>" alt="" class="thumb">
                            </div>
                            <div class="large-6 column">
                            <label for="">タイトル
                            <p><?=$v['title']?></p>
                            </label>
                            <hr>
                            <label for="">アーティスト
                                <p><?=$v['band_name']?></p>
                            </label>
                            <hr>
                            <label for="">価格</label>
                                <p><?=$v['price']?> 円</p>
                            <hr>
                            <a href="del_cart.php?del_id=<?=$v['music_id']?>">カートから削除</a>
                            </div>
                        </div> 
                        <hr> 
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="large-12 column">
                    レジに進む
                </div>
                <?php
                }else{
                ?>
                <div class="large-12 column">
                    <h3>カートには何も入っていません</h3>
                </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php include '../tpl/footer.php';?>
</body>
</html>