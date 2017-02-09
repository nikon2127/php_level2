<?php

class Logs
    extends Exception
{
    public function __construct($message, $code, $file, $line)
    {
        $this->message = $message;
        $this->code = $code;
        $this->file = $file;
        $this->line = $line;
    }

    public function logInsert(){
        $data = date(DATE_RFC822) . ' | ' . $this->message . ' | ' . $this->code . ' | ' .
            $this->file . ' | ' . $this->line . "\r\n";
        file_put_contents(__DIR__ . '/../log.txt', $data, FILE_APPEND);
    }
}