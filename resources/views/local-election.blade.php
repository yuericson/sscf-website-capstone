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
  
 /* VOTING SECTION */

/* Voting Title */
.voting-title {
    font-size: 2.3em;
    font-weight: bold;
    color: #185F43;
    margin-top: -20px;
    text-align: left;
  }
  
  /* Voting Title Underline */
  .voting-title-underline {
    width: 8em;
    height: 4px;
    background-color: #185F43;
    margin: 0.1em 0;
    text-align: left;
  }
  
  /* Voting Section Titles */
  .voting-section-title {
    font-size: 40px;
    text-align: center;
    font-weight: bold;
    margin-bottom: 40px;
    color: #185F43;
  }
  
  /* Voting Subtitle */
  .voting-subtitle {
    text-align: left;
    font-weight: bold;
    margin-bottom: 45px;
    margin-top: 20px;
  }
 /* Style for the "Not Election Season" message */
 #notElectionSeasonMessage {
    display: none;
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #ff4d4d;
    background-color: #fff3f3;
    padding: 20px;
    border: 1px solid #ff4d4d;
    border-radius: 5px;
    margin: 20px;
  }
   
</style>





@php
    use App\Models\LocalSection;

    // Define $sections if not already passed from the controller
    if (!isset($sections)) {
        $sections = LocalSection::with('subtitles.electionimages')->get();
    }
@endphp

<!-- Local Election Page Title -->
<div class="container text-center my-5">
    <div class="voting-title">Local Election</div>
    <div class="voting-title-underline"></div>
</div>

<!-- "Not Election Season" Message -->
<div id="notElectionSeasonMessage">
There is currently no active election.
</div>

<div id="localElectionContainer">

<!-- Iterate through each section -->
@foreach($sections as $section)
    <div class="container my-5">
        <h2 class="voting-section-title">{{ $section->title }}</h2>

        <!-- Iterate through each subtitle within the section -->
        @foreach($section->subtitles as $subtitle)
            <h3 class="voting-subtitle">{{ $subtitle->title }}</h3>

            @if($subtitle->electionimages->isEmpty())
                <p>No images available for this subtitle.</p>
            @else
                <div class="row election-images">
                    @foreach($subtitle->electionimages as $electionImage)
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                            <div class="electionimage-hover" onclick="showFullImage('{{ asset('storage/' . $electionImage->image_path) }}')">
                                <img src="{{ asset('storage/' . $electionImage->image_path) }}" alt="{{ $electionImage->name }}" class="img-fluid electionimage-img">
                                <div class="overlay">
                                    <div class="hover-content">
                                        <i class="fas fa-search-plus"></i>
                                        <span>View Image</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        @endforeach
    </div>
@endforeach

<!-- Fullscreen Image Overlay -->
<div class="fullscreen-overlay" id="fullscreenOverlay" onclick="hideFullImage()">
    <span class="close-icon" onclick="hideFullImage()"><i class="fas fa-times-circle"></i></span>
    <img id="fullscreenImage" src="" alt="Fullscreen Image">
</div>

<style>
    .electionimage-hover {
        position: relative;
        cursor: pointer;
        overflow: hidden;
        border-radius: 8px;
    }

    .electionimage-img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease, filter 0.3s ease;
    }

    .electionimage-hover:hover .electionimage-img {
        transform: scale(1.1);
        filter: brightness(0.7);
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex;
        justify-content: center;
        align-items: center;
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .electionimage-hover:hover .overlay {
        opacity: 1;
    }

    .hover-content {
        text-align: center;
        color: #fff;
        transform: translateY(20px);
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }

    .electionimage-hover:hover .hover-content {
        transform: translateY(0);
        opacity: 1;
    }

    .hover-content i {
        font-size: 30px;
        margin-bottom: 5px;
    }

    .hover-content span {
        font-size: 16px;
    }

    .fullscreen-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        justify-content: center;
        align-items: center;
        z-index: 1050;
    }

    .fullscreen-overlay img {
        max-width: 90%;
        max-height: 90%;
        border-radius: 8px;
    }

    .close-icon {
        position: absolute;
        top: 20px;
        right: 30px;
        font-size: 30px;
        color: #fff;
        cursor: pointer;
        transition: transform 0.2s ease, color 0.2s ease;
    }

    .close-icon:hover {
        transform: scale(1.2);
        color: #ff4d4d;
    }

    .close-icon i {
        font-size: 30px;
    }
