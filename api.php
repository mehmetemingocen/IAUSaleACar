<?php
header("Content-Type: application/json");

require_once 'dbConfig.php'; 

function checkApiKey() {
    $headers = apache_request_headers();
    if (!isset($headers['Authorization']) || $headers['Authorization'] !== 'Bearer YOUR_API_KEY') {
        http_response_code(403); // Forbidden
        echo json_encode(["message" => "Unauthorized"]);
        exit;
    }
}

function handleRequest($method) {
    switch ($method) {
        case 'GET':
            getCar();
            break;
        case 'POST':
            createCar();
            break;
        case 'PUT':
            updateCar();
            break;
        case 'DELETE':
            deleteCar();
            break;
        default:
            http_response_code(405);
            echo json_encode(["message" => "Method not allowed"]);
    }
}

function createCar() {
    global $conn;

    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->brand) && isset($data->model) && isset($data->km) && isset($data->year)) {
        $brand = $data->brand;
        $model = $data->model;
        $km = $data->km;
        $year = $data->year;

        $stmt = $conn->prepare("INSERT INTO cars (brand, model, km, year) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssii", $brand, $model, $km, $year);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Car added successfully"]);
        } else {
            echo json_encode(["message" => "Failed to add car"]);
        }
    } else {
        echo json_encode(["message" => "Invalid data"]);
    }
}

function getCar() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $result = $conn->query("SELECT * FROM cars WHERE id = $id");

        if ($result->num_rows > 0) {
            $car = $result->fetch_assoc();
            echo json_encode($car);
        } else {
            echo json_encode(["message" => "Car not found"]);
        }
    } else {
        echo json_encode(["message" => "Car ID is required"]);
    }
}

function updateCar() {
    global $conn;

    $data = json_decode(file_get_contents("php://input"));

    if (isset($data->id) && isset($data->brand) && isset($data->model) && isset($data->km) && isset($data->year)) {
        $id = $data->id;
        $brand = $data->brand;
        $model = $data->model;
        $km = $data->km;
        $year = $data->year;

        $stmt = $conn->prepare("UPDATE cars SET brand = ?, model = ?, km = ?, year = ? WHERE id = ?");
        $stmt->bind_param("ssiii", $brand, $model, $km, $year, $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Car updated successfully"]);
        } else {
            echo json_encode(["message" => "Failed to update car"]);
        }
    } else {
        echo json_encode(["message" => "Invalid data"]);
    }
}

function deleteCar() {
    global $conn;

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $conn->prepare("DELETE FROM cars WHERE id = ?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["message" => "Car deleted successfully"]);
        } else {
            echo json_encode(["message" => "Failed to delete car"]);
        }
    } else {
        echo json_encode(["message" => "Car ID is required"]);
    }
}

checkApiKey();

handleRequest($_SERVER['REQUEST_METHOD']);
