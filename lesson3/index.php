<?php
require_once __DIR__ . '/model/News.php';


$news = News::getAll();

include __DIR__ . '/view/index.php';