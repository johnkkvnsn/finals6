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
    <h2 class="text-success mb-4 font-weight-bold">Lesson 5: : States of Matter</h2>

    <div class="section-card">
      <div class="section-header">Matter</div>
      <div class="section-body">
        
        <ul>
          <li>Matter is anything that takes up space and has mass.</li>
          <li>All objects are made of matter.</li>
          <li>Matter exists in different states.</li>
        </ul>
        <img src="images\matter.png" alt="Matter">
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Three States of Matter</div>
      <div class="section-body">
       <h3><strong>Solid</strong></h3>
        <img src="images\solid.png" alt="Solid">
        <ul>
            <li>Has definite shape and volume.</li>
            <li>Particles are packed tightly together.</li>
            <li>Particles vibrate but stay in place.</li>
          </ul>
          <p><strong>Examples:</strong> rock, ice, wood, plastic</p>

        <hr style="border: none; border-top: 2px solid #28a745;">

        <h3><strong>Liquid</strong></h3>
        <img src="images\liquid.png" alt="Liquid">
        <ul>
            <li>Has definite volume but takes the shape of its container.</li>
            <li>Particles are close but can move around each other.</li>
            <li>Can flow and be poured.</li>
          </ul>
          <p><strong>Examples:</strong> water, milk, juice, oil</p>

        <hr style="border: none; border-top: 2px solid #28a745;">

        <h3><strong>Gas</strong></h3>
        <img src="images\gas.png" alt="Gas">
        <ul>
            <li>No definite shape or volume.</li>
            <li>Fills entire container.</li>
            <li>Particles move freely and are far apart.</li>
          </ul>
          <p><strong>Examples:</strong> air, oxygen, helium, water vapor</p>

      </div>
    </div>

    <div class="section-card">
        <div class="section-header">Changing States of Matter</div>
        <div class="section-body">
         <h3><strong>Melting</strong>: Solid → Liquid (ice → water)</h3>
          <img src="images\melting.png" alt="Melting">
  
          <hr style="border: none; border-top: 2px solid #28a745;">
  
          <h3><strong>Freezing</strong>: Liquid → Solid (water → ice)</h3>
          <img src="images\freezing.png" alt="Freezing">
  
          <hr style="border: none; border-top: 2px solid #28a745;">

          <h3><strong>Evaporation</strong>: Liquid → Gas (water → water vapor)</h3>
          <img src="images\evaporation.png" alt="Evaporation">
  
          <hr style="border: none; border-top: 2px solid #28a745;">

          <h3><strong>Condensation</strong>: Gas → Liquid (water vapor → water droplets)</h3>
          <img src="images\condensation.png" alt="Condensation">
  
          <hr style="border: none; border-top: 2px solid #28a745;">
          <p><strong>Examples in Everyday Life</strong></p>
          <p><strong>Melting</strong>: Ice cream melting on a hot day</p>
          <p><strong>Freezing</strong>: Water turning to ice in the freezer</p>
          <p><strong>Evaporation</strong>: Puddles drying up after rain</p>
          <p><strong>Condensation</strong>: Fog on a bathroom mirror after shower</p>
  
        </div>
      </div>

      <div class="section-card">
        <div class="section-header">Simple Experiments</div>
        <div class="section-body">
            <p><strong>Melting Ice</strong>- Time how long it takes ice to melt at room temperature</p>
            <p><strong>Making Popsicles</strong> - Observe liquid juice freezing into solid popsicles</p>
            <p><strong>Water Cycle in a Bag</strong>Watch water evaporate and condense in a sealed plastic bag</p>
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
