<?php
require_once "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis     = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas   = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $query = "INSERT INTO siswa (nis, nama, kelas, jurusan) VALUES ('$nis', '$nama', '$kelas', '$jurusan')";
    $sql = mysqli_query($koneksi, $query);

    if ($sql) {
        header("Location: index.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header">Form Tambah Data Siswa</div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" name="nis" placeholder="Masukkan NIS" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan Kelas" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <option value="" selected disabled>Pilih Jurusan</option>
                            <option value="PPLG 1">PPLG 1</option>
                            <option value="PPLG 2">PPLG 2</option>
                            <option value="PPLG 3">PPLG 3</option>
                            <option value="TKJ">TKJ</option>
                            <option value="MPLB">MPLB</option>
                            <option value="PS">PS</option>
                            <option value="AKKUL">AKKUL</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="index.php" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>