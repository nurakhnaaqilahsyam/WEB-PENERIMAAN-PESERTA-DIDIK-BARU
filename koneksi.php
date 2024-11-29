<?php
$host = "localhost"; // Host database
$username = "root"; // Username database
$password = ""; // Password database (kosong secara default)
$dbname = "kelompok17"; // Nama database Anda

// Membuat koneksi
$conn = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>