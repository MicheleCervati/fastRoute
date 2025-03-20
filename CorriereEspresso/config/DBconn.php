<?php

class DBconn
{
    private static ?PDO $db = null; // Inizializzata a null


    public static function getDB(array $config): ?PDO
    {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO($config['dsn'], $config['username'], $config['passwd'], $config['options']);
            } catch (PDOException $e) {
                self::logError($e);
                self::$db = null; // Evita valori errati
            }
        }
        return self::$db;
    }

    public static function logError(Exception $e): void
    {
        error_log($e->getMessage() . ' -- ' . date('Y-m-d H:i:s') . "\n", 3, 'log/dberror.log');
    }
}
