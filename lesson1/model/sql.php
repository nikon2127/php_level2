<?php
error_reporting(E_ALL);
require_once 'function.php';
/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 04.01.2017
 * Time: 17:59
 */
define('SERVER', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('BD', 'lesson1');

//подключаемся к базе данных
function connect_sql(){
    return mysqli_connect(SERVER, USER, PASSWORD, BD);
}

//закрываем соединение с базой
function close_sql($link){
    return mysqli_close($link);
}

//выборка всех записей из базы
function all_news(){
    $link = connect_sql();
    if(!empty($link)){
        $sql = "SELECT * FROM `news` WHERE 1 ORDER BY id_news DESC";
        $result = mysqli_query($link, $sql);
        $emps = array();
        while($row = mysqli_fetch_assoc($result)){
            $emps[] = $row;
        }
        close_sql($link);
        return $emps;
    }
    return false;
}

//просмотр одной новости
function article_news($id_article_news){
    $id_article_news = (int) $id_article_news;
    $link = connect_sql();
    if(!empty($link)){
        $sql = "SELECT * FROM `news` WHERE `id_news` = $id_article_news";
        $result = mysqli_query($link, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $emps = $row;
        }
        close_sql($link);
        return $emps;
    }
    return false;
}

//добавление записи
function add_news($header, $text){
    $header = clean_text($header);
    $text = clean_text($text);
    $link = connect_sql();
    if(!empty($link)){
        $sql = "INSERT INTO `news`(`header`, `text`) VALUES ('$header', '$text')";
        $result = mysqli_query($link, $sql);
        if($result){
            return true;
        }
        close_sql($link);
    }
    return false;
}

//удаление записи
function delete_news($id_news){
    $id_news = (int) $id_news;
    $link = connect_sql();
    if(!empty($link)){
        $sql = "DELETE FROM `news` WHERE `id_news` = '$id_news'";
        $result = mysqli_query($link, $sql);
        if($result){
            return true;
        }
        close_sql($link);
    }
    return false;
}

//изменение записи
function edit_news($id_article_news, $header, $text){
    $id_article_news = (int) $id_article_news;
    $header = clean_text($header);
    $text = clean_text($text);
    $link = connect_sql();
    if(!empty($link)){
        $sql = "UPDATE `news` SET `header`='$header',`text`='$text' WHERE `id_news` = '$id_article_news'";
        $result = mysqli_query($link, $sql);
        if($result){
            return true;
        }
        close_sql($link);
    }
    return false;
}