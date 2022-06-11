<?php

Class Dbc
{
    //1.データ接続
    function dbConnect()
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
    function getAllBlog()
    {
        $dbh = $this->dbConnect();
        $sql ='SELECT * FROM blog';
        $stmt = $dbh->query($sql);
        $result = $stmt -> fetchall(PDO::FETCH_ASSOC);
        return $result;
        $dbh = null;
    }

    //3.カテゴリー名表示
    function setCategoryName($category)
    {
        if($category  == '1')
        {
            return '日常';
        }
        else if($category  == '2')
        {
            return '動画編集';
        }
        else
        {
            return 'その他';
        }
    }

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
}

?>