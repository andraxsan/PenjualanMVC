<?php
require_once 'app/models/Produk.php';

class ProdukController
{
    private $produk;

    public function __construct($db)
    {
        $this->produk = new Produk($db);
    }

    public function index()
    {
        $stmt = $this->produk->readAll();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'app/views/produk/index.php';
    }
    public function edit($kode_barang)
    {
        $produk = $this->produk->getByKode($kode_barang);
        require_once 'app/views/produk/edit.php';
    }

    public function update($kode_barang)
    {
        $nama_barang = $_POST['nama_barang'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];

        if ($this->produk->update($kode_barang, $nama_barang, $harga, $stok)) {
            header("Location: index.php?page=barang");
        } else {
            echo "Gagal memperbarui data produk.";
        }
    }
    public function delete($kode_barang)
    {
        if ($this->produk->delete($kode_barang)) {
            header("Location: index.php?page=barang");
        } else {
            echo "Gagal menghapus data produk.";
        }
    }


}
?>