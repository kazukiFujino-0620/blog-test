<?php

Class Dbc
{
    protected $table_name;
    //1.データ接続
    protected function dbConnect()
    {
        $dsn ='mysql:host=localhost;dbname=blog_app;charset=utf8';
        $user = 'blog_user';
        $pass = 'Fujino1!';

        try{
            $dbh = new PDO($dsn,$user,$pass,[
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            ]);
            
            }catch(PDOException $e){
                echo '接続に失敗しました。'. $e->getMessage();
                exit();
            };
            
            return $dbh;
    }
    //2.データ取得
    function getAll()
    {
        $dbh = $this->dbConnect();
        $sql = 'SELECT * 
                FROM blog
                ORDER BY id DESC';
        $stmt = $dbh->query($sql);
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }

    //1データ取得
    function getBlog($id)
    {
        if(empty($id))
        {
            exit('IDが不正です');
        }

        $dbh = $this->dbConnect();

        //データ取得
        $stmt = $dbh->prepare('SELECT * FROM blog Where id = :id');
        $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);

        // 処理実行
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if(!$result)
        {
            exit('ブログがありません');
        }

        return $result;
    }

    function BlogCount()
    {

        $dbh = $this->dbConnect();

        //データ取得
        $sql = "SELECT COUNT(*)
            as
            cnt
            FROM
                blog";

        // 処理実行
        $stmt = $dbh->query($sql);
        $result = $stmt->fetchColumn();

        return $result;
        $dbh = null;
    }

    function getData($getpage,$page_num)
    {
        $dbh = $this->dbConnect();
        $stmt = $dbh->prepare
        ('SELECT * 
                FROM blog
                ORDER BY id DESC
                LIMIT ? ,?');
        $stmt->bindValue(1,($getpage -1 ) * $page_num , PDO::PARAM_INT);
        $stmt->bindValue(2,$page_num , PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }
}

?>