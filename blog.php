<?php

require_once('dbc.php');
Class Blog extends Dbc
{
    protected $table_name = 'blog';

    // // カテゴリー名表示
    // public function setCategoryName($category)
    // {
    //     if($category  == '1')
    //     {
    //         return '日常';
    //     }
    //     else if($category  == '2')
    //     {
    //         return '動画編集';
    //     }
    //     else
    //     {
    //         return 'その他';
    //     }
    // }

    // ブログ作成
    public function blogCreate($blogs)
    {
        $sql =
            "INSERT INTO 
                blog
                (name,title,content)
            VALUES
                (:name,:title,:content)";

        $dbh = $this->dbConnect();
        $dbh -> beginTransaction();
        try
        {
            $stmt = $dbh->prepare($sql);
            $stmt ->bindValue(':name',$blogs['name'],PDO::PARAM_STR);
            $stmt ->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
            $stmt ->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
            $stmt ->execute();
            $dbh -> commit();
            echo '登録完了しました。';
        }catch(PDOException $e){
            $dbh->rollBack();
            var_dump($blogs);
            exit($e);
        }
    }

    // ブログ更新
    public function blogUpdate($blogs)
    {
        {
            $sql =
                "UPDATE
                    blog
                SET
                    name = :name
                    ,title = :title
                    ,content = :content
                WHERE
                    id = :id";
    
            $dbh = $this->dbConnect();
            $dbh -> beginTransaction();
            try
            {
                $stmt = $dbh->prepare($sql);
                $stmt ->bindValue(':name',$blogs['name'],PDO::PARAM_STR);
                $stmt ->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
                $stmt ->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
                $stmt ->bindValue(':id',$blogs['id'],PDO::PARAM_INT);
                $stmt ->execute();
                $dbh -> commit();
                echo '更新完了しました。';
            }catch(PDOException $e){
                $dbh->rollBack();
                exit($e);
            }
        }
    }

    // ブログのバリデーション
    function blogValidate($blogs)
    {
        if(empty($blogs['title']))
        {
            exit('タイトルを入力してください');
        }
        if(mb_strlen($blogs['title']) > 51)
        {
            exit('文字数が超過しています。(50文字以内)');
        }
        if(mb_strlen($blogs['name']) > 12)
        {
            exit('文字数が超過しています。(11文字以内)');
        }
        if(empty($blogs['content']))
        {
            exit('本文を入力してください');
        }
        // if(empty($blogs['category']))
        // {
        //     exit('カテゴリーを選択してください');
        // }
        if(empty($blogs['publish_status']))
        {
            exit('公開ステータスを選択してください');
        }
    }
}
?>
