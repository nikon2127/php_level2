<?php

class NewsController
{
    public function actionAll(){
        $news = NewsModel::findAll();
        //$news = News::getAll();
        if(empty($news)){
            throw new E404Ecxeption('Страница не найдена.');
        }
        $view = new View();
        $view->item = $news;
        $view->display('all.php');
        //include __DIR__ . '/../view/all.php';
    }

    public function actionOne(){
        $id = (int) $_GET['id'];
        //$news = News::getOne($id);
        $news = NewsModel::findOneByPk($id);
        //var_dump($news); die;
        if(empty($news)){
            throw new E404Ecxeption('Страница не найдена.');
        }
        $view = new View();
        $view->item = $news;
        $view->display('one.php');
        //include __DIR__ . '/../view/one.php';
    }
}