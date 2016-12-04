<?php

abstract class AbstractModel implements Iterator
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

    public function rewind()
    {
        reset($this->data);
    }

    public function current()
    {
        $data = current($this->data);
        return $data;
    }

    public function key()
    {
        $key = key($this->data);
        return $key;
    }

    public function next()
    {
        $data = next($this->data);
        return $data;
    }

    public function valid()
    {
        $key = key($this->data);
        $var = ($key !== NULL && $key !== FALSE);
        return $var;
    }

    public static function findAll($order = array(),$limit = array()) {

        $sql = 'SELECT * FROM ' . static::$table . AbstractModel::sql_string_order($order) . AbstractModel::sql_string_limit($limit);
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

    public static function findByColumn($column, $value, $order = array()) {
        $paramKey = ':' . $column;
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column . '=' . $paramKey .  AbstractModel::sql_string_order($order);
        $params = array();
        $params[$paramKey] = $value;

        $db = new Database();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, $params);
        if (empty($res)) {
            return false;
        }
        return $res;
    }

    public static function findOneByColumn($column, $value, $order = array()) {
        $res = self::findByColumn($column, $value, $order);
        if (empty($res)) {
            return false;
        }
        return $res[0];
    }

    public static function findByColumns($values, $order = array()) {

        $params = array();
        $arData = array();
        foreach ($values as $item) {
            $arData[] = $item['column'] . '=:' . $item['column'];
            $params[':'.$item['column']] = $item['value'];
        }
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . implode(" AND ", $arData) .  AbstractModel::sql_string_order($order);
        $db = new Database();
        $db->setClassName(get_called_class());
        $res = $db->query($sql, $params);
        if (empty($res)) {
            return false;
        }
        return $res;
    }

    protected function insert() {

        $data = array();
        $arKeys = array();
        foreach ($this->data as $key => $value) {
            if (empty($value)) {
                continue;
            }
            //пропускаем id
            if ($key == 'id'){
                continue;
            }
            $data[':' . $key] = $value;
            $arKeys[] = $key ;
        }
        $sql = 'INSERT INTO ' . static::$table . ' (' . implode(", ", $arKeys) .
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

    protected static function sql_string_order($order) {
        $sql = '';
        if (empty($order)) {
            return $sql;
        }
        $arValue = array();
        foreach ($order as $key => $value) {
            $arValue[] = $key . ' ' . $value;
        }
        $sql = ' ORDER BY ' . implode(', ', $arValue);
        return $sql;
    }

    protected static function sql_string_limit($limit) {
        $sql = '';
        if (empty($limit)) {
            return $sql;
        }
        if (empty($limit['size'])){
            return $sql;
        }
        $start = 0;
        if ($limit['start']){
            $start = $limit['start'];
        }
        $sql = ' LIMIT '. $start . ',' . $limit['size'];
        return $sql;
    }

    public function to_array() {
        return $this->data;
    }
}
