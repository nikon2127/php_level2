<?php

class Sql
{
    private $dbh;
    private $className = 'stdClass';
    //private $link;
    public function __construct()
    {
        //$this->link = mysqli_connect('localhost', 'root', '', 'lesson1');
        try{
            $dsn = 'mysql:dbname=lesson1;host=localhost';
            $this->dbh = new PDO($dsn, 'root', '');
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            $log = new Logs($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
            $log->logInsert();
            $error = new View();
            $error->error = $e->getMessage();
            $error->display('403.php');
            die;
        }
    }

    public function setClassName($className)
    {
        $this->className = $className;
    }

    public function query($sql, $params=[])
    {
        try{
            $sth = $this->dbh->prepare($sql);
            $sth->execute($params);
        }catch (PDOException $e) {
            $log = new Logs($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
            $log->logInsert();
            $error = new View();
            $error->error = $e->getMessage();
            $error->display('403.php');
            die;
        }
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $params=[])
    {
        try{
            $sth = $this->dbh->prepare($sql);
            $zpr = $sth->execute($params);
        }catch (PDOException $e){
            $log = new Logs($e->getMessage(), $e->getCode(), $e->getFile(), $e->getLine());
            $log->logInsert();
            $error = new View();
            $error->error = $e->getMessage();
            $error->display('403.php');
            die;
        }
        return $zpr;
    }

    //получаем id последней записи
    public function lastInsertId()
    {
        return $this->dbh->lastInsertId();
    }
}