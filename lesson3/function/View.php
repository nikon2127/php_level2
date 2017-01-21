<?php

class View implements Iterator
{
    private $position;
    protected $data = [];

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

    public function current()
    {
        return $this->data[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }
}