<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $mata_kuliah = $_POST['mata_kuliah'];
    $dosen = $_POST['dosen'];
    $ruang = $_POST['ruang'];

    $query = "INSERT INTO mata_kuliah (hari, waktu, nama_mk, dosen, ruang) 
              VALUES ('$hari', '$waktu', '$mata_kuliah', '$dosen', '$ruang')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Jadwal</title>
  <link rel="stylesheet" href="style2.css"></link>
</head>
<body>
  <div class="container">
    <section id="jadwal" class="card">
      <h2>Tambah Jadwal Kuliah</h2>
      <form method="POST">
        <label>Hari:</label><br>
        <input type="text" name="hari" required><br>
        <label>Waktu:</label><br>
        <input type="text" name="waktu" required><br>
        <label>Mata Kuliah:</label><br>
        <input type="text" name="mata_kuliah" required><br>
        <label>Dosen:</label><br>
        <input type="text" name="dosen" required><br>
        <label>Ruang:</label><br>
        <input type="text" name="ruang" required><br><br>
        <button type="submit" name="simpan">Simpan</button>
      </form>
      <br>
      <a href="index.php" class="kembali">⬅️ Kembali</a>
    </section>
  </div>
</body>
</html>

