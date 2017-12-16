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
    protected $dbh; //DBハンドラ
    protected $stmt;

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
                array( PDO::MYSQL_ATTR_INIT_COMMAND => "SET CHARACTER SET `utf8`" )
            );       

            //トランザクションを初期化する
            $this->dbh->beginTransaction();
            echo 'ok';

        }catch (PDOException $e){
            print('Connection failed:'.$e->getMessage());
            die();
        }
        //display errors
        $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $this->dbh;
    }

    /**
     * PDOの後処理用クラス
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
        $this->stmt = $pdo->query($query);
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->closePDO();
        return $result;
    }

    // public function insert($arrQuery){
    //     $pdo = $this->openPDO();
    //     $this->stmt = $pdo->prepare($arrQuery);
    // }

    // public function delete(){

    // }

    // public function update(){

    // }
} 