</style>

<script>
    // Function to show the fullscreen image
    function showFullImage(src) {
        const fullscreenOverlay = document.getElementById('fullscreenOverlay');
        const fullscreenImage = document.getElementById('fullscreenImage');
        fullscreenImage.src = src;
        fullscreenOverlay.style.display = 'flex';
    }

    // Function to hide the fullscreen image
    function hideFullImage() {
        const fullscreenOverlay = document.getElementById('fullscreenOverlay');
        fullscreenOverlay.style.display = 'none';
    }

    // On page load, check the localStorage flag to decide whether to show the election content or display the message.
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem("localElectionHidden") === "true") {
            document.getElementById('localElectionContainer').style.display = 'none';
            document.getElementById('notElectionSeasonMessage').style.display = 'block';
        } else {
            document.getElementById('localElectionContainer').style.display = 'block';
            document.getElementById('notElectionSeasonMessage').style.display = 'none';
        }
    });
</script>



<!--End of  Candidates for Upcoming Federal Election -->





<!-- Result of Election --> 
<!-- <div class="row mt-4 justify-content-center"> -->
    <!--  Registered Voters by College --> 
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card" style="height: 300px;"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Registered Voters by College</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="registeredByCollegeChart"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->

    <!--  Votes Cast by College --> 
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card" style="height: 300px;"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Votes Cast by College</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="votesByCollegeChart"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

<!-- Total Votes and Abstain Section --> 
<!-- <div class="row mt-3 justify-content-center"> -->
    <!-- <div class="col-10 mb-3"> -->
        <!-- <div class="p-2 mb-2 text-white rounded" style="background-color:#28a745;"> -->
            <!-- <h6 class="mb-0 text-center">Total Votes and Abstain</h6> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card h-100"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Position A - Candidate A</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="totalVotesAbstainChartCandidate1"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card h-100"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Position B - Candidate B</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="totalVotesAbstainChartCandidate2"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->

<!--  Total Votes and Abstain Cast by College Section --> 
<!-- <div class="row mt-3 justify-content-center"> -->
    <!-- <div class="col-10 mb-3"> -->
        <!-- <div class="p-2 mb-2 text-white rounded" style="background-color:#28a745;"> -->
            <!-- <h6 class="mb-0 text-center">Total Votes and Abstain Cast by College</h6> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card h-100"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Position C - Candidate C</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="votesAbstainByCollegeChartCandidate1"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
    <!-- <div class="col-md-5 mb-3"> -->
        <!-- <div class="card h-100"> -->
            <!-- <div class="card-header bg-success text-white p-2"> -->
                <!-- <h6 class="mb-0">Position D - Candidate D</h6> -->
            <!-- </div> -->
            <!-- <div class="card-body"> -->
                <!-- <canvas id="votesAbstainByCollegeChartCandidate2"></canvas> -->
            <!-- </div> -->
        <!-- </div> -->
    <!-- </div> -->
<!-- </div> -->
<!-- local-election.blade.php -->

<!-- local-election.blade.php -->

