<?php

    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    require_once $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/class/models/database.php';

    $pdo = new database();

    $res = $pdo->select('select music_id as mid,title as ti,band_name as bn,ex_status_name as ex from musics 
    inner join bands on musics.band_id = bands.band_id 
    inner join examinted_status on musics.ex_status_id = examinted_status.ex_status_id
    where musics.ex_status_id = "01" ');

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
                <h3>検閲待ち楽曲一覧</h3>
                <?php
                    if(!count($res) == 0){
                ?>           
                <table>
                    <thead>
                        <tr>
                            <th width="500">楽曲ID</th>
                            <th width="500">タイトル</th>
                            <th width="500">バンド名</th>
                            <th width="500">検閲状態</th>
                            <th width="500"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        foreach($res as $v){
                        ?>  
                        <tr>
                            <td><?=$v['mid']?></td>
                            <td><?=$v['ti']?></td>
                            <td><?=$v['bn']?></td>
                            <td><?=$v['ex']?></td>
                            <td>
                               <form action="examinate.php" method="post" style="text-align:center;">
                                   <input type="hidden" name="m_id" value="<?=$v['mid']?>">
                                   <button type="submit" class="tiny">詳細</button>
                               </form>
                            </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <?php
                }else{
                ?>
                <p>楽曲は存在しません。</p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
    <?php //include '../tpl/footer.php';?>
</body>
</html>
