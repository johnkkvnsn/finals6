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
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.php">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contacts.php">Contacts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

  <!-- Content -->
  <div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">LESSON 2: Plants and Animals</h2>

    <div class="section-card">
      <div class="section-header">Living Things</div>
      <div class="section-body">
        <ul>
          <li>All living things need food, water, and air.</li>
          <li>Living things grow and change.</li>
          <li>Living things can reproduce (make more of their kind).</li>
        </ul>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Plant Characteristics</div>
      <div class="section-body">
        <img src="images\plant.png" alt="Plant">
        <ul>
            <li>Plants make their own food using sunlight (photosynthesis).</li>
            <li>Plants usually stay in one place.</li>
            <li>Most plants have roots, stems, and leaves.</li>
            <li>Many plants produce flowers and seeds.</li>
          </ul>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Plant Parts</div>
      <div class="section-body">
        <p><strong>Roots</strong> - Underground parts that absorb water and minerals</p>
        <img src="images\roots.png" alt="Roots">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Stem</strong> - Supports the plant and carries water/nutrients</p>
        <img src="images\stem.png" alt="Stem">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Leaves</strong> - Make food using sunlight</p>
        <img src="images\leaves.png" alt="Leaves">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Flowers</strong> - Help plants reproduce</p>
        <img src="images\flowers.png" alt="Flowers">

          

        <p><strong>Seeds</strong> - Grow into new plants</p>
        <img src="images\seeds.png" alt="Seeds">
      </div>
    </div>

    <div class="section-card">
        <div class="section-header">Animal Characteristics</div>
        <div class="section-body">
          <ul>
            <li>Animals need to eat food (cannot make their own).</li>
            <li>Most animals can move from place to place.</li>
            <li>Animals respond quickly to their environment.</li>
            <li>Animals have different body coverings (fur, feathers, scales, skin).</li>
          </ul>
        </div>
      </div>

      <div class="section-card">
        <div class="section-header">Animal Groups</div>
        <div class="section-body">
          <p><strong>Mammals</strong> - Have fur/hair, warm-blooded, babies drink milk</p>
          <p>Examples: dogs, cats, horses, humans</p>
          <img src="images\mammals.png" alt="Mammals">

          <hr style="border: none; border-top: 2px solid #28a745;">
          
  
          <p><strong>Birds</strong> - Have feathers, lay eggs, warm-blooded</p>
          <p>Examples: robins, eagles, chickens, penguins</p>
          <img src="images\birds.png" alt="Birds">

          <hr style="border: none; border-top: 2px solid #28a745;">
  
          <p><strong>Fish</strong> - Live in water, have scales and fins, cold-blooded</p>
          <p>Examples: goldfish, sharks, tuna, salmon</p>
          <img src="images\fish.png" alt="Fish">

          <hr style="border: none; border-top: 2px solid #28a745;">
  
          <p><strong>Reptiles</strong> - Have scales, lay eggs, cold-blooded</p>
          <p>Examples: snakes, turtles, lizards, alligators</p>
          <img src="images\reptiles.png" alt="Reptiles">

          <hr style="border: none; border-top: 2px solid #28a745;">
  
          <p><strong>Amphibians</strong> - Smooth moist skin, most live on land and water, cold-blooded</p>
          <p>Examples: frogs, toads, salamanders, newts</p>
          <img src="images\amphibians.png" alt="Amphibians">

          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Insects</strong> - Six legs, three body parts, have antennae</p>
          <p>Examples: ants, butterflies, beetles, bees</p>
          <img src="images\insects.png" alt="Insects">

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
</body>
</html>
