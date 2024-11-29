<?php
// Hubungkan ke database
include 'koneksi.php';

// Ambil ID dari URL
$id = $_GET['id'];

// Hapus data berdasarkan ID
$sql = "DELETE FROM pendaftaran WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: tampil_data.php");
    exit;
} else {
    echo "Error: " . $conn->error;
}
?>