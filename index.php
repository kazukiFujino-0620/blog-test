<?php
    
require_once('blog.php');
ini_set('display_errors', "On");

//SQL接続
$blog = new Blog();

$blogData = $blog->getAll();

$getpage = (int) $_GET['page'];
//1ページのデータ件数
$page_num = 10;

$getData = $blog ->getData($getpage,$page_num);

// 取得件数表示
$blogCount = $blog->BlogCount();

$totalPage = ceil($blogCount / $page_num);
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
        <?php foreach($getData as $column):?> 
        <tr>
            <td><a href="/Detail.php?id=<?php echo $column['id']?>"><?php echo $column['id']?></td>
            <p style="text-align: left"><td><?php echo $column['name']?></td>
            </p>
            <td><?php echo ($column['post_at'])?></td> 
        </tr>
        <tr>
            <td>
                本文:
            </td>
        </tr>
        <tr>
            <td><?php echo $column['content']?></td>
            <td align = "right" border = "1px"><a href="/update_form.php?id=<?php echo $column['id']?>" class = "btn btn-primary">編集</td>
            <td align = "right" border = "1px"><a href="/blog_delete.php?id=<?php echo $column['id']?>" class = "btn btn-primary">削除</td>
            <td align = "right" border = "1px"><a href="/reply.php?id=<?php echo $column['id']?>" class = "btn btn-primary">返信</td>        
        </tr>
        <?php endforeach; ?>
    </table>    
</body>
<body>
    <td>
        <?php
            $page = (int) htmlspecialchars($getpage);
    
            $prev = max($page - 1, 1); // 前のページ番号
            $next = min($page + 1, $totalPage); // 次のページ番号
        
            if ($page != 1) { // 最初のページ以外で「前へ」を表示
            print '<a href="?page=' . $prev . '">&laquo; 前へ</a>';
            }
            if ($page < $totalPage){ // 最後のページ以外で「次へ」を表示
            print '<a href="?page=' . $next . '">次へ &raquo;</a>';
            }
        ?>
    </td>
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