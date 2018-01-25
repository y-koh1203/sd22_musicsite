<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    $img_path = '../../assets/artwork/';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

    $pdo = new database();
    $mid = $_POST['m_id'];
    $ts = time();

    $res = $pdo->select('select member_id as mid,member_name as mn,nickname as nn,mail_address as ma,login_id as li 
    from members where member_id = '.$mid);

    $sql_this_month = "select artwork_path as ap,title as ti,price,sum(price) as sp,band_name as bn,member_name as mn
    from musics inner join details on musics.music_id = details.music_id
    inner join profits on details.profits_id = profits.profits_id
    inner join bands on musics.band_id = bands.band_id
    inner join members on profits.member_id = members.member_id
    where profits.profits_date between '".date('Y-m-01 00:00:00', $ts)."' AND '".date('Y-m-t 23:59:59', $ts)."'
    AND members.member_id = ".$mid;

    $tm = $pdo->select($sql_this_month);

    $sql_last_month = "select artwork_path as ap,title as ti,price,sum(price) as sp,band_name as bn,member_name as mn
    from musics inner join details on musics.music_id = details.music_id
    inner join profits on details.profits_id = profits.profits_id
    inner join bands on musics.band_id = bands.band_id
    inner join members on profits.member_id = members.member_id
    where profits.profits_date between '".date('Y-m-01 00:00:00', strtotime(date('Y-m-01 00:00:00', $ts)) - 1)."' AND '".date('Y-m-t 23:59:59', strtotime(date('Y-m-01 00:00:00', $ts)) - 1)."'
    AND members.member_id =".$mid;

    $lm = $pdo->select($sql_last_month);
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
    <header>
        <div class="contain-to-grid sticky">
            <nav class="top-bar" data-topbar role="navigation" data-options="sticky_on: large">
                <ul class="title-area">
                    <!-- Title Area -->
                    <li class="name">
                    <h1><a href="<?=$path?>/views">Masaru-Do Admin</a></h1>
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <!-- <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li> -->
                </ul>
                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="divider"></li>   
                        <!-- 一般ユーザーがログインしている場合 -->
                        <li class="divider"></li>
                        <li class="name"><h2><a href="#">Adminさん</a></h2></li>
                        <li class="divider"></li>
                        <li class="has-dropdown not-click"><a href="#">管理メニュー</a> 
                            <ul class="dropdown">
                                <li><a href="<?=$path?>/views/admin/user_list.php">ユーザーリスト</a></li>
                                <li><a href="<?=$path?>/views/admin/music_list.php">楽曲リスト/検閲</a></li>
                                <li><a href="<?=$path?>/modules/class/control/signout.php">ログアウト</a></li>
                            </ul>
                        </li>   
                        <li class="divider"></li>
                    </ul>   
                </section>
            </nav>
        </div>
    </header>
    <div class="content">
        <div class="row">
            <div class="large-12 column"> 
                <h3>ユーザー詳細</h3>
                <hr>
                <div class="large-12 column">
                    <label for="">ユーザーネーム</label>
                    <p><?=$res[0]['mn']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">ニックネーム</label>
                    <p><?=$res[0]['nn']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">メールアドレス</label>
                    <p><?=$res[0]['ma']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">ログインID</label>
                    <p><?=$res[0]['li']?></p>
                </div>
                <hr>
            </div>
            <div class="large-12 column"> 
                <h3>購入履歴(先月)</h3>
                <hr>
                <?php
                if(count($lm) == 0){
                ?>
                <div class="large-12 column">
                    <div class="flex_col">
                        <?php 
                        foreach($lm as $v){
                        ?>
                        <div class="flex_row">
                            <div class="large-6 column flex_col">
                                <img src="<?=$img_path?><?=$v['ap']?>" alt="" class="thumb">
                            </div>
                            <div class="large-6 column">
                            <label for="">タイトル
                            <p><?=$v['ti']?></p>
                            </label>
                            <hr>
                            <label for="">アーティスト
                                <p><?=$v['bn']?></p>
                            </label>
                            <hr>
                            <label for="">価格</label>
                                <p><?=$v['price']?> 円</p>
                            <hr>
                            </div>
                        </div> 
                        <hr> 
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="large-12 column flex_row">
                    <span style="margin-top:1.5%;">合計価格：<?=$v['sp']?> 円</span>
                </div>
                <?php
                }else{
                ?>
                <div class="large-12 column">
                    <h3>商品を購入していません。</h3>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="large-12 column" style="margin:8% auto;"> 
                <hr>
                <h3>購入履歴(今月)</h3>
                <hr>
                <?php
                if(count($tm) == 0){
                ?>
                <div class="large-12 column">
                    <div class="flex_col">
                        <?php 
                        foreach($tm as $v){
                        ?>
                        <div class="flex_row">
                            <div class="large-6 column flex_col">
                                <img src="<?=$img_path?><?=$v['ap']?>" alt="" class="thumb">
                            </div>
                            <div class="large-6 column">
                            <label for="">タイトル
                            <p><?=$v['ti']?></p>
                            </label>
                            <hr>
                            <label for="">アーティスト
                                <p><?=$v['bn']?></p>
                            </label>
                            <hr>
                            <label for="">価格</label>
                                <p><?=$v['price']?> 円</p>
                            <hr>
                            </div>
                        </div> 
                        <hr> 
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <?php
                }else{
                ?>
                <div class="large-12 column">
                    <h3>商品を購入していません。</h3>
                </div>
                <?php
                }
                ?>
            </div>
            <div class="large-12 column wrap">
                <a href="user_list.php"　style="padding-bottom:5%;">ユーザーリストに戻る</a>
            </div>
        </div>
    </div>
    <?php //include '../tpl/footer.php';?>
</body>
</html>
