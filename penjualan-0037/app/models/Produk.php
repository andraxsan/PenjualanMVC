<?php
require_once 'config/database.php';

class Produk
{
    private $conn;
    private $table_name = "produk";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function readAll()
    {
        $query = "SELECT * FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
    public function getByKode($kode_barang)
    {
        $query = "SELECT * FROM " . $this->table_name . " WHERE kode_barang = :kode_barang";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update($kode_barang, $nama_barang, $harga, $stok)
    {
        $query = "UPDATE " . $this->table_name . " SET nama_barang = :nama_barang, harga = :harga, stok = :stok WHERE kode_barang = :kode_barang";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        $stmt->bindParam(':nama_barang', $nama_barang);
        $stmt->bindParam(':harga', $harga);
        $stmt->bindParam(':stok', $stok);
        return $stmt->execute();
    }
    public function delete($kode_barang)
    {
        $query = "DELETE FROM " . $this->table_name . " WHERE kode_barang = :kode_barang";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':kode_barang', $kode_barang);
        return $stmt->execute();
    }


}
?>