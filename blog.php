<?php

$blog =$_POST;

if($blog['publish_status'] == 'un_publish')
{
    echo '非公開のため表示できません。';
    return;
}
// if($blog['publish_status'] == 'publish')
// {
    // $now = new DateTime();
    // $now->format('Y-m-d');
    // if($blog['post_at'] > $now)
    // {
    //     echo '投稿日を見直してください';
    //     return;
    // }
    // else
    // {
//         foreach($blog as $key => $value){
//             echo '<pre>';
//             echo $key . ':' . htmlspecialchars($value,ENT_QUOTES,'UTF-8');
//             echo '</pre>';
//         }
//     // }
// }
// else if($blog['publish_status'] == 'un_publish')
// {
//     echo '非公開のため表示できません。';
//     return;
// }
// else
// {
//     echo '記事がありません。';
// }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie =edge">
        <title>blog</title>
    </head>
    <body>
        <h2><?php echo htmlspecialchars($blog['title'],ENT_QUOTES,'UTF-8');?></h2>
        <p>投稿日：<?php echo htmlspecialchars($blog['post_at'],ENT_QUOTES,'UTF-8');?></p>
        <p>カテゴリ：<?php echo htmlspecialchars($blog['category'],ENT_QUOTES,'UTF-8');?></p>
        <hr>
        <p><?php echo nl2br(htmlspecialchars($blog['content'],ENT_QUOTES,'UTF-8'));?></p>
    </body>
</html>

