<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="../script/jquery-3.2.1.min.js"></script>
</head>
<script>
    $(document).ready(function(){
        $('#name_box').change(function() {
            str = $('input:text[name="user_name"]').val();
            if(!str == '' || null){
                data = {'name':str};
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
                        $('#check_msg').text('この名前は使用できません。!');
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
    <form action="../../modules/class/control/signup_control.php" method="post">
        ユーザー名：<input type="text" name="user_name" id="name_box"><span id="check_msg"></span> <br>
        nickname <input type="text" name="nickname" id="aaa"><br>
        パスワード：<input type="password" name="pass"><br>
        mail<input type="email" name="email" id="bb"><br>
        login id <input type="text" name="login_id" id="cc"><br>
        <button type="submit">登録</button>
    </form>
</body>
</html>