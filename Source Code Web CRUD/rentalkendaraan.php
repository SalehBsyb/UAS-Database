<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Kendaraan</h2>
            <div>
                <a href="add.php" class="btn btn-success">Tambah Kendaraan Baru</a>
                <a href="index.php" class="btn btn-secondary">Kembali ke Beranda</a>
            </div>
        </div>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nomor Polisi</th>
                    <th>Merek</th>
                    <th>Model</th>
                    <th>Tahun</th>
                    <th>Harga/Hari (Rp)</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = "SELECT * FROM vehicles ORDER BY vehicle_id DESC";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    // Format harga untuk tampilan
                    $harga = number_format($row['price_per_day'], 0, ',', '.');

                    // Menentukan warna badge berdasarkan ENUM status
                    $badgeClass = 'bg-success'; // tersedia
                    if ($row['status'] == 'disewa') $badgeClass = 'bg-warning text-dark';
                    if ($row['status'] == 'servis') $badgeClass = 'bg-danger';

                    echo "<tr>
                            <td>{$row['vehicle_id']}</td>
                            <td>{$row['plate_number']}</td>
                            <td>{$row['brand']}</td>
                            <td>{$row['model']}</td>
                            <td>{$row['vehicle_year']}</td>
                            <td>{$harga}</td>
                            <td><span class='badge {$badgeClass}'>{$row['status']}</span></td>
                            <td>
                                <a href='edit.php?id={$row['vehicle_id']}' class='btn btn-sm btn-warning'>Edit</a>
                                <a href='delete.php?id={$row['vehicle_id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Yakin ingin menghapus kendaraan ini?\")'>Hapus</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>