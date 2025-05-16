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
    <h2 class="text-success mb-4 font-weight-bold">Lesson 4: Shapes and Patterns</h2>
  
    <div class="section-card">
      <div class="section-header">2D Shapes</div>
      <div class="section-body">
        <p><strong>Basic flat shapes:</strong></p>
        <ul>
          <li>Circle</li>
          <li>Square</li>
          <li>Rectangle</li>
          <li>Triangle</li>
          <li>Oval</li>
          <li>Rhombus (Diamond)</li>
          <li>Pentagon</li>
          <li>Hexagon</li>
        </ul>
        <p><strong>Properties to describe shapes:</strong></p>
        <ul>
          <li>Sides (straight or curved)</li>
          <li>Corners (vertices)</li>
          <li>Size</li>
          <li>Color</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">3D Shapes</div>
      <div class="section-body">
        <p><strong>Basic solid shapes:</strong></p>
        <ul>
          <li>Cube</li>
          <li>Sphere</li>
          <li>Cone</li>
          <li>Cylinder</li>
          <li>Rectangular Prism</li>
          <li>Pyramid</li>
        </ul>
        <p><strong>Properties of 3D shapes:</strong></p>
        <ul>
          <li>Faces</li>
          <li>Edges</li>
          <li>Vertices</li>
          <li>Can roll/slide/stack</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Patterns</div>
      <div class="section-body">
        <p>Patterns are designs or sequences that repeat or grow in a predictable way.</p>
        <p><strong>Types of patterns:</strong></p>
        <ul>
          <li><strong>Repeating Patterns:</strong> Same sequence repeats.</li>
          <ul>
            <li><strong>ABAB pattern:</strong> red, blue, red, blue...</li>
            <li><strong>ABC pattern:</strong> circle, square, triangle, circle, square, triangle...</li>
          </ul>
          <li><strong>Growing Patterns:</strong> Increase or decrease in a predictable way.</li>
          <ul>
            <li>2, 4, 6, 8... (add 2 each time)</li>
            <li>1, 3, 6, 10... (add 1 more each time)</li>
          </ul>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Symmetry</div>
      <div class="section-body">
        <p>A shape has symmetry when it can be divided into parts that match exactly.</p>
        <p><strong>Line of symmetry:</strong> An imaginary line where you could fold a shape and the two halves would match perfectly.</p>
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