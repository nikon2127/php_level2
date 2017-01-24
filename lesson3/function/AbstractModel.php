<?php

/**
 * Created by PhpStorm.
 * User: Никон
 * Date: 24.01.2017
 * Time: 20:34
 */
class AbstractModel
{
    static protected $table;
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql);
    }

    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id_news=:id';
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        $dat = [];
        foreach ($cols as $val){
            $dat[':' . $val] = $this->data[$val];
        }
        $sql = 'INSERT INTO ' . static::$table . ' ('
            . implode(', ', $cols)
            . ') VALUE  
            (' . implode(', ', array_keys($dat)) . ')';

        $db = new Sql();
        $db->execute($sql, $dat);
    }
}