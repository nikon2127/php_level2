<?php
error_reporting(E_ALL);
require_once 'model/sql.php';

if(!empty($_POST['header'])){
    $header = $_POST['header'];
}else $header = '';

if(!empty($_POST['text'])){
    $text = $_POST['text'];
}else $text = '';

if(!empty($header) && !empty($text)){
    //$header = $_POST['header'];
    //$text = $_POST['text'];
    if(add_news($header, $text)){
        header("Location: index.php");
    }else{
        echo 'запись не занесена';
    }
}
require_once 'view/add.php';