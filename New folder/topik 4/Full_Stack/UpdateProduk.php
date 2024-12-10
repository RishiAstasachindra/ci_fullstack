<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_point_of_sales";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Memperbarui data pada tabel
$sql = "UPDATE tbl_m_Produk SET nama_produk='Kaos Superman', id_kategori='12', id_satuan='3', 
barcode='333', harga_beli='15000', harga_pokok='20000', harga_jual='30000', is_status='1' WHERE id_produk=3";

if (mysqli_query($conn, $sql)) {
    echo "Data berhasil diperbarui";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// Menutup koneksi
mysqli_close($conn);
?>