@php
    // Retrieve data from the database

    // Fetch Registered Voters by College
    $votersByCollege = \DB::table('voters_login')
        ->select('college', \DB::raw('COUNT(*) as total'))
        ->groupBy('college')
        ->get();

    // Fetch Votes Cast by College
    $votesByCollege = \DB::table('election_voters_vote')
        ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
        ->select('voters_login.college', \DB::raw('COUNT(*) as total_votes'))
        ->groupBy('voters_login.college')
        ->get();

    // Data for Total Votes and Abstain per Candidate
    $votesByPositionAndCandidate = \DB::table('election_candidates')
        ->join('election_positions', 'election_candidates.position_id', '=', 'election_positions.id')
        ->select(
            'election_positions.id as position_id', // Fetch position_id for ordering
            'election_positions.name as position_name',
            'election_candidates.name as candidate_name',
            \DB::raw('(SELECT COUNT(*) FROM election_voters_vote 
                        WHERE JSON_CONTAINS(election_voters_vote.votes, 
                                            JSON_OBJECT(election_positions.name, election_candidates.name))
                      ) as total_votes'),
            \DB::raw('(SELECT COUNT(*) FROM election_voters_vote 
                        WHERE JSON_CONTAINS(election_voters_vote.votes, 
                                            JSON_OBJECT(election_positions.name, "Abstain"))
                      ) as total_abstains')
        )
        ->orderBy('election_positions.id', 'asc') // Ensure positions are ordered by ID ascending
        ->get();

    // Total Votes and Abstain Cast by College per Candidate
    $votesAndAbstainsByCollegePerCandidate = [];
    foreach ($votesByPositionAndCandidate as $candidate) {
        $votesPerCollege = \DB::table('election_voters_vote')
            ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
            ->whereRaw("JSON_EXTRACT(votes, '$.\"{$candidate->position_name}\"') = '{$candidate->candidate_name}' 
                        OR JSON_EXTRACT(votes, '$.\"{$candidate->position_name}\"') = 'Abstain'")
            ->select(
                'voters_login.college',
                \DB::raw("SUM(JSON_EXTRACT(votes, '$.\"{$candidate->position_name}\"') = '{$candidate->candidate_name}') as votes_count"),
                \DB::raw("SUM(JSON_EXTRACT(votes, '$.\"{$candidate->position_name}\"') = 'Abstain') as abstain_count")
            )
            ->groupBy('voters_login.college')
            ->get();

        $votesAndAbstainsByCollegePerCandidate[] = [
            'position_id' => $candidate->position_id, // Include position_id for ordering
            'position_name' => $candidate->position_name,
            'candidate_name' => $candidate->candidate_name,
            'votes_by_college' => $votesPerCollege
        ];
    }

    // Sort the $votesAndAbstainsByCollegePerCandidate array based on position_id to maintain order
    usort($votesAndAbstainsByCollegePerCandidate, function($a, $b) {
        return $a['position_id'] <=> $b['position_id'];
    });

    // Define color sets for charts
    $colorSets = [
        ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
        ['rgba(75, 192, 192, 0.6)', 'rgba(255, 206, 86, 0.6)'],
        ['rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'],
        ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)'],
        // Add more color sets as needed
    ];
@endphp

<!-- Main Dashboard Container -->
<div class="container p-4 shadow rounded mb-5" id="dashboardContainer" style="background-color: #f8f9fa; max-width: 1200px; margin: 0 auto;">
    <div class="row">
        <h2 class="text-center mb-4">Local Election Results</h2>
    </div>

    <!-- Charts Section -->
    <div class="row mt-5">
        <!-- Registered Voters by College -->
        <div class="col-md-6 mb-4">
            <div class="card" style="height: 400px;">
                <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Registered Voters by College</h5>
                </div>
                <div class="card-body" id="registeredVotersSection">
                    <div class="chart-container">
                        <canvas id="registeredByCollegeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Votes Cast by College -->
        <div class="col-md-6 mb-4">
            <div class="card" style="height: 400px;">
                <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Votes Cast by College</h5>
                </div>
                <div class="card-body" id="votesCastSection">
                    <div class="chart-container">
                        <canvas id="votesByCollegeChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Total Votes and Abstain Section -->
    <div class="row mt-4">
        <div class="col-12 mb-4">
            <div class="p-3 mb-3 text-white rounded bg-success">
                <h4 class="mb-0 text-center">Total Votes and Abstain</h4>
            </div>
        </div>
        @foreach($votesByPositionAndCandidate as $candidateId => $data)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            {{ $data->position_name }} - {{ $data->candidate_name }}
                        </h5>
                    </div>
                    <div class="card-body" id="totalVotesAbstainSection{{ $candidateId }}">
                        <div class="chart-container">
                            <canvas id="totalVotesAbstainChart{{ $candidateId }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Total Votes and Abstain Cast by College Section -->
    <div class="row mt-4">
        <div class="col-12 mb-4">
            <div class="p-3 mb-3 text-white rounded bg-success">
                <h4 class="mb-0 text-center">Total Votes and Abstain Cast by College</h4>
            </div>
        </div>
        @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
            <div class="col-md-12 mb-4">
                <div class="card" style="height: 600px;">
                    <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            {{ $data['position_name'] }} - {{ $data['candidate_name'] }}
                        </h5>
                    </div>
                    <div class="card-body" id="votesByCollegeSection{{ $candidateId }}">
                        <div class="chart-container">
                            <canvas id="votesByCollegeChart{{ $candidateId }}"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Include Chart.js and Chart.js Data Labels via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>

