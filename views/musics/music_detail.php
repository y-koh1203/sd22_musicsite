<?php
$path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
$img_path = '../../assets/artwork/';
require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

$pdo = new database();
$res = array();
$utype="";

$music_id = filter_input(INPUT_GET,'music_id',FILTER_SANITIZE_STRING);

$sql = 'select music_id,artwork_path,title,band_name,play_time,release_date,price from musics inner join bands on musics.band_id = bands.band_id where music_id = '.$music_id.' ;';
if(!isset($_SESSION)){ 
    session_start();

    if(isset($_SESSION['type'])){
        $utype = $_SESSION['type'];
    }
}

$res = $pdo->select($sql);
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

        .pos{
            /* margin-bottom:15%; */
        }

        .thumb{
            object-fit: cover;
            width: 500px;
            height: 500px;
        }

        .discription{
            margin-top:10%;
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
        $('.addcart').click(function() {
            data = {'id':<?=$res[0]['music_id']?>};
            $.ajax({
                url: "<?=$path?>/modules/lib/addcart.php", 
                type: 'get',
                data: data,
            }).done(function(data){
                console.log('done');
                if(data['status'] == 0){
                    alert("<?=$res['0']['title']?> をカートに追加しました");
                }else{
                    alert("その商品はすでにカートに追加されています");
                }
            });
        });
    });
</script>
<body>
    <?php include '../tpl/header.php';?>
    <div class="content">
        <div class="row">
            <div class="large-12 column">
                <h2>楽曲詳細</h2>
                <hr>
            </div>
            <?php foreach($res as $v){
            ?>
            <div class="large-7 column">
                <h3><?=$v['title']?></h3>
                <img src="<?=$img_path?><?=$v['artwork_path']?>" alt="" class="thumb">
            </div>
            <div class="large-5 column discription">
                <label for="">アーティスト
                <p><?=$v['band_name']?></p>
                </label>
                <hr>
                <label for="">価格</label>
                <p><?=$v['price']?> 円</p>
                <hr>
                <label for=""> リリース日</label>
                <p><?=$v['release_date']?></p>
                <hr>
                <label for="">再生時間</label>
                <p><?=$v['play_time']?></p>
                <hr>
                <?php
                if($utype == 1){
                ?>
                <!-- <p class="wrap"><button type="button">カートに追加</button></p> -->
                <a href="#" class="button expand addcart">カートに追加</a>
                <?php
                }
                ?>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
    <?php include '../tpl/footer.php';?>
</body>
</html>