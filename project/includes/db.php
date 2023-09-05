<?php
$server = "localhost";
$username = "root";
$password = "";
$database = '127_zhaqian';

$conn = new mysqli($server, $username, $password, $database);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>