<?php
/**
 * Created by IntelliJ IDEA.
 * User: yamakoh
 * Date: 2018/01/07
 * Time: 9:40
 */
$prev = "";
if(isset($_GET['prev'])){
    $prev = $_GET['prev'];
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <h2>登録完了</h2>
    <p>会員登録が完了しました!</p>
    <?php
    if($prev == 1){
    ?>
        <!-- ユーザーの会員登録の場合 -->
        <p><a href="../signin/signin.php">ユーザーログイン画面へ</a></p>
    <?php
    }else{
    ?>
         <!-- バンドの会員登録の場合 -->
        <p><a href="../signin/signin_band.php">バンドログイン画面へ</a></p>
    <?php
    }
    ?>
    <p><a href="../index.php">トップページへ</a></p>
</body>
</html>
