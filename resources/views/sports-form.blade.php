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

 
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
 


  <style>
  /* Style for active nav-link and dropdown-item */
  .nav-link.active, 
  .dropdown-item.active {
  color: #05390c!important; /* Green color when active */
  text-decoration: underline; /* Add underline for active state */
  }
  
  /* Reset background and border when active */
  .nav-link.active, 
  .dropdown-item.active {
  background-color: transparent !important; /* Ensure background doesn't change */
  border: none !important; /* No border changes */
  }
  

  
  
  
  
  /* Navbar text style */
  .navbar-text {
    margin-top: 10px;
  }
  
  .navbar-text a {
    font-family: 'Agotho', bold;
    font-size: 40px;
    color: #05390c;
    margin-right: 10px;
    margin-left: -50px;
    letter-spacing: 0.1em;
    font-weight: 900;
    text-decoration: none; /* Ensure no underline */
  }
  
  /* Hover effect for SSCF text */
  .navbar-text a:hover {
    color: #04ff25; /* Change to desired hover color */
  }
  
  .navbar-link {
    text-decoration: none;
  }
  
  .navbar {
    background-color: #ffffff !important;
    position: sticky;
    top: 0;
    z-index: 1000;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 5px 90px;
    min-height: 50px;
  }
  
  .navbar-nav {
    display: flex;
    margin-right: 0;
    align-items: center;
  }
  
  /* Navbar nav items margin */
  .navbar-nav .nav-item {
    margin-top: 10px;
  }
  
  /* Nav link styles */
  .nav-link {
    color: rgb(73, 73, 73);
    border-radius: 5px;
    text-decoration: none;
    font-weight: 500;
    font-size: 18px;
    margin-right: 20px; /* Add spacing between nav items */
  }
  
  .nav-link:hover {
    color: #05390c;
  }
  
  /* Customize the dropdown background and text color */
  .dropdown-menu {
    background-color: #ffffff;
    border-radius: 0;
    padding: 0;
    margin-top: 0;
  }
  
  /* Dropdown item styles */
  .dropdown-item {
    color: rgb(73, 73, 73);
    padding: 10px 20px;
    font-weight: 500;
  }
  
  /* Hover styles for dropdown links */
  .dropdown-item:hover {
    background-color: #05390c;
    color: rgb(255, 255, 255);
    margin: 0;
    border-radius: 0;
  }
  
  /* Dropdown on hover */
  .nav-item.dropdown:hover .dropdown-menu {
    display: block;
    opacity: 1;
    transition: all 0.3s ease;
  }
  
  /* Adjust dropdown toggle on hover */
  .nav-item.dropdown:hover .nav-link {
    color: rgb(88, 88, 88);
  }
  
  /* Active link styles */
  .navbar-nav .active > .nav-link,
  .nav-link:focus,
  .nav-link:active {
    color: #05390c!important;
  }
  
  /* Login Button Styles */
  .navbar-login-btn {
    background-color: #05390c; /* Green background */
    color: #ffffff; /* Text color */
    font-size: 18px; /* Font size */
    font-weight: bold; /* Font weight */
    padding: 8px 25px; /* Padding */
    border: none; /* Remove border */
    border-radius: 20px; /* Rounded corners */
    transition: background-color 0.3s, color 0.3s; /* Smooth transition */
    border: 2px solid #2b7d62; /* Keep the border color the same */
  }
  
  /* Add border color */
  .navbar-login-btn:focus {
    outline: none; /* Remove default focus outline */
    border: 2px solid #2b7d62; /* Add border color */
  }
  
  /* Change styles on hover */
  .navbar-login-btn:hover {
    background-color: #fefefe; /* Darker green on hover */
    color: #05390c; /* Maintain text color on hover */
    border: 2px solid #05390c; /* Add border color */
  }
  
  /* Change styles on active (clicked) */
  .navbar-login-btn:active {
    background-color: #2b7d62; /* Keep the darker green on click */
    color: #ffffff; /* Keep the text color white */
    border: 2px solid #2b7d62; /* Keep the border color the same */
  }
  
  
  
  
  
  /* Customize the navbar-toggler */
  .navbar-toggler {
    border: none; 
    background-color: transparent; 
    color: rgb(0, 0, 0);
    box-shadow: 0 0 0 1px white;
  }
  
  /* Customize the navbar-toggler icon lines */
  .navbar-toggler-icon {
    display: inline-block;
    width: 30px; 
    height: 24px;
    position: relative;
    background: transparent;
  }
  
  /* Create white lines */
  .navbar-toggler-icon::before,
  .navbar-toggler-icon::after,
  .navbar-toggler-icon div {
    content: "";
    display: block;
    position: absolute;
    width: 30px; 
    height: 3px; 
    background-color: #185F43;
    border-radius: 2px; 
    transition: all 0.3s ease; 
  }
  
  /* Position the top line */
  .navbar-toggler-icon::before {
    top: 0; 
  }
  
  /* Position the bottom line */
  .navbar-toggler-icon::after {
    bottom: 0; 
  }
  
  /* Position the middle line */
  .navbar-toggler-icon div {
    top: 10px; 
  }
  
  /* Adjust background color and border when toggler is active */
  .navbar-toggler:focus,
  .navbar-toggler:active {
    box-shadow: 0 0 0 2px white; 
    background-color: transparent; 
  }
  
  /* Toggler behavior */
  .navbar-collapse {
    display: none; /* Hide the navbar by default on smaller screens */
  }
  
  .navbar-collapse.show {
    display: flex; /* Show navbar when toggled */
  }
  
  
  
  
  
  /* Responsive Styles */
  @media (max-width: 1220px) {
  .navbar-nav {
      display: none; /* Hide nav items by default */
  }
  
  
  .navbar-brand,
  .navbar-toggler {
      display: flex;
      align-items: center;
  }
  
  .navbar .container-fluid {
      flex-direction: row;
      justify-content: space-between;
  }
  
  .navbar-text {
      margin-left: -30px;
  }
  
  .navbar-link {
      font-size: 35px !important;
  }
  
  .navbar-toggler {
      margin-left: auto;
      margin-right: -70px;
      padding-right: 20px;
      width: 30px;
      height: 30px;
      z-index: 100;
      display: block; /* Ensure the menu icon is visible */
      
  }
  
  /* Show navbar items when toggled */
  .navbar-collapse.show .navbar-nav {
      display: flex; /* Show nav items on toggle */
      flex-direction: column; /* Stack nav items vertically */
      align-items: center;
      width: 100%; /* Full width */
      max-height: 300px;
      overflow-y: auto;
      scrollbar-width: none; /* Hide scrollbar for Firefox */
      -ms-overflow-style: none; /* Hide scrollbar for IE and Edge */
  }
  
  .navbar-nav::-webkit-scrollbar {
      display: none; /* Hide scrollbar for Chrome, Safari, and Opera */
  }
  }
  
    /* Custom Dropdown Menu Styling */
    .custom-dropdown-menu {
      background-color: #ffffff;
      border: none;
      border-radius: 8px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .custom-dropdown-menu .dropdown-item {
      color: rgb(47, 51, 44); /* Dark text color */
      transition: background-color 0.3s;
    }

    .custom-dropdown-menu .dropdown-item:hover {
      background-color: #3d4145; /* Darker background on hover */
      color: #ffffff; /* White text on hover */
    }

    /* Profile Modal Styling */
    #profileModal .modal-content {
      background-color:rgb(255, 255, 255); /* Dark background */
      color:rgb(0, 0, 0); /* White text */
      border: none;
      border-radius: 10px;
    }

    #profileModal .modal-header {
      border-bottom: 1px solid #3d4145;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    #profileModal .modal-footer {
      border-top: 1px solid #3d4145;
    }

    #profileModal .btn-secondary {
      background-color: #7289da;
      border: none;
    }

    #profileModal .btn-secondary:hover {
      background-color: #5b6eae;
    }

    /* Adjust Modal Title */
    #profileModalLabel {
      font-weight: bold;
    }

    /* User Avatar in Modal */
    #profileAvatar {
      border: 3px solid #7289da; /* Fixed typo: added space */
    }

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

    /* Profile Modal Custom Styles */
    #profileModal .modal-body img {
      border: 3px solid #7289da;
    }

    /* New CSS to change dropdown arrow color to black */
    #avatarDropdown::after {
      border-top: 0.3em solid black; /* Set the arrow color to black */
      border-right: 0.3em solid transparent;
      border-left: 0.3em solid transparent;
      margin-left: 0.255em; /* Adjust spacing if necessary */
    }

    /* Optional: Ensure proper alignment */
    #avatarDropdown {
      display: flex;
      align-items: center;
    }

    /* Optional: Remove default Bootstrap arrow rotation on dropdown toggle */
    .dropdown-toggle::after {
      transition: border-top-color 0.3s;
    }

    
    
  </style>

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
          <!-- Navigation Links -->
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
   
            </ul>
          </li>
          <li class="nav-item"><a class="nav-link" href="{{ route('contact.us') }}">Contact us</a></li>
          
          <!-- Profile and Login Section -->
          <li class="nav-item">
            <!-- Login Button -->
            <div class="navbar-login-container">
              <a class="btn navbar-login-btn d-flex align-items-center" href="{{ route('login.google') }}" id="login-btn">
                <!-- Google SVG Icon -->
                <svg class="google-logo me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20">
                  <path fill="#4285f4" d="M533.5 278.4c0-18.4-1.6-36.1-4.7-53.3H272v101.1h147.4c-6.3 34.4-25 63.4-53.4 82.8v68.6h86.5c50.6-46.7 80-115.5 80-199.2z" />
                  <path fill="#34a853" d="M272 544.3c72.4 0 133.1-23.9 177-65.1l-86.5-68.6c-24.1 16.2-55 25.7-90.5 25.7-69.5 0-128.3-46.9-149.3-109.6H36.4v68.7C81.3 490.1 169.6 544.3 272 544.3z" />
                  <path fill="#fbbc04" d="M122.7 324.1c-4.7-13.8-7.4-28.5-7.4-43.1s2.7-29.3 7.4-43.1v-68.7H36.4c-18.1 35.8-28.4 76.4-28.4 119.8s10.3 84 28.4 119.8l86.3-68.7z" />
                  <path fill="#ea4335" d="M272 107.3c38.3 0 72.8 13.2 100.1 39.1l75-75C407.1 24.2 344.4 0 272 0 169.6 0 81.3 54.2 36.4 135.6l86.3 68.7c21-62.7 79.8-109.6 149.3-109.6z" />
                </svg>
                Login with Google
              </a>
            </div>
            <!-- End Login Button -->
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navigation -->

  <!-- Profile Modal -->
  <div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModalLabel"><i class="bi bi-person-circle me-2"></i> My Profile</h5>
        </div>
        <div class="modal-body text-center">
          <img src="" alt="User Avatar" id="profileAvatar" class="rounded-circle mb-3" style="width: 100px; height: 100px;">
          <h4 id="profileName"></h4>
          <p id="profileEmail"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Profile Modal -->

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

  <!-- Additional Scripts -->
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
            <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="avatarDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <img src="${avatar}" alt="User Avatar" class="rounded-circle me-2" style="width: 40px; height: 40px;">
            </a>
            <ul class="dropdown-menu dropdown-menu-end custom-dropdown-menu" aria-labelledby="avatarDropdown">
              <li><a class="dropdown-item" href="#" id="myProfileBtn"><i class="bi bi-person me-2"></i> My Profile</a></li>
              <li>
                <form action="${logoutRoute}" method="POST" id="logout-form">
                  @csrf
                  <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right me-2"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
        `;

        const myProfileBtn = document.getElementById("myProfileBtn");
        myProfileBtn.addEventListener("click", function (e) {
          e.preventDefault();
          openProfileModal();
        });

        const logoutForm = document.getElementById("logout-form");
        logoutForm.addEventListener("submit", handleLogout);
      }
    }

    function handleLogout(event) {
      event.preventDefault();

      const logoutButton = event.target.querySelector('button');

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
          <a class="btn navbar-login-btn d-flex align-items-center" href="{{ route('login.google') }}" id="login-btn">
            <!-- Google SVG Icon -->
            <svg class="google-logo me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20">
              <path fill="#4285f4" d="M533.5 278.4c0-18.4-1.6-36.1-4.7-53.3H272v101.1h147.4c-6.3 34.4-25 63.4-53.4 82.8v68.6h86.5c50.6-46.7 80-115.5 80-199.2z" />
              <path fill="#34a853" d="M272 544.3c72.4 0 133.1-23.9 177-65.1l-86.5-68.6c-24.1 16.2-55 25.7-90.5 25.7-69.5 0-128.3-46.9-149.3-109.6H36.4v68.7C81.3 490.1 169.6 544.3 272 544.3z" />
              <path fill="#fbbc04" d="M122.7 324.1c-4.7-13.8-7.4-28.5-7.4-43.1s2.7-29.3 7.4-43.1v-68.7H36.4c-18.1 35.8-28.4 76.4-28.4 119.8s10.3 84 28.4 119.8l86.3-68.7z" />
              <path fill="#ea4335" d="M272 107.3c38.3 0 72.8 13.2 100.1 39.1l75-75C407.1 24.2 344.4 0 272 0 169.6 0 81.3 54.2 36.4 135.6l86.3 68.7c21-62.7 79.8-109.6 149.3-109.6z" />
            </svg>
            Login with Google
          </a>
        `;
      }
    }

    function openProfileModal() {
      fetch("/api/user", { headers: { Accept: "application/json" } })
        .then(response => response.json())
        .then(data => {
          if (data.user) {
            document.getElementById('profileAvatar').src = data.user.avatar || '../images/default-avatar.png';
            document.getElementById('profileName').textContent = data.user.name || 'N/A';
            document.getElementById('profileEmail').textContent = data.user.email || 'N/A';
            var profileModal = new bootstrap.Modal(document.getElementById('profileModal'));
            profileModal.show();
          }
        })
        .catch(error => console.error("Error fetching user data for modal:", error));
    }
  </script>


















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
          }, 1000); // Increased delay to 1000 milliseconds for visibility

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





  <style>
    

