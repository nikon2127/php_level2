<?php

class NewsController
{
    public function actionAll()
    {
        $news = new NewsModel();
        //$news->header = 'header';
        //$news->text = 'text1111';
        $news->header = 'titi';
        $news->id = 36;
        $news->save();
        //$news->insert();
        var_dump($news->id);
        //var_dump( NewsModel::findOneByPk(66));
        //echo NewsModel::getTable();
        /*$news = News::getAll();
        $view = new View();
        //$view->assing('news', $news);
        $view->news = $news;
        $view->display('all.php');
        //include __DIR__ . '/../view/all.php';
        */
    }

    public function actionOne()
    {
        $id = (int) $_GET['id'];
        $news = News::getOne($id);
        $view = new View();
        //$view->assing('news', $news);
        $view->news = $news;
        $view->display('one.php');
        //include __DIR__ . '/../view/one.php';
    }
}