<?php


require_once './db_creds.php';

function connect_to_db_pdo(){
    try {
        $dsn= "mysql:host=localhost;dbname=ITI_PHP;port=3306";
        $pdo=  new PDO($dsn, DB_USER);
        return $pdo;
    }
    catch (Exception $e) {
        echo "<h3 style='color:red'>{$e->getMessage()}</h3>";
        return false;
    }
}
?>