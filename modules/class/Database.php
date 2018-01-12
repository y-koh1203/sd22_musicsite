<?php
/**
 * データベース接続クラス
 * 各自必要に応じて、$dsn、$user、$passの値を自分のDB設定に合わせて変更してください。
 */

 //require $_SERVER['DOCUMENT_ROOT'] . '/modules/class/error.php';

class Database{
    protected $dsn = 'mysql:host=localhost;port=3306;dbname=sd22_master';//左から,ホスト名,ポート番号,DB名
    protected $user = 'root';// ユーザー名
    protected $pass = 'root';//パスワード
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
                $this->dsn, $this->$user, $this->$pass,
                array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`",
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false)     
            );       

            //トランザクションを初期化する
            $this->dbh->beginTransaction();

        }catch (PDOException $e){
            print('Connection failed:'.$e->getMessage());
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
     * 入力されたsqlを元にselect文を実行
     * @param string $table 入力されたsql文
     * @param array $arrColumns 入力されたsql文
     * @param array $arrParams 入力されたsql文
     */  
    public function insert($table,$arrColumns,$arrParams){
        if(count($arrColumns) != count($arrParams)){
            return 'error:array count no match';
            die();
        }
        $pdo = $this->openPDO();
        $cnt = count($arrColumns);
        $limit = $cnt-1;
        $holder = '';
        $insertParams = array();
        
        $query = 'insert into '.$table.' (';
        for($i = 0;$i < $cnt;$i++){
            if($i != $limit){
                $query .= $arrColumns[$i].',';
                $holder .= ':'.$arrColumns[$i].',';
                //$arrBinders[] = ':'.$arrColumns[$i];
                $insertParams = $insertParams + array(':'.$arrColumns[$i] => $arrParams[$i]);
     
            }else{
                $query .= $arrColumns[$i];     
                $holder .= ':'.$arrColumns[$i];
                //$arrBinders[] = ':'.$arrColumns[$i];
                $insertParams = $insertParams + array(':'.$arrColumns[$i] => $arrParams[$i]);
            }     
        }
      
        $query .= ') values ('.$holder.') ;';
        var_dump($query);
        var_dump($insertParams);
        
        $stmt = $pdo->prepare($query);
        $stmt->execute($insertParams);
        $this->closePDO();
    }

    // public function delete(){

    // }

    // public function update(){

    // }
} 
?>
?>
?>
