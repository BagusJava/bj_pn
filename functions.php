<?php
function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'db_bj_pwpb');
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query);
  // jika hasilnya hanya 1 data

  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
function upload()
{
  $nama_file = $_FILES['gambar']['name'];
  $tipe_file = $_FILES['gambar']['type'];
  $ukuran_file = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmp_file = $_FILES['gambar']['tmp_name'];

  // ketika tidak ada gambar yang dipilih
  if ($error == 4) {
    // echo "<script>
    //         alert('pilih gambar terlebih dahulu!');
    //       </script>";
    return 'nophoto.jpg';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  $ekstensi_file = strtolower(end($ekstensi_file));

  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert('yang anda pilih bukan gambar!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5Mb == 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
            alert('ukuran terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan
  // siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  move_uploaded_file($tmp_file, 'img/' . $nama_file_baru);

  return $nama_file_baru;
}



function tambah($data)
{
  $conn = koneksi();
  $nisn = htmlspecialchars($data['nisn']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  //$gambar = htmlspecialchars($data['gambar']);
  // upload gambar
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query =  "INSERT INTO tb_siswa VALUES
            (NULL, '$nisn','$nama','$alamat','$email','$jurusan','$gambar');
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  // menghapus gambar di folder img
  $s = query("SELECT * FROM tb_siswa WHERE id = $id");
  if ($s['gambar'] != 'nophoto.jpg') {
    unlink('img/' . $s['gambar']);
  }


  mysqli_query($conn, "DELETE FROM tb_siswa WHERE id_siswa = $id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function ubah($data)
{
  $conn = koneksi();
  $id = $data['id'];
  $nisn = htmlspecialchars($data['nisn']);
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $email = htmlspecialchars($data['email']);
  $jurusan = htmlspecialchars($data['jurusan']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'nophoto.jpg') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE tb_siswa SET
              nisn = '$nisn',
              nama = '$nama',
              alamat = '$alamat',
              email = '$email',
              jurusan = '$jurusan',
              gambar = '$gambar'
            WHERE id_siswa = $id";
  echo $query;
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  echo mysqli_error($conn);
  return mysqli_affected_rows($conn);
}

function cari($keyword)
{
  $conn = koneksi();
  $query = "SELECT * FROM tb_siswa WHERE 
              nama LIKE '%$keyword%'OR
              nisn LIKE '%$keyword%'";
  $result = mysqli_query($conn, $query);
  $rows =  [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}


function login($data)
{
  $conn = koneksi();
  $username = htmlspecialchars($data['username']);
  $password = htmlspecialchars($data['password']);
  // cek dulu username 
  if ($user = query("SELECT * FROM tb_user WHERE username = '$username'")) {
    // cek password
    if (password_verify($password, $user['password'])) {
      // set session
      $_SESSION['login'] = true;
      header("Location: index.php");
      exit;
    }
  }
  return [
    'error' => true,
    'pesan' => 'Username / Password Salah!'
  ];
}


function registrasi($data)
{
  $conn = koneksi();
  $username = htmlspecialchars(strtolower($data['username']));
  $password1 = mysqli_real_escape_string($conn, $data['password1']);
  $password2 = mysqli_real_escape_string($conn, $data['password2']);
  //jika username / password kosong
  if (empty($username) || empty($password1) || empty($password2)) {
    echo "<script>
          alert('username / password tidak boleh  kosong!');
          document.location.href = 'registrasi.php';
          </script>";
    return false;
  }

  //jika username sudah aada
  if (query("SELECT * FROM tb_user WHERE username = '$username'")) {
    echo "<script>
    alert('username sudah terdaftar!');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }
  //jika konfirmasi password tidak sesuai
  if ($password1 !== $password2) {
    echo "<script>
    alert('konfirmasi password tidak sesuai!');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  // jika password <5 digit
  if (strlen($password1) < 5) {
    echo "<script>
    alert('password terlalu pendek!');
    document.location.href = 'registrasi.php';
    </script>";
    return false;
  }

  //jika username dan password sudah sesuai
  //enkripsi password
  $password_baru = password_hash($password1, PASSWORD_DEFAULT);
  //Inser ke table user
  $query = "INSERT INTO tb_user 
              VALUES
              (null, '$username', '$password_baru')
              ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}
