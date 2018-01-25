<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    $img_path = '../../assets/artwork/';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

    $pdo = new database();

    $mid = $_POST['m_id'];

    $res = $pdo->select('select music_id as mid,title as ti,band_name as bn,ex_status_name as ex,play_time as pt,genre_name as gn,price as pr,artwork_path as ap,lyric as ly
    from musics inner join bands on musics.band_id = bands.band_id 
    inner join examinted_status on musics.ex_status_id = examinted_status.ex_status_id
    inner join genres on musics.genre_id = genres.genre_id
    where musics.music_id = '.$mid);

    $res[0]['ly'] = str_replace("\r\n",'<br>',$res[0]['ly']);
    $res[0]['ly'] = str_replace("\r",'<br>',$res[0]['ly']);
    $res[0]['ly'] = str_replace("\n",'<br>',$res[0]['ly']);

    // $pdo = new database();
    // $res = $pdo->select('select * from details inner join profits on details.profits_id = profits.profits_id where profits.profits_date between '.
    // date('Y-m-').'01 and '.date('Y-m-').'31#written by Yoshida.');
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
            width:300px;
            height:300px;
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
                    <h1><a href="<?=$path?>/views/admin/">Masaru-Do Admin</a></h1>
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
                        <li class="name"><h2><a href="#">山本さん</a></h2></li>
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
                <h3>楽曲情報</h3>
                <hr>
                <div class="large-12 column"> 
                    <label for="">サムネイル</label>
                    <p><img src="<?=$img_path?><?=$res[0]['ap']?>" alt="" class="thumb"></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">タイトル</label>
                    <p><?=$res[0]['ti']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">バンド名</label>
                    <p><?=$res[0]['bn']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">価格</label>
                    <p><?=$res[0]['pr']?> 円</p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">ジャンル名</label>
                    <p><?=$res[0]['gn']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">再生時間</label>
                    <p><?=$res[0]['pt']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">歌詞</label>
                    <p><?=$res[0]['ly']?></p>
                </div>
                <hr>
                <div class="large-12 column"> 
                    <label for="">状態</label>
                    <p><?=$res[0]['ex']?></p>
                </div>
            </div>
            <div class="large-12 column">
                <form action="ex.php" method="post">
                    <input type="hidden" name="mid" value="<?=$res[0]['mid']?>">
                    <label for="">状態選択</label>
                    <select name="st" id="">
                        <option>未選択</option>
                        <option value="1">承認</option>
                        <option value="0">却下</option>
                    </select>
                    <p class="wrap"><button type="submit">変更</button></p>
                </form>
            </div>
        </div>
    </div>
    <?php //include '../tpl/footer.php';?>
</body>
</html>
