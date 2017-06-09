<?php

class Database
{
	// private static $dsn = 'mysql:host=localhost;dbname=lehaoorg_perfectshades';
	// private static $username = 'lehaoorg_humber';
    // private static $password = '123Ravinder';

	 private static $dsn = 'mysql:host=localhost;dbname=perfectshades';
     private static $username = 'root';
     private static $password = '';
	
    private static $db;

    private function __construct()
    {
    }

    public static function getDB()
    {
        if (!isset(self::$db)) {
            try {
                $db = new PDO(self::$dsn, self::$username, self::$password);
            } catch
            (PDOException $e) {
                $error_message = $e->getMessage();
                header("Location: database_error.html");
                exit();
            }
        }
        return $db;
    }
}
?>