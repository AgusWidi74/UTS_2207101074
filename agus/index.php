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

require_once "app/Klik.php";
$klik = new Klik();
$rows = $klik->tampil();

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
if(isset($_GET['no'])) $vno =$_GET['no'];
else $vno ='';
if(isset($_GET['nama'])) $vnama =$_GET['nama'];
else $vnama ='';
if(isset($_GET['alamat'])) $valamat =$_GET['alamat'];
else $valamat ='';
if(isset($_GET['penyakit'])) $vpenyakit =$_GET['penyakit'];
else $vpenyakit ='';
if(isset($_GET['dokter'])) $vdokter =$_GET['dokter'];
else $vdokter ='';

if($vsimpan=='simpan' && ($vno <>''||$vnama <>''||$valamat <>''||$vpenyakit <>''||$vdokter <>'')){
    $klik->simpan();
    $rows = $klik->tampil();
    $vid ='';
    $vno ='';
    $vnama ='';
    $valamat ='';
    $vpenyakit ='';
    $vdokter ='';
}

if($vaksi=="hapus")  {
    $klik->hapus();
    $rows = $klik->tampil();
}
if($vaksi=="cari")  {
    $rows = $klik->cari();
}

 if($vaksi=="lihat_update")  {
    $urows = $klik->tampil_update();
    foreach ($urows as $row) {
        $vid = $row['id_pasien'];
        $vno = $row['no_pasien'];
        $vnama = $row['nama_pasien'];
        $valamat = $row['alamat_pasien'];
        $vpenyakit = $row['penyakit_pasien'];
        $vdokter = $row['detail_id_dokter'];
    }
 }

if ($vupdate=="update"){
    $klik->update($vid,$vno,$vnama,$valamat,$vpenyakit,$vdokter);
    $rows = $klik->tampil();
    $vid ='';
    $vno ='';
    $vnama ='';
    $valamat ='';
    $vpenyakit ='';
    $vdokter ='';
}
if ($vreset=="reset"){
    $vid ='';
    $vno ='';
    $vnama ='';
    $valamat ='';
    $vpenyakit ='';
    $vdokter ='';
}


?>

<form action="?" method="get">
<table>
    <tr><td>NO</td><td>:</td><td>
    <input type="hidden" name="id" value="<?php echo $vid; ?>" /><input type="text" name="no" value="<?php echo $vno; ?>" /></td></tr>
    <tr><td>NAMA</td><td>:</td><td><input type="text" name="nama" value="<?php echo $vnama; ?>"/></td></tr>
    <tr><td>ALAMAT</td><td>:</td><td><input type="text" autocomplete="off" name="alamat" value="<?php echo $valamat; ?>"/></td></tr>
    <tr><td>PENYAKIT</td><td>:</td><td><input type="text" name="penyakit" value="<?php echo $vpenyakit; ?>"/></td></tr>
    <tr><td>DETAIL ID DOKTER</td><td>:</td><td><input type="text" name="dokter" value="<?php echo $vdokter; ?>"/></td></tr>
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
        <td>ID</td>
        <td>NO</td>
        <td>NAMA</td>
        <td>ALAMAT</td>
        <td>PENYAKIT</td>
        <td>DETAIL ID DOKTER</td>
        <td>AKSI</td>
    </tr>

    <?php foreach ($rows as $row) { ?>
        <tr>
            <td><?php echo $row['id_pasien']; ?></td>
            <td><?php echo $row['no_pasien']; ?></td>
            <td><?php echo $row['nama_pasien']; ?></td>
            <td><?php echo $row['alamat_pasien']; ?></td>
            <td><?php echo $row['penyakit_pasien']; ?></td>
            <td><?php echo $row['detail_id_dokter']; ?></td>
            <td><a href="?id_pasien=<?php echo $row['id_pasien']; ?>&aksi=hapus">Hapus</a>&nbsp;&nbsp;&nbsp;
                <a href="?id_pasien=<?php echo $row['id_pasien']; ?>&aksi=lihat_update">Update</a>&nbsp;&nbsp;&nbsp;
                <a href="dokter.php";>Dokter</a>
            </td>

        </tr>
    <?php } ?>
 </table>
</body>
</html>