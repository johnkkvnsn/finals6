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
            </li>
        </ul>
    </div>
</nav>

  <!-- Content -->
  <div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">Lesson 3: Weather and Seasons</h2>

    <div class="section-card">
      <div class="section-header">Weather Basics</div>
      <div class="section-body">
        <img src="images\weather.png" alt="Weather">
        <ul>
          <li>Weather is the condition of the air at a specific time and place.</li>
          <li>Weather includes temperature, precipitation, wind, and cloud cover.</li>
          <li>Weather can change daily or even hourly.</li>
        </ul>
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Weather Types</div>
      <div class="section-body">
       <p><strong>Sunny</strong> - Clear skies, no clouds, bright sunshine</p>
        <img src="images\sunny.png" alt="Sunny">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Cloudy</strong> - Sky covered with clouds, less sunlight</p>
        <img src="images\cloudy.png" alt="Cloudy">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Rainy</strong> - Water falling from clouds</p>
        <img src="images\rainy.png" alt="Rainy">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Snowy</strong> - Frozen precipitation falling as snowflakes</p>
        <img src="images\snowy.png" alt="Snowy">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Windy</strong> - Strong moving air</p>
        <img src="images\windy.png" alt="Windy">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Foggy</strong> - Low clouds near the ground</p>
        <img src="images\foggy.png" alt="Foggy">

        <hr style="border: none; border-top: 2px solid #28a745;">

        <p><strong>Stormy</strong> - Strong winds, rain/snow, thunder and lightning</p>
        <img src="images\stormy.png" alt="Stormy">

      </div>
    </div>

    <div class="section-card">
      <div class="section-header">Weather Measurements</div>
      <div class="section-body">
        <p><strong>Temperature</strong> - How hot or cold it is (measured with a thermometer).</p>
        <p><strong>Wind speed</strong> - How fast the air is moving (measured with an anemometer).</p>
        <p><strong>Rainfall</strong> - How much rain falls (measured with a rain gauge).</p> 
      </div>
    </div>

    <div class="section-card">
      <div class="section-header">The Four Seasons</div>
      <div class="section-body">
        
        <p><strong>Spring</strong> (March, April, May in Northern Hemisphere).</p>
        <ul>
            <li>Warming temperatures.</li>
            <li>Plants begin to grow and bloom.</li>
            <li>Many baby animals are born.</li>
            <li>More rainy days in many places</li>
          </ul>
          <img src="images\spring.png" alt="Spring">

          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Summer</strong> (June, July, August in Northern Hemisphere).</p>
        <ul>
            <li>Hottest temperatures of the year.</li>
            <li>Longest days (most sunlight).</li>
            <li>Plants in full growth.</li>
            <li>Many thunderstorms in some areas</li>
          </ul>
          <img src="images\summer.png" alt="Summer">

          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Fall/Autumn</strong> (September, October, November in Northern Hemisphere).</p>
        <ul>
            <li>Cooling temperatures.</li>
            <li>Leaves changing colors and falling.</li>
            <li>Days getting shorter.</li>
            <li>Harvesting of many crops</li>
          </ul>
          <img src="images\fall.png" alt="Fall">

          <hr style="border: none; border-top: 2px solid #28a745;">

          <p><strong>Winter</strong> (December, January, February in Northern Hemisphere).</p>
        <ul>
            <li>Coldest temperatures of the year.</li>
            <li>Shortest days (least sunlight).</li>
            <li>Snow in many places.</li>
            <li>Many plants dormant (not growing)</li>
          </ul>
          <img src="images\winter.png" alt="Winter">

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
