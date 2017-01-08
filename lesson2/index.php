<?php
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
require_once 'model/SqlLesson2.php';

$art = new SqlLesson2();
//var_dump($art->sql_count());
//var_dump($art->sql_select_one(1));
//var_dump($art->sql_edit(9, 'title', 'text'));
//var_dump($art->sql_add('title', 'text'));
//var_dump($art->sql_delete(16));
var_dump($art->sql_select_all());