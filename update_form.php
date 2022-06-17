<?php
require_once('blog.php');

$blog = new Blog();
$result = $blog->getBlog($_GET['id']);

$id = $result['id'];
$name = $result['name'];
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
        <title>BlogUpdateForm</title>
    </head>
<body>
    <h2>更新フォーム</h2>
    <form action ="blog_update.php" method="POST">
        <input type="hidden" name = "id" value = "<?php echo $id?>">
        <p>タイトル:</p>
        <input type="text" name="title" value="<?php echo $title ?>">
        <p>名前:</p>
        <input type="text" name="name" value="<?php echo $name ?>">
        <hr>
        <p>本文:</p>
        <textarea name="content" id="content" cols="30" rows="10"><?php echo $content ?></textarea>
        <!-- <p>カテゴリ:</p>
        <select name="category">
            <option value="1" <?php if(category == 1) echo "selected" ?>>日常</option>
            <option value="2"<?php if(category == 2) echo "selected" ?>>動画編集</option>
        </select> -->
        <br>
        <input type ="radio" name="publish_status" value="1" <?php if($publish_status == 1) echo "checked"?>>公開
        <input type ="radio" name="publish_status" value="0"<?php if($publish_status == 0) echo "checked"?>>非公開
        <br>
        <input type ="submit" value="送信">
    </form>
</body>
</html>