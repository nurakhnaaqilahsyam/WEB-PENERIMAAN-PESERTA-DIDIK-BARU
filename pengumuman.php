<?php
// Koneksi ke database
$conn = new mysqli("localhost", "root", "", "kelompok17");

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Variabel default
$status_kelulusan = '';
$nama = ''; // Menambahkan variabel nama untuk menampilkan nama peserta

// Cek apakah form telah disubmit dan NISN ada di GET
if (isset($_GET['nisn'])) {
    $nisn = $_GET['nisn'];

    // Query untuk mendapatkan data berdasarkan NISN
    $sql = "SELECT * FROM pendaftaran WHERE nisn = '$nisn'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $nama = $row['nama'];  // Ambil nama peserta
        $status_kelulusan = $row['status_kelulusan'];  // Ambil status kelulusan
        
        // Pesan kelulusan
        if ($status_kelulusan == 'Lulus') {
            $status_kelulusan = "Selamat atas nama $nama, Anda telah lulus!";
        } else {
            $status_kelulusan = "Maaf, atas nama $nama, Anda belum lulus.";
        }
    } else {
        $status_kelulusan = "Data tidak ditemukan.";
    }
} else {
    // Tidak menampilkan pesan apapun jika form belum disubmit
    $status_kelulusan = '';
}

// Tutup koneksi
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengumuman Hasil Seleksi - SMP Cendekia Muda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <a class="navbar-brand" href="#">
            <img src="logooo-removebg-preview.png" alt="Logo" width="50" height="50" class="d-inline-block align-top" style="margin-top: -10px;">
            SMP Cendekia Muda
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#informasi">Informasi</a></li>
                <li class="nav-item"><a class="nav-link" href="pendaftaran.php">Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link" href="datapendaftaran.php">Data Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link" href="pengumuman.php">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <section id="pengumuman" class="container mt-5">
        <h2 class="text-center">Pengumuman Hasil Seleksi</h2>
        <p class="text-center">Masukkan NISN untuk melihat hasil seleksi.</p>
        <div class="mx-auto" style="max-width: 400px;">
            <form method="GET" action="pengumuman.php"> <!-- Mengubah metode ke GET -->
                <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN" required>
                <button type="submit" class="btn btn-success btn-block mt-2">Cek Hasil</button>
            </form>
            <div class="mt-4">
                <p><?php echo $status_kelulusan; ?></p>
            </div>
        </div>
    </section>

    <script src="script.js"></script>
</body>
</html>
