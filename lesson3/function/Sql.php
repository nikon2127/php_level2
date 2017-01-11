<?php

class Sql
{
    public $link;
    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'lesson1');
    }

    public function select($sql, $class = 'stdClass'){
        $result = mysqli_query($this->link, $sql);
        if(false === $result){
            return false;
        }
        $res = array();
        while ($row = mysqli_fetch_object($result, $class)){
            $res[] = $row;
        }
        return $res;
    }

    public function selectOne($sql, $class = 'strClass'){
        return $this->select($sql, $class)[0];
    }

    public function insert($sql){
        return mysqli_query($this->link, $sql);
    }
}