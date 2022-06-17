<?php

require_once('blog.php');

$blog = new Blog();
$result = $blog->getBlog($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>詳細画面</title>
</head>
<body>
    <h2>詳細</h2>
    <h3>タイトル:<?php echo $result['title']?></h3>
        <p>投稿日時:<?php echo $result['post_at']?></p>
        <p>名前:<?php echo $result['name']?></p>
        <hr>
        <p>本文:<?php echo $result['content']?></p>
</body>
</html>