<?php
error_reporting(E_ALL);
require_once 'model/sql.php';

//if(empty($_GET['id'])) header("Location: index.php");

if(!empty($_GET['id'])){
    $id_article_news = $_GET['id'];
    $article = article_news($id_article_news);
    if($article){
        $header = $article['header'];
        $text = $article['text'];
    }
}else {
    if(!empty($_POST['id_article_news'])){
        $id_article_news = $_POST['id_article_news'];
    }else header("Location: index.php");

    if(!empty($_POST['header'])){
        $header = $_POST['header'];
    }else $header = '';

    if(!empty($_POST['text'])){
        $text = $_POST['text'];
    }else $text = '';
}

if(!empty($_POST['edit']) && !empty($id_article_news) && !empty($header) && !empty($text)){
    if(edit_news($id_article_news, $header, $text)){
        header("Location: index.php");
    }else echo 'извините новость не отредактирована попробуйте позже';
}
require_once 'view/edit.php';