<!-- Pass PHP data to JavaScript -->
<script>
    const registeredByCollegeLabels = @json($votersByCollege->pluck('college'));
    const registeredByCollegeData = @json($votersByCollege->pluck('total'));

    const votesByCollegeLabels = @json($votesByCollege->pluck('college'));
    const votesByCollegeData = @json($votesByCollege->pluck('total_votes'));

    // Total Votes and Abstain Data
    const totalVotesAndAbstainData = @json($votesByPositionAndCandidate->toArray());

    // Votes and Abstains by College Data
    const votesAndAbstainsByCollegeData = @json($votesAndAbstainsByCollegePerCandidate);
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // **Registered Voters by College Chart (Horizontal Bar Chart without Legend)**
        const ctxRegisteredByCollege = document.getElementById('registeredByCollegeChart').getContext('2d');
        new Chart(ctxRegisteredByCollege, {
            type: 'bar',
            data: {
                labels: registeredByCollegeLabels,
                datasets: [{
                    label: 'Registered Voters',
                    data: registeredByCollegeData,
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)',
                    ],
                    borderWidth: 1,
                }],
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        color: 'white',
                        anchor: 'center',
                        align: 'center',
                        font: { size: 14, weight: 'bold' },
                        formatter: (value) => value,
                    },
                    legend: { 
                        display: false,
                    },
                    title: { display: true, text: 'Registered Voters by College' },
                },
                scales: {
                    x: { 
                        beginAtZero: true,
                        title: { display: true, text: 'Number of Voters' },
                        ticks: { precision: 0 },
                    },
                    y: {
                        title: { display: false },
                    },
                },
            },
            plugins: [ChartDataLabels],
        });

        // **Votes Cast by College Chart (Pie Chart with Legends)**
        const ctxVotesByCollege = document.getElementById('votesByCollegeChart').getContext('2d');
        new Chart(ctxVotesByCollege, {
            type: 'pie',
            data: {
                labels: votesByCollegeLabels,
                datasets: [{
                    label: 'Votes Cast',
                    data: votesByCollegeData,
                    backgroundColor: [
                        'rgba(80, 200, 120, 0.6)',
                        'rgba(255, 191, 0, 0.6)',
                        'rgba(191, 95, 255, 0.6)',
                        'rgba(108, 122, 137, 0.6)',
                        'rgba(75, 0, 130, 0.6)',
                        'rgba(255, 165, 0, 0.6)',
                    ],
                    borderColor: [
                        'rgba(80, 200, 120, 1)',
                        'rgba(255, 191, 0, 1)',
                        'rgba(191, 95, 255, 1)',
                        'rgba(108, 122, 137, 1)',
                        'rgba(75, 0, 130, 1)',
                        'rgba(255, 165, 0, 1)',
                    ],
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    datalabels: {
                        color: 'white',
                        formatter: (value, context) => {
                            const total = context.chart.data.datasets[0].data.reduce((sum, val) => sum + val, 0);
                            const percentage = ((value / total) * 100).toFixed(1);
                            return value + ' (' + percentage + '%)';
                        },
                        font: { size: 14, weight: 'bold' },
                        align: 'center',
                        anchor: 'center',
                    },
                    legend: { 
                        display: true,
                        position: 'right',
                    },
                    title: { display: true, text: 'Votes Cast by College' },
                },
            },
            plugins: [ChartDataLabels],
        });

        // **Initialize Total Votes and Abstain Charts per Candidate (Horizontal Bar Graphs without Legends)**
        @foreach($votesByPositionAndCandidate as $candidateId => $data)
            @php
                $colorSet = $colorSets[$loop->index % count($colorSets)];
            @endphp
            const ctxTotalVotesAbstain{{ $candidateId }} = document.getElementById('totalVotesAbstainChart{{ $candidateId }}').getContext('2d');
            new Chart(ctxTotalVotesAbstain{{ $candidateId }}, {
                type: 'bar',
                data: {
                    labels: ['Votes', 'Abstain'],
                    datasets: [{
                        label: '{{ $data->candidate_name }}',
                        data: [{{ $data->total_votes }}, {{ $data->total_abstains }}],
                        backgroundColor: [
                            '{{ $colorSet[0] }}',
                            '{{ $colorSet[1] }}',
                        ],
                        borderColor: [
                            '{{ $colorSet[0] }}',
                            '{{ $colorSet[1] }}',
                        ],
                        borderWidth: 1,
                    }],
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: 'white',
                            anchor: 'center',
                            align: 'center',
                            font: { size: 14, weight: 'bold' },
                            formatter: (value) => value,
                        },
                        legend: { 
                            display: false,
                        },
                        title: { display: true, text: 'Total Votes and Abstain for {{ $data->candidate_name }}' },
                    },
                    scales: {
                        x: { 
                            beginAtZero: true,
                            title: { display: true, text: 'Number of Votes' },
                            ticks: { precision: 0 },
                        },
                        y: {
                            title: { display: false },
                        },
                    },
                },
                plugins: [ChartDataLabels],
            });
        @endforeach

        // **Initialize Votes and Abstain Cast by College Charts per Candidate with Legends**
        @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
            @php
                $colorSet = $colorSets[$loop->index % count($colorSets)];
                // Prepare labels and data for each candidate's chart
                $colleges = $data['votes_by_college']->pluck('college')->toArray();
                $votes_counts = $data['votes_by_college']->pluck('votes_count')->toArray();
                $abstains_counts = $data['votes_by_college']->pluck('abstain_count')->toArray();
            @endphp
            const ctxVotesAbstainByCollege{{ $candidateId }} = document.getElementById('votesByCollegeChart{{ $candidateId }}').getContext('2d');
            new Chart(ctxVotesAbstainByCollege{{ $candidateId }}, {
                type: 'bar',
                data: {
                    labels: @json($colleges),
                    datasets: [
                        {
                            label: 'Votes',
                            data: @json($votes_counts),
                            backgroundColor: '{{ $colorSet[0] }}',
                            borderColor: '{{ $colorSet[0] }}',
                            borderWidth: 1,
                        },
                        {
                            label: 'Abstain',
                            data: @json($abstains_counts),
                            backgroundColor: '{{ $colorSet[1] }}',
                            borderColor: '{{ $colorSet[1] }}',
                            borderWidth: 1,
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: { 
                        x: { 
                            beginAtZero: true,
                            title: { display: true, text: 'Number of Votes' },
                            ticks: { precision: 0 },
                        },
                        y: {
                            title: { display: true, text: 'Colleges' },
                            ticks: { precision: 0 },
                        },
                    },
                    plugins: {
                        datalabels: {
                            color: 'white',
                            anchor: 'center',
                            align: 'center',
                            font: { size: 14, weight: 'bold' },
                            formatter: (value) => value,
                        },
                        legend: { 
                            display: true,
                            position: 'top',
                        },
                        title: { 
                            display: true, 
                            text: 'Total Votes and Abstain Cast by College for {{ $data["candidate_name"] }}' 
                        }
                    }
                },
                plugins: [ChartDataLabels],
            });
        @endforeach
    });
