<?php

class Database
{
    private $dbh;
    private $className = 'stdClass';

    public function __construct()
    {

        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        $this->dbh = new PDO($dsn, DB_USER, DB_PASSWORD);
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