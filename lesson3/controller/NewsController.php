<?php

class NewsController
{
    public function actionAll(){
        $news = News::getAll();
        include __DIR__ . '/../view/all.php';
    }

    public function actionOne(){
        $id = (int) $_GET['id'];
        $news = News::getOne($id);
        include __DIR__ . '/../view/one.php';
    }
}