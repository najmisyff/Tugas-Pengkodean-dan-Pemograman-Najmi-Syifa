<?php include('../db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_anggota = $_POST['id_anggota'];
  $id_buku = $_POST['id_buku'];
  $tgl_pinjam = $_POST['tgl_pinjam'];
  $tgl_kembali = $_POST['tgl_kembali'];

  $conn->query("INSERT INTO peminjaman (id_anggota, id_buku, tgl_pinjam, tgl_kembali)
                VALUES ('$id_anggota', '$id_buku', '$tgl_pinjam', '$tgl_kembali')");
  header("Location: list.php");
}

$anggota = $conn->query("SELECT * FROM anggota");
$buku = $conn->query("SELECT * FROM buku");
?>

<h2>Form Peminjaman</h2>
<form method="post">
  Anggota:
  <select name="id_anggota">
    <?php while($a = $anggota->fetch_assoc()) {
      echo "<option value='{$a['id']}'>{$a['nama']}</option>";
    } ?>
  </select><br>

  Buku:
  <select name="id_buku">
    <?php while($b = $buku->fetch_assoc()) {
      echo "<option value='{$b['id']}'>{$b['judul']}</option>";
    } ?>
  </select><br>

  Tanggal Pinjam: <input type="date" name="tgl_pinjam"><br>
  Tanggal Kembali: <input type="date" name="tgl_kembali"><br>
  <button type="submit">Pinjam</button>
</form>
