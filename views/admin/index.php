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
                    <h1><a href="#">Masaru-Do Admin</a></h1>
                    </li>
                    <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <!-- <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li> -->
                </ul>
                <section class="top-bar-section">
                    <!-- Right Nav Section -->
                    <ul class="right">
                        
                    </ul>   
                </section>
            </nav>
        </div>
    </header>
    <div class="content">
        <div class="row">
            <div class="large-12 column"> 
                <h2>管理者ログイン</h2> 
                <hr>
                <form action="admin_top.php" method="post" class="form1">                
                    <div class="row">
                        <div class="large-12 columns">
                            <p style="color:red"><?=$msg?></p>
                            <label>ID
                                <input type="text" name="login_id" placeholder="insert login id here" required/>
                            </label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="large-12 columns">
                            <label>パスワード
                                <input type="text" name="pass" placeholder="insert password here" required/>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="user_type" value="1">
                    <p class="wrap"><button type="submit"　class="submit_btn">ログイン</button></p>
                </form>
            </div>
        </div>
    </div>
    <?php //include '../tpl/footer.php';?>
</body>
</html>