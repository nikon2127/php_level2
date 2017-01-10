<?php

class News extends ArticleAbstract
{
    public $id_news;
    public $header;
    public $text;

    protected static $class = 'News';
    protected static $table = 'news';

}