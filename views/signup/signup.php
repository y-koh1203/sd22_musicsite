<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/foundation/foundation.min.css">
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/common/common.css">
    <title>Document</title>
    <style type="text/css">
        .form1{
            margin-top: 5%;
        }

        .btn_wrap{
            text-align: center;
        }
    </style> 
</head>
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
<script>
    $(document).ready(function(){
        $('#id_box').change(function() {
            str = $('input:text[name="login_id"]').val();
            if(!str == '' || null){
                data = {'name':str,'type':1};
                $.ajax({
                    url: "<?=$path?>/modules/lib/checkname.php", 
                    type: 'get',
                    data: data,
                }).done(function(data){
                    if(data['result'] == 1){
                        console.log('ok');
                        $('#check_msg').text('この名前は使用できます!');
                        $('#check_msg').css('color','green');
                    }else{
                        $('#check_msg').text('この名前は使用できません!');
                        $('#check_msg').css('color','red');
                    }
                }).fail(function(){
                    console.log('err');
                });
            }
            $('#check_msg').text('');
        });
    });
</script>

<script src="<?=$path?>/views/script/foundation/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<body>
    <?php 
        include '../../views/tpl/header.php';
    ?>
    <div class="row">
        <div class="large-12 column"> 
            <h2>会員登録(通常ユーザー)</h2> 
            <form action="<?=$path?>/modules/class/control/signup_control.php" method="post" class="form1">                
                <div class="row">
                    <div class="large-12 columns">
                        <label>ユーザー名
                            <input type="text" name="user_name" placeholder="insert name here" required/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>ニックネーム
                            <input type="text" name="nickname" placeholder="insert name here" required/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>パスワード
                            <input type="password" name="pass" placeholder="insert password here" required/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>メールアドレス
                            <input type="email" name="email" placeholder="insert mail address here" required/>
                        </label>
                    </div>
                </div>

                <div class="row">
                    <div class="large-12 columns">
                        <label>ログイン用ID　　(重複するIDは使用できません)
                            <input type="text" id="id_box" name="login_id" placeholder="insert login id here" required/>
                        </label>
                        <span id="check_msg">&nbsp;</span>
                    </div>
                </div>

                <p class="btn_wrap"><button type="submit"　class="submit_btn">登録</button></p>
            </form>
        </div>
    </div>
    <footer>
        
    </footer>
</body>
</html>