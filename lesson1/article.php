<?php
error_reporting(E_ALL);
require_once 'model/sql.php';
if(!empty($_GET['id'])){
    $id_article_news = $_GET['id'];
    $article = article_news($id_article_news);
}else{
    header("Location: index.php");
}
require_once 'view/article.php';