<?php include('../db.php'); ?>
<h2>Daftar Buku</h2>
<a href="tambah.php">Tambah Buku</a>
<table border="1">
  <tr>
    <th>ID</th><th>Judul</th><th>Pengarang</th><th>Penerbit</th><th>Tahun</th><th>Aksi</th>
  </tr>
  <?php
  $data = $conn->query("SELECT * FROM buku");
  while($b = $data->fetch_assoc()){
    echo "<tr>
      <td>{$b['id']}</td>
      <td>{$b['judul']}</td>
      <td>{$b['pengarang']}</td>
      <td>{$b['penerbit']}</td>
      <td>{$b['tahun']}</td>
      <td><a href='edit.php?id={$b['id']}'>Edit</a></td>
    </tr>";
  }
  ?>
</table>
