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
}