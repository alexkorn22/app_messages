<?php

abstract class AbstractModel
{
    protected static $table;

    protected $data = array();

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public static function findAll() {
        $sql = 'SELECT * FROM ' . static::$table;
        $db = new Database();
        $db->setClassName(get_called_class());
        return $db->query($sql);
    }

    public static function findOneByPk($id) {

        $sql = 'SELECT * FROM ' . static::$table . ' WHERE id=:id';
        $params = array();
        $params[':id'] = $id;

        $db = new Database();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, $params);
        if (empty($res)) {
            return false;
        }
        return $res[0];

    }

    public static function findByColumn($column, $value) {
        $paramKey = ':' . $column;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=' . $paramKey;
        $params = array();
        $params[$paramKey] = $value;

        $db = new Database();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, $params);
        if (empty($res)) {
            return false;
        }
        return $res[0];
    }

    protected function insert() {

        $data = array();
        foreach ($this->data as $key => $value) {
            //пропускаем id
            if ($key != 'id'){
                $arData[] = $key . '=:' . $key;
            }
            $data[':' . $key] = $value;
        }
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(", ", array_keys($this->data)) .
                ') VALUES (' . implode(", ", array_keys($data)) . ')';
        $db = new Database();
        $db->setClassName(get_called_class());
        $this->id = $db->executeLastID($sql, $data);
    }

    protected function update() {

        $data = array();
        $arData = array();
        foreach ($this->data as $key => $value) {
            $data[':' . $key] = $value;
            //пропускаем id
            if ($key != 'id'){
                $arData[] = $key . '=:' . $key;
            }
        }
        $sql = 'UPDATE ' . static::$table .' SET ' . implode(", ", $arData) .' WHERE id=:id';
        $db = new Database();
        $db->setClassName(get_called_class());
        return $db->execute($sql, $data);
    }

    public function save()
    {
        $id = $this->id;
        if (empty($id)) {
          return $this->insert();
        }
        $objFind = self::findOneByPk($id);
        if ($objFind != false)
            return $this->update();
        else
           return $this->insert();
    }

    public function delete() {

        $sql = 'DELETE FROM ' . static::$table . ' WHERE id=:id';
        $params = array();
        $params[':id'] = $this->id;

        $db = new Database();
        $db->setClassName(get_called_class());
        return $db->execute($sql,$params);
    }

}
