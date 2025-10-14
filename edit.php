<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM mata_kuliah WHERE id='$id'");
$data = mysqli_fetch_assoc($query);

if (isset($_POST['update'])) {
    $hari = $_POST['hari'];
    $waktu = $_POST['waktu'];
    $mata_kuliah = $_POST['nama_mk'];
    $dosen = $_POST['dosen'];
    $ruang = $_POST['ruang'];

    $update = mysqli_query($koneksi, 
      "UPDATE mata_kuliah SET 
       hari='$hari', waktu='$waktu', nama_mk='$mata_kuliah', dosen='$dosen', ruang='$ruang' 
       WHERE id='$id'");

    if ($update) {
        header("Location: index.php");
        exit;
    } else {
        echo "Gagal memperbarui data: " . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Jadwal</title>
  <link rel="stylesheet" href="style2.css"></link>
</head>
<body>
  <div class="container">
    <section id="jadwal" class="card">
      <h2>Edit Jadwal Kuliah</h2>
      <form method="POST">
        <label>Hari:</label><br>
        <input type="text" name="hari" value="<?= $data['hari']; ?>" required><br>
        <label>Waktu:</label><br>
        <input type="text" name="waktu" value="<?= $data['waktu']; ?>" required><br>
        <label>Mata Kuliah:</label><br>
        <input type="text" name="nama_mk" value="<?= $data['nama_mk']; ?>" required><br>
        <label>Dosen:</label><br>
        <input type="text" name="dosen" value="<?= $data['dosen']; ?>" required><br>
        <label>Ruang:</label><br>
        <input type="text" name="ruang" value="<?= $data['ruang']; ?>" required><br><br>
        <button id="toggleOverview" class="btn btn-primary" type="submit" name="update">Perbarui</button>
      </form>
      <br>
      <a href="index.php" class="kembali">⬅️ Kembali</a>
    </section>
  </div>
</body>
</html>
