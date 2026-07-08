<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa · PERT13</title>
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
        <span>Tambah Mahasiswa</span>
    </div>

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div>
            <div class="page-title">Tambah Data Mahasiswa</div>
            <div class="page-subtitle">Isi formulir di bawah untuk mendaftarkan mahasiswa baru</div>
        </div>
    </div>

    <!-- FORM CARD -->
    <div class="form-card">
        <form action="proses_tambah.php" method="POST" autocomplete="off">

            <div class="form-group">
                <label class="label-required" for="nim_mhs">NIM</label>
                <input
                    type="text"
                    id="nim_mhs"
                    name="nim_mhs"
                    placeholder="Contoh: 2300123456"
                    maxlength="12"
                    required>
                <div class="form-hint">Nomor Induk Mahasiswa, maks. 12 karakter</div>
            </div>

            <div class="form-group">
                <label class="label-required" for="nama_mhs">Nama Lengkap</label>
                <input
                    type="text"
                    id="nama_mhs"
                    name="nama_mhs"
                    placeholder="Contoh: Budi Santoso"
                    maxlength="100"
                    required>
            </div>

            <div class="form-group">
                <label class="label-required" for="jurusan_mhs">Program Studi</label>
                <div class="select-wrap">
                    <select id="jurusan_mhs" name="jurusan_mhs" required>
                        <option value="" disabled selected>— Pilih Program Studi —</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Teknik Komputer">Teknik Komputer</option>
                    </select>
                </div>
            </div>

            <div class="form-footer">
                <a href="index.php" class="btn btn-secondary">Batal</a>
                <button type="submit" name="submit" class="btn btn-primary">💾 Simpan Data</button>
            </div>

        </form>
    </div>

</div><!-- /wrapper -->
</body>
</html>