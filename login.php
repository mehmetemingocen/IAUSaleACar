<?php
require_once 'dbConfig.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $db_username, $db_password);
        $stmt->fetch();

        if (password_verify($password, $db_password)) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $db_username;
            header('Location: homepage.php');
        } else {
            $error = 'Invalid Password!';
        }
    } else {
        $error = 'Invalid Username!';
    }

    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['admin_login'])) {
    $admin_name = $_POST['reg_username'];
    $admin_password = $_POST['reg_password'];

    $stmt = $conn->prepare("SELECT id FROM admin WHERE name = ? AND password = ?");
    $stmt->bind_param("ss", $admin_name, $admin_password);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_name'] = $admin_name;
        header('Location: adminPage.php');
    } else {
        $admin_error = 'Invalid Admin Credentials!';
    }

    $stmt->close();
}
?>

<!-- Login Page -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - IAUSale a Car</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px; 
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        .logo {
            display: block;
            margin: 0 auto 20px;
            width: 170px;
        }
        .signup-link {
            display: block;
            margin-top: 15px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }

    </style>
</head>
<body>
<div class="container">
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-5">
                <div class="card">
                    <img src="SaleCarLogo.png" alt="Sale a Car Logo" class="logo">
                    <h2 class="text-center mb-4">User Login</h2>
                    <form method="POST">
                        <div class="form-group mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Enter your username" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" name="login" class="btn btn-primary w-100">Login</button>

                        <?php if (isset($error)): ?>
                            <div class="alert alert-danger mt-3"> <?php echo $error; ?> </div>
                        <?php endif; ?>

                        <a href="logon.php" class="signup-link">Not a member? Register</a>
                    </form>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-md-5">
    <div class="card">
        <img src="SaleCarLogo.png" alt="Sale a Car Logo" class="logo">
        <h2 class="text-center mb-4">Administrator Login</h2>
        <form method="POST">
            <div class="form-group mb-3">
                <label for="reg_username" class="form-label">Admin Name</label>
                <input type="text" class="form-control" name="reg_username" id="reg_username" placeholder="Enter admin name" required>
            </div>
            <div class="form-group mb-3">
                <label for="reg_password" class="form-label">Password</label>
                <input type="password" class="form-control" name="reg_password" id="reg_password" placeholder="Enter password" required>
            </div>
            <button type="submit" name="admin_login" class="btn btn-success w-100">Login</button>

            <?php if (isset($admin_error)): ?>
                <div class="alert alert-danger mt-3"> <?php echo $admin_error; ?> </div>
            <?php endif; ?>
        </form>
    </div>
</div>
        </div>
    </div>
</body>
</html>
