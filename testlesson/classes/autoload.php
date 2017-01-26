<?php

function __autoload($class){
    if(file_exists(__DIR__ . '/../controller/' . $class . '.php')){
        require __DIR__ . '/../controller/' . $class . '.php';
    }
    if(file_exists(__DIR__ . '/../model/' . $class . '.php')){
        require __DIR__ . '/../model/' . $class . '.php';
    }
    if(file_exists(__DIR__ . '/' . $class . '.php')){
        require __DIR__ . '/' . $class . '.php';
    }
}