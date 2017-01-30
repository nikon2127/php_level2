<?php
error_reporting(E_ALL);
class AdminController
{
    public function actionAdd()
    {
        $news = new NewsModel();
        if(!empty($_POST['title'])){
            $news->header = $_POST['title'];
        }else{
            $news->header = '';
        }

        if(!empty($_POST['text'])){
            $news->text = $_POST['text'];
        }else{
            $news->text = '';
        }

        if(!empty($_POST['title']) && !empty($_POST['text'])){
            $news->save();
            //News::getAdd($title, $text);
            header("Location: index.php?ctrl=News&act=One&id=$news->id");
            die;
        }else{
            $view = new View();
            $view->title = $news->header;
            $view->text = $news->text;
            $view->display('add.php');
            //include __DIR__ . '/../view/add.php';
        }
    }

    public function actionDelete()
    {
        $news = new NewsModel();
        $news->id = (int) $_GET['id'];
        $news->delete();
        //News::getDelete($id);
        header("Location: index.php");
    }

    public function actionEdit()
    {
        $news = new NewsModel();
        if(!empty($_GET['id'])){
            $news->id = (int) $_GET['id'];
            $article = $news::findOneByPk($news->id);
            //$news = News::getOne($id);
            $news->header = $article->header;
            $news->text = $article->text;
        }else{
            $news->id = '';
            $news->header = '';
            $news->text = '';
        }

        if(isset($_POST['title'])){
            $news->header = $_POST['title'];
        }

        if(isset($_POST['text'])){
            $news->text = $_POST['text'];
        }

        if(isset($_POST['id'])){
            $news->id = (int) $_POST['id'];
        }

        if(!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['id'])){
            $news->save();
            //News::getEdit($_POST['id'], $_POST['title'], $_POST['text']);
            header("Location: index.php?crtl=News&act=One&id=$news->id");
        }else{
            $view = new View();
            $view->id = $news->id;
            $view->title = $news->header;
            $view->text = $news->text;
            $view->display('edit.php');
            //include __DIR__ . '/../view/edit.php';
        }
    }
}