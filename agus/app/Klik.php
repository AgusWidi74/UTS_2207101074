<?php
class Klik {
public $db;
public function __construct()
{
try {

$this->db =
new PDO("mysql:host=localhost;dbname=klinik", "root", "");
} catch (PDOException $e) {
 die ("Error " . $e->getMessage());
 }
}
public function tampil()
    {
        $sql = "SELECT * FROM tb_pasien";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }

    public function simpan()
    {
        $sql = "insert into tb_pasien values ('','".$_GET['no']."','".$_GET['nama']."','".$_GET['alamat']."','".$_GET['penyakit']."','".$_GET['dokter']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 

    public function hapus()
    {
        $sqls = "delete from tb_pasien where id_pasien='".$_GET['id_pasien']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM tb_pasien where id_pasien='".$_GET['id_pasien']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id, $no,$nama,$alamat,$penyakit,$dokter)
    {
        $sql = "update tb_pasien set no_pasien='".$no."', nama_pasien='".$nama."', alamat_pasien='".$alamat."', penyakit_pasien='".$penyakit."', detail_id_dokter='".$dokter."' where id_pasien='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM tb_pasien WHERE nama_pasien LIKE '%".$nama."%'
        ";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }  

 }