/* Container for the form */
.sports-container {
    max-width: 800px;
    margin: auto;
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    border: 1px solid #185F43;
  }
  
  /* Form title */
  .form-title-box {
    text-align: center;
    background-color: #185F43;
    color: white;
    border-radius: 8px;
  }
  
  /* Form styling */
  .form-box {
    padding: 20px;
  }
  
  /* Form row styling */
  .form-row {
    display: flex;
    flex-wrap: wrap;
    margin-bottom: 15px;
  }
  
  /* Individual form group */
  .form-group {
    flex: 1;
    min-width: 200px; /* Minimum width for form groups */
    margin-right: 15px;
  }
  
  /* Remove margin for the last child to avoid overflow */
  .form-group:last-child {
    margin-right: 0; /* Remove right margin for the last child */
  }
  
  /* Input and select styling */
  .form-control,
  .form-select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    transition: border 0.3s;
  }
  
  .form-control:focus,
  .form-select:focus {
    border-color: #185F43;
    outline: none;
  }
  
  /* Button styling */
  .iccac-btn-container {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
  }
  
  .iccac-btn {
    background-color: #185F43;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    text-align: center;
    transition: background-color 0.3s;
  }
  
  .iccac-btn:hover {
    background-color: #145a34; /* Darker shade on hover */
  }
  
  /* Browse Image group styling */
  .browse-image-group {
    text-align: left; /* Ensure the group is aligned to the left */
    flex: 1; /* Allow it to grow in the flex container */
  }
  
  /* Browse Image label styling */
  .browse-image-label {
    display: block; /* Ensures the label takes up the full width */
    margin-bottom: 5px; /* Adds spacing between label and input */
    font-weight: bold;
  }
  
  /* File upload container */
  .file-upload-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    border: 2px dashed #aaa;
    border-radius: 8px;
    padding: 10px;
    background-color: #f9f9f9;
    width: 100%; /* Ensure it takes full width */
    max-width: 150px; /* Limit the max width */
    height: 100px;
    overflow: hidden;
    transition: height 0.3s ease, border-color 0.3s ease;
    box-sizing: border-box;
    margin: 0; /* Remove all margins to prevent extra space */
    position: relative; /* Necessary for absolute positioning of the input */
    
  }
  
  /* Hidden file input */
  .file-upload-input {
    display: block; /* Ensures it takes up space */
    position: absolute; /* Position it absolutely */
    width: 100%; /* Cover the entire width of the parent */
    height: 100%; /* Cover the entire height of the parent */
    top: 0; /* Align to the top */
    left: 0; /* Align to the left */
    opacity: 0; /* Make it invisible */
    z-index: 2; /* Ensure it’s on top of other elements */
    cursor: pointer; /* Change the cursor to pointer when hovering */
  }
  
  
  .file-upload-content {
    display: flex;
    flex-direction: column;
    align-items: center;
  }
  
  .file-upload-input {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
    cursor: pointer;
  }
  
  .file-upload-icon {
    font-size: 24px;
    color: #6c757d;
    margin-bottom: 5px;
  }
  
  .file-upload-text {
    display: block;
    font-size: 14px;
    color: #333;
    margin-bottom: 5px;
  }
  
  .file-name-text {
    font-size: 12px;
    color: #333;
    margin-top: 5px;
  }
  
  .file-upload-container:hover {
    border-color: #007bff;
  }
  
  .file-upload-container:hover .file-upload-icon {
    color: #007bff;
  }
  
  /* Image preview */
  .image-preview {
    position: relative;
    display: none;
    width: 100%;
    height: 100px;
    margin-top: 10px;
    overflow: hidden;
    background: #f9f9f9;
  }
  
  .image-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .close-icon {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(0, 0, 0, 0.5);
    color: #fff;
    border-radius: 50%;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 16px;
    display: none;
  }
  
  .image-preview:hover .close-icon {
    display: flex;
  }
  
  /* Responsive Styles */
  @media (max-width: 768px) {
    .form-row {
      flex-direction: column; /* Stack inputs on smaller screens */
    }
  
    .form-group {
      margin-right: 0; /* Remove right margin */
      margin-bottom: 15px; /* Add bottom margin for spacing */
    }
  
    .iccac-btn-container {
      flex-direction: column; /* Stack buttons on smaller screens */
      align-items: center;
    }
  
    .iccac-btn {
      width: 100%; /* Full width for buttons */
      margin-bottom: 10px; /* Space between buttons */
    }
  }
  
  @media (max-width: 480px) {
    
    .form-title {
      font-size: 1.5em; /* Adjust title size for small screens */
    }
  }
  
  </style>

