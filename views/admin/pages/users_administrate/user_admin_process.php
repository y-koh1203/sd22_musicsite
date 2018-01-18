<?php
//タイムゾーンの設定
date_default_timezone_set('Asia/Tokyo');

//受取値が存在する時の処理
if(isset($_POST)){

// input.phpから受け取った値の代入処理
    $releaseDate = date('Y-m-d H:i:s');
    $musicName = $_POST['musicName'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $lyrics = $_POST['lyrics'];
    $artWork = $_POST['artWork'];

    // データベースに接続するために必要なデータソースを変数に格納
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
        $sql = "INSERT INTO musics (music_id, band_id, genre_id, title, release_date, price, lyric, artwork_path) 
                VALUES (:musicId, :bandId, :genreId, :title, :releaseDate, :price, :lyric, :artworkPath)";

        // 挿入する値は空のまま、SQL実行の準備をする
        $stmt = $dbh->prepare($sql);

        //　連想配列に格納
        $params = array(
            ':musicId' => '00008', 
            ':bandId' => '00008', 
            ':genreId' => $genre, 
            ':title' => $musicName, 
            ':releaseDate' => $releaseDate, 
            ':price' => $price, 
            ':lyric' => $lyrics, 
            ':artworkPath' => $artWork
        );

        // 挿入する値が入った変数をexecuteにセットしてSQLを実行
        $stmt->execute($params);

        // 登録完了のメッセージ
        echo '登録完了しました';

    // エラー（例外）が発生した時の処理を記述
    } catch (PDOException $e) {

        // エラーメッセージを表示させる
        echo 'データベースにアクセスできません！' . $e->getMessage();

    // 強制終了
    exit;
    }
    
}
?>