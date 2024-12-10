<?php
//koneksi ke database
// mengatur koneksi ke database
$host = "localhost";    // nama host database
$username = "root";    // nama pengguna database
$password = "";       // kata sandi pengguna database
$database = "db_point_of_sales";    // nama database
$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
//query DELETE
$sql = "DELETE FROM tbl_m_produk WHERE id_produk=3";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil dihapus";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
//menutup koneksi
mysqli_close($conn);
?>