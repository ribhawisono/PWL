<?php
require_once "koneksi.php";

$nim       = $_GET['nim'] ?? '';
$sql       = "SELECT * FROM mahasiswa WHERE nim_mhs = '$nim'";
$hasil     = mysqli_query($koneksi, $sql);
$data_lama = mysqli_fetch_assoc($hasil);

if (!$data_lama) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa · PERT13</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- NAV -->
<nav class="navbar">
    <div class="navbar-icon">🎓</div>
    <div>
        <div class="navbar-title">Sistem Informasi Mahasiswa</div>
        <div class="navbar-sub">Pertemuan 13 — CRUD PHP & MySQL</div>
    </div>
</nav>

<div class="wrapper">

    <!-- BREADCRUMB -->
    <div class="breadcrumb">
        <a href="index.php">🏠 Beranda</a>
        <span>›</span>
        <span>Edit Mahasiswa</span>
    </div>

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div>
            <div class="page-title">Edit Data Mahasiswa</div>
            <div class="page-subtitle">Perbarui informasi untuk NIM <strong><?php echo htmlspecialchars($data_lama['nim_mhs']); ?></strong></div>
        </div>
    </div>

    <!-- FORM CARD -->
    <div class="form-card">
        <form action="proses_edit.php" method="POST">

            <div class="form-group">
                <label for="nim_mhs">NIM</label>
                <input
                    type="text"
                    id="nim_mhs"
                    name="nim_mhs"
                    value="<?php echo htmlspecialchars($data_lama['nim_mhs']); ?>"
                    readonly>
                <div class="form-hint">NIM tidak dapat diubah.</div>
            </div>

            <div class="form-group">
                <label class="label-required" for="nama_mhs">Nama Lengkap</label>
                <input
                    type="text"
                    id="nama_mhs"
                    name="nama_mhs"
                    value="<?php echo htmlspecialchars($data_lama['nama_mhs']); ?>"
                    maxlength="100"
                    required>
            </div>

            <div class="form-group">
                <label class="label-required" for="jurusan_mhs">Program Studi</label>
                <div class="select-wrap">
                    <select id="jurusan_mhs" name="jurusan_mhs" required>
                        <?php
                        $opsi = ['Teknik Informatika', 'Sistem Informasi', 'Teknik Komputer'];
                        foreach ($opsi as $o):
                            $selected = ($data_lama['jurusan_mhs'] === $o) ? 'selected' : '';
                        ?>
                            <option value="<?php echo $o; ?>" <?php echo $selected; ?>><?php echo $o; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="form-footer">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" name="update" class="btn btn-warning">💾 Simpan Perubahan</button>
            </div>

        </form>
    </div>

</div><!-- /wrapper -->
</body>
</html>