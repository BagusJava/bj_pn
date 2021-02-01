<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
// ambil id dari URL
$id = $_GET['id'];

// query siswa berdasarkan id
$s = query("SELECT * FROM tb_siswa WHERE id_siswa = $id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa</title>
</head>

<body>
  <h3>Detail Siswa</h3>
  <ul>
    <li><img src="img/<?= $s['gambar']; ?>" width="250"></li>
    <li>NISN : <?= $s['nisn']; ?></li>
    <li>Nama : <?= $s['nama']; ?></li>
    <li>Alamat : <?= $s['alamat']; ?></li>
    <li>Email : <?= $s['email']; ?></li>
    <li>Jurusan : <?= $s['jurusan']; ?></li>
    <li><a href="ubah.php?id=<?= $s['id_siswa']; ?>">ubah</a> | <a href="hapus.php?id=<?= $s['id_siswa']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a></li>
    <li><a href="index.php">Kembali ke daftar Siswa</a></li>
  </ul>
</body>

</html>