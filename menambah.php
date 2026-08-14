<?php
require_once "koneksi.php";

if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES('','$nama','$kelas')");

    if ($query) {
        echo "<script>alert('Data berhasil ditambahkan'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan'); window.location.href='menambah.php';</script>";
    }
}
?>

<h2>Tambah Data Siswa</h2>

<form action="menambah.php" method="POST">
    <label>Nama</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" required><br><br>

    <button type="submit" name="tambah">Simpan</button>
    <a href="index.php">Batal</a>
</form>