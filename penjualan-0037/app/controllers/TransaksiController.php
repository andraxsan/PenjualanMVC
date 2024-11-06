<?php
require_once 'app/models/Transaksi.php';

class TransaksiController
{
    private $transaksi;

    public function __construct($db)
    {
        $this->transaksi = new Transaksi($db);
    }

    public function index()
    {
        $stmt = $this->transaksi->readAll();
        $transactions = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'app/views/transaksi/index.php';
    }
}
?>