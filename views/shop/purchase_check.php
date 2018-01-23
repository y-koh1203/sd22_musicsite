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
    
    $sum = 0;

    $sum = $_SESSION['sum'];
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

        .flex_row{
            display:flex;
            flex-direction: row;
            justify-content: space-around;
        }

        .thumb{
            margin-top: 8%;
            width:200px;
            height:200px;
            object-fit:cover;
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
                    <h2>購入確認</h2>
                    <hr>
                </div>
                <div class="large-12 column">
                    <h3>ご購入内容</h3>
                    <table>
                        <thead>
                            <tr>
                                <th width="500">タイトル</th>
                                <th width="500">価格</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            foreach($res as $v){
                            ?>  
                            <tr>
                                <td><?=$v['title']?></td>
                                <td><?=$v['price']?> 円</td>
                            </tr>
                            <?php
                            }
                            ?>
                            <tr>
                                <th>合計</th>
                                <td><?=$sum?> 円</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="large-12 column">
                    <h3>お支払い情報入力</h3>
                    <p>クレジットカード番号入力</p>
                    <div class="large-12 column">
                        <label for="">カード名義人</label>
                        姓<input type="text" name="" id="" size="12" require>
                        名<input type="text" name="" id="" size="12" require>
                        <label for="">カード番号</label>
                        <input type="text" name="" id="" size="12" require>
                        <label for="">セキュリティコード</label>
                        <input type="password" name="" id="" size="12" maxlength="4" require>
                        <label for="">有効期限</label>                
                        <div class="large-12 column flex_row">
                            <select name="" id="" require>
                                <option value="">月</option>
                                <option value="">01</option>
                                <option value="">02</option>
                                <option value="">03</option>
                                <option value="">04</option>
                                <option value="">05</option>
                                <option value="">06</option>
                                <option value="">07</option>
                                <option value="">08</option>
                                <option value="">09</option>
                                <option value="">10</option>
                                <option value="">11</option>
                                <option value="">12</option>
                            </select>
                            <span style="font-size:150%;">&ensp;/&ensp;</span>
                            <select name="" id="" require>
                                <option value="">年</option>
                                <option value="">18</option>
                                <option value="">19</option>
                                <option value="">20</option>
                                <option value="">21</option>
                                <option value="">22</option>
                            </select>
                        </div>    
                    </div>
                </div>
            </div>
            <div class="large-12 columns wrap">
                <a href="purchase_result.php" class="button">購入を確定する</a>
            </div>  
        </div>
    </div>
    <?php include '../tpl/footer.php';?>
</body>
</html>