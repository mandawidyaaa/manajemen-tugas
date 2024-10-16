<?php
function connection() {
   // membuat koneksi ke database system
   $host = 'localhost';
   $username = 'root';
   $password = '';
   $dbName = "manajemen_tugas";

   // Membuat koneksi
   $conn = mysqli_connect($host, $username, $password, $dbName);

   // Periksa koneksi
   if ($conn->connect_error) {
      die("Koneksi gagal: " . $conn->connect_error);
  }

  // Mengembalikan objek koneksi
  return $conn;
}
