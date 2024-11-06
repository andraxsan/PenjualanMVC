<?php
require_once 'app/models/Pelanggan.php';

class PelangganController
{
    private $pelanggan;

    public function __construct($db)
    {
        $this->pelanggan = new Pelanggan($db);
    }

    public function index()
    {
        $stmt = $this->pelanggan->readAll();
        $members = $stmt->fetchAll(PDO::FETCH_ASSOC);
        require_once 'app/views/pelanggan/index.php';
    }

}
?>