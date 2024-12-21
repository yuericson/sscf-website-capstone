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
        /* Existing CSS Styles */

        .election-voting-form {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
            min-height: 100vh;
            background-color: #f9f9f9; /* Optional: Added a light background for better contrast */
            margin-top: -20px;
            transition: opacity 1s ease-out; /* Added for fade-out effect */
        }

        .container {
            max-width: 700px; /* Increased from 600px to 700px */
            width: 100%;
        }

        .form-box {
            background-color: #fff;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 15px 25px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: transform 0.3s ease; /* Optional: Adds a slight zoom effect */
        }

        .form-box h1 {
            font-size: 2.5rem;
            color: #185F43;
            margin-bottom: 10px;
            text-align: center; /* Optional: Center the heading */
        }

        .form-box p {
            font-size: 1.1rem;
            color: #666;
            margin-bottom: 30px;
            text-align: center; /* Optional: Center the paragraph */
        }

        .form-group {
            margin-bottom: 25px;
            text-align: left;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
        }

        .form-group label i {
            margin-right: 8px;
            color: #185F43;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 16px;
            background-color: #fdfdfd;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus {
            border-color: #185F43;
            box-shadow: 0 0 8px rgba(24, 95, 67, 0.2);
            outline: none;
        }

        .candidate-section {
            margin-bottom: 40px;
        }

        .candidate-section h2 {
            font-size: 1.8rem;
            color: #185F43;
            margin-bottom: 20px;
            border-left: 5px solid #185F43;
            padding-left: 15px;
        }

        .radio-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
        }

        .radio-option {
            flex: 1 1 calc(50% - 15px);
            background-color: #f0f4f7;
            border-radius: 8px;
            padding: 15px;
            display: flex;
            align-items: center;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .radio-option:hover {
            background-color: #e2e8ed;
        }

        .radio-option input[type="radio"] {
            margin-right: 15px;
            accent-color: #185F43;
        }

        .form-box button[type="submit"] {
            background-color: #185F43;
            color: #fff;
            padding: 10px; /* Reduced padding to decrease height */
            font-size: 1.2rem;
            font-weight: 600;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 50%; /* Set to 50% of the form-box */
            height: 40px; /* Reduced height */
            display: block; /* Center the button */
            margin: 20px auto 0 auto; /* Center horizontally with auto margins */
            line-height: 15px; /* Ensures text is vertically centered */
            text-align: center;
        }

        .form-box button[type="submit"]:hover {
            background-color: #138a58;
        }

        .info {
            margin-top: 30px;
            font-size: 1rem;
            color: #777;
            text-align: center; /* Optional: Center the info text */
        }

        .info i {
            color: #185F43;
            margin-right: 8px;
        }

        /* Responsive Adjustments (Optional) */
        @media (max-width: 768px) {
            .radio-option {
                flex: 1 1 calc(50% - 15px);
            }

            .form-box button[type="submit"] {
                width: 60%; /* Slightly increase width on medium screens */
            }
        }

        @media (max-width: 640px) {
            .radio-option {
                flex: 1 1 100%;
            }

            .form-box button[type="submit"] {
                width: 100%;
            }
        }

        /* Fade-Out Effect */
        .fade-out {
            transition: opacity 1s ease-out;
            opacity: 0;
        }

        /* CSS for Modal */
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
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 
                        0 10px 10px -5px rgba(0, 0, 0, 0.04);
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

        /* Additional CSS for Election Ended Message */
        #electionEndedMessage {
            display: none; /* Hidden initially */
            text-align: center;
            font-size: 2rem;
            color: #dc3545; /* Bootstrap danger color */
            margin-top: 20px;
            animation: fadeIn 1s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>

    @php
        use App\Models\ElectionSetting;
        use Carbon\Carbon;

        // Retrieve the first election setting record
        $electionSetting = ElectionSetting::first();
        $currentTime = Carbon::now();
        $status = 'Not Set';

        // Determine the current status of the election
        if ($electionSetting && $electionSetting->start_time && $electionSetting->end_time) {
            $startTime = Carbon::parse($electionSetting->start_time);
            $endTime = Carbon::parse($electionSetting->end_time);

            if ($currentTime->lt($startTime)) {
                $status = 'Not Started';
            } elseif ($currentTime->between($startTime, $endTime)) {
                $status = 'Ongoing';
            } elseif ($currentTime->gt($endTime)) {
                $status = 'Ended';
            }
        }
    @endphp

    <section class="election-voting-form" id="votingFormSection">
      <div class="container">
        <div class="form-box">
          <h1>Election Voting Form</h1>
          <p>Please fill out the details below to cast your vote.</p>

          <!-- Form for Voting -->
          <form id="votingForm" action="{{ route('votes.store') }}" method="POST">
            @csrf

            <!-- Personal Information Section -->
            <div class="form-group">
              <label for="name"><i class="fas fa-user"></i> Full Name</label>
              <input type="text" id="name" name="name" value="{{ $voter->name }}" readonly>
            </div>

            <div class="form-group">
              <label for="email"><i class="fas fa-envelope"></i> Email Address</label>
              <input type="email" id="email" name="email" value="{{ $voter->email }}" readonly>
            </div>

            <div class="form-group">
              <label for="college-campus"><i class="fas fa-university"></i> College/Campus</label>
              <input type="text" id="college-campus" name="college" value="{{ $voter->college }}" readonly>
            </div>

            <!-- Dynamic Candidate Selection Sections -->
            @foreach ($positions as $position)
              @php
                $positionCandidates = $candidates->where('position_id', $position->id);
              @endphp
              @if ($positionCandidates->isNotEmpty())
                <div class="candidate-section">
                  <h2>{{ $position->name }}</h2>
                  <div class="radio-group">
                    @foreach ($positionCandidates as $candidate)
                      <label class="radio-option">
                        <input type="radio"
                          name="votes[{{ $position->id }}]"
                          value="{{ $candidate->id }}"
                          required
                          onchange="saveSelection({{ $position->id }}, '{{ $candidate->id }}')">
                        <span>{{ $candidate->name }}</span>
                      </label>
                    @endforeach
                    <!-- Abstain option -->
                    <label class="radio-option">
                      <input type="radio"
                        name="votes[{{ $position->id }}]"
                        value="abstain"
                        required
                        onchange="saveSelection({{ $position->id }}, 'abstain')">
                      <span>Abstain</span>
                    </label>
                  </div>
                </div>
              @endif
            @endforeach

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Submit Your Vote</button>
          </form>

          <p class="info"><i class="fas fa-lock"></i> Your vote is confidential and will remain anonymous.</p>
        </div>
      </div>
    </section>


    <!-- Modal for Vote Confirmation -->
    <div id="modalOverlay" style="display: none;"></div>

    <div class="card" id="messageBox" style="display: none;">
        <button class="dismiss" type="button" onclick="closeMessage()">×</button>
        <div class="header">
            <div class="image">
                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </div>
            <div class="content">
                <span class="title">Confirm Your Vote!</span>
                <p class="message">Are you sure you want to submit your vote?</p>
            </div>
            <div class="actions">
                <button id="messageOkayButton" class="okay" type="button">Okay</button>
            </div>
        </div>
    </div>

    <!-- Election Ended Message -->
    <div id="electionEndedMessage">
        <p>The election has ended.</p>
    </div>

    <!-- JavaScript for Form Handling, Modal, Fade-Out, and Redirect -->
    <script>
        // Function to save the selected option in localStorage
        function saveSelection(positionId, candidateValue) {
            localStorage.setItem('vote_position_' + positionId, candidateValue);
        }

        document.addEventListener('DOMContentLoaded', function () {
            const form = document.getElementById('votingForm');
            const modalOverlay = document.getElementById("modalOverlay");
            const messageBox = document.getElementById("messageBox");
            const messageOkayButton = document.getElementById("messageOkayButton");
            const votingFormSection = document.getElementById('votingFormSection');
            const electionEndedMessage = document.getElementById('electionEndedMessage');

            // Form submit event listener
            form.addEventListener('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                // Perform validation
                let valid = true;

                // Ensure at least one radio is selected per position
                document.querySelectorAll('.candidate-section').forEach((section) => {
                    const inputs = section.querySelectorAll('input[type="radio"]');
                    const checked = [...inputs].some((input) => input.checked);
                    if (!checked) {
                        valid = false;
                        alert('Please select a candidate for all positions.');
                    }
                });

                if (!valid) {
                    return; // Stop submission if validation fails
                }

                // Show the modal
                showModal();

                // After the user clicks "Okay" on the modal, submit the form
                messageOkayButton.addEventListener('click', function handleOkayClick() {
                    // Remove the event listener to prevent multiple submissions
                    messageOkayButton.removeEventListener('click', handleOkayClick);

                    // Optionally, display a loading indicator here

                    // Submit the form
                    form.submit();
                });
            });

            // Function to display the modal
            function showModal() {
                modalOverlay.style.display = "block";
                messageBox.style.display = "block";
            }

            // Function to close the modal
            window.closeMessage = function () {
                modalOverlay.style.display = "none";
                messageBox.style.display = "none";
            }

            // Function to redirect after successful submission (if needed)
            window.redirectToIndex = function () {
                window.location.href = "/local-election"; // Direct path without using named route
            }

            // Optional: Display modal based on server-side session (if needed)
            @if (session('success'))
                showModal(); // Display modal on success
            @endif

            // ===============================
            // Fade-Out and Show "Election Ended" Message with Redirect
            // ===============================

            // Pass Election End Time to JavaScript
            @if($electionSetting && $electionSetting->end_time)
                // Convert the end_time to a JavaScript Date object
                const electionEndTime = new Date("{{ Carbon::parse($electionSetting->end_time)->toIso8601String() }}").getTime();
            @else
                // Set to a far future date if not set
                const electionEndTime = new Date("9999-12-31T23:59:59Z").getTime();
            @endif

            // Function to perform fade-out and show message with redirect
            function fadeOutAndShowMessage() {
                if (votingFormSection) {
                    // Add the fade-out class to start the transition
                    votingFormSection.classList.add('fade-out');

                    // After the transition duration, hide the form and show the message
                    setTimeout(() => {
                        votingFormSection.style.display = 'none';
                        electionEndedMessage.style.display = 'block';

                        // After displaying the message for a few seconds, redirect
                        setTimeout(() => {
                            window.location.href = "/local-election"; // Direct path without using named route
                        }, 3000); // 3000 milliseconds = 3 seconds
                    }, 1000); // Match this timeout with the CSS transition duration (1s)
                } else {
                    // If the voting form is not found, directly show the message and redirect
                    electionEndedMessage.style.display = 'block';

                    // Redirect after a few seconds
                    setTimeout(() => {
                        window.location.href = "/local-election"; // Direct path without using named route
                    }, 3000); // 3 seconds
                }
            }

            // Get the current time
            const currentTime = new Date().getTime();

            if (currentTime >= electionEndTime) {
                // If the election has already ended, perform immediate fade-out and show message with redirect
                fadeOutAndShowMessage();
            } else {
                // Calculate the remaining time in milliseconds
                const remainingTime = electionEndTime - currentTime;

                // Set a timeout to trigger at the exact end time
                setTimeout(() => {
                    fadeOutAndShowMessage();
                }, remainingTime);
            }
        });
    </script>


      





  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
