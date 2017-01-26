<?php

class Sql
{
    private $dbh;
    private $className = 'stdClass';
    //private $link;
    public function __construct()
    {
        //$this->link = mysqli_connect('localhost', 'root', '', 'lesson1');

        $dsn = 'mysql:dbname=lesson1;host=localhost';
        $this->dbh = new PDO($dsn, 'root', '');
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params=[])
    {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }

    /*public function select($sql, $class = 'stdClass'){
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
    }*/
}