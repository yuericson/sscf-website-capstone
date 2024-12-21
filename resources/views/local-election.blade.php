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
  
  <link rel="stylesheet" href="{{ asset('css/local-election.css') }}">
    
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">


  
  

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









   <!-- Local Election Page Title -->
   <div class="container text-center my-5">
    <div class="voting-title">Local Election</div>
    <div class="voting-title-underline"></div>
</div>

<!-- Candidates for Upcoming Federal Election -->
<div class="container my-5">
  <h2 class="voting-section-title">Candidates for Upcoming Federal Election</h2>




  <h3 class="voting-subtitle">Aspiring President/Student Regent</h3>

<div class="row candidate-images">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringPresident.jpg')">
            <img src="../images/AspiringPresident.jpg" alt="Candidate 1" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringPresident.jpg')">
            <img src="../images/AspiringPresident.jpg" alt="Candidate 2" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringPresident.jpg')">
            <img src="../images/AspiringPresident.jpg" alt="Candidate 3" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringPresident.jpg')">
            <img src="../images/AspiringPresident.jpg" alt="Candidate 4" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
</div>

<h3 class="voting-subtitle">Aspiring Vice President - Internal</h3>

<div class="row candidate-images">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentInternal.jpg')">
            <img src="../images/AspiringVicePresidentInternal.jpg" alt="Candidate 1" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentInternal.jpg')">
            <img src="../images/AspiringVicePresidentInternal.jpg" alt="Candidate 2" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentInternal.jpg')">
            <img src="../images/AspiringVicePresidentInternal.jpg" alt="Candidate 3" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentInternal.jpg')">
            <img src="../images/AspiringVicePresidentInternal.jpg" alt="Candidate 4" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
</div>

<h3 class="voting-subtitle">Aspiring Vice President - External</h3>

<div class="row candidate-images">
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentExternal.jpg')">
            <img src="../images/AspiringVicePresidentExternal.jpg" alt="Candidate 1" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentExternal.jpg')">
            <img src="../images/AspiringVicePresidentExternal.jpg" alt="Candidate 2" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentExternal.jpg')">
            <img src="../images/AspiringVicePresidentExternal.jpg" alt="Candidate 3" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
        <div class="candidate-hover" onclick="showFullImage('../images/AspiringVicePresidentExternal.jpg')">
            <img src="../images/AspiringVicePresidentExternal.jpg" alt="Candidate 4" class="img-fluid candidate-img">
            <div class="overlay">
                <span class="plus-icon">+</span>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Fullscreen Image Overlay -->
<div class="fullscreen-overlay" id="fullscreenOverlay" onclick="hideFullImage()">
    <span class="close-icon" onclick="hideFullImage()">✖</span>
    <img id="fullscreenImage" src="" alt="Fullscreen Image">
</div>

  

<script>
// Function to show the fullscreen image
function showFullImage(src) {
    const fullscreenOverlay = document.getElementById('fullscreenOverlay');
    const fullscreenImage = document.getElementById('fullscreenImage');
    fullscreenImage.src = src; // Set the source of the image
    fullscreenOverlay.style.display = 'flex'; // Show the overlay
}

// Function to hide the fullscreen image
function hideFullImage() {
    const fullscreenOverlay = document.getElementById('fullscreenOverlay');
    fullscreenOverlay.style.display = 'none'; // Hide the overlay
}
</script>

<!--End of  Candidates for Upcoming Federal Election -->





