<?php
require_once "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $query = mysqli_query($koneksi, "UPDATE mahasiswa SET nama='$nama', kelas='$kelas' WHERE id='$id'");

    if ($query) {
        echo "<script>alert('Data berhasil diubah'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Data gagal diubah'); window.location.href='edit.php?id=$id';</script>";
    }
}
?>

<h2>Edit Data Siswa</h2>

<form action="edit.php?id=<?= $row['id']; ?>" method="POST">
    <label>Nama</label><br>
    <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br><br>

    <label>Kelas</label><br>
    <input type="text" name="kelas" value="<?= $row['kelas']; ?>" required><br><br>

    <button type="submit" name="edit">Update</button>
    <a href="index.php">Batal</a>
</form>