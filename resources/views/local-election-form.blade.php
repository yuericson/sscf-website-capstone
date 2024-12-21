<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SSCF</title>
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">
  <!-- Bootstrap JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <link rel="stylesheet" href="{{ asset('css/local-election-form.css') }}">
    
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">

  
  

</head>

<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-text">
      <a href="{{ route('index') }}" class="navbar-link">S S C F</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <div></div> 
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">About us</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
            <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
            <li><a class="dropdown-item" href="{{ route('mission.vision') }}">Mission & Vision</a></li>
            <li><a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a></li>
            <li><a class="dropdown-item" href="{{ route('committees') }}">Committees</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResources" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownResources">
            <li><a class="dropdown-item" href="{{ route('student.guide') }}">Student Guide</a></li>
            <li><a class="dropdown-item" href="{{ route('academic.resources') }}">Academic Resources</a></li>
            <li><a class="dropdown-item" href="{{ route('career.support') }}">Career Support</a></li>
            <li><a class="dropdown-item" href="{{ route('wellbeing.support') }}">Well-being Support</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMedia" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">News & Media</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMedia">
            <li><a class="dropdown-item" href="{{ route('latest.news') }}">Latest News</a></li>
            <li><a class="dropdown-item" href="{{ route('newsletter') }}">Newsletter</a></li>
            <li><a class="dropdown-item" href="{{ route('media.gallery') }}">Media Gallery</a></li>
            <li><a class="dropdown-item" href="{{ route('press.releases') }}">Press Releases</a></li>
            <li><a class="dropdown-item" href="{{ route('presidents.corner') }}">SSCF President's Corner</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInvolved" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Get Involved</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownInvolved">
            <li><a class="dropdown-item" href="{{ route('explore.organization') }}">Explore Organization</a></li>
            <li><a class="dropdown-item" href="{{ route('volunteer.opportunities') }}">Volunteer Opportunities</a></li>
            <li><a class="dropdown-item" href="{{ route('forum') }}">Forum</a></li>
            <li><a class="dropdown-item" href="{{ route('feedback') }}">Feedback</a></li>
            <li><a class="dropdown-item" href="{{ route('sports.registration') }}">Sports Registration</a></li>
            <li><a class="dropdown-item" href="{{ route('local.election') }}">Local Election</a></li>
            <li><a class="dropdown-item" href="{{ route('tabulation') }}">Tabulation</a></li>
            <li><a class="dropdown-item" href="{{ route('calendar.activities') }}">Calendar Activities</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact.us') }}">Contact us</a></li>
        <li class="nav-item">
          <!-- End Navigation -->
        


<!-- Login Button -->
<div class="navbar-login-container">
    <a class="btn navbar-login-btn" href="{{ route('login') }}" id="login-btn">Login</a>
</div>
<!-- End Login Button -->





        </li>
      </ul>
    </div>
  </div>
</nav>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        fetchUserInfo();
    });

    function fetchUserInfo() {
        fetch("/api/user", { headers: { Accept: "application/json" } })
            .then((response) => response.json())
            .then((data) => {
                if (data.user) {
                    updateLoginButtonWithAvatar(data.user.avatar, "{{ route('logout') }}");
                } else {
                    resetLoginButton();
                }
            })
            .catch((error) => console.error("Error fetching user data:", error));
    }

    function updateLoginButtonWithAvatar(avatar, logoutRoute) {
        const loginContainer = document.querySelector(".navbar-login-container");

        if (loginContainer && avatar) {
            loginContainer.innerHTML = `
                <div class="dropdown">
                    <img
                        src="${avatar}"
                        alt="User Avatar"
                        class="rounded-circle dropdown-toggle"
                        id="avatarDropdown"
                        data-bs-toggle="dropdown"
                        aria-expanded="false"
                        style="width: 40px; height: 40px; cursor: pointer;"
                    />
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="avatarDropdown">
                        <li>
                            <a class="dropdown-item" href="{{ route('profile') }}">My Profile</a>
                        </li>
                        <li>
                            <form action="${logoutRoute}" method="POST" id="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item" id="logout-btn">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            `;

            const logoutForm = document.getElementById("logout-form");
            logoutForm.addEventListener("submit", handleLogout);
        }
    }

    function handleLogout(event) {
        event.preventDefault();

        const logoutButton = document.getElementById("logout-btn");

        // Add fade-out effect
        logoutButton.classList.add("fade-out");

        // Wait for animation to finish before reloading
        setTimeout(() => {
            const form = event.target;
            const csrfToken = form.querySelector('input[name="_token"]').value;

            fetch(form.action, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": csrfToken,
                },
            })
                .then((response) => {
                    if (response.ok) {
                        // Reload the page
                        window.location.href = "{{ route('index') }}";
                    } else {
                        console.error("Logout failed");
                    }
                })
                .catch((error) => console.error("Error during logout:", error));
        }, 500); // Delay matches animation duration
    }

    function resetLoginButton() {
        const loginContainer = document.querySelector(".navbar-login-container");
        if (loginContainer) {
            loginContainer.innerHTML = `
                <a class="btn navbar-login-btn" href="{{ route('login') }}" id="login-btn">Login</a>
            `;
        }
    }
