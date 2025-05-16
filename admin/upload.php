<?php
session_start();
if (!isset($_SESSION["admin_logged_in"]) || $_SESSION["admin_logged_in"] !== true) {
    header("Location: login.php");
    exit;
}

require_once '../database/db_connect.php';

$success_message = "";
$error_message = "";

// Handle file upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["pdf_file"])) {
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $subject = $_POST['subject'];
    
    $file = $_FILES["pdf_file"];
    $file_name = $file["name"];
    $file_tmp = $file["tmp_name"];
    $file_size = $file["size"];
    $file_error = $file["error"];
    
    // Debug log
    error_log("Upload attempt - Title: $title, Subject: $subject");
    error_log("File details - Name: $file_name, Size: $file_size, Error: $file_error");
    
    // Get file extension
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    // Allowed extensions
    $allowed = array('pdf');
    
    if (in_array($file_ext, $allowed)) {
        if ($file_error === 0) {
            if ($file_size <= 10485760) { // 10MB max
                // Create unique file name
                $file_new_name = uniqid('', true) . '.' . $file_ext;
                $file_destination = '../uploads/pdfs/' . $file_new_name;
                
                error_log("Generated new filename: $file_new_name");
                error_log("File destination: $file_destination");
                
                // Create directory if it doesn't exist
                if (!file_exists('../uploads/pdfs/')) {
                    mkdir('../uploads/pdfs/', 0777, true);
                }
                
                if (move_uploaded_file($file_tmp, $file_destination)) {
                    error_log("File moved successfully to: $file_destination");
                    
                    // Save file information to database
                    $stmt = $conn->prepare("INSERT INTO pdf_files (title, description, file_name, file_path, subject, uploaded_at) VALUES (?, ?, ?, ?, ?, NOW())");
                    $stmt->bind_param("sssss", $title, $description, $file_name, $file_new_name, $subject);
                    
                    if ($stmt->execute()) {
                        error_log("File information saved to database successfully");
                        // Set success message in session
                        $_SESSION['upload_success'] = "File uploaded successfully!";
                        // Redirect to prevent form resubmission
                        header("Location: " . $_SERVER['PHP_SELF']);
                        exit;
                    } else {
                        error_log("Database error: " . $stmt->error);
                        $error_message = "Error saving file information to database.";
                        unlink($file_destination); // Delete the uploaded file
                    }
                } else {
                    error_log("Failed to move uploaded file");
                    $error_message = "Error uploading file.";
                }
            } else {
                error_log("File too large: $file_size bytes");
                $error_message = "File size too large. Maximum size is 10MB.";
            }
        } else {
            error_log("File upload error code: $file_error");
            $error_message = "Error uploading file.";
        }
    } else {
        error_log("Invalid file extension: $file_ext");
        $error_message = "Only PDF files are allowed.";
    }
}

// Get success message from session and clear it
if (isset($_SESSION['upload_success'])) {
    $success_message = $_SESSION['upload_success'];
    unset($_SESSION['upload_success']);
}

// Get all uploaded PDFs
$pdfs = [];
$result = $conn->query("SELECT * FROM pdf_files ORDER BY uploaded_at DESC");
while ($row = $result->fetch_assoc()) {
    $pdfs[] = $row;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PDF - Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        .sidebar {
            min-height: 100vh;
            background: #343a40;
            color: white;
            padding-top: 20px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            display: block;
        }
        .sidebar a:hover {
            background: #495057;
        }
        .sidebar .active {
            background: #007bff;
        }
        .main-content {
            padding: 20px;
        }
        .upload-form {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 30px;
        }
        .pdf-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .pdf-icon {
            font-size: 2em;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-2 sidebar">
                <h3 class="text-center mb-4">Admin Panel</h3>
                <nav>
                    <a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
                    <a href="users.php"><i class="fas fa-users"></i> Users</a>
                    <a href="rankings.php"><i class="fas fa-trophy"></i> Rankings</a>
                    <a href="announcements.php"><i class="fas fa-bullhorn"></i> Announcements</a>
                    <a href="upload.php" class="active"><i class="fas fa-file-upload"></i> Upload PDF</a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-10 main-content">
                <h2 class="mb-4">Upload PDF Files</h2>

                <?php if ($success_message): ?>
                    <div class="alert alert-success"><?php echo $success_message; ?></div>
                <?php endif; ?>

                <?php if ($error_message): ?>
                    <div class="alert alert-danger"><?php echo $error_message; ?></div>
                <?php endif; ?>

                <!-- Upload Form -->
                <div class="upload-form">
                    <form method="POST" action="" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <select class="form-control" id="subject" name="subject" required>
                                <option value="math">Mathematics</option>
                                <option value="english">English</option>
                                <option value="science">Science</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pdf_file">Select PDF File (Max 10MB)</label>
                            <input type="file" class="form-control-file" id="pdf_file" name="pdf_file" accept=".pdf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload PDF</button>
                    </form>
                </div>

                <!-- Uploaded PDFs -->
                <h3 class="mb-4">Uploaded PDFs</h3>
                <div class="row">
                    <?php foreach ($pdfs as $pdf): ?>
                        <div class="col-md-4">
                            <div class="pdf-card">
                                <div class="text-center mb-3">
                                    <i class="fas fa-file-pdf pdf-icon"></i>
                                </div>
                                <h5><?php echo htmlspecialchars($pdf['title']); ?></h5>
                                <p class="text-muted">Subject: <?php echo htmlspecialchars($pdf['subject']); ?></p>
                                <p><?php echo htmlspecialchars($pdf['description']); ?></p>
                                <p class="text-muted small">Uploaded: <?php echo date('F j, Y g:i a', strtotime($pdf['uploaded_at'])); ?></p>
                                <a href="../uploads/pdfs/<?php echo htmlspecialchars($pdf['file_path']); ?>" class="btn btn-primary btn-sm" target="_blank">
                                    <i class="fas fa-download"></i> Download
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 