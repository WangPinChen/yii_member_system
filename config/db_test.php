<?php

$config = require('db.php');

try {
    $db = new PDO($config['dsn'], $config['username'], $config['password']);
    echo "Database connection is successful.";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}