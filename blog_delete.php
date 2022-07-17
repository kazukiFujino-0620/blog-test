<?php
require_once('blog.php');
ini_set('display_errors', "On");

$blog = new Blog();
$result = $blog->deleteBlog($_GET['id']);
?>