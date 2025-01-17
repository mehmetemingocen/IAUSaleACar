<?php
require_once 'dbConfig.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_car'])) {
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $km = $_POST['km'];
    $year = $_POST['year'];

    $sql = "INSERT INTO cars (first_name, last_name, brand, model, km, year) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssssii', $firstName, $lastName, $brand, $model, $km, $year);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IAUSale a Car - Homepage</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
<header class="d-flex justify-content-between align-items-center mb-4">
    <a href="http://localhost:8080/IAUSaleACar/homepage.php">
        <img src="SaleCarLogo.png" alt="IAU Sale a Car Logo" class="mr-3" style="width: 200px;">
    </a>
    <nav>
        <a href="homepage.php" class="btn btn-dark px-4 py-3">Homepage</a>
        <a href="carsonsale.php" class="btn btn-dark px-4 py-3">Cars on Sale</a>
        <a href="login.php" class="btn btn-dark px-4 py-3">Login Page</a>
    </nav>
</header>

   
</div>

<div class="container">
  <div class="row">
    <div class="col-6"> <h2 class="text-center" >Sell Your Car</h2>
    <form method="POST" class="mt-3">
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="form-group">
            <label for="brand">Brand</label>
            <input type="text" class="form-control" name="brand" id="brand" required>
        </div>
        <div class="form-group">
            <label for="model">Model</label>
            <input type="text" class="form-control" name="model" id="model" required>
        </div>
        <div class="form-group">
            <label for="km">Kilometers</label>
            <input type="number" class="form-control" name="km" id="km" required>
        </div>
        <div class="form-group">
            <label for="year">Year</label>
            <input type="number" class="form-control" name="year" id="year" required>
        </div>
        <button type="submit" name="submit_car" class="btn btn-primary btn-block">Submit</button>
    </form></div>
    <div class="col-6"><img src="images/bannercar.jpg" alt="IAU Sale a Car Logo" class="mr-3" style="width: 600px;">
    </div>
  </div>
</div>
</body>
</html>