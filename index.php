<?php
require_once('blog.php');
ini_set('display_errors', "On");

$blog = new Blog();
// 取得データ表示
$blogData = $blog->getAll();

$blogCount = $blog->BlogCount();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>掲示板一覧</title>
</head>
<body>
<h2>お試し掲示板</h2>
    <h4>投稿一覧</h4>
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
            <td><a href="/update_form.php?id=<?php echo $column['id']?>" class = "btn btn-primary">編集</td>
            <td><a href="/blog_delete.php?id=<?php echo $column['id']?>" class = "btn btn-primary">削除</td>
            <td><a href="/reply.php?id=<?php echo $column['id']?>" class = "btn btn-primary">返信</td>
        </tr>
        <tr>
            <td>
                <?php echo $column['content']?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
<body>
    <hr>
</body>
<body>
<br>
    <table>
        <h4>新規投稿</h4>
        <form action ="blog_create.php" method="POST">
            <br>
            <p>タイトル:<input type="text" name="title"></p>
            <br>
            <p>名前:<input type="text" name="name"></p>
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
            <input type ="submit" class = "btn btn-primary" value="送信">
        </form>
        <script type="text/javascript" src="js/jquery-3.6.0.js"></script>
        <script src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
    </table>
</body>
</html>