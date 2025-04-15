<?php include('../db.php'); ?>
<h2>Daftar Anggota</h2>
<a href="tambah.php">Tambah Anggota</a>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>ID</th><th>Nama</th><th>Alamat</th><th>No HP</th><th>Aksi</th>
  </tr>
  <?php
  $query = $conn->query("SELECT * FROM anggota");
  while ($row = $query->fetch_assoc()) {
    echo "<tr>
      <td>{$row['id']}</td>
      <td>{$row['nama']}</td>
      <td>{$row['alamat']}</td>
      <td>{$row['no_hp']}</td>
      <td>
        <a href='edit.php?id={$row['id']}'>Edit</a>
      </td>
    </tr>";
  }
  ?>
</table>
