<?php

class Database {
    public function connect($creds) {

    }
    public function insert($table, $columns) {
        $sql = "INSERT INTO {$table}";
    }
    public function select($table) {
        $sql = "SELECT * FROM {$table};";
        
    }
}