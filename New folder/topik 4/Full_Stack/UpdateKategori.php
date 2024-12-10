<?php
// mengatur koneksi ke database
$host = "localhost";    // nama host database
$username = "root";    // nama pengguna database
$password = "";       // kata sandi pengguna database
$database = "db_point_of_sales";    // nama database
$conn = mysqli_connect($host, $username, $password, $database);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memperbarui data pada tabel
$sql = "UPDATE tbl_m_kategori SET nama_kategori=' Toolkit' WHERE id_kategori=12";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// Menutup koneksi
mysqli_close($conn);
?>
