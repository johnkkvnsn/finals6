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
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
    </div>
  </nav>
<!-- Content -->
<div class="container mt-4">
    <h2 class="text-success mb-4 font-weight-bold">Lesson 1: Alphabet and Phonics</h2>
  
    <div class="section-card">
      <div class="section-header">Alphabet Introduction</div>
      <div class="section-body">
        <ul>
          <li>The English alphabet has 26 letters: A–Z</li>
          <li>Letters can be uppercase (capital) or lowercase (small)</li>
          <li>Each letter has a name and makes specific sounds</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Alphabet Chart</div>
      <div class="section-body">
        <pre>
  A a - apple, ant
  B b - ball, bee
  C c - cat, carrot
  D d - dog, duck
  E e - egg, elephant
  F f - flag, flower
  G g - goat, grass
  H h - house, hat
  I i - igloo, ice
  J j - jar, jam
  K k - kite, kid
  L l - lemon, leaf
  M m - moon, milk
  N n - nut, net
  O o - orange, octopus
  P p - pig, pencil
  Q q - queen
  R r - rabbit, rose
  S s - sun, sea
  T t - tree, tiger
  U u - umbrella, up
  V v - van, vest
  W w - water, waiter
  X x - xylophone
  Y y - yellow, yarn
  Z z - zebra, zoo
        </pre>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Phonics Basics</div>
      <div class="section-body">
        <ul>
          <li><strong>Vowels:</strong> A, E, I, O, U (and sometimes Y)</li>
          <li><strong>Consonants:</strong> All other letters</li>
          <li><strong>Short vowel sounds:</strong> cat, pet, sit, pot, cut</li>
          <li><strong>Long vowel sounds:</strong> cake, beet, kite, note, cute</li>
          <li><strong>Consonant blends:</strong> bl, br, cl, cr, dr, fl, fr, gl, gr, pl, pr, sc, sk, sl, sm, sn, sp, st, sw, tr</li>
          <li><strong>Digraphs:</strong> ch, sh, th, wh, ph</li>
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
</body>
</html>