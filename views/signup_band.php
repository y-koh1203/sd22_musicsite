<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../script/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../stylesheet/foundation/foundation.min.css">
    <script src="../script/foundation/foundation.min.js"></script>
    <script>
        $(document).foundation();
    </script>
</head>
<script>
    $(document).ready(function(){
        $('#id_box').change(function() {
            str = $('input:text[name="login_id"]').val();
            if(!str == '' || null){
                data = {'name':str,'type':2};
                $.ajax({
                    url:"../../modules/lib/checkname.php",
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
<body>
    <!-- ここから -->
    <div id="main">
        <form action="../../modules/class/control/signup_band_control.php" method="post">
            パスワード：<input type="password" name="pass"><br>
            mail<input type="email" name="email" id="bb"><br>
            login id <input type="text" name="login_id" id="id_box"><span id="check_msg"></span><br>
            <button type="submit">登録</button>
        </form>
    </div>
    あああ
    <!-- ここまでCSSを適用 -->
</body>
</html>
