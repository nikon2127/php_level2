<?php
error_reporting(E_ALL);
//header("Content-type: text/html; charset=utf-8");
require_once 'model/SqlLesson2.php';
require_once 'model/NewsClass.php';


$art = new NewsClass();
$article = $art->article_all();
require 'view/index.php';