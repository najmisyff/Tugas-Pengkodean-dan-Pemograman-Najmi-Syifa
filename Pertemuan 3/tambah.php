<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = $_POST['judul'];
  $pengarang = $_POST['pengarang'];
  $penerbit = $_POST['penerbit'];
  $tahun = $_POST['tahun'];

  $sql = "INSERT INTO buku (judul, pengarang, penerbit, tahun)
          VALUES ('$judul', '$pengarang', '$penerbit', '$tahun')";
  $conn->query($sql);
  header("Location: list.php");
}
?>

<h2>Tambah Buku</h2>
<form method="post">
  Judul: <input type="text" name="judul"><br>
  Pengarang: <input type="text" name="pengarang"><br>
  Penerbit: <input type="text" name="penerbit"><br>
  Tahun: <input type="number" name="tahun"><br>
  <button type="submit">Simpan</button>
</form>
