<?php
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
require_once 'model/SqlLesson2.php';

$art = new SqlLesson2();
var_dump($art->sql_select_all(0, 5));