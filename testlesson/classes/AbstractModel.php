<?php

abstract class AbstractModel
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
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $db = new Sql();
        $db->setClassName($class);
        return $db->query($sql, [':id' => $id])[0];
    }

    public static function findOneByColumn($column, $value)
    {
        $db = new Sql();
        $db->setClassName(get_called_class());
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=:value';
        $res = $db->query($sql, [':value' => $value]);
        if(!empty($res)){
            return $res[0];
        }
        return false;
    }

    protected function insert()
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
        $this->id = $db->lastInsertId();
    }

    protected function update()
    {
        $cols = [];
        $data = [];
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
        }else{
            $this->update();
        }
    }
}