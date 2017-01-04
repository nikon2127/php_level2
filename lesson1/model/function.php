<?php
error_reporting(E_ALL);

//приводим данные из формы в нормальную форму
function clean_text($string){
    $string = trim($string);
    $string = stripslashes($string);
    $string = strip_tags($string);
    $string = htmlspecialchars($string);
    return $string;
}