<?php

class View implements Iterator
{
    protected $data = [];

    /*public classes assing($name, $value)
    {
        $this->data[$name] = $value;
    }*/

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

    public function current()
    {

    }

    public function next()
    {

    }

    public function key()
    {

    }

    public function valid()
    {

    }

    public function rewind()
    {

    }
}