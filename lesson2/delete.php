<?php
require_once 'model/NewsClass.php';
if(!empty($_GET['id'])){
    $art = new NewsClass();
    $art->id = $_GET['id'];
    $art->article_delet();
}
require 'index.php';