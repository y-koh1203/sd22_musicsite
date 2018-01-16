<?php
    session_start();
    $logon_flg = 0;
    $type = 0;
    
    if(isset($_SESSION['name'])){
        $user_name = $_SESSION['name'];
        $logon_flg = 1;
        $type = $_SESSION['type'];
    }
?>
<div id="user_status">
<?php
if($logon_flg == 1){
    if($type == 1){
    ?>
        <!-- 一般ユーザーがログインしている場合 -->
        <p><?=$user_name?>さん</p>
        <ul>
            <li><a href="../modules/class/control/signout.php">ログアウト</a></li>
            <li><a href="signup/signup.php">マイページへ</a></li>
        </ul>  
        <?php
        }else{
        ?>
        <!-- バンドがログインしている場合 -->
        <p><?=$user_name?>さん</p>
        <ul>
            <li><a href="../modules/class/control/signout.php">ログアウト</a></li>
            <li><a href="signup/signup.php">バンドマイページへ</a></li>
        </ul>
<?php
    }
}else{
?>
    <!-- ユーザーがログインしていない場合 -->
    <ul>
        <li><a href="signin/signin.php">ログイン</a></li>
        <li><a href="signin/signin_band.php">バンドとしてログイン</a></li>
        <li><a href="signup/signup.php">会員登録</a></li>
        <li><a href="signup/signup_band.php">バンドとして登録</a></li>
    </ul>
<?php
}
?>
</div>