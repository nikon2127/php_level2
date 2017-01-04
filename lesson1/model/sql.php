<?php
error_reporting(E_ALL);
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

//добавление записи
function add_news(){

}

//удаление записи
function delete_news(){

}

//изменение записи
function edit_news(){

}