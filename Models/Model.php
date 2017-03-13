<?php
namespace Blog\Models;

abstract class Model {
    private static $db;

    public static function getDB() {
        if (!self::$db) {
            self::$db = new \PDO('mysql:host=localhost;dbname=tp_php_mvc;charset=utf8', 'root', 'ervbfd');
        }
        return self::$db;
    }
}
