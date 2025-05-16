<?php 
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard - EduPlatform</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
    }
    .uniform-card {
      border-radius: 10px;
      transition: box-shadow 0.3s ease;
    }
    .uniform-card:hover {
      box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    }
    .math-card { background-color: #e3f2fd; }
    .english-card { background-color: #fff3e0; }
    .science-card { background-color: #e8f5e9; }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
        <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a class="nav-link" href="dashboard.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>

  <div class="container mt-5">
    <div class="row">

      <div class="col-md-4 col-sm-6 mb-4">
        <a href="math.php" class="text-decoration-none">
          <div class="card h-100 shadow-sm uniform-card text-center math-card">
            <div class="card-body">
              <h5 class="card-title">Mathematics</h5>
              <p class="card-text">Mr. Clark</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4 col-sm-6 mb-4">
        <a href="english.php" class="text-decoration-none">
          <div class="card h-100 shadow-sm uniform-card text-center english-card">
            <div class="card-body">
              <h5 class="card-title">English</h5>
              <p class="card-text">Mrs. Bailey</p>
            </div>
          </div>
        </a>
      </div>

      <div class="col-md-4 col-sm-6 mb-4">
        <a href="science.php" class="text-decoration-none">
          <div class="card h-100 shadow-sm uniform-card text-center science-card">
            <div class="card-body">
              <h5 class="card-title">Science</h5>
              <p class="card-text">Mr. Cooper</p>
            </div>
          </div>
        </a>
      </div>

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <!-- Bootstrap 4 compatible Popper.js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
