<?php
require_once "koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa");
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$no = 1;
?>

<h2>Data Siswa</h2>

<a href="menambah.php">+ Tambah</a>

<br><br>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th><font color="red">NO</th>
        <th>NAMA</th>
        <th>KELAS</th>
        <th>AKSI</th>
    </tr>

    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= htmlspecialchars($row['nama']); ?></td>
            <td><?= htmlspecialchars($row['kelas']); ?></td>
            <td>
                <a href="edit.php?id=<?= $row['id']; ?>">Edit</a>
                <a href="hapus.php?id=<?= $row['id']; ?>"
                   onclick="return confirm('Hapus data ini?')">
                   Hapus
                </a>
            </td>
        </tr>
    <?php endwhile; ?>

</table>