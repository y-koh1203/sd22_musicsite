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
    </style> 
</head>
<script>
    $(document).ready(function(){
        $('#id_box').change(function() {
            str = $('input:text[name="login_id"]').val();
            if(!str == '' || null){
                data = {'name':str,'type':2};
                $.ajax({
                    url:"<?=$parh?>/modules/lib/checkname.php", 
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
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
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
            <div id="main">
                <form action="<?=$path?>/modules/class/control/signup_band_control.php" method="post">                
                    <input type="text" name="band_name" id="name_box">

                    <input type="password" name="pass">

                    <input type="email" name="mail">

                    <input type="text" name="login_id">
                </form>
            </div>
        </div>
    </div>
</body>
</html>