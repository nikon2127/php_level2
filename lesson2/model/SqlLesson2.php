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

    //приводим данные из формы в нормальную форму
    public function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        return $string;
    }

    public function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->bd = 'lesson1';
    }

    //подключаемся к базе данных
    private function sql_connect($sql){
        $link = mysqli_connect($this->server, $this->user, $this->password, $this->bd);
        if($link){
            $result = mysqli_query($link, $sql);
        }
        mysqli_close($link);
        if($result){
            return $result;
        }
        return false;
    }

    //запрашиваем количество записей в базе
    public function sql_count(){
        $sql = "SELECT count(*) FROM `news` WHERE 1";
        $result = $this->sql_connect($sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
            foreach ($row as $vol){
                $res = $vol;
            }
            $res = (int) $res;
        }
        if($res){
            return $res;
        }
        return false;
    }

    //запрашиваем все записи у базы
    public function sql_select_all($pos, $col){
        $pos = (int) $pos;
        $col = (int) $col;
        $sql = "SELECT * FROM `news` WHERE 1 LIMIT $pos, $col";
        $result = $this->sql_connect($sql);
        if($result){
            $emps = array();
            while ($row = mysqli_fetch_assoc($result)){
                $emps[] = $row;
            }
        }
        if(!empty($emps)){
            return $emps;
        }
        return false;
    }

    //запрашиваем одну запись по id
    public function sql_select_one($id){
        $id = (int) $id;
        $sql = "SELECT * FROM `news` WHERE `id_news` = $id";
        $result = $this->sql_connect($sql);
        if($result){
            $row = mysqli_fetch_assoc($result);
        }
        if(!empty($row)){
            return $row;
        }
        return false;
    }

    //редактируем запись
    public function sql_edit($id, $title, $text){
        $id = (int) $id;
        $title = $this->clean_text($title);
        $text = $this->clean_text($text);
        $sql = "UPDATE `news` SET `header` = '$title',`text` = '$text' WHERE `id_news` = $id";
        return $this->sql_connect($sql);
    }

    //добавляем запись
    public function sql_add($title, $text){
        $title = $this->clean_text($title);
        $text = $this->clean_text($text);
        $sql = "INSERT INTO `news`(`header`, `text`) VALUES ('$title', '$text')";
        return $this->sql_connect($sql);
    }

    //удаляем запись
    public function sql_delete($id){
        $id = (int) $id;
        $sql = "DELETE FROM `news` WHERE `id_news` = $id";
        return $this->sql_connect($sql);
    }
}