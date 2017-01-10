<?php
require_once __DIR__ . '/../function/Sql.php';
require_once __DIR__ . '/../function/ArticleAbstract.php';
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
        return $all->query("SELECT * FROM `news`", self::class);
    }
}