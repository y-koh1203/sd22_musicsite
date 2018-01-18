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
<nav class="top-bar">
    <ul class="title-area">
        <!-- Title Area -->
        <li class="name">
        <h1><a href="#">Masaru WEB</a></h1>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
    </ul>
    
    <section class="top-bar-section">
        <!-- Left Nav Section -->
        <ul class="left">
        <li class="divider"></li>
        <li class="active"><a href="#">Main Item 1</a></li>
        <li class="divider"></li>
        <li><a href="#">Main Item 2</a></li>
        <li class="divider"></li>
        <li class="has-dropdown"><a href="#">Main Item 3</a>
    
            <ul class="dropdown">
            <li class="has-dropdown"><a href="#">Dropdown Level 1a</a>
    
                <ul class="dropdown">
                <li><label>Dropdown Level 2 Label</label></li>
                <li><a href="#">Dropdown Level 2a</a></li>
                <li><a href="#">Dropdown Level 2b</a></li>
                <li class="has-dropdown"><a href="#">Dropdown Level 2c</a>
    
                    <ul class="dropdown">
                    <li><label>Dropdown Level 3 Label</label></li>
                    <li><a href="#">Dropdown Level 3a</a></li>
                    <li><a href="#">Dropdown Level 3b</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Dropdown Level 3c</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown Level 2d</a></li>
                <li><a href="#">Dropdown Level 2e</a></li>
                <li><a href="#">Dropdown Level 2f</a></li>
                </ul>
            </li>
            <li><a href="#">Dropdown Level 1b</a></li>
            <li><a href="#">Dropdown Level 1c</a></li>
            <li class="divider"></li>
            <li><a href="#">Dropdown Level 1d</a></li>
            <li><a href="#">Dropdown Level 1e</a></li>
            <li><a href="#">Dropdown Level 1f</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        </ul>
    
        <!-- Right Nav Section -->
        <ul class="right">
        <li class="divider hide-for-small"></li>
        <li class="has-dropdown"><a href="#">Main Item 4</a>
    
            <ul class="dropdown">
            <li><label>Dropdown Level 1 Label</label></li>
            <li class="has-dropdown"><a href="#" class="">Dropdown Level 1a</a>
    
                <ul class="dropdown">
                <li><a href="#">Dropdown Level 2a</a></li>
                <li><a href="#">Dropdown Level 2b</a></li>
                <li class="has-dropdown"><a href="#">Dropdown Level 2c</a>
    
                    <ul class="dropdown">
                    <li><a href="#">Dropdown Level 3a</a></li>
                    <li><a href="#">Dropdown Level 3b</a></li>
                    <li><a href="#">Dropdown Level 3c</a></li>
                    </ul>
                </li>
                <li><a href="#">Dropdown Level 2d</a></li>
                <li><a href="#">Dropdown Level 2e</a></li>
                <li><a href="#">Dropdown Level 2f</a></li>
                </ul>
            </li>
            <li><a href="#">Dropdown Level 1b</a></li>
            <li><a href="#">Dropdown Level 1c</a></li>
            <li class="divider"></li>
            <li><label>Dropdown Level 1 Label</label></li>
            <li><a href="#">Dropdown Level 1d</a></li>
            <li><a href="#">Dropdown Level 1e</a></li>
            <li><a href="#">Dropdown Level 1f</a></li>
            <li class="divider"></li>
            <li><a href="#">See all →</a></li>
            </ul>
        </li>
        <li class="divider"></li>
        <li class="has-form">
            <form>
            <div class="row collapse">
                <div class="small-8 columns">
                <input type="text">
                </div>
                <div class="small-4 columns">
                <a href="#" class="alert button">Search</a>
                </div>
            </div>
            </form>
        </li>
        <li class="divider show-for-small"></li>
        </ul>
    </section>
</nav>
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
            <li><a href="input.php">楽曲を登録</a></li>
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