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
    //столбцы бд
    private $news;
    private $id_news;
    private $header;
    private $text;
    private $link;

    //приводим данные из формы в нормальную форму
    public function clean_text($string){
        $string = trim($string);
        $string = stripslashes($string);
        $string = strip_tags($string);
        $string = htmlspecialchars($string);
        $string = mysqli_real_escape_string($this->link, $string);
        return $string;
    }

    public function __construct()
    {
        $this->server = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->bd = 'lesson1';
        $this->news = 'news';
        $this->id_news = 'id_news';
        $this->header  = 'header';
        $this->text = 'text';
        $this->link = mysqli_connect($this->server, $this->user, $this->password, $this->bd);
    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
        mysqli_close($this->link);
    }

    //подключаемся к базе данных
    private function sql_connect($sql){
        if($this->link){
            $result = mysqli_query($this->link, $sql);
        }
        if($result){
            return $result;
        }
        return false;
    }

    //запрашиваем количество записей в базе
    public function sql_count(){
        $sql = "SELECT count(*) FROM $this->news WHERE 1";
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

    //запрашиваем все id у базы
    public function sql_select_all(){
        $sql = "SELECT $this->id_news FROM $this->news WHERE 1";
        $result = $this->sql_connect($sql);
        if($result){
            $emps = array();
            while ($row = mysqli_fetch_row($result)){
                $emps[] = $row;
            }
        }
        if(!empty($emps)){
            $mass = array();
            foreach ($emps as $vol){
                $mass[] = $vol[0];
            }
            return $mass;
        }
        return false;
    }

    //запрашиваем одну запись по id
    public function sql_select_one($id){
        $id = (int) $id;
        $sql = "SELECT * FROM $this->news WHERE $this->id_news = $id";
        $result = $this->sql_connect($sql);
        if($result){
            $row = mysqli_fetch_row($result);
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
        $sql = "UPDATE $this->news SET $this->header = '$title', $this->text = '$text' WHERE $this->id_news = $id";
        return $this->sql_connect($sql);
    }

    //добавляем запись
    public function sql_add($title, $text){
        $title = $this->clean_text($title);
        $text = $this->clean_text($text);
        $sql = "INSERT INTO $this->news($this->header, $this->text) VALUES ('$title', '$text')";
        return $this->sql_connect($sql);
    }

    //удаляем запись
    public function sql_delete($id){
        $id = (int) $id;
        $sql = "DELETE FROM $this->news WHERE $this->id_news = $id";
        return $this->sql_connect($sql);
    }
}