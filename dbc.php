<?php



    Class Dbc
    {
        protected $table_name;

        //データベース接続
        //引数：なし
        //返り値：接続結果を返す
        protected function dbConnect()
        {
            $dbn = 'mysql:host=localhost;dbname=blog_app;charset=utf8';
            $user = 'blog_user';
            $pass = 'Jsb24830';

            try {
                $dbh = new PDO($dbn,$user,$pass,[
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                ]);
            } catch (PDOException $e){
                echo '接続失敗' . $e->getMessage();
                exit();
            }

            return $dbh;
        }

        //データベース取得
        //引数：なし
        //返り値：取得したデータ
        public function getAll()
        {
            $dbh = $this->dbConnect();
            //    1.Sqlの準備
            $sql = "SELECT * FROM $this->table_name";
            //    2,Sqlの実行
            $stmt = $dbh->query($sql);
            //    3,Sqlの結果を受け取る
            $result = $stmt->fetchAll(Pdo::FETCH_ASSOC);
            return $result;
            $dbh = null;
        }

    //    引数：$id
    //    返り値：$result
        public function getById($id)
        {
            if (empty($id))
            {
                exit('IDが不正です');
            }

            $dbh = $this->dbConnect();

    //    SQL準備
            $stmt = $dbh->prepare("SELECT * FROM $this->table_name Where id = :id");
            $stmt->bindValue(':id',(int)$id,PDO::PARAM_INT);
    //    SQL実行
            $stmt->execute();
    //    結果を取得
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$result)
            {
                exit('ブログがありません。');
            }

            return $result;
        }

    }
?>