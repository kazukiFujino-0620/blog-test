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
    <h2>掲示板一覧</h2>
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
    <p><a href ="/form.html">新規作成</a></p>
</body>
</html>