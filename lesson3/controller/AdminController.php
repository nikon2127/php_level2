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
            $news->insert();
            //News::getAdd($title, $text);
            header("Location: index.php?ctrl=News&act=One&id=$news->id_news");
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
        $id = (int) $_GET['id'];
        $news = new NewsModel();
        $news->delete($id);
        //News::getDelete($id);
        header("Location: index.php");
    }

    public function actionEdit()
    {
        $news = new NewsModel();
        if(!empty($_GET['id'])){
            $news->id_news = (int) $_GET['id'];
            $article = $news::findOneByPk($news->id_news);
            //$news = News::getOne($id);
            $news->header = $article->header;
            $news->text = $article->text;
        }else{
            $news->id_news = '';
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
            $news->id_news = (int) $_POST['id'];
        }

        if(empty($news->id_news)){
            header("Location: index.php");
        }

        if(!empty($_POST['title']) && !empty($_POST['text']) && !empty($_POST['id'])){
            $news->update($news->id_news);
            //News::getEdit($_POST['id'], $_POST['title'], $_POST['text']);
            header("Location: index.php?crtl=News&act=One&id=$news->id_news");
        }else{
            $view = new View();
            $view->id = $news->id_news;
            $view->title = $news->header;
            $view->text = $news->text;
            $view->display('edit.php');
            //include __DIR__ . '/../view/edit.php';
        }
    }
}