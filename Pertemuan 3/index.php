<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <title>Sistem Perpustakaan</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f2f2f2;
      padding: 20px;
    }
    h1 {
      color: #333;
    }
    .menu {
      margin-top: 20px;
    }
    .menu a {
      display: inline-block;
      margin: 10px;
      padding: 12px 24px;
      background: #3498db;
      color: white;
      text-decoration: none;
      border-radius: 8px;
      transition: 0.2s;
    }
    .menu a:hover {
      background: #2980b9;
    }
  </style>
</head>
<body>

  <h1>Selamat Datang di Sistem Perpustakaan</h1>

  <div class="menu">
    <a href="anggota/list.php">Kelola Anggota</a>
    <
