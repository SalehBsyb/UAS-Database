<?php
include 'db.php';
$id = $_GET['id'];
$query = "SELECT * FROM vehicles WHERE vehicle_id = $id";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kendaraan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-warning text-dark">
                        <h4 class="mb-0">Edit Data Kendaraan</h4>
                    </div>
                    <div class="card-body">
                        <form action="update.php" method="POST">
                            <input type="hidden" name="vehicle_id" value="<?php echo $row['vehicle_id']; ?>">
                            
                            <div class="mb-3">
                                <label class="form-label">ID Kategori</label>
                                <input type="number" name="category_id" class="form-control" value="<?php echo $row['category_id']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nomor Polisi</label>
                                <input type="text" name="plate_number" class="form-control" value="<?php echo $row['plate_number']; ?>" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Merek</label>
                                    <input type="text" name="brand" class="form-control" value="<?php echo $row['brand']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Model</label>
                                    <input type="text" name="model" class="form-control" value="<?php echo $row['model']; ?>" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Tahun Kendaraan</label>
                                    <input type="number" name="vehicle_year" class="form-control" value="<?php echo $row['vehicle_year']; ?>" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Harga Sewa / Hari</label>
                                    <input type="number" step="0.01" name="price_per_day" class="form-control" value="<?php echo $row['price_per_day']; ?>" required>
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select" required>
                                    <option value="tersedia" <?php echo ($row['status'] == 'tersedia') ? 'selected' : ''; ?>>Tersedia</option>
                                    <option value="disewa" <?php echo ($row['status'] == 'disewa') ? 'selected' : ''; ?>>Disewa</option>
                                    <option value="servis" <?php echo ($row['status'] == 'servis') ? 'selected' : ''; ?>>Servis</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-warning">Update Data</button>
                            <a href="rentalkendaraan.php" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>