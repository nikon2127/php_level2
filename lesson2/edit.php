<?php
error_reporting(E_ALL);
require_once 'model/NewsClass.php';

$art = new NewsClass();
if(!empty($_GET)){
    $art->id = $_GET['id'];
    $article = $art->article_one();
    $art->title = $article[1];
    $art->text = $article[2];
}
if(!empty($_POST['id'])){
    $art->id = $_POST['id'];
}
if(!empty($_POST['header'])){
    $art->title = $_POST['header'];
}
if(!empty($_POST['text'])){
    $art->text = $_POST['text'];
}
if(empty($art->id)){
    die('ошибка');
}
if(!empty($_POST['header']) && !empty($_POST['text'])){
    if($art->article_edit()) {
        header("Location: index.php");
    }
}
include 'view/edit.php';