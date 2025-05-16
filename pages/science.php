<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Science - EduPlatform</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
  <style>
    body {
      padding-top: 80px;
      background-color: #f8f9fa;
      font-size: 1.1rem;
      line-height: 1.6;
    }
    .topic-card {
      border-left: 5px solid #ffce32;
      border-radius: 15px;
      background: #fff;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
      padding: 20px;
    }
    .topic-btn {
      border-radius: 9999px;
      font-weight: bold;
    }
    .score {
      color: red;
      font-weight: bold;
    }
    .topic-content-icon {
      background: #e6f3fc;
      border-radius: 50%;
      padding: 10px;
      display: inline-block;
      font-size: 18px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-success fixed-top">
  <a class="navbar-brand" href="dashboard.php">EduPlatform</a>
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

<div class="container">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="text-center mb-0">Science</h1>
    <button class="btn btn-outline-success position-relative" data-toggle="modal" data-target="#announcementModal">
      <i class="fas fa-bullhorn"></i>
      <span id="unreadDot" class="position-absolute" style="display: none; top: 0; right: 0; width: 8px; height: 8px; background-color: red; border-radius: 50%;"></span>
    </button>
  </div>
  <div class="accordion" id="topicsAccordion">
    <!-- Lesson 1 -->
    <div class="card">
      <div class="card-header" id="headingOne">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left font-weight-bold" type="button" 
            data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
            Lesson 1: The Five Senses
          </button>
        </h2>
      </div>
      <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#topicsAccordion">
        <div class="card-body bg-light">
          <div class="d-flex align-items-center mb-3">
            <div class="topic-content-icon mr-2">📄</div>
            <a href="sci-lesson1.php" class="text-primary font-weight-bold">Topic Content</a>
          </div>
          <div class="topic-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3 mb-md-0">
              <div class="score mt-1" id="lesson1-score">0/10 Score</div>
            </div>
            <div>
              <button class="btn btn-info mr-2" onclick="showRankings('senses', 'science')">View Rankings</button>
              <a href="quiz.php?type=senses" class="btn btn-primary topic-btn">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Lesson 2 -->
    <div class="card">
      <div class="card-header" id="headingTwo">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left font-weight-bold" type="button" 
            data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Lesson 2: Plants and Animals
          </button>
        </h2>
      </div>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#topicsAccordion">
        <div class="card-body bg-light">
          <div class="d-flex align-items-center mb-3">
            <div class="topic-content-icon mr-2">📄</div>
            <a href="sci-lesson2.php" class="text-primary font-weight-bold">Topic Content</a>
          </div>
          <div class="topic-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3 mb-md-0">
              <div class="score mt-1" id="lesson2-score">0/10 Score</div>
            </div>
            <div>
              <button class="btn btn-info mr-2" onclick="showRankings('plants', 'science')">View Rankings</button>
              <a href="quiz.php?type=plants" class="btn btn-primary topic-btn">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Lesson 3 -->
    <div class="card">
      <div class="card-header" id="headingThree">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left font-weight-bold" type="button" 
            data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Lesson 3: Weather and Seasons
          </button>
        </h2>
      </div>
      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#topicsAccordion">
        <div class="card-body bg-light">
          <div class="d-flex align-items-center mb-3">
            <div class="topic-content-icon mr-2">📄</div>
            <a href="sci-lesson3.php" class="text-primary font-weight-bold">Topic Content</a>
          </div>
          <div class="topic-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3 mb-md-0">
              <div class="score mt-1" id="lesson3-score">0/10 Score</div>
            </div>
            <div>
              <button class="btn btn-info mr-2" onclick="showRankings('weather', 'science')">View Rankings</button>
              <a href="quiz.php?type=weather" class="btn btn-primary topic-btn">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Lesson 4 -->
    <div class="card">
      <div class="card-header" id="headingFour">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left font-weight-bold" type="button" 
            data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Lesson 4: Human Body
          </button>
        </h2>
      </div>
      <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#topicsAccordion">
        <div class="card-body bg-light">
          <div class="d-flex align-items-center mb-3">
            <div class="topic-content-icon mr-2">📄</div>
            <a href="sci-lesson4.php" class="text-primary font-weight-bold">Topic Content</a>
          </div>
          <div class="topic-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3 mb-md-0">
              <div class="score mt-1" id="lesson4-score">0/10 Score</div>
            </div>
            <div>
              <button class="btn btn-info mr-2" onclick="showRankings('body', 'science')">View Rankings</button>
              <a href="quiz.php?type=body" class="btn btn-primary topic-btn">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Lesson 5 -->
    <div class="card">
      <div class="card-header" id="headingFive">
        <h2 class="mb-0">
          <button class="btn btn-link btn-block text-left font-weight-bold" type="button" 
            data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Lesson 5: States of Matter
          </button>
        </h2>
      </div>
      <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#topicsAccordion">
        <div class="card-body bg-light">
          <div class="d-flex align-items-center mb-3">
            <div class="topic-content-icon mr-2">📄</div>
            <a href="sci-lesson5.php" class="text-primary font-weight-bold">Topic Content</a>
          </div>
          <div class="topic-card d-flex justify-content-between align-items-center flex-wrap">
            <div class="mb-3 mb-md-0">
              <div class="score mt-1" id="lesson5-score">0/10 Score</div>
            </div>
            <div>
              <button class="btn btn-info mr-2" onclick="showRankings('matter', 'science')">View Rankings</button>
              <a href="quiz.php?type=matter" class="btn btn-primary topic-btn">Start Quiz</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

<!-- Add PDF Files Section -->
<div class="container mt-5">
  <h3 class="mb-4">Learning Materials</h3>
  <div class="row" id="pdfFiles">
    <!-- PDF files will be loaded here -->
    <div class="col-12 text-center">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal for Rankings -->
<div class="modal fade" id="rankingsModal" tabindex="-1" role="dialog" aria-labelledby="rankingsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="rankingsModalLabel">Lesson Rankings</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="rankingsContent"></div>
      </div>
    </div>
  </div>
</div>

<!-- Add Modal for Announcements -->
<div class="modal fade" id="announcementModal" tabindex="-1" role="dialog" aria-labelledby="announcementModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="announcementModalLabel">Science Announcements</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="announcementContent"></div>
      </div>
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Ensure only one accordion item open at a time (Bootstrap 4)
  $('#topicsAccordion').on('show.bs.collapse', function (e) {
    $('#topicsAccordion .collapse.show').collapse('hide');
  });

  // Function to determine score color
  function getScoreColor(score, total) {
    const percentage = (score / total) * 100;
    if (percentage >= 80) { // 8-10
      return 'text-success'; // green
    } else if (percentage >= 40) { // 4-7
      return 'text-primary'; // blue
    } else { // 1-3
      return 'text-danger'; // red
    }
  }

  // Function to update quiz button state
  function updateQuizButton(button, score, quizType) {
    if (score > 0) {
      button.textContent = 'Completed';
      button.classList.remove('btn-primary');
      button.classList.add('btn-secondary');
      button.disabled = true;
      button.style.cursor = 'not-allowed';
    } else {
      button.textContent = 'Start Quiz';
      button.classList.remove('btn-secondary');
      button.classList.add('btn-primary');
      button.disabled = false;
      button.style.cursor = 'pointer';
    }
  }

  // Load scores from database and update UI
  document.addEventListener('DOMContentLoaded', function () {
    const quizTypes = {
      'lesson1-score': 'senses',
      'lesson2-score': 'plants',
      'lesson3-score': 'weather',
      'lesson4-score': 'body',
      'lesson5-score': 'matter'
    };

    // Fetch scores from the database
    fetch('get_scores.php')
      .then(response => {
        console.log('Response status:', response.status); // Debug log
        if (!response.ok) {
          throw new Error(`HTTP error! status: ${response.status}`);
        }
        return response.text().then(text => {
          console.log('Raw response:', text); // Debug log
          try {
            return JSON.parse(text);
          } catch (e) {
            console.error('JSON parse error:', e);
            throw new Error('Invalid JSON response');
          }
        });
      })
      .then(scores => {
        console.log('Parsed scores:', scores); // Debug log
        
        if (scores.error) {
          console.error('Server error:', scores.error);
          throw new Error(scores.error);
        }

        // Update each score display and quiz button
        Object.entries(quizTypes).forEach(([elementId, quizType]) => {
          const scoreEl = document.getElementById(elementId);
          const quizButton = scoreEl.closest('.topic-card').querySelector('.topic-btn');
          
          if (!scoreEl || !quizButton) {
            console.error(`Could not find elements for ${quizType}`);
            return;
          }

          if (scores[quizType]) {
            const { score, total } = scores[quizType];
            console.log(`Updating ${quizType} with score ${score}/${total}`); // Debug log
            
            scoreEl.textContent = `${score}/${total} Score`;
            // Remove any existing color classes
            scoreEl.classList.remove('text-danger', 'text-primary', 'text-success');
            // Add the appropriate color class
            scoreEl.classList.add(getScoreColor(score, total));

            // Update the quiz button state
            updateQuizButton(quizButton, score, quizType);
          } else {
            console.log(`No score found for ${quizType}`); // Debug log
            // If no score exists, show default state
            scoreEl.textContent = '0/10 Score';
            scoreEl.classList.remove('text-danger', 'text-primary', 'text-success');
            scoreEl.classList.add('text-danger');
            
            updateQuizButton(quizButton, 0, quizType);
          }
        });
      })
      .catch(error => {
        console.error('Error fetching scores:', error);
        // Show error state for all quizzes
        Object.entries(quizTypes).forEach(([elementId, quizType]) => {
          const scoreEl = document.getElementById(elementId);
          const quizButton = scoreEl.closest('.topic-card').querySelector('.topic-btn');
          
          if (scoreEl && quizButton) {
            scoreEl.textContent = 'Error: ' + error.message;
            scoreEl.classList.add('text-danger');
            updateQuizButton(quizButton, 0, quizType);
          }
        });
      });
  });

  // Function to show rankings for a specific lesson
  function showRankings(quizType, subject) {
    const modal = $('#rankingsModal');
    const content = $('#rankingsContent');
    
    // Show loading state
    content.html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');
    modal.modal('show');

    // Fetch rankings for the specific quiz
    fetch('get_lesson_rankings.php?quiz_type=' + encodeURIComponent(quizType) + '&subject=' + encodeURIComponent(subject))
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          content.html('<div class="alert alert-danger">' + data.error + '</div>');
          return;
        }

        let html = '<div class="ranking-list">';
        if (data.length === 0) {
          html = '<div class="alert alert-info">No rankings available for this lesson yet.</div>';
        } else {
          data.forEach((ranking, index) => {
            const percentage = (ranking.score / ranking.total_questions) * 100;
            const scoreClass = percentage >= 80 ? 'text-success' : 
                             percentage >= 40 ? 'text-primary' : 'text-danger';
            
            html += `
                <div class="ranking-item d-flex justify-content-between align-items-center p-2 border-bottom">
                    <div class="d-flex align-items-center">
                        <span class="rank-number font-weight-bold mr-3">#${index + 1}</span>
                        <span>${ranking.username}</span>
                    </div>
                    <span class="score ${scoreClass}">
                        ${ranking.score}/${ranking.total_questions}
                    </span>
                </div>
            `;
          });
        }
        html += '</div>';
        content.html(html);
      })
      .catch(error => {
        content.html('<div class="alert alert-danger">Error loading rankings. Please try again.</div>');
        console.error('Error:', error);
      });
  }

  // Function to load announcements
  function loadAnnouncements() {
    const content = $('#announcementContent');
    content.html('<div class="text-center"><div class="spinner-border" role="status"><span class="sr-only">Loading...</span></div></div>');

    // Hide the unread dot immediately when modal is opened
    $('#unreadDot').hide();

    fetch('get_announcements.php?subject=science')
      .then(response => response.json())
      .then(data => {
        if (data.error) {
          content.html('<div class="alert alert-danger">' + data.error + '</div>');
          return;
        }

        let html = '<div class="announcement-list">';
        
        if (data.length === 0) {
          html = '<div class="alert alert-info">No announcements available yet.</div>';
        } else {
          data.forEach(announcement => {
            html += `
              <div class="announcement-item p-3 mb-3 border-bottom" data-announcement-id="${announcement.id}">
                <h5>${announcement.title}</h5>
                <p class="text-muted small">Posted on: ${new Date(announcement.created_at).toLocaleString()}</p>
                <p>${announcement.content}</p>
              </div>
            `;
          });
        }
        html += '</div>';
        content.html(html);

        // Mark announcements as read when they are displayed
        data.forEach(announcement => {
          if (!announcement.is_read) {
            fetch('mark_announcement_read.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
              },
              body: `announcement_id=${announcement.id}`
            });
          }
        });
      })
      .catch(error => {
        content.html('<div class="alert alert-danger">Error loading announcements. Please try again.</div>');
        console.error('Error:', error);
      });
  }

  // Load announcements when modal is shown
  $('#announcementModal').on('show.bs.modal', function () {
    loadAnnouncements();
  });

  // Check for unread announcements on page load
  document.addEventListener('DOMContentLoaded', function() {
    fetch('get_announcements.php?subject=science')
      .then(response => response.json())
      .then(data => {
        if (!data.error) {
          const hasUnread = data.some(announcement => !announcement.is_read);
          $('#unreadDot').toggle(hasUnread);
        }
      })
      .catch(error => console.error('Error:', error));
  });

  // Function to load PDF files
  function loadPDFFiles() {
    const pdfContainer = $('#pdfFiles');
    
    console.log('Fetching PDF files for science...');
    
    fetch('get_pdf_files.php?subject=science')
      .then(response => {
        console.log('Response status:', response.status);
        return response.json();
      })
      .then(data => {
        console.log('Received data:', data);
        
        if (data.error) {
          console.error('Error from server:', data.error);
          pdfContainer.html('<div class="alert alert-danger">' + data.error + '</div>');
          return;
        }

        if (data.length === 0) {
          console.log('No files found');
          pdfContainer.html('<div class="alert alert-info">No learning materials available yet.</div>');
          return;
        }

        console.log('Processing', data.length, 'files');
        let html = '';
        data.forEach(file => {
          console.log('Processing file:', file);
          const filePath = '../' + file.filepath; // Add ../ to make path relative to pages directory
          console.log('File path:', filePath);
          html += `
            <div class="col-md-4 mb-4">
              <div class="card h-100">
                <div class="card-body">
                  <h5 class="card-title">${file.title}</h5>
                  <p class="card-text">${file.description}</p>
                  <p class="card-text text-muted small">
                    Uploaded on: ${new Date(file.uploaded_at).toLocaleString()}
                  </p>
                  <a href="${filePath}" class="btn btn-primary" target="_blank">
                    <i class="fas fa-file-pdf mr-2"></i>View PDF
                  </a>
                </div>
              </div>
            </div>
          `;
        });
        console.log('Generated HTML:', html);
        pdfContainer.html(html);
      })
      .catch(error => {
        console.error('Error fetching PDF files:', error);
        pdfContainer.html('<div class="alert alert-danger">Error loading learning materials. Please try again.</div>');
      });
  }

  // Load PDF files when page loads
  document.addEventListener('DOMContentLoaded', function() {
    loadPDFFiles();
  });
</script>

</body>
</html>
  