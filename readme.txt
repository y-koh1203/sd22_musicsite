wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww

DBの運用について

1.必要ファイルの読み込み
require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/Database.php';
クラスを使用したいphpファイルにこれを追記してください。
ファイルの読み込みなので、可能な限りソースコードの一番上の方に追記するのが望ましいです。

2.使用方法（例）
$var = new Database(); //インスタンスの生成
$sql = 'select * from members'; //sql文
$result -> $var->select($sql); //select文を実行、$resultに結果を連想配列で格納

//配列の中身の確認
var_dump($result);

//取得した結果は、foreachを使用して取り出してください。
foreach($result as $key=>$val){
    echo $key; //連想配列のキーを表示
    echo $val; //キーに紐づいている値を表示
}

※insert,updateについては追ってコミットします。




