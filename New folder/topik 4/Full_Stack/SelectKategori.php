<?php
// mengatur koneksi ke database
$host = "localhost"; // nama host database
$username = "root"; // nama pengguna database
$password = ""; // kata sandi pengguna database
$database = "db_point_of_sales"; // nama database

// membuat koneksi
$conn = mysqli_connect($host, $username, $password, $database);
// memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// membuat query SELECT
$sql = "SELECT * FROM tbl_m_kategori";

// menjalankan query
$result = mysqli_query($conn, $sql);

// memeriksa apakah query mengembalikan hasil
if (mysqli_num_rows($result) > 0) {
    // output data setiap baris
    while($row = mysqli_fetch_assoc($result)) {
        echo "ID: " . $row["id_kategori"]. " - Nama Kategori: " . $row["nama_kategori"]. "<br>";
    }
} else {
    echo "0 results";
}
// menutup koneksi
mysqli_close($conn);
?>