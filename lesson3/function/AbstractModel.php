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

    public function __isset($name)
    {
        if(isset($this->data[$name])){
            return $this->data[$name];
        }
        return false;
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
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
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
            . ') VALUE (' . implode(', ', array_keys($dat)) . ')';

        $db = new Sql();
        if($db->execute($sql, $dat)){
            $this->id = $db->lastInsertId();
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
    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        $db = new Sql();
        $db->execute($sql, [':id' => $this->id]);
    }

    //обновляет запись
    public function update()
    {
        $data = [];
        $cols = [];
        foreach ($this->data as $k => $v){
            $data[':' . $k] = $v;
            if('id' == $k){
                continue;
            }
            $cols[] = $k . '=:' . $k;
        }
        $sql = 'UPDATE ' . static::$table . ' SET ' . implode(', ', $cols) . ' WHERE id=:id';

        $db = new Sql();
        $db->execute($sql, $data);
    }

    public function save()
    {
        if(empty($this->id)){
            $this->insert();
        }else {
            $this->update();
        }
    }
}