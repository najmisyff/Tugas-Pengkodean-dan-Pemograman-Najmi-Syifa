<?php
include('../db.php');

// Ambil ID dari URL
$id = $_GET['id'];

// Ambil data buku dari database
$query = $conn->query("SELECT * FROM buku WHERE id = $id");
$buku = $query->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Tangkap data dari form
  $judul     = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit  = $_POST['penerbit'];
  $tahun     = $_POST['tahun'];

  // Update data buku
  $sql = "UPDATE buku SET 
            judul = '$judul', 
            pengarang = '$pengarang', 
            penerbit = '$penerbit', 
            tahun = '$tahun'
          WHERE id = $id";

  $conn->query($sql);
  header("Location: list.php");
}
?>

<h2>Edit Buku</h2>
<form method="post">
  Judul: <input type="text" name="judul" value="<?= $buku['judul'] ?>" required><br>
  Pengarang: <input type="text" name="pengarang" value="<?= $buku['pengarang'] ?>" required><br>
  Penerbit: <input type="text" name="penerbit" value="<?= $buku['penerbit'] ?>" required><br>
  Tahun: <
