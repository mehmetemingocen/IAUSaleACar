<?php
require_once 'dbConfig.php';

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $km = $_POST['km'];
    $year = $_POST['year'];

    $stmt = $conn->prepare("UPDATE cars SET brand = ?, model = ?, km = ?, year = ? WHERE id = ?");
    $stmt->bind_param("ssiii", $brand, $model, $km, $year, $id);
    $stmt->execute();

    header('Location: adminPage.php');
    exit;
}

$result = $conn->query("SELECT * FROM cars WHERE id = $id");
$car = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Car</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 100%;
            max-width: 400px;
        }

        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #555555;
            font-weight: bold;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #cccccc;
            border-radius: 4px;
            outline: none;
            transition: border-color 0.3s ease-in-out;
        }

        .form-group input:focus {
            border-color: #007bff;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Update Car Details</h2>
        <form method="POST">
            <div class="form-group">
                <label for="brand">Brand</label>
                <input type="text" id="brand" name="brand" value="<?= htmlspecialchars($car['brand']) ?>" required>
            </div>
            <div class="form-group">
                <label for="model">Model</label>
                <input type="text" id="model" name="model" value="<?= htmlspecialchars($car['model']) ?>" required>
            </div>
            <div class="form-group">
                <label for="km">Kilometers</label>
                <input type="number" id="km" name="km" value="<?= htmlspecialchars($car['km']) ?>" required>
            </div>
            <div class="form-group">
                <label for="year">Year</label>
                <input type="number" id="year" name="year" value="<?= htmlspecialchars($car['year']) ?>" required>
            </div>
            <button type="submit">Update Car</button>
        </form>
    </div>
</body>
</html>
