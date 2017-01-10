<?php

class News extends ArticleAbstract
{
    public $id_news;
    public $header;
    public $text;
    public static $class;

    public function __construct()
    {
        $this->class = 'News';
    }

    public static function getAll(){
        $all = new Sql();
        $sql = "SELECT * FROM `news`";
        return $all->select($sql, 'News');
    }

    public static function getOne($id){
        $one = new Sql();
        $sql = "SELECT * FROM `news` WHERE `id_news` = $id";
        return $one->selectOne($sql, 'News');
    }
}