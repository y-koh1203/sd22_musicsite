wwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwwww

DBの運用について

1.必要ファイルの読み込み
require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/Database.php';
クラスを使用したいphpファイルにこれを追記してください。
ファイルの読み込みなので、可能な限りソースコードの一番上の方に追記するのが望ましいです。

2.使用方法（例）
select()
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

insert()
1.$var = new Database(); //インスタンスの生成

2.インサートしたいカラム名、カラムに入れたい値を配列に入力
$tableName = 'tblName';
$insertColumns = array('col1','col2');
$insertValues = array('10','aaa');

3.$var->insert($tableName,$insertColumns,$insertValues);
第1引数にテーブル名、第2引数にカラム名を入れた配列、第3引数に追加したい値入れた配列
これらを入力し実行




