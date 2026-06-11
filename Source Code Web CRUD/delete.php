<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    $query = "DELETE FROM vehicles WHERE vehicle_id = $id";
    
    if (mysqli_query($conn, $query)) {
        header("Location: rentalkendaraan.php");
        exit();
    } else {
        echo "Gagal menghapus data. Pastikan data kendaraan ini tidak terikat dengan transaksi penyewaan (Foreign Key constraints). Error: " . mysqli_error($conn);
    }
}
?>