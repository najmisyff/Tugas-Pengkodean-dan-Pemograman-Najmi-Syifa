<?php include('../db.php'); ?>
<h2>Daftar Peminjaman</h2>
<a href="pinjam.php">Pinjam Buku</a>
<table border="1">
  <tr>
    <th>ID</th><th>Anggota</th><th>Buku</th><th>Tgl Pinjam</th><th>Tgl Kembali</th>
  </tr>
  <?php
  $sql = "SELECT p.id, a.nama, b.judul, p.tgl_pinjam, p.tgl_kembali 
          FROM peminjaman p 
          JOIN anggota a ON p.id_anggota = a.id 
          JOIN buku b ON p.id_buku = b.id";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['nama']}</td>
      <td>{$row['judul']}</td>
      <td>{$row['tgl_pinjam']}</td>
      <td>{$row['tgl_kembali']}</td>
    </tr>";
  }
  ?>
</table>
