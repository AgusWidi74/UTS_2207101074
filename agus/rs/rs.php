<?php
class rs {
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
        $sql = "SELECT * FROM rumahsakit";
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
        $sql = "insert into rumahsakit values ('','".$_GET['idp']."','".$_GET['nama']."','".$_GET['alamat']."','".$_GET['telp']."')";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DISIMPAN !";
    } 
    public function hapus()
    {
        $sqls = "delete from rumahsakit where id_rumahsakit='".$_GET['id_rumahsakit']."'";
        $stmts = $this->db->prepare($sqls);
        $stmts->execute();
        echo "DATA BERHASIL DIHAPUS !";
    }      
    public function tampil_update()
    {
        $sql = "SELECT * FROM rumahsakit where id_rumahsakit='".$_GET['id_rumahsakit']."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $data = [];
        while ($rows = $stmt->fetch()) {
            $data[] = $rows;
            }
        return $data;
    }
    public function update($id,$idp,$nama,$alamat,$telp)
    {
        $sql = "update rumahsakit set id_pasien='".$idp."', nama_rs='".$nama."', alamat='".$alamat."', no_telp='".$telp."' where id_rumahsakit='".$id."'";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        echo "DATA BERHASIL DIUPDATE !";
    } 
    public function cari($nama){
        $sql = "SELECT * FROM id_rumahsakit WHERE nama_rs LIKE '%".$nama."%'
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
?>