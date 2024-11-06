<?php
require_once 'config/database.php';
require_once 'app/controllers/ProdukController.php';
require_once 'app/controllers/PelangganController.php';
require_once 'app/controllers/TransaksiController.php';

$database = new Database();
$db = $database->getConnection();

// Routing berdasarkan parameter 'page' di URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

switch ($page) {
    case 'barang':
        $controller = new ProdukController($db);
        $controller->index();
        break;

    case 'pelanggan':
        $controller = new PelangganController($db);
        $controller->index();
        break;

    case 'transaksi':
        $controller = new TransaksiController($db);
        $controller->index();
        break;

    case 'edit_produk':
        $kode_barang = $_GET['kode_barang'];
        $controller = new ProdukController($db);
        $controller->edit($kode_barang);
        break;

    case 'update_produk':
        $kode_barang = $_GET['kode_barang'];
        $controller = new ProdukController($db);
        $controller->update($kode_barang);
        break;

    case 'delete_produk':
        $kode_barang = $_GET['kode_barang'];
        $controller = new ProdukController($db);
        $controller->delete($kode_barang);
        break;

    default:
        // Menampilkan halaman Home jika tidak ada page yang dipilih
        require_once 'app/views/home.php';
        break;
}
?>