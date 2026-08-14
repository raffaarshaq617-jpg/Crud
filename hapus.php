<?php
require_once "koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "DELETE FROM mahasiswa WHERE id = '$id'");

    if ($query) {
        echo "<script>
            alert('Data berhasil dihapus.');
            window.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data gagal dihapus.');
            window.location.href = 'index.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID tidak ditemukan.');
        window.location.href = 'index.php';
    </script>";
}