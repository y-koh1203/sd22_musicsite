<?php

//ルートへのパス
$root = "../../";
$address =  $root.'assets/artwork/sc.png';

// データベースに接続するために必要なデータソースを変数に格納
  // mysql:host=ホスト名;dbname=データベース名;charset=文字エンコード
  $dsn = 'mysql:host=localhost:3306;dbname=sd_master;charset=utf8';

  // データベースのユーザー名
$user = 'root';

  // データベースのパスワード
$password = '';

// tryにPDOの処理を記述
try {

  // PDOインスタンスを生成
  $dbh = new PDO($dsn, $user, $password);

  // INSERT文を変数に格納
  $sql = "SELECT musics.title, bands.band_name, musics.price FROM musics INNER JOIN bands ON musics.band_id = bands.band_id;";

  // 挿入する値は空のまま、SQL実行の準備をする
  $stmt = $dbh->query($sql);

// エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

  // エラーメッセージを表示させる
  echo 'データベースにアクセスできません！' . $e->getMessage();

  // 強制終了
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <img src=<?=$address?> alt="">
    <h1>楽曲一覧</h1>
    <table border="1">
        <tr>
            <?php
                // foreach文で配列の中身を一行ずつ出力
                foreach ($stmt as $row) {    
                    
                // データベースのフィールド名で出力
                echo '<th>'.$row['title'].'<br>'.$row['band_name'].'<br>'.$row['price'].'</th>';
                }
            ?>
        </tr>
    </table>
</body>
</html>