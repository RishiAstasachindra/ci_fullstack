<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_point_of_sales";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk insert data
$sql = "INSERT INTO tbl_m_produk (id_produk, nama_produk, id_kategori, id_satuan, barcode, harga_beli, harga_pokok, harga_jual, is_status) 
        VALUES ('3', 'Kaos', '1', '1', '3', '20000', '30000', '50000', '1')";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diinsert";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// Tutup koneksi
mysqli_close($conn);
?>