</script>

<!-- Chart Container Styling -->
<style>
    /* Initially hide all sections and the dashboard container */
    #dashboardContainer,
    #registeredVotersSection,
    #votesCastSection,
    @foreach($votesByPositionAndCandidate as $candidateId => $data)
        #totalVotesAbstainSection{{ $candidateId }},
    @endforeach
    @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
        #votesByCollegeSection{{ $candidateId }},
    @endforeach
    {
        display: none; /* Default to hidden */
    }

    /* Chart Container Styling */
    .chart-container {
        position: relative;
        width: 100%;
        height: 300px; /* Adjust the height as needed */
    }

    /* Responsive adjustments for smaller screens */
    @media (max-width: 768px) {
        .chart-container {
            height: 250px; /* Reduced height for smaller devices */
        }
    }

    @media (max-width: 576px) {
        .chart-container {
            height: 200px; /* Further reduced height for very small devices */
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const state = localStorage.getItem('allSections') || 'hidden'; // Default to hidden
        const elementsToToggle = [
            'dashboardContainer', // ID of the main dashboard container
            'registeredVotersSection',
            'votesCastSection',
            @foreach($votesByPositionAndCandidate as $candidateId => $data)
                'totalVotesAbstainSection{{ $candidateId }}',
            @endforeach
            @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
                'votesByCollegeSection{{ $candidateId }}',
            @endforeach
        ];

        elementsToToggle.forEach(elementId => {
            const element = document.getElementById(elementId);
            if (element) {
                element.style.display = state === 'visible' ? 'block' : 'none';
            }
        });
    });
