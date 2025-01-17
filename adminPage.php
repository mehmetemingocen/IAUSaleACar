<?php
require_once 'dbConfig.php';
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Cars</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        .service-card {
            text-align: center;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f2f2f2;
            width: 200px;
            margin: 10px;
        }
        .diamond {
            width: 50px;
            height: 50px;
            background-color: #4CAF50;
            color: white;
            font-size: 24px;
            line-height: 50px;
            border: 2px solid #fff;
        }
        .container2 {
            display: flex; 
            justify-content: center; 
            margin-top: 50px;
}
    </style>
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

    <h2 class="text-center mb-4">Admin / Manage Cars</h2>

    <a href="createCar.php" class="btn btn-success mb-3">Add New Car</a>

    <table class="table table-striped table-hover table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Brand</th>
                <th>Model</th>
                <th>Kilometers</th>
                <th>Year</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT id, brand, model, km, year FROM cars");
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['brand']) ?></td>
                <td><?= htmlspecialchars($row['model']) ?></td>
                <td><?= htmlspecialchars($row['km']) ?></td>
                <td><?= htmlspecialchars($row['year']) ?></td>
                <td>
                    <a href="readCar.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">👁️</a>
                    <a href="updateCar.php?id=<?= $row['id'] ?>" class="btn btn-primary btn-sm">✏️</a>
                    <a href="deleteCar.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">🗑️</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

<div class="container2">
        <div class="service-card">
            <div class="diamond">C</div>
            <h3>Create</h3>
            <p>Adding new data</p>
        </div>
        <div class="service-card">
            <div class="diamond">R</div>
            <h3>Read</h3>
            <p>Data reading process</p>
        </div>
        <div class="service-card">
            <div class="diamond">U</div>
            <h3>Update</h3>
            <p>Data update process</p>
        </div>
        <div class="service-card">
            <div class="diamond">D</div>
            <h3>Delete</h3>
            <p>Data deletion process</p>
        </div>
    </div>
</body>
</html>
