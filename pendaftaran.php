<?php
// Hubungkan ke database
include 'koneksi.php';

// Variabel untuk pesan
$message = "";

// Proses jika form dikirimkan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jalur = $_POST['jalur'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nilai_rapor = $_POST['nilai_rapor'];
    $nilai_ujian = $_POST['nilai_ujian'];

    // Proses upload file foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);

    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Simpan data ke database
        $sql = "INSERT INTO pendaftaran (jalur, nama, nisn, asal_sekolah, alamat, jenis_kelamin, nilai_rapor, nilai_ujian, foto)
                VALUES ('$jalur', '$nama', '$nisn', '$asal_sekolah', '$alamat', '$jenis_kelamin', '$nilai_rapor', '$nilai_ujian', '$foto')";

        if ($conn->query($sql) === TRUE) {
            $message = "Pendaftaran berhasil. Data telah disimpan!";
        } else {
            $message = "Error: " . $conn->error;
        }
    } else {
        $message = "Gagal mengunggah foto.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
    <div class="container mt-5">
        <h2 class="text-center">Form Pendaftaran Siswa Baru</h2>

        <!-- Tampilkan pesan jika ada -->
        <?php if ($message): ?>
            <div class="alert alert-info text-center">
                <?php echo $message; ?>
            </div>
            <!-- Tombol untuk melihat data -->
            <?php if ($message == "Pendaftaran berhasil. Data telah disimpan!"): ?>
                <div class="text-center mt-3">
                    <a href="tampil_data.php" class="btn btn-success">Lihat Data Pendaftaran</a>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="pendaftaran.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="jalur">Pilih Jalur Pendaftaran</label>
                <select name="jalur" id="jalur" class="form-control" required>
                    <option value="" disabled selected>Pilih Jalur</option>
                    <option value="zonasi">Zonasi</option>
                    <option value="prestasi">Prestasi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="laki-laki">Laki-laki</option>
                    <option value="perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_rapor">Nilai Rata-Rata Rapor</label>
                <input type="number" name="nilai_rapor" id="nilai_rapor" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nilai_ujian">Nilai Ujian Akhir</label>
                <input type="number" name="nilai_ujian" id="nilai_ujian" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="foto">Unggah Foto</label>
                <input type="file" name="foto" id="foto" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Daftar</button>
        </form>
    </div>
</body>
</html>
