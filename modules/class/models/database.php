<?php
/**
 * データベース接続クラス
 * 各自必要に応じて、$dsn、$user、$passの値を自分のDB設定に合わせて変更してください。
 */

 //require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/error.php';
 require $_SERVER['DOCUMENT_ROOT'] . '/sd22_musicsite/modules/lib/util.php';

class database{
    private $dsn = 'mysql:host=127.0.0.1;port=3306;dbname=sd_master';//左から,ホスト名,ポート番号,DB名
    private $user = 'root';// ユーザー名
    private $pass = '';//パスワード
    public $dbh; //DBハンドラ
    public $stmt; //DBステートメント

    //コンストラクタ
    // public function __construct(){ 
        
    // }
 
    /**
     * PDOクラスのインスタンスを生成する
     */
    private function openPDO(){
        try{
            $this->dbh = new PDO(
                $this->dsn, $this->user, $this->pass,
                array(
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`",
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_EMULATE_PREPARES => false
                )
            );

        }catch (PDOException $e){
            print('接続エラー:'.$e->getMessage());
            die();
        }

        //display errors
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $this->dbh;
    }

    /**
     * PDOの後処理
     */
    private function closePDO(){
        $this->dbh = null;
        $this->stmt = null;
    }
      
    /**
     * 入力されたsqlを元にselect文を実行
     * @param string $query 入力されたsql文
     */
    public function select($query){
        $pdo = $this->openPDO();
        $stmt = $pdo->query($query);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->closePDO();
        return $result;
    }

    /**
     * 入力されたsqlをパラメータでinsert文を実行
     * @param string $table テーブル名
     * @param array $arrColumns 入力されたsql文
     * @param array $arrParams
     */  
    public function insert($table,$arrColumns,$arrParams){
        $pdo = $this->openPDO();

        $cntCol = count($arrColumns);
        $cntPar = count($arrParams);
        $cntDepth = arrayDepth($arrParams);
        $limit = $cntCol-1;
        $lim2 = $cntPar-1;
        $holder = '';
        
        //クエリの生成
        $query = 'insert into '.$table.' (';
        for($i = 0;$i < $cntCol;$i++){
            if($i != $limit){
                $query .= $arrColumns[$i].',';
                $holder .= ':'.$arrColumns[$i].',';
                $arrBinders[] = ':'.$arrColumns[$i];
            }else{
                $query .= $arrColumns[$i];     
                $holder .= ':'.$arrColumns[$i];
                $arrBinders[] = ':'.$arrColumns[$i];
            }     
        }
        $query .= ') values ('.$holder.') ;';

        $stmt = $pdo->prepare($query);

        if($cntDepth == 1){
            for($i = 0;$i <= $limit;$i++) {
                if (is_string($arrParams[$i])) {
                    $stmt->bindParam($arrBinders[$i], $arrParams[$i], PDO::PARAM_STR);
                } else if (is_int($arrParams[$i])) {
                    $stmt->bindValue($arrBinders[$i], $arrParams[$i], PDO::PARAM_INT);
                }
            }
            $stmt->execute();
        }else{
            for($i = 0;$i <= $lim2;$i++){
                for($j = 0;$j <= $limit;$j++) {
                    if (is_string($arrParams[$i][$j])) {
                        $stmt->bindParam($arrBinders[$j], $arrParams[$i][$j], PDO::PARAM_STR);
                    } else if (is_int($arrParams[$i][$j])) {
                        $stmt->bindValue($arrBinders[$j], $arrParams[$i][$j], PDO::PARAM_INT);
                    }
                }
                $stmt->execute();
            }
        }
        $this->closePDO();
    }

    // public function delete(){

    // }

    // public function update(){

    // }
} 
?>
