<?php
require_once 'model/NewsClass.php';

$art = new NewsClass();

if(!empty($_POST['header'])){
    $art->title = $_POST['header'];
}
if(!empty($_POST['text'])){
    $art->text = $_POST['text'];
}
if(!empty($_POST['header']) && !empty($_POST['text'])){
    if($art->article_add()) {
        require 'index.php';
    }
}
include 'view/add.php';