<?php
// mengatur koneksi ke database
$host = "localhost";    // nama host database
$username = "root";    // nama pengguna database
$password = "";       // kata sandi pengguna database
$database = "db_point_of_sales";    // nama database
$conn = mysqli_connect($host, $username, $password, $database);

// Mengecek apakah koneksi berhasil
if (!$conn) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// Memasukkan data ke tabel
$sql = "INSERT INTO tbl_m_kategori (nama_kategori, id_kategori) VALUES ('accesories', '12')";
if (mysqli_query($conn, $sql)) {
  echo "Data berhasil ditambahkan";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// Menutup koneksi database
mysqli_close($conn);
?>
