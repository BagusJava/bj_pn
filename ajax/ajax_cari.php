<?php
require '../functions.php';
$siswa = cari($_GET['keyword']);
?>
<table border="1" cellpadding="10" cellspacing="0">
  <tr>
    <th>#</th>
    <th>Gambar</th>
    <th>Nama</th>
    <th>Aksi</th>
  </tr>

  <?php if (empty($siswa)) : ?>
    <tr>
      <td colspan="4">
        <p style="color: red; font-style: italic;">data siswa tidak ditemukan!</p>
      </td>
    </tr>
  <?php endif; ?>

  <?php $i = 1;
  foreach ($siswa as $s) : ?>
    <tr>
      <td><?= $i++; ?></td>
      <td><img src="img/<?= $s['gambar']; ?>" width="60"></td>
      <td><?= $s['nama']; ?></td>
      <td>
        <a href="detail.php?id=<?= $s['id']; ?>">lihat detail</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>