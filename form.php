<?php
include('conn.php');

$status = '';
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Id_Tugas = $_POST['Id_Tugas'];
    $Judul = $_POST['Judul'];
    $Deskripsi = $_POST['Deskripsi'];
    $Status = $_POST['Status'];
    $Tenggat_Waktu = $_POST['Tenggat_Waktu'];
    $Prioritas = $_POST['Prioritas'];
    // Menggunakan array untuk menyimpan nilai Kategori yang dipilih
    $Kategori = isset($_POST['Kategori']) ? implode(',', (array)$_POST['Kategori']) : '';
    $Penugasan = $_POST['Penugasan'];
    $Tanggal_Pengerjaan = $_POST['Tanggal_Pengerjaan'];
    $Catatan = $_POST['Catatan'];

    $query = "INSERT INTO list_tugas (Id_Tugas, Judul, Deskripsi, Status, Tenggat_Waktu, Prioritas, Kategori, Penugasan, Tanggal_Pengerjaan, Catatan) 
    VALUES ('$Id_Tugas', '$Judul', '$Deskripsi', '$Status', '$Tenggat_Waktu', '$Prioritas', '$Kategori', '$Penugasan', '$Tanggal_Pengerjaan', '$Catatan')";

    $result = mysqli_query(connection(), $query);
    if ($result) {
        $status = 'ok';
        $message = 'Data berhasil ditambahkan';
    } else {
        $status = 'err';
        $message = 'Gagal menambahkan data';
    }
    // Menambahkan script JavaScript untuk menampilkan alert box setelah data berhasil ditambahkan
    echo "<script>alert('$message');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas - Tambah Data</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <h1 class="heading">Manajemen Tugas</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="index.php" class="button-back">Kembali</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container form-container">
        <h2>Form List Tugas</h2>
        <form action="form.php" method="post">
            <table class="form-table">
            <tr>
                    <td>Id Tugas</td>
                    <td><input type="text" name="Id_Tugas" class="form-input"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="Judul" required class="form-input"></td>
                </tr>
                <tr>
                    <td>Deskripsi</td>
                    <td><textarea name="Deskripsi" cols="30" rows="10" class="form-textarea"></textarea></td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td colspan="2">
                        <input type="radio" id="BelumSelesai" name="Status" value="Belum Selesai">
                        <label for="BelumSelesai">Belum Selesai</label>
                        <input type="radio" id="SedangDikerjakan" name="Status" value="Sedang Dikerjakan">
                        <label for="SedangDikerjakan">Sedang Dikerjakan</label>
                        <input type="radio" id="Selesai" name="Status" value="Selesai">
                        <label for="Selesai">Selesai</label>
                    </td>
                </tr>
                <tr>
                    <td>Tenggat Waktu</td>
                    <td><input type="date" name="Tenggat_Waktu" class="form-input"></td>
                </tr>
                <tr>
                    <td>Prioritas</td>
                    <td colspan="2">
                        <input type="radio" id="Rendah" name="Prioritas" value="Rendah">
                        <label for="Rendah">Rendah</label>
                        <input type="radio" id="Sedang" name="Prioritas" value="Sedang">
                        <label for="Sedang">Sedang</label>
                        <input type="radio" id="Tinggi" name="Prioritas" value="Tinggi">
                        <label for="Tinggi">Tinggi</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Kategori</label></td>
                    <td colspan="2">
                        <input type="checkbox" id="Pekerjaan"
                        <label for="Pekerjaan">Pekerjaan</label>
                        <input type="checkbox" id="Sekolah" name="Kategori[]" value="Sekolah">
                        <label for="Sekolah">Sekolah</label>
                        <input type="checkbox" id="Pribadi" name="Kategori[]" value="Pribadi">
                        <label for="Pribadi">Pribadi</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Penugasan</label></td>
                    <td colspan="2">
                        <select name="Penugasan" class="form-select">
                            <option value="Individu">Individu</option>
                            <option value="Kelompok">Kelompok</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Tanggal Pengerjaan</td>
                    <td><input type="date" name="Tanggal_Pengerjaan" class="form-input"></td>
                </tr>
                <tr>
                    <td>Catatan</td>
                    <td><textarea name="Catatan" cols="30" rows="10" class="form-textarea"></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="SIMPAN" class="button-save"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
