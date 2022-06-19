<?php
require_once('blog.php');

$blog = new Blog();
$result = $blog->getBlog($_GET['id']);

$id = $result['id'];
$title = $result['title'];
$content = $result['content'];
$category = (int)$result['category'];
$publish_status = $result['publish_status'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie =edge">
        <title>CreateForm</title>
    </head>
<body>
    <h2>返信フォーム</h2>
    <form action ="blog_create.php" method="POST">
        <p>タイトル:</p>
        <input type="text" name="title">
        <p>名前:</p>
        <input type="text" name="name">
        <hr>
        <p>本文:</p>
        <textarea name="content" id="content" cols="30" rows="10"><?php echo ">>$id" ?></textarea>
        <br>
        <!-- <p>カテゴリ:</p>
        <select name="category">
            <option value="1">日常</option>
            <option value="2">動画編集</option>
        </select>
        <br>
        <input type ="radio" name="publish_status" value="1" checked>公開
        <input type ="radio" name="publish_status" value="0">非公開
        <br> -->
        <input type ="submit" value="返信">
    </form>
</body>
</html>