<div class="how-to-vote-container">
  <div class="text-center mt-5">
    <h3 class="how-to-vote-title">How to Vote</h3>
    <div class="steps-container">
      <div class="step-box">
        <div class="step-number">1</div>
        <div class="step-icon">
          <i class="fas fa-envelope"></i> <!-- Icon for Step 1 -->
        </div>
        <p>Login your email account</p>
      </div>
      <div class="step-box">
        <div class="step-number">2</div>
        <div class="step-icon">
          <i class="fas fa-user-check"></i> <!-- Icon for Step 2 -->
        </div>
        <p>Registration process</p>
      </div>
      <div class="step-box">
        <div class="step-number">3</div>
        <div class="step-icon">
          <i class="fas fa-id-card"></i> <!-- Icon for Step 3 -->
        </div>
        <p>Login your Voter’s Id and Password</p>
      </div>
      <div class="step-box">
        <div class="step-number">4</div>
        <div class="step-icon">
          <i class="fas fa-vote-yea"></i> <!-- Icon for Step 4 -->
        </div>
        <p>Choose the candidate you want to vote</p>
      </div>
      <div class="step-box">
        <div class="step-number">5</div>
        <div class="step-icon">
          <i class="fas fa-paper-plane"></i> <!-- Icon for Step 5 -->
        </div>
        <p>Submit your votes</p>
      </div>
      <div class="step-box">
        <div class="step-number">6</div>
        <div class="step-icon">
          <i class="fas fa-eye"></i> <!-- Icon for Step 6 -->
        </div>
        <p>View your votes</p>
      </div>
    </div>

 <!-- Voting Button -->
<div class="voting-btn-container mt-4">
    <a href="{{ route('voters-login') }}" class="btn btn-primary voting-btn" id="voteButton">Vote Now</a>
</div>

    
  </div>
</div>










<!-- Election Start Section -->
<div class="container text-center my-5">
  <h3 class="countdown-title">Election Start</h3>
  <div class="countdown-timer" id="startCountdownTimer">
    <div class="timer-section">
      <span id="start-days">00</span> Days
    </div>
    <div class="timer-section">
      <span id="start-hours">00</span> Hours
    </div>
    <div class="timer-section">
      <span id="start-minutes">00</span> Minutes
    </div>
    <div class="timer-section">
      <span id="start-seconds">00</span> Seconds
    </div>
  </div>
</div>

<!-- Election End Section -->
<div class="container text-center my-5">
  <h3 class="countdown-title">Election End</h3>
  <div class="countdown-timer" id="endCountdownTimer">
    <div class="timer-section">
      <span id="end-days">00</span> Days
    </div>
    <div class="timer-section">
      <span id="end-hours">00</span> Hours
    </div>
    <div class="timer-section">
      <span id="end-minutes">00</span> Minutes
    </div>
    <div class="timer-section">
      <span id="end-seconds">00</span> Seconds
    </div>
  </div>
</div>




















@include('layouts.footer')

  
  
  
  <script>
 // Election Start Countdown
const startCountDownDate = new Date("September 21, 2024 00:12:00").getTime();
const startTimer = setInterval(function() {
  const now = new Date().getTime();
  const distance = startCountDownDate - now;
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("start-days").innerText = days;
  document.getElementById("start-hours").innerText = hours;
  document.getElementById("start-minutes").innerText = minutes;
  document.getElementById("start-seconds").innerText = seconds;

  if (distance < 0) {
    clearInterval(startTimer);
    document.getElementById("start-days").innerText = "0";
    document.getElementById("start-hours").innerText = "0";
    document.getElementById("start-minutes").innerText = "0";
    document.getElementById("start-seconds").innerText = "0";
  }
}, 1000);

// Election End Countdown
const endCountDownDate = new Date("August 14, 2024 12:01:00").getTime();
const endTimer = setInterval(function() {
  const now = new Date().getTime();
  const distance = endCountDownDate - now;
  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("end-days").innerText = days;
  document.getElementById("end-hours").innerText = hours;
  document.getElementById("end-minutes").innerText = minutes;
  document.getElementById("end-seconds").innerText = seconds;

  if (distance < 0) {
    clearInterval(endTimer);
    document.getElementById("end-days").innerText = "0";
    document.getElementById("end-hours").innerText = "0";
    document.getElementById("end-minutes").innerText = "0";
    document.getElementById("end-seconds").innerText = "0";
  }
}, 1000);


  </script>
  
  
  
  
  
  
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>
  