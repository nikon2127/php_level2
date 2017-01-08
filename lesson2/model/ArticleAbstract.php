<?php
error_reporting(E_ALL);
/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 06.01.2017
 * Time: 23:14
 */
abstract class ArticleAbstract
{
    public $id;
    public $title;
    public $text;
    public $art;

    public function __construct()
    {
        $this->id = '';
        $this->title = '';
        $this->text = '';
        $this->art = new SqlLesson2();
    }

    //просмотр всех статей
    public function article_all(){
        $mas = $this->art->sql_select_all();
        if(!empty($mas)){
            $article = array();
            foreach ($mas as $vol){
                $this->id = $vol;
                $article[] = $this->article_one();
            }
        }
        if(isset($article)){
            return $article;
        }
        return false;
    }

    //просмотр одной статьи
    public function article_one(){
        if(!empty($this->id)){
            return $this->art->sql_select_one($this->id);
        }
        return false;
    }

    //добавление статьи
    public function article_add(){
        return $this->art->sql_add($this->title, $this->text);
    }

    //редактирование статьи
    public function article_edit(){
        if(!empty($this->id)){
            return $this->art->sql_edit($this->id, $this->title, $this->text);
        }
        return false;
    }

    //удаление статьи
    public function article_delet(){
        if(!empty($this->id)) {
            return $this->art->sql_delete($this->id);
        }
        return false;
    }
}