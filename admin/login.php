<?php
session_start();
require_once '../database/db_connect.php';

// Redirect if already logged in
if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] === true) {
    header("Location: dashboard.php");
    exit;
}

$error_message = "";

// Handle login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    
    if (empty($username) || empty($password)) {
        $error_message = "Please enter both username and password.";
    } else {
        // Check admin credentials
        $stmt = $conn->prepare("SELECT id, username, password FROM admins WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows === 1) {
            $admin = $result->fetch_assoc();
            
            if (password_verify($password, $admin['password'])) {
                // Update last login time
                $update_stmt = $conn->prepare("UPDATE admins SET last_login = NOW() WHERE id = ?");
                $update_stmt->bind_param("i", $admin['id']);
                $update_stmt->execute();
                
                // Set session variables
                $_SESSION["admin_logged_in"] = true;
                $_SESSION["admin_id"] = $admin['id'];
                $_SESSION["admin_username"] = $admin['username'];
                
                // Redirect to dashboard
                header("Location: dashboard.php");
                exit;
            } else {
                $error_message = "Invalid username or password.";
            }
        } else {
            $error_message = "Invalid username or password.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
        }
        .login-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 30px;
        }
        .form-title {
            text-align: center;
            margin-bottom: 30px;
            color: #2c3e50;
        }
        .form-group label {
            font-weight: 500;
            color: #2c3e50;
        }
        .btn-login {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 12px;
            font-weight: 500;
        }
        .btn-login:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
        }
        .admin-icon {
            text-align: center;
            font-size: 48px;
            color: #007bff;
            margin-bottom: 20px;
        }
        .input-group-text {
            background-color: #007bff;
            color: white;
            border: none;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }
        .register-link a {
            color: #007bff;
            text-decoration: none;
        }
        .register-link a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="login-form">
                <div class="admin-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2 class="form-title">Admin Login</h2>

                <?php if (isset($error_message)): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-login">Login</button>
                </form>

                <div class="register-link">
                    <p>Don't have an admin account? <a href="register.php">Register here</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 