</script>









<style>
  /* How to Vote Container */
  .how-to-vote-container {
    background-color: #E1E289;
    padding: 40px 20px;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 30px;
  }

  /* How to Vote Title */
  .how-to-vote-title {
    font-size: 32px;
    font-weight: bold;
    color:rgb(255, 255, 255);
    margin-bottom: 20px;
    padding: 10px 20px;
    border-bottom: 2px solid #14591D;
    display: inline-block;
    background-color: #0A210F;
    border-radius: 10px;
    margin-top: -100px;
  }

  /* Steps Container */
  .steps-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    margin-top: 40px;
    max-width: 850px;
    margin-left: auto;
    margin-right: auto;
  }

  /* Individual Step Box */
  .step-box {
    position: relative;
    width: calc(33.33% - 20px);
    padding: 20px;
    border: 1px solid #14591D;
    border-radius: 8px;
    background-color:rgb(255, 255, 255);
    text-align: center;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    box-sizing: border-box;
  }

  /* Step Number Circle */
  .step-number {
    position: absolute;
    top: -15px;
    left: -15px;
    width: 40px;
    height: 40px;
    background-color: #14591D;
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
  }

  /* Step Icon */
  .step-icon {
    font-size: 50px;
    color: #14591D;
    margin-bottom: 10px;
  }

  /* Step Text */
  .step-box p {
    font-size: 16px;
    font-weight: bold;
    color: #0A210F;
    margin-top: 10px;
  }

  /* Voting Button Container */
  .voting-btn-container {
    margin-top: 20px;
    text-align: center;
  }

  /* Voting Button */
  .voting-btn {
    background-color: #14591D;
    color: #ffffff;
    border: 2px solid #14591D;
    padding: 8px 16px;
    font-size: 1.3em;
    border-radius: 4px;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
    margin-top: 30px;
  }

  .voting-btn:hover {
    background-color: #0A210F;
    color: #ffffff;
    border-color: #0A210F;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .steps-container {
      gap: 20px;
    }

    .step-box {
      width: calc(50% - 20px);
    }
  }

  @media (max-width: 480px) {
    .step-box {
      width: 100%;
    }

    .how-to-vote-title {
      font-size: 24px;
      margin-bottom: -20px;
      margin-top: -20px;
    }

    .voting-btn {
      font-size: 1em;
    }
  }
</style>

<div class="how-to-vote-container">
  <div class="text-center mt-5">
    <h3 class="how-to-vote-title">How to Vote</h3>
    <div class="steps-container">
      <div class="step-box">
        <div class="step-number">1</div>
        <div class="step-icon">
          <i class="fas fa-envelope"></i> <!-- Icon for Step 1 -->
        </div>
        <p>Visit your department's student council office to access your Student ID Number and Password.</p>
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
        <p>Login your Student Id Number and Password</p>
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
        <p>View the final results of Election</p>
      </div>
    </div>

    <!-- Voting Button -->
    <div class="voting-btn-container mt-4">
      <a href="{{ route('voters-login') }}" class="btn btn-primary voting-btn" id="voteButton">Vote Now</a>
    </div>
  </div>
</div>






