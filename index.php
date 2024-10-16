<?php
// Mulai sesi
session_start();

include ('conn.php'); 
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Tugas</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <?php
    //proses menampilkan data dari database:
    //siapkan query SQL
    $query = "SELECT * FROM list_tugas";
    $result = mysqli_query(connection(), $query); ?>
    <?php
    //mengecek apakah proses update dan delete sukses/gagal
    if (@$_GET['status'] !== NULL) {
        $status = $_GET['status'];
        if ($status == 'ok') {
            echo '<div class="success">Sukses!, data berhasil disimpan</div>';
        } elseif ($status == 'err') {
            echo '<div class="error">ERROR!, data gagal disimpan</div>';
        }
    }
    ?>

    <header class="header">
        <nav class="navbar">
            <div class="logo">
                <h1 class="heading">Manajemen Tugas</h1>
            </div>
            <div class="menu">
                <ul>
                    <li><a href="form.php" class="button tambah-data">Tambah Data</a></li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Id Tugas</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Status</th>
                    <th>Tenggat Waktu</th>
                    <th>Prioritas</th>
                    <th>Kategori</th>
                    <th>Penugasan</th>
                    <th>Tanggal_Pengerjaan</th>
                    <th>Catatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($data = mysqli_fetch_array($result)) : ?>                                                             
                    <tr>
                        <td><?php echo $data['Id_Tugas'];  ?></td>
                        <td><?php echo $data['Judul'];  ?></td>
                        <td><?php echo $data['Deskripsi'];  ?></td>
                        <td><?php echo $data['Status'];  ?></td>
                        <td><?php echo $data['Tenggat_Waktu'];  ?></td>
                        <td><?php echo $data['Prioritas'];  ?></td>
                        <td><?php echo $data['Kategori'];  ?></td>
                        <td><?php echo $data['Penugasan'];  ?></td>
                        <td><?php echo $data['Tanggal_Pengerjaan'];  ?></td>
                        <td><?php echo $data['Catatan'];  ?></td>
                        <td>
                            <form action="update.php" method="GET">
                                <input type="hidden" name="Id_Tugas" value="<?php echo $data['Id_Tugas']; ?>">
                                <button type="submit" class="button-update">UPDATE</button>
                             </form>
                             <br>
                             <form action="delete.php" method="POST">
                                <input type="hidden" name="Id_Tugas" value="<?php echo $data['Id_Tugas']; ?>">
                                <button type="submit" class="button-delete">DELETE</button>
                            </form>
                        </td>

                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>
