<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = "DELETE FROM mata_kuliah WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
    header("Location: index.php");
    exit;
} else {
    echo "Gagal menghapus data: " . mysqli_error($koneksi);
}
?>
