<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Riwayat Transaksi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=barang">Barang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=pelanggan">Pelanggan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=transaksi">Transaksi</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        <h2>Riwayat Transaksi</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Kode Barang</th>
                    <th>ID Pelanggan</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($transactions as $index => $transaction): ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= htmlspecialchars($transaction['id_transaksi']) ?></td>
                        <td><?= htmlspecialchars($transaction['kode_barang']) ?></td>
                        <td><?= htmlspecialchars($transaction['id_pelanggan']) ?></td>
                        <td><?= htmlspecialchars($transaction['jumlah']) ?></td>
                        <td><?= htmlspecialchars($transaction['total_harga']) ?></td>
                        <td><?= htmlspecialchars($transaction['tanggal']) ?></td>
                        <td>
                            <a href="edit.php?id_transaksi=<?= urlencode($transaction['id_transaksi']) ?>"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id_transaksi=<?= urlencode($transaction['id_transaksi']) ?>"
                                class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLEaAA55NDzOxhy9GkcIdslk1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>