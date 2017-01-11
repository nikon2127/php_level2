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

    public function actionAdd(){
        if(!empty($_POST['title']) && !empty($_POST['text'])){
            News::getAdd($_POST['title'], $_POST['text']);
            header("Location: index.php");
        }
        include __DIR__ . '/../view/add.php';
    }

    public function actionDelete(){
        $id = (int) $_GET['id'];
        News::getDelete($id);
        header("Location: index.php");
    }
}