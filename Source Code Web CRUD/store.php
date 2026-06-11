<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
    $plate_number = mysqli_real_escape_string($conn, $_POST['plate_number']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $model = mysqli_real_escape_string($conn, $_POST['model']);
    $vehicle_year = mysqli_real_escape_string($conn, $_POST['vehicle_year']);
    $price_per_day = mysqli_real_escape_string($conn, $_POST['price_per_day']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "INSERT INTO vehicles (category_id, plate_number, brand, model, vehicle_year, price_per_day, status) 
              VALUES ('$category_id', '$plate_number', '$brand', '$model', '$vehicle_year', '$price_per_day', '$status')";

    if (mysqli_query($conn, $query)) {
        header("Location: rentalkendaraan.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>