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
    <h2 class="text-primary mb-4 font-weight-bold">Lesson 5: Sentence Formation</h2>
  
    <div class="section-card">
      <div class="section-header">Parts of a Sentence</div>
      <div class="section-body">
        <ul>
          <li>A sentence starts with a capital letter</li>
          <li>A sentence ends with a punctuation mark (. ? !)</li>
          <li>A complete sentence has a subject (who or what) and a predicate (what about it)</li>
        </ul>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Simple Sentence Patterns</div>
      <div class="section-body">
        <ol>
          <li><strong>Subject + Verb:</strong> The dog barks.</li>
          <li><strong>Subject + Verb + Object:</strong> The girl kicks the ball.</li>
          <li><strong>Subject + Verb + Adjective:</strong> The milk is cold.</li>
        </ol>
      </div>
    </div>
  
    <div class="section-card">
      <div class="section-header">Creating Sentences</div>
      <div class="section-body">
        <p>Practice making sentences using these patterns:</p>
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Subject</th>
              <th>Verb</th>
              <th>Object/Adjective</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>The cat</td>
              <td>drinks</td>
              <td>milk</td>
            </tr>
            <tr>
              <td>Tim</td>
              <td>reads</td>
              <td>a book</td>
            </tr>
            <tr>
              <td>She</td>
              <td>is</td>
              <td>happy</td>
            </tr>
            <tr>
              <td>The boy</td>
              <td>kicks</td>
              <td>the ball</td>
            </tr>
            <tr>
              <td>Birds</td>
              <td>fly</td>
              <td>high</td>
            </tr>
          </tbody>
        </table>
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