<?php
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
require_once 'model/NewsClass.php';

if(!empty($_GET['id'])){
    $art = new NewsClass();
    $art->id = $_GET['id'];
    $article = $art->article_one();
}
if(empty($article)){
    die('страница не найдена');
}
require 'view/article.php';