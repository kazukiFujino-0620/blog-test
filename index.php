<?php
require_once('blog.php');
ini_set('display_errors', "On");

$blog = new Blog();
// 取得データ表示
$blogData = $blog->getAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>掲示板一覧</title>
</head>
<body>
<h2>お試し掲示板</h2>
    <h3>一覧</h3>
    <table>
        <?php foreach($blogData as $column): ?>
        <tr>
            <td><a href="/Detail.php?id=<?php echo $column['id']?>"><?php echo $column['id']?></td>
            <p style="text-align: left">
                <td><?php echo $column['name']?></td>
            </p>
            <td><?php echo ($column['post_at'])?></td> 
        </tr>
        <tr>
            <td>本文:</td>
        </tr>
        <tr>
            <td><?php echo $column['content']?></td>
        </tr>
        <tr>
            <td></td>
            <p style="text-align: right">
                <td><a href="/update_form.php?id=<?php echo $column['id']?>">編集</td>
                <td><a href="/reply.php?id=<?php echo $column['id']?>">返信</td>
            </p>
        </tr>
        <?php endforeach; ?>
    </table>
    <hr>
    <h3>新規投稿</h3>
    <form action ="blog_create.php" method="POST">
        <p>タイトル:</p>
        <input type="text" name="title">
        <p>名前:</p>
        <input type="text" name="name">
        <br>
        <p>本文:</p>
        <textarea name="content" id="content" cols="30" rows="10"></textarea>
        <br>
        <!-- <p>カテゴリ:</p>
        <select name="category">
            <option value="1">日常</option>
            <option value="2">動画編集</option>
        </select> -->
        <!-- <br>
        <input type ="radio" name="publish_status" value="1" checked>公開
        <input type ="radio" name="publish_status" value="0">非公開
        <br> -->
        <input type ="submit" value="送信">
    </form>
</body>
</html>
</body>
</html>