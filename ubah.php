<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}
require 'functions.php';
// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: index.php");
  exit;
}
// ambil id dari url
$id = $_GET['id'];

// query Siswa berdasarkan id
$s = query("SELECT * FROM tb_siswa WHERE id_siswa = $id");

// cek apakah tombol ubah sudah ditekan
if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('data berhasil diubah');
            document.location.href = 'index.php';
         </script>";
  } else {
    echo "data gagal diubah!";
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Siswa</title>
</head>

<body>
  <h3>Form Ubah Data Siswa</h3>
  <form action="" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $s['id_siswa']; ?>">
    <ul>
      <li>
        <label>
          NISN :
          <input type="text" name="nisn" required value="<?= $s['nisn']; ?>">
        </label>
      </li>
      <li>
        <label>
          Nama :
          <input type="text" name="nama" autofocus required value="<?= $s['nama']; ?>">
        </label>
      </li>
      <li>
        <label>
          Alamat :
          <input type="text" name="alamat" required value="<?= $s['alamat']; ?>">
        </label>
      </li>
      <li>
        <label>
          Email :
          <input type="text" name="email" required value="<?= $s['email']; ?>">
        </label>
      </li>
      <li>
        <label>
          Jurusan :
          <input type="text" name="jurusan" required value="<?= $s['jurusan']; ?>">
        </label>
      </li>
      <li>
        <input type="hidden" name="gambar_lama" value="<?= $s['gambar']; ?>">
        <label>
          Gambar :
          <input type="file" name="gambar" class="gambar" onchange="previewImage()">
        </label>
        <img src="img/<?= $s['gambar']; ?>" width="120" style="display: block;" class="img-preview">
      </li>
      <li>
        <button type="submit" name="ubah">Ubah Data!</button>
      </li>
    </ul>
  </form>

  <script src="js/script.js"></script>
</body>

</html>