<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $vehicle_id = mysqli_real_escape_string($conn, $_POST['vehicle_id']);
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $plate_number = mysqli_real_escape_string($conn, $_POST['plate_number']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $vehicle_year = mysqli_real_escape_string($conn, $_POST['vehicle_year']);
    $price_per_day = mysqli_real_escape_string($conn, $_POST['price_per_day']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "UPDATE vehicles SET 
                category_id = '$category_id',
                plate_number = '$plate_number',
                brand = '$brand',
                model = '$model',
                vehicle_year = '$vehicle_year',
                price_per_day = '$price_per_day',
                status = '$status'
              WHERE vehicle_id = $vehicle_id";

    if (mysqli_query($conn, $query)) {
        header("Location: rentalkendaraan.php");
        exit();
    } else {
        echo "Error memperbarui data: " . mysqli_error($conn);
    }
}
?>