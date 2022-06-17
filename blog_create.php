<?php
require_once('blog.php');
ini_set('display_errors', "On");

$blogs = $_POST;

$blog = new Blog();
$blog->blogValidate($blogs);

if(empty($blogs['name']))
{
    $blogs['name'] = "名無しさん";
}
$blog->blogCreate($blogs);
?>