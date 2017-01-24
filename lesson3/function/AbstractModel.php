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
    static protected $id;
    public $id_news;
    protected $data = [];

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    //получение всех записей
    public static function findAll()
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql);
    }

    //получение 1 записи по id
    public static function findOneByPk($id)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . static::$id . '=:id';
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    //добавление записи
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
        if($db->execute($sql, $dat)){
            $this->id_news = $db->lastInsertId();
        }
    }

    //поиск в таблице записей с заданным значение заданного поля
    public static function findByColumn($column, $value)
    {
        $class = get_called_class();
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:val';
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql, [':val' => $value]);
    }

    //удаление записи
    public function delete($id)
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE ' . static::$id . '= :id';
        $db = new Sql();
        $db->execute($sql, [':id' => $id]);
    }

    //обновляет запись
    public function update($id)
    {
        $cols = array_keys($this->data);
        $dat = [];
        $inc = [];
        foreach ($cols as $val){
            $inc[':' . $val] = $this->data[$val];
            $dat[] = $val . '=:' . $val;
        }
        $inc[':' . static::$id] = $id;
        //var_dump($dat, $inc); die;
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $dat) . ' WHERE '
            . static::$id . '=:' . static::$id;

        $db = new Sql();
        $db->execute($sql, $inc);
    }
}