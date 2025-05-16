<?php
session_start();
$conn = new mysqli("localhost", "root", "", "eduplatform");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password_raw = trim($_POST["password"]);
    $confirm_raw = trim($_POST["confirm_password"]);

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
    }
    // Check if passwords match before hashing
    else if ($password_raw !== $confirm_raw) {
        $error = "Passwords do not match.";
    } else {
        // Hash password after confirming
        $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

        // Check for existing username or email
        $check = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        $check->bind_param("ss", $username, $email);
        $check->execute();
        $result = $check->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if ($row['username'] === $username) {
                $error = "Username already taken.";
            } else {
                $error = "Email already registered.";
            }
        } else {
            // Insert new user
            $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $username, $email, $password_hashed);
            if ($stmt->execute()) {
                $success = "Account created! You can now <a href='login.php'>login</a>.";
            } else {
                $error = "Registration failed.";
            }
        }
    }
}
?>
  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - EduPlatform</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card shadow">
                <div class="card-body">
                    <h4 class="card-title text-center">Create Account</h4>
                    <?php if ($error): ?>
                        <div class="alert alert-danger"><?= $error ?></div>
                    <?php endif; ?>
                    <?php if ($success): ?>
                        <div class="alert alert-success"><?= $success ?></div>
                    <?php endif; ?>
                    <form method="POST">
                        <div class="form-group">
                            <label>Username:</label>
                            <input type="text" name="username" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Password:</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Confirm Password:</label>
                            <input type="password" name="confirm_password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Register</button>
                    </form>
                    <p class="mt-3 text-center">Already have an account? <a href="login.php">Login here</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
