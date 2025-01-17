<?php
require_once 'dbConfig.php';
session_start();

if (!isset($_SESSION['logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars on Sale - IAUSale a Car</title>
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

<h2 class="text-center" style="font-size: 35px; font-family: 'Space Grotesk', sans-serif;">Cars on Sale</h2>

    <table class="table table-striped table-hover table-bordered mt-3">
    <thead class="thead-dark">
        <tr>
            <th>Brand</th>
            <th>Model</th>
            <th>Kilometers</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = $conn->query("SELECT brand, model, km, year FROM cars");
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['brand']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= htmlspecialchars($row['km']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
<br>
<br>
<br>

<div class="row">
  <div class="col"><img style="width: 200px;"  src="images/toyota.jpg" alt="" class="logo"></div>
  <div class="col"><img style="width: 170px;"  src="images/fordlogo.png" alt="" class="logo"></div>
  <div class="col"><img style="width: 180px;"  src="images/opellogo.png" alt="" class="logo"></div>
  <div class="col"><img style="width: 170px;"  src="images/wwlogo.jpg" alt="" class="logo"></div>
</div>
</div>
</body>
</html>