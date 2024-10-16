<?php
include('conn.php');

// Melakukan pengecekan apakah ada data yang dikirim melalui metode POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Melakukan validasi terhadap parameter Id_Tugas untuk mencegah SQL injection
    $Id_Tugas = mysqli_real_escape_string(connection(), $_POST['Id_Tugas']);

    // Query DELETE untuk menghapus data berdasarkan Id_Tugas
    $query = "DELETE FROM list_tugas WHERE Id_Tugas = '$Id_Tugas'";

    // Eksekusi query DELETE
    $result = mysqli_query(connection(), $query);

    // Mengecek apakah proses DELETE berhasil atau gagal
    if ($result) {
        // Redirect ke halaman index.php setelah berhasil menghapus data
        header('Location: index.php');
        exit(); // Penting untuk menghentikan eksekusi script setelah melakukan redirect
    } else {
        // Jika proses DELETE gagal, tampilkan pesan error
        echo '<div class="error">ERROR!, data gagal dihapus</div>';
    }
} else {
    // Jika tidak ada data yang dikirim melalui metode POST, tampilkan pesan error
    echo '<div class="error">ERROR!, data tidak ditemukan</div>';
}
?>
