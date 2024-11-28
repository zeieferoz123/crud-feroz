<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "crud_php"; // Pastikan database ini sudah ada

// Membuat koneksi
$conn = new mysqli($host, $user, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
