<?php

namespace vendor\core\base;

use vendor\core\Db;

abstract class Model
{
    protected $pdo;
    protected $table;

    function __construct() {
        $this->pdo = Db::instance();
    }

    function query($sql) {
        return $this->pdo->execute($sql);
    }

    function findAll() {
        $sql = "SELECT * FROM {$this->table}";
        return $this->pdo->query($sql);
    }
}