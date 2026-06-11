<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h4 class="mb-0">Tambah Kendaraan Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="store.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Kategori Kendaraan</label>
                                <select name="category_id" class="form-select" required>
                                    <option value="" disabled selected>-- Pilih Kategori Kendaraan --</option>
                                    <?php
                                    include 'db.php';
                                    // Mengambil data kategori dari database
                                    $kategori_query = mysqli_query($conn, "SELECT * FROM vehicle_categories");
                                    while ($kategori = mysqli_fetch_assoc($kategori_query)) {
                                        echo "<option value='{$kategori['category_id']}'>{$kategori['category_name']}</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" name="plate_number" class="form-control" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Merek</label>
                                    <input type="text" name="brand" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Model</label>
                                    <input type="text" name="model" class="form-control" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Kendaraan</label>
                                    <input type="number" name="vehicle_year" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Harga Sewa / Hari</label>
                                    <input type="number" step="0.01" name="price_per_day" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="tersedia">Tersedia</option>
                                    <option value="disewa">Disewa</option>
                                    <option value="servis">Servis</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="rentalkendaraan.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>