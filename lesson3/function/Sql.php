<?php

/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 10.01.2017
 * Time: 0:09
 */
class Sql
{
    public $link;
    public function __construct()
    {
        $this->link = mysqli_connect('localhost', 'root', '', 'lesson1');
    }

    public function query($sql, $class = 'stdClass'){
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
}