<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Detail Dokter</title>
</head>
<body>
<?php

require_once "fungsi/fungsi.php";
$baru = new baru();
$rows = $baru->tampil();

?>

<div class="data">
    <h1>Detail Dokter</h1>
    <table border="1" cellspacing="0" cellpadding="0">
    <tr>
        <td>ID Dokter</td>
        <td>Nama dokter</td>
        <td>Alamat</td>
        <td>Email</td>
        <td>Aksi</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_dokter']; ?></td>
            <td><?php echo $row['nama_dokter']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><a href="index.php";>Kembali</a></td>
        </tr>
    <?php } ?>
 </table>
 </div>
</body>
</html>