<?php
    session_start();
    $logon_flg = 0;
    
    if(isset($_SESSION['name'])){
        $user_name = $_SESSION['name'];
        $logon_flg = 1;
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>まさる堂トップ</title>
</head>
<body>
    <h1>TOP</h1>
    <div id="user_status">
        <?php
        if($logon_flg == 1){
        ?>
        <!-- ユーザーがログインしている場合 -->
        <p><?=$user_name?>さん</p>
        <ul>
            <li><a href="../modules/class/control/signout.php">ログアウト</a></li>
            <li><a href="signup/signup.php">マイページへ</a></li>
        </ul>
        
        <?php
        }else{
        ?>
        
        <!-- ユーザーがログインしていない場合 -->
        <ul>
            <li><a href="signin/signin.php">ログイン</a></li>
            <li><a href="signup/signup.php">会員登録</a></li>
        </ul>
        <?php
        }
        ?>
    </div>
</body>
</html>