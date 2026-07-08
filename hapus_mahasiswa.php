<?php
require_once "koneksi.php";

$nim = $_GET['nim'] ?? '';

if (empty($nim)) {
    header("Location: index.php");
    exit;
}

$sql = "DELETE FROM mahasiswa WHERE nim_mhs = '$nim'";

if (mysqli_query($koneksi, $sql)) {
    header("Location: index.php");
    exit;
} else {
    $error = mysqli_error($koneksi);
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Menghapus · PERT13</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav class="navbar">
    <div class="navbar-icon">🎓</div>
    <div>
        <div class="navbar-title">Sistem Informasi Mahasiswa</div>
        <div class="navbar-sub">Pertemuan 13 — CRUD PHP & MySQL</div>
    </div>
</nav>
<div class="wrapper">
    <div class="form-card" style="text-align:center;padding:2.5rem;">
        <div style="font-size:2.5rem;margin-bottom:1rem;">❌</div>
        <div class="page-title" style="margin-bottom:.5rem;">Gagal Menghapus Data</div>
        <div class="alert alert-danger" style="text-align:left;margin-top:1.25rem;">
            <span>⚠️</span>
            <span><?php echo isset($error) ? $error : 'Terjadi kesalahan yang tidak diketahui.'; ?></span>
        </div>
        <div style="margin-top:1.5rem;display:flex;gap:.75rem;justify-content:center;">
            <a href="index.php" class="btn btn-secondary">🏠 Kembali ke Beranda</a>
        </div>
    </div>
</div>
</body>
</html>