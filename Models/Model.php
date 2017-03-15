<?php
namespace Blog\Models;

abstract class Model {
    private static $db;

    public static function getDB() {
        if (!self::$db) {
            self::$db = new \PDO('mysql:host=localhost;dbname=tp_php_mvc;charset=utf8', 'root', 'ervbfd', [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
            ]);
        }
        return self::$db;
    }

    public static function execute(string $sql, array $params = []) {
        $db = self::getDB();
        if (empty($params)) {
            // Pas de paramètres
            $statement = $db->query($sql);
        } else {
            // Requête avec Paramètres
            $statement = $db->prepare($sql);
            $statement->execute($params);
        }
        // On renvoie le PDOStatement
        return $statement;
    }

    public static function query(string $sql, array $params = []) {
        $statement = self::execute($sql, $params);
        // On renvoie tous les résultats
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
