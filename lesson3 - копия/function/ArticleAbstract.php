<?php

abstract class ArticleAbstract
{

    protected static $table;
    protected static $class;

    public static function getAll(){
        $all = new Sql();
        $sql = "SELECT * FROM " . static::$table;
        return $all->select($sql, static::$class);
    }

    public static function getOne($id){
        $one = new Sql();
        $sql = "SELECT * FROM ". static::$table. " WHERE `id_news` = $id";
        return $one->selectOne($sql, static::$class);
    }
}