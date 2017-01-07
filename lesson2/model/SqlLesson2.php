<?php
error_reporting(E_ALL);
header("Content-type: text/html; charset=utf-8");
/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 06.01.2017
 * Time: 23:13
 */
class SqlLesson2
{
    private $server;
    private $user;
    private $password;
    private $bd;

    public function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->bd = 'lesson1';
    }

    //подключаемся к базу данных
    private function sql_connect(){
        return mysqli_connect($this->server, $this->user, $this->password, $this->bd);
    }

    //закрываем соединение с базой данных
    private function sql_close($link){
        return mysqli_close($link);
    }

    //запрашиваем все записи у базы
    public function sql_select_all($pos, $col){
        $pos = (int) $pos;
        $col = (int) $col;
        $link = $this->sql_connect();
        if($link){
            $sql = "SELECT * FROM `news` WHERE 1 LIMIT $pos, $col";
            $result = mysqli_query($link, $sql);
            if($result){
                $emps = array();
                while ($row = mysqli_fetch_assoc($result)){
                    $emps[] = $row;
                }
            }
        }
        $this->sql_close($link);
        if(!empty($emps)){
            return $emps;
        }
        return false;
    }

    //запрашиваем одну запись по id
    public function sql_select_one($id){
        $id = (int) $id;
        $link = $this->sql_connect();
        if($link){
            $sql = "SELECT * FROM `news` WHERE `id_news` = '$id'";
            $result = mysqli_query($link, $sql);
            if($result){
                $row = mysqli_fetch_assoc($result);

            }
        }
        $this->sql_close($link);
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    //редактируем запись
    public function sql_edit(){

    }

    //добавляем запись
    public function sql_add(){

    }

    //удаляем запись
    public function sql_delete($id){

    }
}