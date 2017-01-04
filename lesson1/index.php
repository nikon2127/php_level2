<?php
error_reporting(E_ALL);
//header("Content-type: text/html; charset=utf-8");
require_once 'model/sql.php';
$news = all_news();
require_once 'view/index.php';
