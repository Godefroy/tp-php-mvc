<?php
namespace Blog\Models;

use \Blog\Config;

abstract class Model {
    private static $db;

    public static function getDB() {
        if (!self::$db) {
            // Instanciation de PDO

            self::$db = new \PDO(
                sprintf(
                    '%s:host=%s;dbname=%s;charset=utf8',
                    Config::dbType, Config::dbHost, Config::dbName
                ),
                Config::dbUser, Config::dbPass,
                [
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
