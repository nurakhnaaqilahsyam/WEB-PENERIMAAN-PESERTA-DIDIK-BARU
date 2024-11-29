<?php
// Hubungkan ke database
include 'koneksi.php';

// Ambil data berdasarkan ID
$id = $_GET['id'];
$sql = "SELECT * FROM pendaftaran WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

// Proses update data jika form dikirim
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jalur = $_POST['jalur'];
    $nama = $_POST['nama'];
    $nisn = $_POST['nisn'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $nilai_rapor = $_POST['nilai_rapor'];
    $nilai_ujian = $_POST['nilai_ujian'];

    $sql = "UPDATE pendaftaran SET 
            jalur='$jalur', 
            nama='$nama', 
            nisn='$nisn', 
            asal_sekolah='$asal_sekolah', 
            alamat='$alamat', 
            jenis_kelamin='$jenis_kelamin', 
            nilai_rapor='$nilai_rapor', 
            nilai_ujian='$nilai_ujian'
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: tampil_data.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Edit Data Pendaftaran</h2>
        <form method="POST">
            <div class="form-group">
                <label for="jalur">Pilih Jalur Pendaftaran</label>
                <select name="jalur" id="jalur" class="form-control" required>
                    <option value="zonasi" <?php echo $row['jalur'] == 'zonasi' ? 'selected' : ''; ?>>Zonasi</option>
                    <option value="prestasi" <?php echo $row['jalur'] == 'prestasi' ? 'selected' : ''; ?>>Prestasi</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="form-control" value="<?php echo $row['nama']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" id="nisn" class="form-control" value="<?php echo $row['nisn']; ?>" required>
            </div>
            <div class="form-group">
                <label for="asal_sekolah">Asal Sekolah</label>
                <input type="text" name="asal_sekolah" id="asal_sekolah" class="form-control" value="<?php echo $row['asal_sekolah']; ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-control" value="<?php echo $row['alamat']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control" required>
                    <option value="laki-laki" <?php echo $row['jenis_kelamin'] == 'laki-laki' ? 'selected' : ''; ?>>Laki-laki</option>
                    <option value="perempuan" <?php echo $row['jenis_kelamin'] == 'perempuan' ? 'selected' : ''; ?>>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nilai_rapor">Nilai Rata-Rata Rapor</label>
                <input type="number" name="nilai_rapor" id="nilai_rapor" class="form-control" value="<?php echo $row['nilai_rapor']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nilai_ujian">Nilai Ujian Akhir</label>
                <input type="number" name="nilai_ujian" id="nilai_ujian" class="form-control" value="<?php echo $row['nilai_ujian']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</body>
</html>