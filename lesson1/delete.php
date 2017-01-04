<?php
error_reporting(E_ALL);
require_once 'model/sql.php';

if(!empty($_GET['id'])){
    delete_news($_GET['id']);
    header("Location: index.php");
}else {
    header("Location: index.php");
}

//require_once 'view/delete.php';