<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Siswa Baru - SMP Cendekia Muda</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light sticky-top">
        <a class="navbar-brand">
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
                <li class="nav-item"><a class="nav-link" href="datapendftaran.php">Data Pendaftaran</a></li>
                <li class="nav-item"><a class="nav-link" href="pengumuman.php">Pengumuman</a></li>
                <li class="nav-item"><a class="nav-link" href="kontak.php">Kontak</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header id="menuUtama" class="vh-100 d-flex align-items-center justify-content-center text-center">
        <div class="container">
            <div class="welcome-box p-4">
                <h1 class="display-4">SELAMAT DATANG DI SMP CENDEKIA MUDA</h1>
                <p class="lead">Sekolah Unggulan yang Menyediakan Pendidikan Berkualitas</p>
                <a href="#informasi" class="btn btn-lg btn-outline-light rounded-pill mt-4">Lihat Informasi Sekolah</a>
                <a href="pendaftaran.php" class="btn btn-lg btn-outline-light rounded-pill mt-4">Daftar Sekarang</a>
            </div>
        </div>
    </header>

    <!-- Informasi Section -->
    <section id="informasi" class="container mt-5">
        <h2 class="text-center">Informasi SMP Cendekia Muda</h2>
        <p class="text-center">SMP Cendekia Muda menyediakan pendidikan unggulan dengan kurikulum terbaik dan fasilitas modern. Kami berkomitmen membentuk generasi berprestasi dan berakhlak mulia.</p>
        
        <div class="text-center mt-4">
            <img src="smp.jpg" alt="Gambar Sekolah" class="img-fluid rounded shadow-lg">
        </div>
        
        <h3 class="text-center mt-5">Fasilitas Sekolah</h3>
        
        <div class="row mt-4">
            <div class="col-md-3 col-sm-6 text-center">
                <img src="labkomputer.jpg" alt="Laboratorium Komputer" class="img-facility rounded shadow-sm mb-3">
                <p>Laboratorium Komputer</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <img src="perpustakaan.jpg" alt="Perpustakaan" class="img-facility rounded shadow-sm mb-3">
                <p>Perpustakaan</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <img src="lapanganolahraga.jpg" alt="Lapangan Olahraga" class="img-facility rounded shadow-sm mb-3">
                <p>Lapangan Olahraga</p>
            </div>
            <div class="col-md-3 col-sm-6 text-center">
                <img src="ruangkelas.jpg" alt="Ruang Kelas" class="img-facility rounded shadow-sm mb-3">
                <p>Ruang Kelas</p>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-light text-center py-3 mt-5">
        <p>&copy; <?= date('Y'); ?> SMP Cendekia Muda. All Rights Reserved.</p>
    </footer>
</body>
</html>
