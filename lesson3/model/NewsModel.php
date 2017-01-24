<?php

/**
 * Class NewsModel
 * @property $id_news
 * @property $header
 * @property $text
 */
class NewsModel
    extends AbstractModel
{
    static protected $table = 'news';
    static protected $id = 'id_news';
    /*
    public $header;
    public $text;*/
}