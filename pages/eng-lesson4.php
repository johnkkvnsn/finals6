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
    <h2 class="text-primary mb-4 font-weight-bold">Lesson 4: Spelling and Vocabulary</h2>
  
    <div class="section-card">
      <div class="section-header">Word Families</div>
      <div class="section-body">
        <p>Words that rhyme and have the same spelling pattern:</p>
        <ul>
          <li><strong>-at family:</strong> cat, bat, rat, sat, hat, mat, fat</li>
          <li><strong>-an family:</strong> can, fan, man, pan, ran, tan, van</li>
          <li><strong>-ig family:</strong> big, dig, fig, pig, wig</li>
          <li><strong>-op family:</strong> cop, hop, mop, pop, top</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Sight Words</div>
      <div class="section-body">
        <p>Common words to memorize:</p>
        <p>
          the, of, and, a, to, in, is, you, that, it, he, was, for, on, are, as, with, his, they, I, at, be, this, have, from,
          or, one, had, by, words, but, not, what, all, were
        </p>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Vocabulary Building</div>
      <div class="section-body">
        <p>Learn these words with their meanings:</p>
        <ol>
          <li><strong>Big</strong> – large in size</li>
          <li><strong>Small</strong> – little in size</li>
          <li><strong>Happy</strong> – feeling joy</li>
          <li><strong>Sad</strong> – feeling unhappy</li>
          <li><strong>Fast</strong> – moving quickly</li>
          <li><strong>Slow</strong> – moving not quickly</li>
          <li><strong>Hot</strong> – high in temperature</li>
          <li><strong>Cold</strong> – low in temperature</li>
          <li><strong>New</strong> – recently made</li>
          <li><strong>Old</strong> – not new, existing for a long time</li>
        </ol>
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