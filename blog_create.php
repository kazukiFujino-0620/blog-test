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

$dbc = new Dbc();
$dbc->blogCreate($blogs);
?>