<?php

namespace App;

use PDO;

class Database {
    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;

    public function __construct($db_name, $db_user = 'root', $db_pass = '', $db_host = 'localhost') {
        $this->$db_name = $db_name;
        $this->$db_pass = $db_pass;
        $this->$db_user = $db_user;
        $this->$db_host = $db_host;
    }

    public function query($statement, $class, $oneResult = false) {
        $result = $this->getPDO()->query($statement);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        if ($oneResult) {
            return $result->fetch();
        } else {
            return $result->fetchAll();
        }
    }

    private function getPDO() {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:dbname=blog;host=localhost', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;
        }
        return $this->pdo;
    }

    public function prepare($statement, $bindValues, $class, $oneResult = false) {
        $result = $this->getPDO()->prepare($statement);
        $result->execute($bindValues);
        $result->setFetchMode(PDO::FETCH_CLASS, $class);
        if ($oneResult) {
            return $result->fetch();
        } else {
            return $result->fetchAll();
        }
    }
}