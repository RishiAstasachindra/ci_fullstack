<?php
//koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_point_of_sales";

$conn = new mysqli($servername, $username, $password, $dbname);

//cek koneksi
if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
//query select data dari tabel
$sql = "SELECT * FROM tbl_m_produk";
$result = $conn->query($sql);

//menampilkan hasil query
if ($result->num_rows > 0) {
  // output data dari setiap baris
  while($row = $result->fetch_assoc()) {
    echo "ID PRODUK: " . $row["id_produk"]. " - NAMA PRODUK: " . $row["nama_produk"]. " - ID KATEGORI: " . $row["id_kategori"]. 
    " - ID SATUAN: " . $row["id_satuan"]. " - BARCODE : " . $row["barcode"]. " - HARGA BELI: " . $row["harga_beli"]. 
    " - HARGA POKOK: " . $row["harga_pokok"]. " - HARGA JUAL: " . $row["harga_jual"]. " - IS STATUS: " . $row["is_status"]. "<br>";
  }
} else {
  echo "Tidak ada data yang ditemukan";
}
$conn->close();
?>