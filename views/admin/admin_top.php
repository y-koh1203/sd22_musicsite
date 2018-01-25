<?php

    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
    
    $msg  ="";
    $flg = "";
    
    if(isset($_GET['error_flg'])){
        $flg = $_GET['error_flg'];
    }
    
    if($flg == 1){
        $msg = 'ログインID、又はパスワードが違います。';
    }

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
              
            </div>
        </div>
    </div>
    <?php //include '../tpl/footer.php';?>
</body>
</html>
