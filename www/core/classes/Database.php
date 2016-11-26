<?php

class Database
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {
        require_once(PATH_FILE_CONFIG_DATABASE);
        $dsn = 'mysql:dbname=' . $arConfigDatabase['dbname']. ';host=' . $arConfigDatabase['host'];
        $this->dbh = new PDO($dsn, $arConfigDatabase['user'], $arConfigDatabase['password']);
    }
    public function setClassName($className) {
        $this->className = $className;
    }
    public function query($sql, $params = array()) {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($params);
        return $sth->FetchAll(PDO::FETCH_CLASS,$this->className);
    }

    public function execute($sql, $params = array()) {
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($params);
    }
    public function executeLastID($sql, $params = array()) {
        $sth = $this->dbh->prepare($sql);
        if ($sth->execute($params) != false) {
            return $this->dbh->lastInsertId();
        } else {
           return 0;
        }
    }
}