</script>


<style>
    /* Animation for fading out */
    .fade-out {
        animation: fadeOut 0.5s forwards;
    }

    /* Keyframes for fade-out effect */
    @keyframes fadeOut {
        from {
            opacity: 1;
        }
        to {
            opacity: 0;
        }
    }

    /* Adjust dropdown positioning for avatar */
    .dropdown-menu-end {
        right: 0;
        left: auto;
    }

    .navbar-login-container img {
        border: 2px solid #ddd;
        transition: border-color 0.3s;
    }

    .navbar-login-container img:hover {
        border-color: #007bff;
    }
</style>









  <!-- JS FOR DROPDOWN ACTIVE LINK -->
  <script>
    // Get current URL
    const currentUrl = window.location.href;

    // Get all nav links and dropdown items
    const navLinks = document.querySelectorAll('.nav-link');
    const dropdownItems = document.querySelectorAll('.dropdown-item');

    // Function to add 'active' class to link and parent dropdown
    function setActiveLink(link) {
      link.classList.add('active');

      // If it's part of a dropdown, highlight the parent dropdown too
      const parentDropdown = link.closest('.dropdown-menu');
      if (parentDropdown) {
        const dropdownToggle = parentDropdown.closest('.dropdown').querySelector('.nav-link.dropdown-toggle');
        dropdownToggle.classList.add('active');
      }
    }

    // Loop through each nav link
    navLinks.forEach(link => {
      if (link.href === currentUrl) {
        setActiveLink(link);
      }
    });

    // Loop through each dropdown item
    dropdownItems.forEach(item => {
      if (item.href === currentUrl) {
        setActiveLink(item);
      }
    });
  </script>






<!-- LOADER -->
<!-- Loading screen -->
<div id="loading">
  <img src="../images/Logo.png" alt="Loading...">
  <div class="logo-dots">
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
    <span class="dot"></span>
  </div>
</div>


<script>
  // Function to display the loading spinner
  function showLoading() {
    document.getElementById('loading').style.display = 'flex';
  }

  // Attach showLoading to all navigation links except the login button
  document.querySelectorAll('.nav-link, .dropdown-item').forEach(link => {
    link.addEventListener('click', function (e) {
      const href = this.getAttribute('href');

      if (href && href !== '#') {
        showLoading();

        setTimeout(() => {
          window.location.href = href;
        }, 1000); // Increased delay to 1500 milliseconds for visibility

        e.preventDefault();
      }
    });
  });

  // Open the login in a new tab and display the loading spinner
  document.getElementById('login-btn').addEventListener('click', function (e) {
    e.preventDefault();
    showLoading();

    setTimeout(() => { // Delay before opening new tab to display loading spinner longer
      const href = this.getAttribute('href');
      if (href && href !== '#') {
        const loginWindow = window.open(href, '_blank');

        const pollTimer = setInterval(() => {
          if (loginWindow.closed) {
            clearInterval(pollTimer);
            showLoading(); 
            setTimeout(() => {
              location.reload();
            }, 1000); 
          }
        }, 500);
      }
    }, 1000); 
  });

  // Hide loading spinner after page load
  window.addEventListener('load', function () {
    document.getElementById('loading').style.display = 'none';
  });
