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

    public function actionEdit(){
        if(!empty($_GET['id'])){
            $id = (int) $_GET['id'];
            $news = News::getOne($id);
            $title = $news->header;
            $text = $news->text;
        }
        if(isset($_POST['title'])){
            $title = $_POST['title'];
        }
        if(isset($_POST['text'])){
            $text = $_POST['text'];
        }
        if(isset($_POST['id'])){
            $id = $_POST['id'];
        }
        if(!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['id'])){
            News::getEdit($_POST['id'], $_POST['title'], $_POST['text']);
            header("Location: index.php");
        }
        include __DIR__ . '/../view/edit.php';
    }
}