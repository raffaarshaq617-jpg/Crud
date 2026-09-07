<?php
require_once "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM siswa WHERE id = '$id'";
$sql = mysqli_query($koneksi, $query);

if ($sql) {
    header("Location: index.php");
    exit();
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}