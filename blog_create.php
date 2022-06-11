<?php
require_once('dbc.php');

$blogs = $_POST;

if(empty($blogs['title']))
{
    exit('タイトルを入力してください');
}
if(mb_strlen($blogs['title']) > 51)
{
    exit('文字数が超過しています。(50文字以内)');
}
if(empty($blogs['content']))
{
    exit('本文を入力してください');
}
if(empty($blogs['category']))
{
    exit('カテゴリーを選択してください');
}
if(empty($blogs['publish_status']))
{
    exit('公開ステータスを選択してください');
}

$sql ='INSERT INTO 
        blog(title,content,category,publish_status)
        VALUES
        (:title,:content,:category,:publish_status)';

$dbh = dbConnect();
$dbh -> beginTransaction();
try
{
    $stmt = $dbh->prepare($sql);
    $stmt ->bindValue(':title',$blogs['title'],PDO::PARAM_STR);
    $stmt ->bindValue(':content',$blogs['content'],PDO::PARAM_STR);
    $stmt ->bindValue(':category',$blogs['category'],PDO::PARAM_INT);
    $stmt ->bindValue(':publish_status',$blogs['publish_status'],PDO::PARAM_INT);
    $stmt ->execute();
    $dbh -> commit();
    echo '登録完了しました。';
}catch(PDOException $e){
    $dbh->rollBack();
    exit($e);
}
?>