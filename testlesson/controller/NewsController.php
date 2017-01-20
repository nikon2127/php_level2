<?php

class NewsController
{
    public function actionAll(){
        $news = News::getAll();
        $view = new View();
        //$view->assing('news', $news);
        $view->news = $news;
        $view->display('all.php');
        //include __DIR__ . '/../view/all.php';
    }

    public function actionOne(){
        $id = (int) $_GET['id'];
        $news = News::getOne($id);
        $view = new View();
        //$view->assing('news', $news);
        $view->news = $news;
        $view->display('one.php');
        //include __DIR__ . '/../view/one.php';
    }
}