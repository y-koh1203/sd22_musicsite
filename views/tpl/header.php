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
<header>
    <div class="contain-to-grid sticky">
        <nav class="top-bar">
            <ul class="title-area">
                <!-- Title Area -->
                <li class="name">
                <h1><a href="<?=$path?>/views">Masaru WEB</a></h1>
                </li>
                <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                <!-- <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li> -->
            </ul>
            
            <section class="top-bar-section">
                <!-- Right Nav Section -->
                <ul class="right">
                    <li class="divider"></li>
                    <?php
                    if($logon_flg == 1){
                        if($type == 1){
                    ?>     
                            <!-- 一般ユーザーがログインしている場合 -->
                            <li class="divider"></li>
                            <li class="name"><h2><a href="#"><?=$user_name?>さん</a></h2></li>
                            <li class="divider"></li>
                            <li class="has-dropdown not-click"><a href="#">メニュー</a> 
                                <ul class="dropdown">
                                    <li><a href="<?=$path?>/views/user/mypage.php">マイページへ</a></li>
                                    <li><a href="<?=$path?>/modules/class/control/signout.php">ログアウト</a></li>
                                </ul>
                            </li> 
                        <?php
                        }else{
                        ?>
                            <!-- バンドがログインしている場合 -->
                            <li class="divider"></li>
                            <li class="name"><h2><a href="#"><?=$user_name?>さん</a></h2></li>
                            <li class="divider"></li>
                            <li class="has-dropdown not-click"><a href="#">メニュー</a> 
                                <ul class="dropdown">
                                    <li><a href="<?=$path?>/views/user/band_mypage.php">バンドマイページへ</a></li>
                                    <li><a href="input.php">楽曲を登録</a></li>
                                    <li><a href="<?=$path?>/modules/class/control/signout.php">ログアウト</a></li>
                                </ul>
                            </li>
                    <?php
                        }
                    }else{
                    ?>
                        <!-- ユーザーがログインしていない場合 -->
                        <li class="has-dropdown not-click"><a href="#">ログイン</a>
                            <ul class="dropdown">
                                <li><a href="<?=$path?>/views/signin/signin.php"　class="login">ログイン</a></li>
                                <li><a href="<?=$path?>/views/signin/signin_band.php" class="login">バンドとしてログイン</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="has-dropdown not-click"><a href="#" class="link">会員登録</a> 
                            <ul class="dropdown">
                                <li><a href="<?=$path?>/views/signup/signup.php">会員登録</a></li>
                                <li><a href="<?=$path?>/views/signup/signup_band.php">バンドとして登録</a></li>
                            </ul>
                        </li>    
                        <li class="divider"></li>               
                    <?php
                    }
                    ?>
                    <li class="divider"></li>
                </ul>   
            </section>
        </nav>
    </div>
</header>