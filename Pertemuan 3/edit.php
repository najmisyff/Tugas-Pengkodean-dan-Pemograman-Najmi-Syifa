<?php
include('../db.php');

$id = $_GET['id'];
$query = $conn->query("SELECT * FROM anggota WHERE id = $id");
$data = $query->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $alamat = $_POST['alamat'];
  $no_hp = $_POST['no_hp'];

  $sql = "UPDATE anggota SET nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id=$id";
  $conn->query($sql);
  header("Location: list.php");
}
?>

<h2>Edit Anggota</h2>
<form method="post">
  Nama: <input type="text" name="nama" value="<?= $data['nama'] ?>" required><br>
  Alamat: <textarea name="alamat" required><?= $data['alamat'] ?></textarea><br>
  No HP: <input type="text" name="no_hp" value="<?= $data['no_hp'] ?>" required><br>
  <button type="submit">Update</button>
</form>
