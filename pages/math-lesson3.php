<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - EduPlatform</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
      font-size: 1.1rem;
      line-height: 1.6;
    }
    .section-card {
      margin-bottom: 30px;
      border-left: 6px solid #28a745;
      border-radius: 10px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }
    .section-header {
      background-color: #e9f7ef;
      padding: 15px 20px;
      font-weight: bold;
      font-size: 1.4rem;
      color: #28a745;
      border-bottom: 1px solid #dee2e6;
    }
    .section-body {
      padding: 20px;
      font-size: 1.1rem;
    }
    .section-body img {
      max-width: 100%;
      height: auto;
      max-height: 250px;
      display: block;
      margin: 20px auto;
    }
  </style>
  
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
    <a class="navbar-brand" href="dashboard.html">EduPlatform</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item"><a class="nav-link" href="dashboard.php">Home</a></li>
      <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
      <li class="nav-item"><a class="nav-link" href="contacts.php">Contacts</a></li>
      <li class="nav-item"><a class="nav-link" href="#" data-toggle="modal" data-target="#announcementModal"><i class="fas fa-bullhorn"></i></a></li>
      <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
      </ul>
    </div>
  </nav>

 <!-- Content -->
<div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">Lesson 3: Multiplication and Division</h2>
  
    <div class="section-card">
      <div class="section-header">Multiplication: Repeated Addition</div>
      <div class="section-body">
        <p>Multiplication is adding the same number multiple times.</p>
        <p><strong>Symbol:</strong> × (times)</p>
        <p><strong>Example:</strong> 4 × 3 means 4 groups of 3, or 3 + 3 + 3 + 3 = 12</p>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Multiplication Properties</div>
      <div class="section-body">
        <ul>
          <li><strong>Commutative Property:</strong> Order doesn't matter. <br>3 × 4 = 4 × 3</li>
          <li><strong>Identity Property:</strong> Anything multiplied by 1 stays the same. <br>5 × 1 = 5</li>
          <li><strong>Zero Property:</strong> Anything multiplied by 0 equals 0. <br>7 × 0 = 0</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Multiplication Strategies</div>
      <div class="section-body">
        <ul>
          <li><strong>Skip Counting:</strong> Count by 2s, 5s, 10s, etc. <br>For 5 × 3, count: "5, 10, 15"</li>
          <li><strong>Arrays:</strong> Arrange objects in rows and columns. <br>3 rows of 4 = 12</li>
          <li><strong>Fact Families:</strong> Use related facts. <br>If 3 × 4 = 12, then 4 × 3 = 12</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Division: Sharing or Grouping</div>
      <div class="section-body">
        <p>Division means sharing equally or making equal groups.</p>
        <p><strong>Symbol:</strong> ÷ (divided by)</p>
        <p><strong>Examples:</strong></p>
        <ul>
          <li>12 ÷ 3 = 4 (12 shared among 3 equals 4 each)</li>
          <li>12 ÷ 4 = 3 (12 objects make 3 groups of 4)</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Division Strategies</div>
      <div class="section-body">
        <ul>
          <li><strong>Think Multiplication:</strong> Use related multiplication facts. <br>For 15 ÷ 3, think: 3 × ? = 15</li>
          <li><strong>Equal Sharing:</strong> Distribute objects one by one.</li>
          <li><strong>Repeated Subtraction:</strong> Subtract the divisor repeatedly. <br>15 ÷ 5: 15 - 5 = 10, 10 - 5 = 5, 5 - 5 = 0 (3 subtractions, so 15 ÷ 5 = 3)</li>
        </ul>
      </div>
    </div>
  </div>
  
  
  <!-- Done Button -->
<div class="container text-center my-5">
    <a href="math.php" class="btn btn-success btn-lg px-5">Done</a>
  </div>
  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>