<?php
session_start();
require 'test_koneksi.php';

// Jika belum login
if (!isset($_SESSION['username'])) {
  header("Location: login.php?status=belum_login");
  exit;
}

// Ambil data jadwal dari DB
$result = mysqli_query($koneksi, "SELECT * FROM mata_kuliah ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Jadwal Mata Kuliah</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="header">
    <h1 class="site-title">Sistem Informasi Jadwal Mata Kuliah</h1>
    <p class="subtitle">Halo, <strong><?php echo htmlspecialchars($_SESSION['username']); ?></strong>! Selamat datang 🎓</p>
    <nav class="navbar">
      <ul class="nav-list">
        <li><a href="#overview">Overview</a></li>
        <li><a href="#jadwal">Jadwal</a></li>
        <li><a href="logout.php" style="color:yellow;">Logout</a></li>
      </ul>
    </nav>
  </header>

  <main class="container">
    <section id="overview" class="card">
      <h2>Overview</h2>
      <p>Sistem ini membantu mahasiswa untuk melihat dan mengelola jadwal kuliah mingguan.</p>
      <button id="toggleOverview" class="btn btn-primary">Sembunyikan Overview</button>
    </section>

    <section id="jadwal" class="card">
      <h2>Jadwal Kuliah</h2>
      <a href="tambah.php" class="btn btn-primary">+ Tambah Jadwal</a>
      <table class="schedule-table">
        <thead>
          <tr>
            <th>Hari</th>
            <th>Waktu</th>
            <th>Mata Kuliah</th>
            <th>Dosen</th>
            <th>Ruang</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_assoc($result)): ?>
          <tr>
            <td><?= htmlspecialchars($row['hari']) ?></td>
            <td><?= htmlspecialchars($row['waktu']) ?></td>
            <td><?= htmlspecialchars($row['nama_mk']) ?></td>
            <td><?= htmlspecialchars($row['dosen']) ?></td>
            <td><?= htmlspecialchars($row['ruang']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn">Edit</a>
              <a href="hapus.php?id=<?= $row['id'] ?>" class="btn" onclick="return confirm('Yakin hapus data?')">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </section>
  </main>

  <footer class="footer">
    <p>&copy; 2025 Sistem Informasi Jadwal Mata Kuliah</p>
    <button id="darkModeToggle" class="btn">🌙 Dark Mode</button>
  </footer>

  <script src="script.js"></script>
</body>
</html>
