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

    public static function getAdd($title, $text){
        $add = new Sql();
        $sql = "INSERT INTO " . static::$table . "(`header`, `text`) VALUES ('$title', '$text')";
        return $add->insert($sql);
    }

    public static function getDelete($id){
        $del = new Sql();
        $sql = "DELETE FROM ". static::$table. " WHERE `id_news` = $id";
        return $del->insert($sql);
    }
}