<?php
error_reporting(E_ALL);
class AdminController
{
    public function actionAdd(){

        if(!empty($_POST['title'])){
            $title = $_POST['title'];
        }else {
            $title = '';
            $text = '';
        }

        if(!empty($_POST['text'])){
            $text = $_POST['text'];
        }else {
            $text = '';
        }

        if(!empty($title) && !empty($text)){
            $news = News::getAdd($title, $text);
            header("Location: index.php");
        }

        $view = new View();
        $view->title = $title;
        $view->text = $text;
        $view->display('add.php');
        //include __DIR__ . '/../view/add.php';
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