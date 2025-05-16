<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>EduPlatform | Learn and Have Fun!</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f9fa;
    }

    /* Navbar */
    .navbar {
      background-color: #28a745;
    }
    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      color: white;
    }
    .navbar-nav .nav-link {
      color: white;
      font-weight: 600;
    }
    .navbar-nav .nav-link:hover {
      color: #d1fae5;
    }

    /* Hero */
    .hero {
      background: linear-gradient(to right, #28a745, #1d8e44);
      color: white;
      padding: 100px 20px;
      text-align: center;
    }
    .hero h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    .hero p {
      font-size: 1.25rem;
      margin-top: 15px;
    }
    .btn-cta {
      background-color: #fff;
      color: #28a745;
      border: none;
      padding: 10px 25px;
      font-size: 1rem;
      font-weight: 600;
      border-radius: 50px;
      transition: all 0.3s ease;
    }
    .btn-cta:hover {
      background-color: #d1fae5;
      color: #1d8e44;
    }

    /* Features */
    .features {
      padding: 60px 20px;
    }
    .feature-icon {
      font-size: 40px;
      color: #28a745;
      margin-bottom: 20px;
    }

    .feature h4 {
      color: #28a745;
    }

    /* Footer */
    footer {
      background-color: #28a745;
      color: white;
      padding: 30px 0;
    }
    footer a {
      color: #d1fae5;
      text-decoration: none;
    }
    footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #28a745;">
    <a class="navbar-brand" href="#">EduPlatform</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero" id="home">
    <div class="container">
      <h1>Let's Learn and Have Fun!</h1>
      <p>Explore cool and exciting lessons just for you. Learning is fun when we do it together!</p>
      <a href="login.php" class="btn btn-cta mt-4">Start Learning</a>
    </div>
  </section>

  <!-- Features Section -->
  <section class="features text-center" id="features">
    <div class="container">
      <h2>Why You'll Love EduPlatform</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-icon">📚</div>
          <h4>Fun Lessons</h4>
          <p>Learn through videos, games, and activities. Learning feels like play!</p>
        </div>
        <div class="col-md-4">
          <div class="feature-icon">🎨</div>
          <h4>Creative Projects</h4>
          <p>Show off your creativity with fun art and science projects you can share with your friends.</p>
        </div>
        <div class="col-md-4">
          <div class="feature-icon">🏆</div>
          <h4>Earn Badges</h4>
          <p>Complete lessons and challenges to earn cool badges and rewards!</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="text-center">
    <div class="container">
      <p class="mb-1">&copy; 2025 EduPlatform. All rights reserved.</p>
      <p>
        <a href="#">Privacy Policy</a> |
        <a href="#">Terms of Use</a> |
        <a href="#features">Explore Lessons</a>
      </p>
    </div>
  </footer>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</body>
</html>