<style>
    /* Countdown Timer Title */
    .countdown-title {
        font-size: 2.5rem;
        margin-bottom: 1.5rem;
        color: #14591D; /* Lighter shade for visibility */
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    /* Countdown Timer Container */
    .countdown-timer {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1.5rem;
        flex-wrap: wrap;
        background-color: #14591D;
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.3);
    }

    /* Styling for Each Timer Section */
    .timer-section {
        text-align: center;
        font-size: 1.5rem;
        padding: 1rem 1.5rem;
        border: 2px solid #14591D;
        border-radius: 12px;
        background: linear-gradient(145deg, #FCE7D9, #E1E289);
        box-shadow: 3px 3px 6px rgba(0, 0, 0, 0.2), -3px -3px 6px rgba(255, 255, 255, 0.5);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .timer-section:hover {
        transform: scale(1.1);
        box-shadow: 5px 5px 12px rgba(0, 0, 0, 0.4), -5px -5px 12px rgba(255, 255, 255, 0.6);
    }

    /* Styling for Time Values (Days, Hours, Minutes, Seconds) */
    .timer-section span {
        display: block;
        font-size: 2.5rem;
        font-weight: bold;
        color: #14591D;
    }

    .timer-section small {
        font-size: 1rem;
        font-weight: 600;
        color: #0A210F;
        margin-top: 5px;
    }

    /* Description Text Styling */
    .countdown-description {
        font-size: 1.2rem;
        color: #14591D;
        margin-top: 1rem;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .countdown-title {
            font-size: 2rem;
        }

        .countdown-timer {
            flex-direction: column;
            padding: 1rem;
        }

        .timer-section {
            padding: 0.8rem 1.2rem;
        }

        .timer-section span {
            font-size: 2.2rem;
        }

        .timer-section small {
            font-size: 0.9rem;
        }

        .countdown-description {
            font-size: 1rem;
        }
    }
</style>

@php
    use App\Models\ElectionSetting;

    // Retrieve the election settings directly within the Blade template
    $electionSetting = ElectionSetting::first(); // Adjust retrieval logic as needed
@endphp

<!-- Election Start Section -->
<div class="container text-center my-5">
    <h3 class="countdown-title">Election Start</h3>
    @if($electionSetting && $electionSetting->start_time)
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
        <p class="countdown-description">Election starts at: {{ \Carbon\Carbon::parse($electionSetting->start_time)->format('F j, Y, g:i a') }}</p>
    @else
        <p class="countdown-description">Start time not set.</p>
    @endif
</div>

<!-- Election End Section -->
<div class="container text-center my-5">
    <h3 class="countdown-title">Election End</h3>
    @if($electionSetting && $electionSetting->end_time)
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
        <p class="countdown-description">Election ends at: {{ \Carbon\Carbon::parse($electionSetting->end_time)->format('F j, Y, g:i a') }}</p>
    @else
        <p class="countdown-description">End time not set.</p>
    @endif
</div>

<script>
    // Function to update the countdown timer
    function updateCountdown(endTime, elements) {
        const countDownDate = new Date(endTime).getTime();

        const interval = setInterval(function () {
            const now = new Date().getTime();
            const distance = countDownDate - now;

            if (distance < 0) {
                clearInterval(interval);
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById(elements.days).innerHTML = days < 10 ? "0" + days : days;
            document.getElementById(elements.hours).innerHTML = hours < 10 ? "0" + hours : hours;
            document.getElementById(elements.minutes).innerHTML = minutes < 10 ? "0" + minutes : minutes;
            document.getElementById(elements.seconds).innerHTML = seconds < 10 ? "0" + seconds : seconds;
        }, 1000);
    }

    @if($electionSetting && $electionSetting->start_time)
        updateCountdown("{{ $electionSetting->start_time }}", {
            days: 'start-days',
            hours: 'start-hours',
            minutes: 'start-minutes',
            seconds: 'start-seconds'
        });
    @endif

    @if($electionSetting && $electionSetting->end_time)
        updateCountdown("{{ $electionSetting->end_time }}", {
            days: 'end-days',
            hours: 'end-hours',
            minutes: 'end-minutes',
            seconds: 'end-seconds'
        });
    @endif
</script>

</div>















<!-- Footer -->
<footer class="footer">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class="col-md-4 text-center">
          <img src="../images/SSCF-Footer-Logo.png" alt="Logo" class="img-fluid mb-3">
          <div class="logo-description-section">
            <p class="mb-0">This is the highest governing and policy-making body of Southern Luzon State University
              (SLSU)
              student body.</p>
          </div>
        </div>
        <!-- Contact Us -->
        <div class="col-md-4">
          <div class="contact-us-section">
            <h5>Contact Us</h5>
            <p>Email: <a href="mailto:slsusscf@slsu.edu.ph" class="text-white">slsusscf@slsu.edu.ph</a></p>
            <p>Phone: 09123456789</p>
          </div>
          <div class="visit-us-section">
            <h5>Visit Us</h5>
            <p>Office Hours: Monday - Friday, 9:00 AM - 5:00 PM</p>
          </div>
        </div>
        <!-- About Us -->
        <div class="col-md-4">
          <div class="about-us-section">
            <h5>About Us</h5>
            <p>Supreme Student Council Federation of Southern Luzon State University, dedicated to empowering students
              by
              promoting academic and social well-being, fostering community, and providing a platform for student voices
              to be heard.</p>
          </div>
          <div class="get-in-touch-section">
            <h5>Get in Touch</h5>
            <p>
              <a href="mailto:slsusscf@slsu.edu.ph" class="text-white"><i class="fas fa-envelope"></i> Gmail</a> |
              <a href="https://facebook.com" class="text-white"><i class="fab fa-facebook-f"></i> Facebook</a> |
              <a href="https://twitter.com" class="text-white"><i class="fab fa-twitter"></i> Twitter</a>
            </p>
          </div>
        </div>
      </div>
      <hr class="hr-divider">
      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <p class="footer-center-text">© 2024 SLSU Supreme Student Council Federation. All Rights Reserved</p>
        </div>
      </div>
    </div>
  </footer>

 

<style>
    
/* FOOTER STYLES */
/* General footer styles */
.footer {
background: linear-gradient(to bottom, #14591D, #0A210F);
color: #FCE7D9;
padding-top: 20px;
padding-bottom: 20px;
overflow-x: hidden;
bottom: 0;
width: 100%;
}

/* Link styles within footer */
.footer a {
color: #E1E289;
text-decoration: none;
}

.footer a:hover {
text-decoration: underline;
}

/* Heading styles within footer */
.footer h5 {
margin-top: 10px;
margin-bottom: 0.5rem;
color: #E1E289;
}

/* Paragraph styles within footer */
.footer p {
margin-bottom: 0.5rem;
color: #FCE7D9;
}

/* Logo styles within footer */
.footer img {
max-width: 150px;
margin-right: 10px;
margin-top: 13px;
}

/* Horizontal divider style */
.hr-divider {
border-top: 3px solid #E1E289;
margin-top: 20px;
margin-bottom: 20px;
margin-left: calc(-50vw + 50%);
margin-right: calc(-50vw + 50%);
}

/* Custom styles for footer center text */
.footer-center-text {
text-align: center;
margin-top: -5px;
margin-bottom: -5px;
color: #E1E289;
}

/* Individual section styles */
/* Logo description section styles */
.logo-description-section p {
margin-right: 28px;
margin-left: 10px;
text-align: center;
color: #FCE7D9;
}

/* Contact Us, Visit Us, About Us, and Get in Touch section margins */
.contact-us-section,
.visit-us-section,
.about-us-section,
.get-in-touch-section {
margin-bottom: 20px;
}

/* Specific heading margins for Contact Us and Visit Us sections */
.contact-us-section h5,
.visit-us-section h5 {
margin-top: 30px;
color: #E1E289;
}

.visit-us-section h5 {
margin-top: 15px;
}

/* Specific paragraph margins for Contact Us and Visit Us sections */
.contact-us-section p,
.visit-us-section p {
margin-top: 5px;
color: #FCE7D9;
}

/* Specific heading margins for About Us and Get in Touch sections */
.about-us-section h5,
.get-in-touch-section h5 {
margin-top: 20px;
color: #E1E289;
}

/* Specific paragraph margins for About Us and Get in Touch sections */
.about-us-section p,
.get-in-touch-section p {
margin-top: 5px;
color: #FCE7D9;
}

/* Font Awesome icon styles within footer */
.footer .fas,
.footer .fab {
margin-right: 2px;
color: #E1E289;
}


</style>
  
  
  
  
  
  
  
  
  
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
  </html>
  