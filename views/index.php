<?php
    $path = 'http://'.$_SERVER['HTTP_HOST'].'/sd22_musicsite';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TOP</title>
    <link rel="stylesheet" href="<?=$path?>/views/stylesheet/foundation/foundation.min.css">
</head>
<script src="<?=$path?>/views/script/jquery-3.2.1.min.js"></script> 
<script src="<?=$path?>/views/script/foundation/foundation.min.js"></script>
<script>
    $(document).foundation();
</script>
<body>        
    <?php 
        include 'tpl/header.php';
    ?>
</body>
</html>