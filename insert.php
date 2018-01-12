<?php

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
  $sql = "INSERT INTO musics (music_id, band_id, genre_id, title, release_date, price, lyric) 
        VALUES (:musicId, :bandId, :genreId, :title, :releaseDate, :price, :lyric)";

//$sql = "INSERT INTO products (music_id, band_id, genre_id, title, release_data, price, lyric, play_time, artwork_pass, examinated_date, ex_status_id, employee_id, release_status_id) 
//VALUES (:musicId, :bandId, :genreId, :title, :releaseDate, :price, :lyric, :playTime, :artworkPass, :examinatedDate, :exStatusId, :employeeId, :reStatusId)";

  // 挿入する値は空のまま、SQL実行の準備をする
  $stmt = $dbh->prepare($sql);
  
  // 挿入する値を配列に格納する
  $params = array(':musicId' => '00006', ':bandId' => '', ':genreId' => '', ':title' => '', ':releaseDate' => '', ':price' => '', ':lyric' => '');
  
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
?>