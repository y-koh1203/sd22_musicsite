<?php
    $msg  ="";
    $flg = "";
    
    if(isset($_GET['error_flg'])){
        $flg = $_GET['error_flg'];
    }
    
    if($flg == 1){
        $msg = 'ログインID、又はパスワードが違います。';
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../stylesheet/w3.css">
    <title>Document</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="../../modules/class/control/signin_control.php" method="post">
        <?=$msg.'<br>'?>
        ログインID :<input type="text" name="login_id" id=""><br>
        パスワード :<input type="password" name="pass" id=""><br>
        <input type="hidden" name="user_type" value="1">
        <button type="submit">ログイン</button>
    </form>
</body>
</html>