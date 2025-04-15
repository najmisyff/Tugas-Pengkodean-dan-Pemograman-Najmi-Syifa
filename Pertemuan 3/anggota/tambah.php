<?php
include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

  $sql = "INSERT INTO anggota (nama, alamat, no_hp)
          VALUES ('$nama', '$alamat', '$no_hp')";
  $conn->query($sql);
  header("Location: list.php");
}
?>

<h2>Tambah Anggota</h2>
<form method="post">
  Nama: <input type="text" name="nama" required><br>
  Alamat: <textarea name="alamat" required></textarea><br>
  No HP: <input type="text" name="no_hp" required><br>
  <button type="submit">Simpan</button>
</form>
