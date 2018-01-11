DBの運用について

1.必要ファイルの読み込み
require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/Database.php';
クラスを使用したいphpファイルにこれを追記してください。
ファイルの読み込みなので、可能な限りソースコードの一番上の方に追記するのが望ましいです。

2.使用方法（例）
select()
$var = new Database(); //インスタンスの生成
$sql = 'select * from members'; //sql文
$result = $var->select($sql); //select文を実行、$resultに結果を連想配列で格納

//配列の中身の確認
var_dump($result);

//取得した結果は、foreachを使用して取り出してください。
foreach($result as $key=>$val){
    echo $key; //連想配列のキーを表示
    echo $val; //キーに紐づいている値を表示
}

insert()
1.$var = new Database(); //インスタンスの生成

2.インサートしたいカラム名、カラムに入れたい値を配列に入力
$tableName = 'tblName';
$insertColumns = array('col1','col2');
$insertValues = array('10','aaa');

3.$var->insert($tableName,$insertColumns,$insertValues);
第1引数にテーブル名、第2引数にカラム名を入れた配列、第3引数に追加したい値入れた配列
これらを入力し実行してください。

例)
$tbl = 'members';
    $col = array('member_id','member_name','nickname','user_pass','mail_address','login_id','m_status_id');
    $member_status = array(
        array(
            '00002','山もちょ','yamamo','12345678','aaa@nrnr.jp','mmm111122','1'
        ),
        array(
            '00003','山もちょ','yamamo','12345678','aaa@nrnr.jp','mmm111122','1'
        )
    );

    $pdo->insert($tbl,$col,$member_status);


HE　2年制イベントテーマ
「システムとは？」
システムを構成する、人、もの、金、情報を見える化する。