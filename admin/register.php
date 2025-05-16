<?php
session_start();
require_once '../database/db_connect.php';

$success_message = "";
$error_message = "";

// Handle registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    
    // Validate input
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $error_message = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Invalid email format.";
    } elseif (strlen($password) < 8) {
        $error_message = "Password must be at least 8 characters long.";
    } elseif ($password !== $confirm_password) {
        $error_message = "Passwords do not match.";
    } else {
        // Check if username or email already exists
        $stmt = $conn->prepare("SELECT id FROM admins WHERE username = ? OR email = ?");
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
            $error_message = "Username or email already exists.";
        } else {
            // Hash password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            
            // Insert new admin
            $stmt = $conn->prepare("INSERT INTO admins (username, email, password, created_at) VALUES (?, ?, ?, NOW())");
            $stmt->bind_param("sss", $username, $email, $hashed_password);
            
            if ($stmt->execute()) {
                $success_message = "Admin account created successfully! You can now login.";
            } else {
                $error_message = "Error creating admin account. Please try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
        }
        .register-form {
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
        .btn-register {
            background-color: #007bff;
            border-color: #007bff;
            width: 100%;
            padding: 12px;
            font-weight: 500;
        }
        .btn-register:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .login-link {
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
        .login-link a {
            color: #007bff;
            text-decoration: none;
        }
        .login-link a:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <div class="register-form">
                <div class="admin-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                <h2 class="form-title">Admin Registration</h2>

                <?php if (isset($success_message)): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>

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
                        <label for="email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input type="email" class="form-control" id="email" name="email" required>
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
                        <small class="form-text text-muted">Password must be at least 8 characters long.</small>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confirm Password</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-register">Register Admin Account</button>
                </form>

                <div class="login-link">
                    <p>Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 