<section class="sports-container my-5" id="iccac-form">
    <div class="form-title-box p-4 mb-4">
        <h3 class="form-title">ICCAC-CAF PRE REGISTRATION FORM</h3>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    @if (session('success'))
    <div class="alert alert-success">
        Registration successful!
    </div>
    @endif

    <form id="sports-registration-form" action="{{ route('submit.sports.registration') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-box">
            <!-- Full Name and Email -->
            <div class="form-row">
                <div class="form-group full-name-group">
                    <label for="full-name" class="form-label">Full Name (Surname, First Name M.I)</label>
                    <input type="text" name="full_name" class="form-control" id="full-name" value="{{ old('full_name') }}" required>
                </div>
                <div class="form-group email-group">
                    <label for="email" class="form-label">SLSU Email/Personal Email</label>
                    <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" readonly>
                </div>
            </div>

            <!-- Age, Gender, Year Level -->
            <div class="form-row">
                <div class="form-group age-group">
                    <label for="age" class="form-label">Age</label>
                    <input type="text" name="age" class="form-control" id="age" value="{{ old('age') }}" required pattern="\d{1,2}" maxlength="2">
                </div>
                <div class="form-group gender-group">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" class="form-select" id="gender" required>
                        <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                        <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        <option value="Non-Binary" {{ old('gender') == 'Non-Binary' ? 'selected' : '' }}>Non-Binary</option>
                    </select>
                </div>
                <div class="form-group year-level-group">
                    <label for="year-level" class="form-label">Year Level</label>
                    <select name="year_level" class="form-select" id="year-level" required>
                        <option value="First Year" {{ old('year_level') == 'First Year' ? 'selected' : '' }}>First Year</option>
                        <option value="Second Year" {{ old('year_level') == 'Second Year' ? 'selected' : '' }}>Second Year</option>
                        <option value="Third Year" {{ old('year_level') == 'Third Year' ? 'selected' : '' }}>Third Year</option>
                        <option value="Fourth Year" {{ old('year_level') == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
                    </select>
                </div>
            </div>

            <!-- Course and College/Campus -->
            <div class="form-row">
            <div class="form-group course-group">
    <label for="course" class="form-label">Course</label>
    <select name="course" class="form-select" id="course" required>
        <option value="">Select Course</option>
        <option value="Bachelor of Science in Nursing" {{ old('course') == 'Bachelor of Science in Nursing' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
        <option value="Bachelor of Elementary Education" {{ old('course') == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
        <option value="Bachelor of Science in Nursing" {{ old('course') == 'Bachelor of Science in Nursing' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
        <option value="Bachelor of Science in Agriculture" {{ old('course') == 'Bachelor of Science in Agriculture' ? 'selected' : '' }}>Bachelor of Science in Agriculture</option>
        <option value="Bachelor of Science in Mechanical Engineering" {{ old('course') == 'Bachelor of Science in Mechanical Engineering' ? 'selected' : '' }}>Bachelor of Science in Mechanical Engineering</option>
        <option value="Bachelor of Public Administration" {{ old('course') == 'Bachelor of Public Administration' ? 'selected' : '' }}>Bachelor of Public Administration</option>
        <option value="Bachelor of Science in Agriculture" {{ old('course') == 'Bachelor of Science in Agriculture' ? 'selected' : '' }}>Bachelor of Science in Agriculture</option>
        <option value="Bachelor of Science in Radiologic Technology" {{ old('course') == 'Bachelor of Science in Radiologic Technology' ? 'selected' : '' }}>Bachelor of Science in Radiologic Technology</option>
        <option value="Bachelor of Science in Mechanical Engineering" {{ old('course') == 'Bachelor of Science in Mechanical Engineering' ? 'selected' : '' }}>Bachelor of Science in Mechanical Engineering</option>
        <option value="Bachelor of Science in Electrical Engineering" {{ old('course') == 'Bachelor of Science in Electrical Engineering' ? 'selected' : '' }}>Bachelor of Science in Electrical Engineering</option>
        <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology - Major in Computer Technology
        </option>
        <option value="Bachelor of Science in Hospitality Management" {{ old('course') == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
        <option value="Bachelor of Science in Industrial Engineering" {{ old('course') == 'Bachelor of Science in Industrial Engineering' ? 'selected' : '' }}>Bachelor of Science in Industrial Engineering</option>
        <option value="Bachelor of Science in Mathematics" {{ old('course') == 'Bachelor of Science in Mathematics' ? 'selected' : '' }}>Bachelor of Science in Mathematics</option>
        <option value="Bachelor of Arts in Psychology" {{ old('course') == 'Bachelor of Arts in Psychology' ? 'selected' : '' }}>Bachelor of Arts in Psychology</option>
        <option value="Bachelor of Secondary Education - Major in Mathematics" {{ old('course') == 'Bachelor of Secondary Education - Major in Mathematics' ? 'selected' : '' }}>
            Bachelor of Secondary Education - Major in Mathematics
        </option>
        <option value="Bachelor of Science in Information Technology" {{ old('course') == 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
        <option value="Bachelor of Science in Electrical Engineering" {{ old('course') == 'Bachelor of Science in Electrical Engineering' ? 'selected' : '' }}>Bachelor of Science in Electrical Engineering</option>
        <option value="Bachelor of Arts in Communication" {{ old('course') == 'Bachelor of Arts in Communication' ? 'selected' : '' }}>Bachelor of Arts in Communication</option>
        <option value="Bachelor of Public Administration" {{ old('course') == 'Bachelor of Public Administration' ? 'selected' : '' }}>Bachelor of Public Administration</option>
        <option value="Bachelor of Science in Biology" {{ old('course') == 'Bachelor of Science in Biology' ? 'selected' : '' }}>Bachelor of Science in Biology</option>
        <option value="Bachelor of Science in Industrial Engineering" {{ old('course') == 'Bachelor of Science in Industrial Engineering' ? 'selected' : '' }}>Bachelor of Science in Industrial Engineering</option>
        <option value="Bachelor of Science in Forestry" {{ old('course') == 'Bachelor of Science in Forestry' ? 'selected' : '' }}>Bachelor of Science in Forestry</option>
        <option value="Bachelor of Science in Computer Engineering" {{ old('course') == 'Bachelor of Science in Computer Engineering' ? 'selected' : '' }}>Bachelor of Science in Computer Engineering</option>
        <option value="Bachelor of Science in Radiologic Technology" {{ old('course') == 'Bachelor of Science in Radiologic Technology' ? 'selected' : '' }}>Bachelor of Science in Radiologic Technology</option>
        <option value="Bachelor of Science in Mathematics" {{ old('course') == 'Bachelor of Science in Mathematics' ? 'selected' : '' }}>Bachelor of Science in Mathematics</option>
        <option value="Bachelor of Culture and Arts Education" {{ old('course') == 'Bachelor of Culture and Arts Education' ? 'selected' : '' }}>Bachelor of Culture and Arts Education</option>
        <option value="Bachelor of Culture and Arts Education" {{ old('course') == 'Bachelor of Culture and Arts Education' ? 'selected' : '' }}>Bachelor of Culture and Arts Education</option>
        <option value="Bachelor of Science in Electronics Engineering" {{ old('course') == 'Bachelor of Science in Electronics Engineering' ? 'selected' : '' }}>Bachelor of Science in Electronics Engineering</option>
        <option value="Bachelor of Secondary Education Major in Mathematics" {{ old('course') == 'Bachelor of Secondary Education Major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education Major in Mathematics</option>
        <option value="Bachelor of Science in Environmental Science" {{ old('course') == 'Bachelor of Science in Environmental Science' ? 'selected' : '' }}>Bachelor of Science in Environmental Science</option>
        <option value="BSESS" {{ old('course') == 'BSESS' ? 'selected' : '' }}>BSESS</option>
        <option value="Bachelor of Secondary Education - Major in Science" {{ old('course') == 'Bachelor of Secondary Education - Major in Science' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Science</option>
        <option value="Bachelor of Secondary Education - Major in Social Studies" {{ old('course') == 'Bachelor of Secondary Education - Major in Social Studies' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Social Studies</option>
        <option value="Bachelor of Secondary Education - Major in Mathematics" {{ old('course') == 'Bachelor of Secondary Education - Major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Mathematics</option>
        <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology - Major in Computer Technology
        </option>
        <option value="Bachelor of Elementary Education" {{ old('course') == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
        <option value="Bachelor of Elementary Education - Major in General Education" {{ old('course') == 'Bachelor of Elementary Education - Major in General Education' ? 'selected' : '' }}>
            Bachelor of Elementary Education - Major in General Education
        </option>
        <option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology - Major in Mechanical Technology
        </option>
        <option value="Bachelor of Science in Civil Engineering" {{ old('course') == 'Bachelor of Science in Civil Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
        <option value="Bachelor of Science in Agriculture - Major in Crop Science" {{ old('course') == 'Bachelor of Science in Agriculture - Major in Crop Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Major in Crop Science
        </option>
        <option value="Bachelor of Science in Industrial Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology</option>
        <option value="Bachelor of Science in Business Administration - Major in Human Resource Management" {{ old('course') == 'Bachelor of Science in Business Administration - Major in Human Resource Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration - Major in Human Resource Management
        </option>
        <option value="Bachelor in Public Administration" {{ old('course') == 'Bachelor in Public Administration' ? 'selected' : '' }}>Bachelor in Public Administration</option>
        <option value="Bachelor of Science in Industrial Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology</option>
        <option value="Bachelor of Science in Electronics Engineering" {{ old('course') == 'Bachelor of Science in Electronics Engineering' ? 'selected' : '' }}>Bachelor of Science in Electronics Engineering</option>
        <option value="Bachelor of Science in Civil Engineering" {{ old('course') == 'Bachelor of Science in Civil Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
        <option value="Bachelor of Science in Agriculture - Major in Animal Science" {{ old('course') == 'Bachelor of Science in Agriculture - Major in Animal Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Major in Animal Science
        </option>
        <option value="Bachelor of Science in Industrial Technology Major in Computer Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology Major in Computer Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology Major in Computer Technology
        </option>
        <option value="Bachelor of Science in Agriculture - Major in Agronomy" {{ old('course') == 'Bachelor of Science in Agriculture - Major in Agronomy' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Major in Agronomy
        </option>
        <option value="Bachelor of Secondary Education - Major in Science" {{ old('course') == 'Bachelor of Secondary Education - Major in Science' ? 'selected' : '' }}>
            Bachelor of Secondary Education - Major in Science
        </option>
        <option value="Bachelor of Science in Forestry" {{ old('course') == 'Bachelor of Science in Forestry' ? 'selected' : '' }}>Bachelor of Science in Forestry</option>
        <option value="Bachelor of Science in Industrial Technology major in Computer Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology major in Computer Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology major in Computer Technology
        </option>
        <option value="Bachelor of Science Industrial Technology" {{ old('course') == 'Bachelor of Science Industrial Technology' ? 'selected' : '' }}>
            Bachelor of Science Industrial Technology
        </option>
        <option value="Bachelor of Science in Industrial Technology - Major in Food Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology - Major in Food Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology - Major in Food Technology
        </option>
        <option value="Bachelor of science in industrial technology major in computer technology" {{ old('course') == 'Bachelor of science in industrial technology major in computer technology' ? 'selected' : '' }}>
            Bachelor of science in industrial technology major in computer technology
        </option>
        <option value="Bachelor of Science in Business Administration - Major in Marketing Management" {{ old('course') == 'Bachelor of Science in Business Administration - Major in Marketing Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration - Major in Marketing Management
        </option>
        <option value="Bachelor of Science in Accountancy" {{ old('course') == 'Bachelor of Science in Accountancy' ? 'selected' : '' }}>
            Bachelor of Science in Accountancy
        </option>
        <option value="Bachelor of Science in Agriculture - Major in Crop Science" {{ old('course') == 'Bachelor of Science in Agriculture - Major in Crop Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Major in Crop Science
        </option>
        <option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering" {{ old('course') == 'Bachelor of Science in Civil Engineering - Major in Structural Engineering' ? 'selected' : '' }}>
            Bachelor of Science in Civil Engineering - Major in Structural Engineering
        </option>
        <option value="Bachelor of Science in Environmental Science" {{ old('course') == 'Bachelor of Science in Environmental Science' ? 'selected' : '' }}>
            Bachelor of Science in Environmental Science
        </option>
        <option value="Bachelor of Arts in History" {{ old('course') == 'Bachelor of Arts in History' ? 'selected' : '' }}>
            Bachelor of Arts in History
        </option>
        <option value="Bachelor of Science in Agriculture - Major in Animal Science" {{ old('course') == 'Bachelor of Science in Agriculture - Major in Animal Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Major in Animal Science
        </option>
        <option value="Bachelor of Science in Exercise and Sports Science" {{ old('course') == 'Bachelor of Science in Exercise and Sports Science' ? 'selected' : '' }}>
            Bachelor of Science in Exercise and Sports Science
        </option>
        <option value="Bachelor of Science in Industrial Technology Major in Computer Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology Major in Computer Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology Major in Computer Technology
        </option>
        <option value="Bachelor of Arts in Communication" {{ old('course') == 'Bachelor of Arts in Communication' ? 'selected' : '' }}>
            Bachelor of Arts in Communication
        </option>
        <option value="Bachelor of elementary education" {{ old('course') == 'Bachelor of elementary education' ? 'selected' : '' }}>
            Bachelor of elementary education
        </option>
        <option value="Bachelor in Industrial Technology - Major in Computer Technology" {{ old('course') == 'Bachelor in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>
            Bachelor in Industrial Technology - Major in Computer Technology
        </option>
        <option value="Bachelor of Industrial Technology - Major in Computer" {{ old('course') == 'Bachelor of Industrial Technology - Major in Computer' ? 'selected' : '' }}>
            Bachelor of Industrial Technology - Major in Computer
        </option>
        <option value="Bachelor of science in industrial technology" {{ old('course') == 'Bachelor of science in industrial technology' ? 'selected' : '' }}>
            Bachelor of science in industrial technology
        </option>
        <option value="BACHELOR OF PUBLIC ADMINISTRATION" {{ old('course') == 'BACHELOR OF PUBLIC ADMINISTRATION' ? 'selected' : '' }}>
            BACHELOR OF PUBLIC ADMINISTRATION
        </option>
        <option value="Bachelor of Science in Exercise and Sports Sciences" {{ old('course') == 'Bachelor of Science in Exercise and Sports Sciences' ? 'selected' : '' }}>
            Bachelor of Science in Exercise and Sports Sciences
        </option>
        <option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering" {{ old('course') == 'Bachelor of Science in Civil Engineering - Major in Structural Engineering' ? 'selected' : '' }}>
            Bachelor of Science in Civil Engineering - Major in Structural Engineering
        </option>
        <option value="Bachelor of Science in Industrial Technology Major in Electronics Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology Major in Electronics Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology Major in Electronics Technology
        </option>
        <option value="Bachelor of Science in Business Administration Major in Marketing Management" {{ old('course') == 'Bachelor of Science in Business Administration Major in Marketing Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration Major in Marketing Management
        </option>
        <option value="Bachelor of Science in Agriculture - Animal Science" {{ old('course') == 'Bachelor of Science in Agriculture - Animal Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture - Animal Science
        </option>
        <option value="Bachelor of Science in Agriculture- Major in Crop Science" {{ old('course') == 'Bachelor of Science in Agriculture- Major in Crop Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture- Major in Crop Science
        </option>
        <option value="Bachelor of Science in Business Administration - Major in Human Resources Management" {{ old('course') == 'Bachelor of Science in Business Administration - Major in Human Resources Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration - Major in Human Resources Management
        </option>
        <option value="Bachelor of science in hospitality management" {{ old('course') == 'Bachelor of science in hospitality management' ? 'selected' : '' }}>
            Bachelor of science in hospitality management
        </option>
        <option value="Bachelor of Science in Business Administration - Major in Human Resource Management" {{ old('course') == 'Bachelor of Science in Business Administration - Major in Human Resource Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration - Major in Human Resource Management
        </option>
        <option value="BS Information Technology" {{ old('course') == 'BS Information Technology' ? 'selected' : '' }}>
            BS Information Technology
        </option>
        <option value="Bachelor of Science Industrial Technology - Major in Electronics Technology" {{ old('course') == 'Bachelor of Science Industrial Technology - Major in Electronics Technology' ? 'selected' : '' }}>
            Bachelor of Science Industrial Technology - Major in Electronics Technology
        </option>
        <option value="Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching" {{ old('course') == 'Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching' ? 'selected' : '' }}>
            Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching
        </option>
        <option value="Bachelor of Science in Business Administration - Major in Financial Management" {{ old('course') == 'Bachelor of Science in Business Administration - Major in Financial Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration - Major in Financial Management
        </option>
        <option value="Bachelor of Industrial Technology - Major in Mechanical Technology" {{ old('course') == 'Bachelor of Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>
            Bachelor of Industrial Technology - Major in Mechanical Technology
        </option>
        <option value="Bachelor of Science in Business Administration Major in Human Resource Management" {{ old('course') == 'Bachelor of Science in Business Administration Major in Human Resource Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration Major in Human Resource Management
        </option>
        <option value="Bachelor of Technology and Livelihood Education - Major in ICT" {{ old('course') == 'Bachelor of Technology and Livelihood Education - Major in ICT' ? 'selected' : '' }}>
            Bachelor of Technology and Livelihood Education - Major in ICT
        </option>
        <option value="Bachelor of Science Mechanical Engineering" {{ old('course') == 'Bachelor of Science Mechanical Engineering' ? 'selected' : '' }}>
            Bachelor of Science Mechanical Engineering
        </option>
        <option value="Bachelor of Science in Business Administration Major in Human Resource Management" {{ old('course') == 'Bachelor of Science in Business Administration Major in Human Resource Management' ? 'selected' : '' }}>
            Bachelor of Science in Business Administration Major in Human Resource Management
        </option>
        <option value="Bachelor of Agriculture - Major in Animal Science" {{ old('course') == 'Bachelor of Agriculture - Major in Animal Science' ? 'selected' : '' }}>
            Bachelor of Agriculture - Major in Animal Science
        </option>
        <option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology" {{ old('course') == 'Bachelor of Science in Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>
            Bachelor of Science in Industrial Technology - Major in Mechanical Technology
        </option>
        <option value="Bachelor of Science - Major in Nursing" {{ old('course') == 'Bachelor of Science - Major in Nursing' ? 'selected' : '' }}>
            Bachelor of Science - Major in Nursing
        </option>
        <option value="Bachelor of Science in Agriculture-Major in Crop Science" {{ old('course') == 'Bachelor of Science in Agriculture-Major in Crop Science' ? 'selected' : '' }}>
            Bachelor of Science in Agriculture-Major in Crop Science
        </option>
        <option value="Bachelor of Secondary Education - Major in Filipino" {{ old('course') == 'Bachelor of Secondary Education - Major in Filipino' ? 'selected' : '' }}>
            Bachelor of Secondary Education - Major in Filipino
        </option>
        <option value="BSIT-MT" {{ old('course') == 'BSIT-MT' ? 'selected' : '' }}>BSIT-MT</option>
        <option value="BS Forestry" {{ old('course') == 'BS Forestry' ? 'selected' : '' }}>BS Forestry</option>
        <option value="Bachelor of science industrial technology" {{ old('course') == 'Bachelor of science industrial technology' ? 'selected' : '' }}>
            Bachelor of science industrial technology
        </option>
    </select>
</div>

                <div class="form-group college-campus-group">
                    <label for="college-campus" class="form-label">College/Campus</label>
                    <select name="college_campus" class="form-select" id="college-campus" required>
                        <option value="">Select College/Campus</option>
                        <!-- All College/Campus Options -->
                        <option value="College of Allied and Medicine" {{ old('college_campus') == 'College of Allied and Medicine' ? 'selected' : '' }}>College of Allied and Medicine</option>
                        <option value="College of Administration, Business, and Accountancy" {{ old('college_campus') == 'College of Administration, Business, and Accountancy' ? 'selected' : '' }}>College of Administration, Business, and Accountancy</option>
                        <option value="College of Teacher Education" {{ old('college_campus') == 'College of Teacher Education' ? 'selected' : '' }}>College of Teacher Education</option>
                        <option value="College of Arts and Sciences" {{ old('college_campus') == 'College of Arts and Sciences' ? 'selected' : '' }}>College of Arts and Sciences</option>
                        <option value="College of Engineering (CEn)" {{ old('college_campus') == 'College of Engineering (CEn)' ? 'selected' : '' }}>College of Engineering (CEn)</option>
                        <option value="College of Industrial Technology" {{ old('college_campus') == 'College of Industrial Technology' ? 'selected' : '' }}>College of Industrial Technology</option>
                        <option value="College of Agriculture (CAg)" {{ old('college_campus') == 'College of Agriculture (CAg)' ? 'selected' : '' }}>College of Agriculture (CAg)</option>
                        <option value="SLSU Lucena Campus" {{ old('college_campus') == 'SLSU Lucena Campus' ? 'selected' : '' }}>SLSU Lucena Campus</option>
                        <option value="SLSU Alabat Campus" {{ old('college_campus') == 'SLSU Alabat Campus' ? 'selected' : '' }}>SLSU Alabat Campus</option>
                        <option value="SLSU Tayabas Campus" {{ old('college_campus') == 'SLSU Tayabas Campus' ? 'selected' : '' }}>SLSU Tayabas Campus</option>
                        <option value="SLSU Gumaca Campus" {{ old('college_campus') == 'SLSU Gumaca Campus' ? 'selected' : '' }}>SLSU Gumaca Campus</option>
                        <option value="SLSU Catanauan Campus" {{ old('college_campus') == 'SLSU Catanauan Campus' ? 'selected' : '' }}>SLSU Catanauan Campus</option>
                        <option value="SLSU Tagkawayan Campus" {{ old('college_campus') == 'SLSU Tagkawayan Campus' ? 'selected' : '' }}>SLSU Tagkawayan Campus</option>
                        <option value="SLSU Polillo Campus" {{ old('college_campus') == 'SLSU Polillo Campus' ? 'selected' : '' }}>SLSU Polillo Campus</option>
                        <option value="SLSU Infanta Campus" {{ old('college_campus') == 'SLSU Infanta Campus' ? 'selected' : '' }}>SLSU Infanta Campus</option>
                        <option value="SLSU Tiaong Campus" {{ old('college_campus') == 'SLSU Tiaong Campus' ? 'selected' : '' }}>SLSU Tiaong Campus</option>
                        <!-- Add additional College/Campus options here if any -->
                    </select>
                </div>
            </div>

            <!-- Sports Event and ID Number -->
            <div class="form-row">
                <div class="form-group sports-event-group">
                    <label for="sports-event" class="form-label">Sports Event</label>
                    <select name="sports_event" class="form-select" id="sports-event" required>
                        <option value="">Select Sports Event</option>
                        <!-- All Sports Event Options -->
                        <option value="Athletics" {{ old('sports_event') == 'Athletics' ? 'selected' : '' }}>Athletics</option>
                        <option value="Arnis" {{ old('sports_event') == 'Arnis' ? 'selected' : '' }}>Arnis</option>
                        <option value="Archery" {{ old('sports_event') == 'Archery' ? 'selected' : '' }}>Archery</option>
                        <option value="Basketball" {{ old('sports_event') == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                        <option value="Badminton" {{ old('sports_event') == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                        <option value="Volleyball" {{ old('sports_event') == 'Volleyball' ? 'selected' : '' }}>Volleyball</option>
                        <option value="Billiards" {{ old('sports_event') == 'Billiards' ? 'selected' : '' }}>Billiards</option>
                        <option value="Beach Volleyball" {{ old('sports_event') == 'Beach Volleyball' ? 'selected' : '' }}>Beach Volleyball</option>
                        <option value="Chess" {{ old('sports_event') == 'Chess' ? 'selected' : '' }}>Chess</option>
                        <option value="Dancesport (Standard)" {{ old('sports_event') == 'Dancesport (Standard)' ? 'selected' : '' }}>Dancesport (Standard)</option>
                        <option value="E-Games ML" {{ old('sports_event') == 'E-Games ML' ? 'selected' : '' }}>E-Games ML</option>
                        <option value="Table Tennis" {{ old('sports_event') == 'Table Tennis' ? 'selected' : '' }}>Table Tennis</option>
                        <option value="Lawn Tennis" {{ old('sports_event') == 'Lawn Tennis' ? 'selected' : '' }}>Lawn Tennis</option>
                        <option value="Sepak Takraw" {{ old('sports_event') == 'Sepak Takraw' ? 'selected' : '' }}>Sepak Takraw</option>
                        <option value="Football" {{ old('sports_event') == 'Football' ? 'selected' : '' }}>Football</option>
                        <option value="Futsal" {{ old('sports_event') == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                        <option value="Karatedo" {{ old('sports_event') == 'Karatedo' ? 'selected' : '' }}>Karatedo</option>
                        <option value="Taekwondo" {{ old('sports_event') == 'Taekwondo' ? 'selected' : '' }}>Taekwondo</option>
                        <option value="Swimming" {{ old('sports_event') == 'Swimming' ? 'selected' : '' }}>Swimming</option>
                        <!-- Add additional Sports Event options here if any -->
                    </select>
                </div>
                <div class="form-group id-number-group">
                    <label for="id-number" class="form-label">ID Number</label>
                    <input type="text" name="id_number" class="form-control" id="id-number" value="{{ old('id_number') }}" required>
                </div>
            </div>

          <!-- Image Upload -->
<div class="form-group browse-image-group">
  <label for="browse-image" class="form-label">Browse Image</label>
  <input type="file" name="image" id="browse-image" class="form-control" required>
</div>


            <!-- Submit Button -->
            <div class="iccac-btn-container">
                <a href="#" class="iccac-btn iccac-back-button">BACK</a>
                <button type="submit" class="iccac-btn iccac-submit-button">SUBMIT</button>
            </div>
        </div>
    </form>
</section>



 <!-- Modal -->
 <div id="modalOverlay" style="display: none;"></div>
 
 <div class="card" id="messageBox" style="display: none;">
   <button class="dismiss" type="button" onclick="closeMessage()">×</button>
   <div class="header">
     <div class="image">
       <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
         <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
         <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
         <g id="SVGRepo_iconCarrier">
           <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
             stroke-linejoin="round"></path>
         </g>
       </svg>
     </div>
     <div class="content">
       <span class="title">Register Successful!</span>
       <p class="message">Thank you!</p>
     </div>
     <div class="actions">
       <button id="messageOkayButton" class="okay" type="button" onclick="redirectToIndex()">Okay</button>
     </div>
   </div>
 </div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if (session('success'))
            showModal(); // Display modal on success
        @endif
    });

    function showModal() {
        document.getElementById("modalOverlay").style.display = "block";
        document.getElementById("messageBox").style.display = "block";
    }

    function closeMessage() {
        document.getElementById("modalOverlay").style.display = "none";
        document.getElementById("messageBox").style.display = "none";
    }

    function redirectToIndex() {
        window.location.href = "{{ route('index') }}"; // Redirect to the homepage
    }
</script>





  <!-- CSS for Modal -->
  <style>
    #modalOverlay {
      position: fixed;
      /* Ensures it stays fixed on the screen */
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.5);
      /* Semi-transparent background */
      display: none;
      /* Initially hidden */
      z-index: 999;
      /* Ensures it appears on top of other elements */
    }

    #messageBox {
      position: fixed;
      /* Fixes it in place */
      top: 50%;
      /* Center vertically */
      left: 50%;
      /* Center horizontally */
      transform: translate(-50%, -50%);
      /* Adjust for exact center */
      background-color: white;
      padding: 20px;
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      z-index: 1000;
      /* Ensures it appears on top of modalOverlay */
      display: none;
      /* Hidden initially */
      width: 400px;
      /* Adjust size as needed */
      text-align: center;
      border-radius: 8px;
    }

    /* From Uiverse.io by Yaya12085 */
    .card {
      overflow: hidden;
      position: relative;
      text-align: left;
      border-radius: 0.5rem;
      max-width: 290px;
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      background-color: #fff;
    }

    .dismiss {
      position: absolute;
      right: 10px;
      top: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 0.5rem 1rem;
      background-color: #fff;
      color: black;
      border: 2px solid #D1D5DB;
      font-size: 1rem;
      font-weight: 300;
      width: 30px;
      height: 30px;
      border-radius: 7px;
      transition: .3s ease;
    }

    .dismiss:hover {
      background-color: #ee0d0d;
      border: 2px solid #ee0d0d;
      color: #fff;
    }

    /* Adjusted for reduced box height */
    .header {
      padding: 0.75rem 0.5rem 0.5rem 0.5rem;
      /* Reduced padding */
    }

    .content {
      margin-top: 0.5rem;
      /* Reduced top margin */
      text-align: center;
    }

    .image {
      display: flex;
      margin-left: auto;
      margin-right: auto;
      background-color: #0bfa72;
      flex-shrink: 0;
      justify-content: center;
      align-items: center;
      width: 3rem;
      height: 3rem;
      border-radius: 9999px;
      animation: animate .6s linear alternate-reverse infinite;
      transition: .6s ease;
    }

    .image svg {
      color: #0afa2a;
      width: 2rem;
      height: 2rem;
    }

    .image svg path {
      stroke: #ffffff;
      /* Set the stroke color to white */
    }

    .content {
      margin-top: 1rem;
      text-align: center;
    }

    .title {
      color: #066e29;
      font-size: 1.5rem;
      font-weight: 600;
      line-height: 1.5rem;
    }

    .message {
      margin-top: 0.5rem;
      color: #595b5f;
      font-size: 1rem;
      line-height: 1.25rem;
    }

    .actions {
      margin-top: 1.5rem;
      /* Increased the top margin to move the button down */
      margin-bottom: 0.5rem;
      /* Adjust bottom margin if needed */
      padding: 0 1rem;
    }

    .okay {
      display: inline-flex;
      padding: 0.5rem 1.25rem;
      /* Slightly increased padding for a better look */
      background-color: #1aa06d;
      color: #ffffff;
      font-size: 1rem;
      line-height: 1.5rem;
      font-weight: 500;
      justify-content: center;
      width: 100%;
      border-radius: 0.375rem;
      border: none;
      box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
      transition: background-color 0.3s ease, transform 0.2s ease;
      /* Added transition for hover effect */
    }

    .okay:hover {
      background-color: #138a57;
      /* Darker shade on hover */
      transform: scale(1.05);
      /* Slight zoom on hover */
    }




    @keyframes animate {
      from {
        transform: scale(1);
      }

      to {
        transform: scale(1.09);
      }
    }
  </style>

 




  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>