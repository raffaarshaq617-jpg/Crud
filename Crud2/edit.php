<?php
require_once "koneksi.php";

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM siswa WHERE id = '$id'");
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nis     = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $nama    = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $kelas   = mysqli_real_escape_string($koneksi, $_POST['kelas']);
    $jurusan = mysqli_real_escape_string($koneksi, $_POST['jurusan']);

    $query = "UPDATE siswa SET nis='$nis', nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE id='$id'";
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
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="card">
        <div class="card-header">Form Edit Data Siswa</div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3 row">
                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nis" name="nis" value="<?= htmlspecialchars($row['nis']); ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($row['nama']); ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kelas" name="kelas" value="<?= htmlspecialchars($row['kelas']); ?>" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="jurusan" name="jurusan" required>
                            <?php
                            $daftar_jurusan = ["PPLG 1", "PPLG 2", "PPLG 3", "TKJ", "MPLB", "PS", "AKKUL"];
                            foreach ($daftar_jurusan as $j) {
                                $selected = ($row['jurusan'] === $j) ? "selected" : "";
                                echo "<option value=\"$j\" $selected>$j</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10 offset-sm-2">
                        <button type="submit" class="btn btn-primary">Update</button>
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