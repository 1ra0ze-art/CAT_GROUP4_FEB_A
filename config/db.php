<?php
// config/database.php
// Central database configuration — included everywhere via autoload


define('DB_HOST', 'localhost');
define('DB_NAME', 'musanze_potato');
define('DB_USER', 'root');
define('DB_PASS', '');

function getDB() {
    static $pdo = null;

    if ($pdo === null) {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("<h3 style='color:red'>Database connection failed: " . $e->getMessage() . "</h3>");
        }
    }

    return $pdo;
}
?>