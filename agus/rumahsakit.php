<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Data Mahasiswa</title>
</head>
<body>
<?php

require_once "rs/rs.php";
$rs = new rs();
$rows = $rs->tampil();

if(isset($_GET["cari"])){
    $rows = $klik->cari($_GET["nama"]);
}

if(isset($_GET['simpan'])) $vsimpan =$_GET['simpan'];
else $vsimpan ='';
if(isset($_GET['update'])) $vupdate =$_GET['update'];
else $vupdate ='';
if(isset($_GET['reset'])) $vreset =$_GET['reset'];
else $vreset ='';
if(isset($_GET['aksi'])) $vaksi =$_GET['aksi'];
else $vaksi ='';
if(isset($_GET['id'])) $vid =$_GET['id'];
else $vid ='';
if(isset($_GET['idp'])) $vidp =$_GET['idp'];
else $vidp ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';
if(isset($_GET['telp'])) $vtelp =$_GET['telp'];
else $vtelp ='';

if($vsimpan=='simpan' && ($vidp <>''||$vnama <>''||$valamat <>''||$vtelp <>'')){
    $rs->simpan();
    $rows = $rs->tampil();
    $vid ='';
    $vidp ='';
    $vnama ='';
    $valamat ='';
    $vtelp ='';
}

if($vaksi=="hapus")  {
    $rs->hapus();
    $rows = $rs->tampil();
}
if($vaksi=="cari")  {
    $rows = $rs->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $rs->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_rumahsakit'];
        $vidp = $row['id_pasien'];
        $vnama = $row['nama_rs'];
        $valamat = $row['alamat'];
        $vtelp = $row['no_telp'];
    }
 }

if ($vupdate=="update"){
    $rs->update($vid,$vidp,$vnama,$valamat,$vtelp);
    $rows = $rs->tampil();
    $vid ='';
    $vidp ='';
    $vnama ='';
    $valamat ='';
    $vtelp ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vidp ='';
    $vnama ='';
    $valamat ='';
    $vtelp ='';
}


?>

<form action="?" method="get">
<table>
    <tr><td>ID.PASIEN</td><td>:</td><td><input type="text" name="idp" value="<?php echo $vidp; ?>"/></td></tr>
    <tr><td>NAMA RS</td><td>:</td><td><input type="text" autocomplete="off" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>ALAMAT</td><td>:</td><td><input type="text" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td>NO.TLP</td><td>:</td><td><input type="text" name="telp" value="<?php echo $vtelp; ?>"/></td></tr>
    <tr><td></td><td></td><td>
    <input type="submit" name='simpan' value="simpan"/>
    <input type="submit" name='update' value="update"/>
    <input type="submit" name='reset' value="reset"/>
    <input type="submit" name='cari' value="cari"/>
    </td></tr>
</table>
</form>



    <table border="1px">
    <tr>
        <td>ID.PASIEN</td>
        <td>NAMA RS</td>
        <td>ALAMAT</td>
        <td>NO.TLP</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_rumahsakit']; ?></td>
            <td><?php echo $row['id_pasien']; ?></td>
            <td><?php echo $row['nama_rs']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['no_telp']; ?></td>
            <td><a href="?id_rumahsakit=<?php echo $row['id_rumahsakit']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_rumahsakit=<?php echo $row['id_rumahsakit']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="dokter.php";>Dokter</a>
            </td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>