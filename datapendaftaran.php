<?php
// Hubungkan ke database
include 'koneksi.php';

// Query untuk mengambil data
$sql = "SELECT * FROM pendaftaran";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DATA PENDAFTARAN SISWA</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <style>
        .table thead th {
            background-color: white; /* Warna biru tabel header */
            color: black ;
            text-align: center;
        }

        .table tbody td {
            text-align: center;
        }
    </style>
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

    <div class="container mt-5">
        <h2 class="text-center">Data Pendaftaran</h2>

        <!-- Tampilkan data dalam tabel -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jalur</th>
                    <th>Nama</th>
                    <th>NISN</th>
                    <th>Asal Sekolah</th>
                    <th>Alamat</th>
                    <th>Jenis Kelamin</th>
                    <th>Nilai Rapor</th>
                    <th>Nilai Ujian</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    $no = 1;
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>";
                        echo "<td>" . $row['jalur'] . "</td>";
                        echo "<td>" . $row['nama'] . "</td>";
                        echo "<td>" . $row['nisn'] . "</td>";
                        echo "<td>" . $row['asal_sekolah'] . "</td>";
                        echo "<td>" . $row['alamat'] . "</td>";
                        echo "<td>" . $row['jenis_kelamin'] . "</td>";
                        echo "<td>" . $row['nilai_rapor'] . "</td>";
                        echo "<td>" . $row['nilai_ujian'] . "</td>";
                        echo "<td><img src='uploads/" . $row['foto'] . "' alt='Foto' width='100'></td>";
                        echo "<td>";
                        echo "<a href='edit.php?id=" . $row['id'] . "' class='btn btn-warning btn-sm'>Edit</a> ";
                        echo "<a href='hapus.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='11' class='text-center'>Belum ada data pendaftaran.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
