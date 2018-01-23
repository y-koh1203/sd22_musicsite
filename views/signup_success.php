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
    <link rel="stylesheet" href="../stylesheet/w3.css">
    <link rel="stylesheet" href="../stylesheet/design.css">
    <title>Document</title>
</head>
<body>
    <h1></h1>
    <div class="message1">登録完了</div>
    <br>
	  <div class="message2">会員登録が完了しました!</div>

    <?php
    if($prev == 1){
    ?>
        <!-- ユーザーの会員登録の場合 -->

    <div class="userog"><p><a href="../signin/signin.php"><button class="w3-button w3-red">ユーザーログイン画面へ</button></a></p></div>

    <?php
    }else{
    ?>
         <!-- バンドの会員登録の場合 -->
    <br>
    <div class="bandrog"><p><a href="../signin/signin_band.php"><button class="w3-button w3-red">バンドログイン画面へ</button></a></p></div>
    <?php
    }
    ?>
    <br>
    <hr class="style1">
    <div class="bandrog"><p><a href="../index.php"><button class="w3-button w3-black">トップページへ</button></a></p></div>

</body>
</html>

<!--http://localhost/sd22_musicsite/sd22_musicsite/views/signup/signup_success.php-->
