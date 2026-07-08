<?php
require_once "koneksi.php";

$sql         = "SELECT * FROM mahasiswa ORDER BY nim_mhs ASC";
$hasil_query = mysqli_query($koneksi, $sql);
$total       = mysqli_num_rows($hasil_query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa · PERT13</title>
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

    <!-- STATS -->
    <div class="stats-row">
        <div class="stat-card">
            <div class="stat-value"><?php echo $total; ?></div>
            <div class="stat-label">Total Mahasiswa</div>
        </div>
        <div class="stat-card">
            <?php
            $q_ti = mysqli_query($koneksi, "SELECT COUNT(*) AS n FROM mahasiswa WHERE jurusan_mhs='Teknik Informatika'");
            echo '<div class="stat-value">' . mysqli_fetch_assoc($q_ti)['n'] . '</div>';
            ?>
            <div class="stat-label">Teknik Informatika</div>
        </div>
        <div class="stat-card">
            <?php
            $q_si = mysqli_query($koneksi, "SELECT COUNT(*) AS n FROM mahasiswa WHERE jurusan_mhs='Sistem Informasi'");
            echo '<div class="stat-value">' . mysqli_fetch_assoc($q_si)['n'] . '</div>';
            ?>
            <div class="stat-label">Sistem Informasi</div>
        </div>
        <div class="stat-card">
            <?php
            $q_tk = mysqli_query($koneksi, "SELECT COUNT(*) AS n FROM mahasiswa WHERE jurusan_mhs='Teknik Komputer'");
            echo '<div class="stat-value">' . mysqli_fetch_assoc($q_tk)['n'] . '</div>';
            ?>
            <div class="stat-label">Teknik Komputer</div>
        </div>
    </div>

    <!-- PAGE HEADER -->
    <div class="page-header">
        <div>
            <div class="page-title">Daftar Mahasiswa Aktif</div>
            <div class="page-subtitle">Menampilkan <?php echo $total; ?> data terdaftar</div>
        </div>
        <a href="tambah_mahasiswa.php" class="btn btn-primary">
            <span>＋</span> Tambah Mahasiswa
        </a>
        <br><br>
        <input type="text" id="CariNama" placeholder="Cari nama mahasiswa...">
        <button id="btnToggleJurusan">Sembunyikan Jurusan</button>
        <br><br>
    </div>

    <!-- TABLE CARD -->
    <div class="card">
        <div class="table-wrap">
            <?php if ($total === 0): ?>
            <div class="empty-state">
                <div class="icon">📭</div>
                <p>Belum ada data mahasiswa.<br>Klik <strong>Tambah Mahasiswa</strong> untuk menambahkan.</p>
            </div>
            <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NIM</th>
                        <th>Nama Lengkap</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $no = 1;
                // Reset pointer hasil query
                mysqli_data_seek($hasil_query, 0);
                while ($baris = mysqli_fetch_assoc($hasil_query)):
                ?>
                    <tr>
                        <td style="color:var(--muted);font-size:.8rem;"><?php echo $no++; ?></td>
                        <td><span class="nim-badge"><?php echo htmlspecialchars($baris['nim_mhs']); ?></span></td>
                        <td style="font-weight:500;"><?php echo htmlspecialchars($baris['nama_mhs']); ?></td>
                        <td><span class="jurusan-tag"><?php echo htmlspecialchars($baris['jurusan_mhs']); ?></span></td>
                        <td>
                            <div class="action-group">
                                <a href="edit_mahasiswa.php?nim=<?php echo urlencode($baris['nim_mhs']); ?>" class="btn btn-warning btn-sm">✏️ Ubah</a>
                                <a href="hapus_mahasiswa.php?nim=<?php echo urlencode($baris['nim_mhs']); ?>"
                                   class="btn btn-danger btn-sm"
                                   onclick="return confirm('Hapus data <?php echo htmlspecialchars($baris['nama_mhs']); ?>?\nTindakan ini tidak dapat dibatalkan.');">
                                   🗑️ Hapus
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
            <?php endif; ?>
        </div>
    </div>

</div><!-- /wrapper -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('document').ready(function() {
        //Kode interaktif diletakan di sini
    });
</script>
</body>
</html>