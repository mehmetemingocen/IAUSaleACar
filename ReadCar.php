<?php
require_once 'dbConfig.php';
$id = $_GET['id'];

$result = $conn->query("SELECT * FROM cars WHERE id = $id");
$car = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .details-container {
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 500px;
        }

        .details-container h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .detail-item {
            font-size: 20px;
            margin-bottom: 15px;
            color: #555;
        }

        .detail-item span {
            font-weight: bold;
            color: #007bff;
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            font-size: 18px;
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }

        .back-link:hover {
            color: #0056b3;
        }

    </style>
</head>
<body>

    <div class="details-container">
        <h2>Car Details</h2>
        <div class="detail-item">
            <span>Brand:</span> <?= htmlspecialchars($car['brand']) ?>
        </div>
        <div class="detail-item">
            <span>Model:</span> <?= htmlspecialchars($car['model']) ?>
        </div>
        <div class="detail-item">
            <span>Kilometers:</span> <?= htmlspecialchars($car['km']) ?>
        </div>
        <div class="detail-item">
            <span>Year:</span> <?= htmlspecialchars($car['year']) ?>
        </div>

        <a href="adminPage.php" class="back-link">Back to Admin Page</a>
    </div>

</body>
</html>
