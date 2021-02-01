<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$siswa = query("SELECT * FROM tb_siswa");

// ketika tombol cari diklik
if (isset($_POST['cari'])) {
    $siswa = cari($_POST['keyword']);
}
?>
<html>

<head>
    <title>MEMBUAT CETAK PRINT LAPORAN </title>
</head>

<body>


    <br />

    <script>
        window.print();
    </script>

    <div class="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nama Lengkap</th>
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
                        <a href="detail.php?id=<?= $s['id_siswa']; ?>">lihat detail</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
    <script src="js/script.js"></script>
</body>
</body>

</html>