<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'ifpifinancial');
define('DB_USER', 'root');
define('DB_PASS', '');

class Connect
{
    protected $connection;

    function __construct()
    {
        $this->connectDatabase();
    }

    function connectDatabase()
    {
        try {
            $this->connection = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}
?>