<?php

class View implements Iterator
{
    private $data = [];
    private $position;

    public function __construct()
    {
        $this->position = 0;
    }

    //вызывается при создании необьявленой переменной
    public function __set($key, $value)
    {
        $this->data[$key] = $value;
    }

    //вызывается при прочтении необьявленой переменной
    public function __get($key)
    {
        return $this->data[$key];
    }

    public function render($template)
    {
        foreach ($this->data as $key => $vol){
            $$key = $vol;
        }
        ob_start();
        include __DIR__ . '/../view/' . $template;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display($template)
    {
        echo $this->render($template);
    }

    //возвращает текущий элемент
    public function current()
    {
        return current($this->data);
    }

    //переходит к следующему элементу
    public function next()
    {
        next($this->data);
    }

    //возвращает ключ текущего элемента
    public function key()
    {
        return key($this->data);
    }

    //проверка корректности позиции
    public function valid()
    {
        return isset($this->data[key($this->data)]);
    }

    //возвращает итератор на первый элемент
    public function rewind()
    {
        reset($this->data);
    }
}