</script>
<!-- END OF LOADER -->


  <!-- Election Voting Form Section -->
  <section class="election-voting-form">
        <div class="container">
            <div class="form-box">
                <h1>Election Voting Form</h1>
                <p>Please fill out the details below to cast your vote.</p>

                <form id="votingForm">
                    <!-- Personal Information Section -->
                    <div class="form-group">
                        <label for="name"><i class="fas fa-user"></i> Full Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your full name" required>
                    </div>

                    <div class="form-group">
                        <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email address" required>
                    </div>

                    <div class="form-group">
                        <label for="college-campus"><i class="fas fa-university"></i> College/Campus</label>
                        <select id="college-campus" required>
                            <option value="">Select College/Campus</option>
                            <option value="College of Allied and Medicine">College of Allied and Medicine</option>
                            <option value="College of Administration, Business, and Accountancy">College of Administration, Business, and Accountancy</option>
                            <option value="College of Teacher Education">College of Teacher Education</option>
                            <option value="College of Arts and Sciences">College of Arts and Sciences</option>
                            <option value="College of Engineering (CEn)">College of Engineering (CEn)</option>
                            <option value="College of Industrial Technology">College of Industrial Technology</option>
                            <option value="College of Agriculture (CAg)">College of Agriculture (CAg)</option>
                            <option value="SLSU Lucena Campus">SLSU Lucena Campus</option>
                            <option value="SLSU Alabat Campus">SLSU Alabat Campus</option>
                            <option value="SLSU Tayabas Campus">SLSU Tayabas Campus</option>
                            <option value="SLSU Gumaca Campus">SLSU Gumaca Campus</option>
                            <option value="SLSU Catanauan Campus">SLSU Catanauan Campus</option>
                            <option value="SLSU Tagkawayan Campus">SLSU Tagkawayan Campus</option>
                            <option value="SLSU Polillo Campus">SLSU Polillo Campus</option>
                            <option value="SLSU Infanta Campus">SLSU Infanta Campus</option>
                            <option value="SLSU Tiaong Campus">SLSU Tiaong Campus</option>
                        </select>
                    </div>

                    <!-- Candidate Selection Sections -->
                    <div class="candidate-section">
                        <h2>Aspiring President/Student Regent</h2>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="president" value="candidate1" required>
                                <span>Candidate 1</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="president" value="candidate2">
                                <span>Candidate 2</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="president" value="candidate3">
                                <span>Candidate 3</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="president" value="candidate4">
                                <span>Candidate 4</span>
                            </label>
                        </div>
                    </div>

                    <div class="candidate-section">
                        <h2>Aspiring Vice President - Internal</h2>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="vp_internal" value="candidate1" required>
                                <span>Candidate 1</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_internal" value="candidate2">
                                <span>Candidate 2</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_internal" value="candidate3">
                                <span>Candidate 3</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_internal" value="candidate4">
                                <span>Candidate 4</span>
                            </label>
                        </div>
                    </div>

                    <div class="candidate-section">
                        <h2>Aspiring Vice President - External</h2>
                        <div class="radio-group">
                            <label class="radio-option">
                                <input type="radio" name="vp_external" value="candidate1" required>
                                <span>Candidate 1</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_external" value="candidate2">
                                <span>Candidate 2</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_external" value="candidate3">
                                <span>Candidate 3</span>
                            </label>
                            <label class="radio-option">
                                <input type="radio" name="vp_external" value="candidate4">
                                <span>Candidate 4</span>
                            </label>
                        </div>
                    </div>

                    <button type="submit">Submit Your Vote</button>
                </form>

                <p class="info"><i class="fas fa-lock"></i> Your vote is confidential and will remain anonymous.</p>
            </div>
        </div>

        <!-- Modal Overlay -->
        <div id="modalOverlay"></div>

        <!-- Message Box -->
        <div class="card" id="messageBox">
            <button class="dismiss" type="button" onclick="closeMessage()">×</button>
            <div class="header">
                <div class="image">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div class="content">
                    <span class="title">Vote Submitted!</span>
                    <p class="message">
                        Thank you for casting your vote. Your voice matters, and it will contribute to making a
                        difference!
                    </p>
                </div>
                <div class="actions">
                    <button class="confirm" type="button" onclick="closeMessage()">Confirm</button>
                </div>
            </div>
        </div>
    </section>










  
<script>
  // Variables to store vote counts
  let presidentVotes = { 'Candidate 1': 0, 'Candidate 2': 0, 'Candidate 3': 0, 'Candidate 4': 0 };
  let vpInternalVotes = { 'Candidate 1': 0, 'Candidate 2': 0, 'Candidate 3': 0, 'Candidate 4': 0 };
  let vpExternalVotes = { 'Candidate 1': 0, 'Candidate 2': 0, 'Candidate 3': 0, 'Candidate 4': 0 };

  // Submit Vote and Store Voting Data
  document.getElementById('votingForm').addEventListener('submit', function(e) {
      e.preventDefault();

      // Capture vote choices
      const president = document.querySelector('input[name="president"]:checked').nextElementSibling.textContent;
      const vpInternal = document.querySelector('input[name="vp_internal"]:checked').nextElementSibling.textContent;
      const vpExternal = document.querySelector('input[name="vp_external"]:checked').nextElementSibling.textContent;

      // Increment the vote counts
      presidentVotes[president]++;
      vpInternalVotes[vpInternal]++;
      vpExternalVotes[vpExternal]++;

      // Show the message box and hide the voting form
      showMessage();
  });

  // Function to close the message box and redirect
  function closeMessage() {
      const messageBox = document.getElementById('messageBox');
      const modalOverlay = document.getElementById('modalOverlay');

      messageBox.style.opacity = 0; // Fade out effect
      setTimeout(() => {
          messageBox.classList.remove('show'); // Remove class after fade out
          messageBox.style.display = 'none'; // Hide message box
          modalOverlay.style.display = 'none'; // Hide overlay

          // Redirect to voting.html
          window.location.href = 'local-election';
      }, 500); // Match with CSS transition duration
  }

  // Function to show the message box
  function showMessage() {
      const messageBox = document.getElementById('messageBox');
      const modalOverlay = document.getElementById('modalOverlay');
      const formContainer = document.querySelector('.election-voting-form .container');

      // Hide the voting form
      formContainer.style.display = 'none'; // Hide the entire container

      modalOverlay.style.display = 'block'; // Show overlay

      setTimeout(() => {
          messageBox.classList.add('show'); // Add class for fade-in
          messageBox.style.display = 'block'; // Show message box
          setTimeout(() => {
              messageBox.style.opacity = 1; // Fade in effect
          }, 10); // Slight delay to allow transition
      }, 100); // Delay to show overlay before message box
  }
</script>




</section>

      





  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
