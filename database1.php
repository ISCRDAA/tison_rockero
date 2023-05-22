<?php
$server = 'localhost';
$username = 'id20714086_root';
$password = 'Angelalonso21#';
$database = 'id20714086_tianda1';

try {
    $conn = new PDO("mysql:host=$server; dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('conexion failed: ' . $e->getMessage());
}
