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
    <h2 class="text-success mb-4 font-weight-bold">Lesson 3: Reading Short Stories</h2>
  
    <div class="section-card">
      <div class="section-header">Story 1: "The Red Hat"</div>
      <div class="section-body">
        <p>Pat had a red hat.<br>
        The hat was big and soft.<br>
        Pat put the hat on his head.<br>
        The wind blew the hat away.<br>
        Pat ran to get his hat.<br>
        He found it on a bush.<br>
        Pat was happy to have his hat back.</p>
  
        <h5>Comprehension Questions:</h5>
        <ul>
          <li>1. What color was Pat's hat?</li>
          <li>2. Where did Pat find his hat?</li>
          <li>3. How did Pat feel at the end of the story?</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Story 2: "The Cat and the Dog"</div>
      <div class="section-body">
        <p>A cat sat on a mat.<br>
        A dog ran up to the cat.<br>
        "Can I sit with you?" asked the dog.<br>
        "Yes," said the cat.<br>
        The dog sat down.<br>
        The cat and the dog became friends.<br>
        They sat on the mat all day.</p>
  
        <h5>Comprehension Questions:</h5>
        <ul>
          <li>1. Where did the cat sit?</li>
          <li>2. What did the dog ask the cat?</li>
          <li>3. Did the cat and dog become friends?</li>
        </ul>
      </div>
    </div>
  </div>
  
  
  <!-- Done Button -->
<div class="container text-center my-5">
    <a href="english.php" class="btn btn-success btn-lg px-5">Done</a>
  </div>
  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>