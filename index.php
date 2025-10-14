<?php
include 'koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Jadwal Kuliah</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="header">
    <h1 class="site-title">Sistem Informasi Jadwal Mata Kuliah</h1>
    <p class="subtitle">Jadwal kuliah terkini — pastikan kamu tidak melewatkan mata kuliah hari ini!</p>
  </div >
  <div class="container">
    <section id="jadwal" class="card">
      <a href="tambah.php" class="btn btn-primary">➕ Tambah Jadwal</a>
      <table class="schedule-table">
        <tr style="background:#004080; color:white;">
          <th>No</th>
          <th>Hari</th>
          <th>Waktu</th>
          <th>Mata Kuliah</th>
          <th>Dosen</th>
          <th>Ruang</th>
          <th>Aksi</th>
        </tr>
        <?php
        $no = 1;
        $query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah ORDER BY id ASC");
        while ($row = mysqli_fetch_assoc($query)) {
        ?>
        <tr>
          <td><?= $no++; ?></td>
          <td><?= $row['hari']; ?></td>
          <td><?= $row['waktu']; ?></td>
          <td><?= $row['nama_mk']; ?></td>
          <td><?= $row['dosen']; ?></td>
          <td><?= $row['ruang']; ?></td>
          <td>
            <a href="edit.php?id=<?= $row['id']; ?>">✏️ Edit</a> |
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus data ini?');">🗑️ Hapus</a>
          </td>
        </tr>
        <?php } ?>
      </table>
    </section>
  </div>
  <footer class="footer">
    <p>&copy; 2025 Sistem Informasi Jadwal Mata Kuliah</p>
    <button id="darkModeToggle" class="btn">🌙 Dark Mode</button>
  </footer>
</body>
</html>
