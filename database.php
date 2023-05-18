<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'tianda1';

try {
    $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('conexion failed: ' . $e->getMessage());
}
