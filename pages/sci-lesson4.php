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
    <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
    <h2 class="text-success mb-4 font-weight-bold">Lesson 4: Human Body</h2>

    <div class="section-card">
      <div class="section-header">Body Basics</div>
      <div class="section-body">
        <img src="images\bodybasics.png" alt="Body">
        <ul>
          <li>The human body has many systems that work together.</li>
          <li>Each system has special jobs to keep us healthy.</li>
          <li>Our bodies need food, water, air, and rest to function.</li>
        </ul>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Major Body Parts</div>
      <div class="section-body">
       <p><strong>Head</strong> - Contains brain, eyes, ears, nose, mouth</p>
        <img src="images\head.png" alt="Head">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Torso</strong> (chest and abdomen) - Contains heart, lungs, stomach</p>
        <img src="images\torso.png" alt="Torso">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Arms and hands</strong> - For grabbing and moving things</p>
        <img src="images\arm.png" alt="Arms">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Legs and feet</strong> - For standing and moving around</p>
        <img src="images\legs.png" alt="Legs">

      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Important Body Systems</div>
      <div class="section-body">
        
        <p><strong>Skeletal System</strong></p>
        <img src="images\Skeletal.png" alt="Skeletal">
        <ul>
            <li>Made of all the bones in your body (206 total).</li>
            <li>Gives your body shape and support.</li>
            <li>Protects organs (skull protects brain, ribs protect heart and lungs).</li>
            <li>Helps you move with the muscular system.</li>
          </ul>
          
          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Muscular System</strong></p>
        <img src="images\mascular.png" alt="mascular">
        <ul>
            <li>Made of muscles that help you move.</li>
            <li>Some muscles you control (arms, legs).</li>
            <li>Some work automatically (heart, stomach).</li>
            <li>Works with bones to create movement.</li>
          </ul>
          
          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Digestive System</strong></p>
        <img src="images\digestive.png" alt="Digestive">
        <ul>
            <li>Breaks down food into nutrients your body can use.</li>
            <li>Includes mouth, esophagus, stomach, intestines.</li>
            <li>Removes waste your body doesn't need.</li>
          </ul>
          
          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Respiratory System</strong></p>
        <img src="images\respiratory.png" alt="Respiratory">
        <ul>
            <li>Brings oxygen into your body and removes carbon dioxide.</li>
            <li>Includes nose, trachea (windpipe), and lungs.</li>
            <li>You breathe about 20,000 times each day!.</li>
          </ul>
          
          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Circulatory System</strong></p>
        <img src="images\circulatory.png" alt="Circulatory">
        <ul>
            <li>Moves blood around your body.</li>
            <li>Heart pumps blood through blood vessels.</li>
            <li>Delivers oxygen and nutrients to all body parts.</li>
            <li>Takes away waste products</li>
          </ul>
          
          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Keeping Your Body Healthy</strong></p>
        <ul>
            <li>Eat healthy foods (fruits, vegetables, proteins).</li>
            <li>Drink plenty of water.</li>
            <li>Exercise regularly.</li>
            <li>Get enough sleep (9-11 hours for children)</li>
            <li>Wash hands often to prevent illness</li>
          </ul>

      </div>
    </div>


  </div>
  
  <!-- Done Button -->
<div class="container text-center my-5">
    <a href="science.html" class="btn btn-success btn-lg px-5">Done</a>
  </div>
  

  <!-- Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
