<?php
include('conn.php');

$status = '';
$result = '';

// Melakukan pengecekan apakah ada data yang dikirimkan melalui GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['Id_Tugas'])) {
        $Id_Tugas = $_GET['Id_Tugas'];
        $query = "SELECT * FROM list_tugas WHERE Id_Tugas = '$Id_Tugas'";
        $result = mysqli_query(connection(), $query);
    }
}

// Melakukan pengecekan apakah ada data yang dikirimkan melalui POST (setelah form disubmit)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mendapatkan nilai dari form
    $Id_Tugas = $_POST['Id_Tugas'];
    $Judul = $_POST['Judul'];
    $Deskripsi = $_POST['Deskripsi'];
    $Status = $_POST['Status'];
    $Tenggat_Waktu = $_POST['Tenggat_Waktu'];
    $Prioritas = $_POST['Prioritas'];
    $Kategori = isset($_POST['Kategori']) ? implode(',', $_POST['Kategori']) : '';
    $Penugasan = $_POST['Penugasan'];
    $Tanggal_Pengerjaan = $_POST['Tanggal_Pengerjaan'];
    $Catatan = $_POST['Catatan'];

    // Melakukan proses validasi dan update data ke dalam database
    $sql = "UPDATE list_tugas SET Judul='$Judul', Deskripsi='$Deskripsi', Status='$Status', Tenggat_Waktu='$Tenggat_Waktu', Prioritas='$Prioritas', Kategori='$Kategori', Penugasan='$Penugasan', Tanggal_Pengerjaan='$Tanggal_Pengerjaan', Catatan='$Catatan' WHERE Id_Tugas='$Id_Tugas'";
    $result = mysqli_query(connection(), $sql);
    
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    // Redirect ke halaman index dengan status update
    header('Location: index.php?status=' . $status);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php if ($result && mysqli_num_rows($result) > 0) : ?>
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
            <h2>Form Update List Tugas</h2>
            <form action="update.php" method="post">
                <?php while ($data = mysqli_fetch_array($result)) : ?>
                    <table class="form-table">
                        <tr>
                            <td>Id Tugas</td>
                            <td><input type="text" name="Id_Tugas" value="<?php echo $data['Id_Tugas']; ?>" class="form-input" readonly></td>
                        </tr>
                        <tr>
                            <td>Judul</td>
                            <td><input type="text" name="Judul" value="<?php echo $data['Judul']; ?>" class="form-input"></td>
                        </tr>
                        <tr>
                            <td>Deskripsi</td>
                            <td><textarea name="Deskripsi" cols="30" rows="10" class="form-textarea"><?php echo $data['Deskripsi']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>
                                <input type="radio" id="BelumSelesai" name="Status" value="Belum Selesai" <?php if ($data['Status'] === 'Belum Selesai') echo 'checked'; ?>>
                                <label for="BelumSelesai">Belum Selesai</label>
                                <input type="radio" id="SedangDikerjakan" name="Status" value="Sedang Dikerjakan" <?php if ($data['Status'] === 'Sedang Dikerjakan') echo 'checked'; ?>>
                                <label for="SedangDikerjakan">Sedang Dikerjakan</label>
                                <input type="radio" id="Selesai" name="Status" value="Selesai" <?php if ($data['Status'] === 'Selesai') echo 'checked'; ?>>
                                <label for="Selesai">Selesai</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Tenggat Waktu</td>
                            <td><input type="date" name="Tenggat_Waktu" value="<?php echo $data['Tenggat_Waktu']; ?>" class="form-input"></td>
                        </tr>
                        <tr>
                            <td>Prioritas</td>
                            <td>
                                <input type="radio" id="Rendah" name="Prioritas" value="Rendah" <?php if ($data['Prioritas'] === 'Rendah') echo 'checked'; ?>>
                                <label for="Rendah">Rendah</label>
                                <input type="radio" id="Sedang" name="Prioritas" value="Sedang" <?php if ($data['Prioritas'] === 'Sedang') echo 'checked'; ?>>
                                <label for="Sedang">Sedang</label>
                                <input type="radio" id="Tinggi" name="Prioritas" value="Tinggi" <?php if ($data['Prioritas'] === 'Tinggi') echo 'checked'; ?>>
                                <label for="Tinggi">Tinggi</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Kategori</td>
                            <td>
                                <input type="checkbox" id="Pekerjaan" name="Kategori[]" value="Pekerjaan" <?php if (strpos($data['Kategori'], 'Pekerjaan') !== false) echo 'checked'; ?>>
                                <label for="Pekerjaan">Pekerjaan</label>
                                <input type="checkbox" id="Sekolah" name="Kategori[]" value="Sekolah" <?php if (strpos($data['Kategori'], 'Sekolah') !== false) echo 'checked'; ?>>
                                <label for="Sekolah">Sekolah</label>
                                <input type="checkbox" id="Pribadi" name="Kategori[]" value="Pribadi" <?php if (strpos($data['Kategori'], 'Pribadi') !== false) echo 'checked'; ?>>
                                <label for="Pribadi">Pribadi</label>
                            </td>
                        </tr>
                        <tr>
                            <td>Penugasan</td>
                            <td>
                                <select name="Penugasan" class="form-select">
                                    <option value="Individu" <?php if ($data['Penugasan'] === 'Individu') echo 'selected'; ?>>Individu</option>
                                    <option value="Tim" <?php if ($data['Penugasan'] === 'Tim') echo 'selected'; ?>>Tim</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Pengerjaan</td>
                            <td><input type="date" name="Tanggal_Pengerjaan" value="<?php echo $data['Tanggal_Pengerjaan']; ?>" class="form-input"></td>
                        </tr>
                        <tr>
                            <td>Catatan</td>
                            <td><textarea name="Catatan" cols="30" rows="5" class="form-textarea"><?php echo $data['Catatan']; ?></textarea></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <div class="form-buttons">
                                    <button type="submit" class="button-save">Simpan</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                <?php endwhile; ?>
            </form>
        </div>
    <?php endif; ?>
</body>

</html>
