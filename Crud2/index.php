<?php
require_once "koneksi.php";

$result = mysqli_query($koneksi, "SELECT * FROM siswa");
if (!$result) {
    die("Query gagal: " . mysqli_error($koneksi));
}

$no = 1;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header">
            Data Siswa
        </div>
        <div class="card-body">
            <a href="menambah.php" class="btn btn-primary mb-3">+ Tambah</a>

            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>NO</th>
                        <th>NIS</th>
                        <th>NAMA</th>
                        <th>KELAS</th>
                        <th>JURUSAN</th>
                        <th>AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= htmlspecialchars($row['nis']); ?></td>
                            <td><?= htmlspecialchars($row['nama']); ?></td>
                            <td><?= htmlspecialchars($row['kelas']); ?></td>
                            <td><?= htmlspecialchars($row['jurusan']); ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?id=<?= $row['id']; ?>"
                                   class="btn btn-sm btn-danger"
                                   onclick="return confirm('Hapus data ini?')">
                                   Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<!--FOOTER-->
<footer class="bg-primary text-center text-lg-start mt-auto">
        <div class="container p-4">
            <p>&copy; 2026 StudentAPP. All rights reserved.</p>
        </div>
    </footer>
<!--FOOTER END-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>