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
  .media-gallery {
    padding: 40px;
    text-align: center;
    border-radius: 8px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
    background: linear-gradient(135deg, #f9f9f9 0%, #e6e6e6 100%); /* Subtle gradient */
  }
  
  h2 {
    font-size: 2.5rem;
    color: #185F43;
    margin-bottom: 10px;
    text-transform: uppercase; /* Make heading uppercase */
    letter-spacing: 1px; /* Letter spacing for emphasis */
  }
  
  h3 {
    font-size: 1.5rem;
    color: #555;
    margin-bottom: 20px;
  }
  
  .gallery-container {
    margin: auto;
    max-width: 1200px;
  }
  
  .image-gallery {
    margin-bottom: 60px;
    background-color: #fff; /* White background for contrast */
    border-radius: 10px;
    padding: 20px; /* Padding inside the image gallery */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
  }
  
  .image-gallery h4 {
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.8rem;
    color: #185F43;
    border-bottom: 2px solid #185F43; /* Underline for emphasis */
    padding-bottom: 10px;
  }
  
  .slider {
    position: relative;
    overflow: hidden;
    border-radius: 10px; /* Round corners of the slider */
  }
  
  .slides {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }
  
  .slide {
    min-width: 100%;
  }
  
  .slide img {
    width: 100%; /* Full width for images */
    height: auto; /* Automatic height to maintain aspect ratio */
    max-height: 500px; /* Limit the max height of images */
    object-fit: contain; /* Maintain aspect ratio without zooming */
    display: block;
    border-radius: 8px; /* Rounded corners for images */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
  }
  
  button.prev,
  button.next {
    position: absolute;
    top: 50%;
    background-color: #185F43; /* Green background */
    color: #ffffff; /* White arrow color */
    border: none;
    cursor: pointer;
    padding: 12px 18px;
    font-size: 18px;
    border-radius: 50%; /* Circular buttons */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2); /* Shadow for buttons */
    transition: background-color 0.3s, color 0.3s, transform 0.3s; /* Transition for hover effect */
  }
  
  button.prev:hover,
  button.next:hover {
    background-color: #ffffff; /* White background on hover */
    color: #185F43; /* Green arrow color on hover */
   
  }
  
  button.prev {
    left: 20px; /* Adjust position */
  }
  
  button.next {
    right: 20px; /* Adjust position */
  }
  
  /* VIDEO GALLERY */
  .video-gallery {
    margin-bottom: 60px;
    background-color: #fff; /* White background for video gallery */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Padding inside the box */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow */
  }
  
  .video-gallery h4 {
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.8rem;
    color: #185F43;
    border-bottom: 2px solid #185F43; /* Underline for emphasis */
    padding-bottom: 10px;
  }
  
  .video-embed {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* Space between video boxes */
  }
  
  .video-box {
    flex: 1 1 calc(30% - 20px); /* Each box takes up 1/3 of the container */
    max-width: calc(30% - 20px); /* Limit max width */
    border-radius: 8px; /* Rounded corners */
    overflow: hidden; /* Prevent overflow */
    transition: transform 0.3s; /* Smooth scaling */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for video boxes */
  }
  
  .video-box:hover {
    transform: scale(1.05); /* Slightly scale up on hover */
  }
  
  .video-embed iframe {
    width: 100%; /* Full width for iframe */
    height: 200px; /* Adjust height as necessary */
    border: none; /* Remove default border */
  }
  
  /* Responsive Design */
  @media (max-width: 768px) {
    .video-box {
      flex: 1 1 calc(45% - 20px); /* 2 boxes per row on medium screens */
      max-width: calc(45% - 20px); /* Limit max width */
    }
  }
  
  @media (max-width: 480px) {
    .video-box {
      flex: 1 1 100%; /* 1 box per row on small screens */
      max-width: 100%; /* Limit max width */
    }
  }
  
  
  /* PHOTO ALBUMS */
  .photo-albums {
    margin-bottom: 40px;
    background-color: #f9f9f9; /* Light background color for contrast */
    border-radius: 10px; /* Rounded corners */
    padding: 20px; /* Padding inside the box */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Soft shadow for the box */
  }
  
  .photo-albums h4 {
    margin-bottom: 20px;
    font-weight: bold;
    font-size: 1.8rem;
    color: #185F43;
    border-bottom: 2px solid #185F43; /* Underline for emphasis */
    padding-bottom: 10px;
  }
  
  .album-container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); /* Responsive grid */
    gap: 20px; /* Space between album boxes */
  }
  
  .album-box {
    background-color: #fff; /* White background for album boxes */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow for album boxes */
    text-align: center; /* Center align text */
    padding: 20px; /* Padding inside album boxes */
    transition: transform 0.3s; /* Smooth scaling */
  }
  
  .album-box:hover {
    transform: scale(1.05); /* Slightly scale up on hover */
  }
  
  .album-link {
    text-decoration: none; /* Remove underline */
    color: #185F43; /* Use dark green for links */
    font-weight: 600; /* Slightly bolder links */
    display: flex;
    flex-direction: column; /* Stack icon and text vertically */
    align-items: center; /* Center icon and text horizontally */
  }
  
  .icon {
    font-size: 1.5rem; /* Size of the icons */
    margin-bottom: 8px; /* Space between icon and text */
  }
  
  .text {
    font-size: 1.2rem; /* Font size for album links */
  }
  
  /* Adjustments for Responsive Design */
  @media (max-width: 768px) {
    .album-container {
      grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); /* Adjust grid for medium screens */
    }
  }
  
  
  
  
  .modal-content {
    position: relative; /* Positioning for the modal content */
    width: 600px; /* Fixed width for the modal */
    max-width: 90%; /* Ensure it doesn’t exceed the viewport width */
    max-height: 80vh; /* Limit maximum height to 80% of the viewport height */
    overflow: hidden; /* Prevent overflow of content */
    margin: auto; /* Center the modal */
    background-color: #fff; /* Background color for modal */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2); /* Soft shadow */
    display: flex; /* Use flex to stack items */
    flex-direction: column; /* Stack items vertically */
  }
  
  .close-btn {
    background: none; /* Remove background */
    border: none; /* Remove border */
    font-size: 2rem; /* Increased font size for the close icon */
    cursor: pointer; /* Pointer cursor for clickable */
    color: #185F43; /* Color for close icon */
    position: absolute; /* Position it absolutely */
    top: 5px; /* Adjusted position from the top */
    right: 20px; /* Position from the right */
    z-index: 10; /* Ensure it’s above other elements */
  }
  
  .modal-images {
    display: flex; /* Center the image */
    justify-content: center; /* Center the image */
    align-items: center; /* Center align vertically */
    margin: 30px 0; /* Space above and below the image */
    height: calc(80vh - 80px); /* Limit height to leave space for buttons and close icon */
  }
  
  .modal-images img {
    max-width: 100%; /* Make the image take full width of the modal */
    max-height: 100%; /* Ensure the image does not exceed the modal height */
    object-fit: contain; /* Maintain aspect ratio without cropping */
  }
  
  .modal-controls {
    display: flex; /* Flexbox for controls */
    justify-content: space-between; /* Space between buttons */
    align-items: center; /* Center align vertically */
    padding: 10px; /* Padding for buttons */
    position: absolute; /* Keep the buttons positioned */
    bottom: 10px; /* Position buttons at the bottom of the modal */
    left: 0; /* Align to the left */
    right: 0; /* Align to the right */
  }
  
  .nav-btn {
    background-color: #185F43; /* Dark green background */
    color: white; /* White text */
    border: none;
    padding: 10px 15px;
    margin: 0 5px; /* Space between buttons */
    cursor: pointer;
    font-size: 1rem; /* Font size */
  }
  
  .nav-btn:hover {
    background-color: #145032; /* Darker green on hover */
  }
  
  
  
</style>

 @php
    use App\Models\GalleryImage;
    use App\Models\GalleryAlbum;
    use App\Models\GalleryVideo;

    // Images Statistics
    $totalImages = GalleryImage::count(); // Total number of images
    $recentImages = GalleryImage::latest()->take(5)->count(); // Count of the latest 5 images
    $olderImages = $totalImages - $recentImages; // Calculate older images
    $paginatedImages = GalleryImage::orderBy('created_at', 'desc')->paginate(10); // Paginate 10 images

    // Fetch Videos
    $paginatedVideos = GalleryVideo::orderBy('created_at', 'desc')->paginate(10); // Paginate 10 videos

    // Fetch Albums
    $paginatedAlbums = GalleryAlbum::orderBy('created_at', 'desc')->paginate(10); // Paginate 10 albums
    $allAlbums = GalleryAlbum::with('galleryImages')->get(); // Fetch all albums with their images

    // Prepare albumImages array for JavaScript
    $albumImages = [];
    foreach($allAlbums as $album) {
        $albumImages[$album->id] = $album->galleryImages->map(function($image) {
            return asset('storage/' . $image->path);
        })->toArray();
    }
@endphp

<section class="media-gallery">
    <h2>Media Gallery</h2>
    <h3>Explore Our Collection of Events and Activities</h3>

    <div class="gallery-box">
        <div class="gallery-container">
            <!-- Image Gallery -->
            <div class="image-gallery">
                <h4>Image Gallery</h4>
                <div class="slider">
                    <div class="slides">
                        @forelse($paginatedImages as $image)
                            <div class="slide">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text ?? 'No alt text' }}">
                            </div>
                        @empty
                            <div class="slide">
                                <p>No images available.</p>
                            </div>
                        @endforelse
                    </div>
                    <button class="prev" onclick="changeSlide(-1)">&#10094;</button>
                    <button class="next" onclick="changeSlide(1)">&#10095;</button>
                </div>
            </div>

            <!-- Video Gallery -->
            <div class="video-gallery">
                <h4>Video Gallery</h4>
                <div class="video-embed">
                    @forelse($paginatedVideos as $video)
                        <div class="video-box">
                            @if($video->url)
                                <!-- YouTube Embed Video -->
                                <iframe src="{{ $video->url }}" allowfullscreen></iframe>
                            @elseif($video->path)
                                <!-- Direct Video Upload -->
                                <video width="300" controls>
                                    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            @else
                                <p>No video available.</p>
                            @endif
                        </div>
                    @empty
                        <div class="video-box">
                            <p>No videos available.</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Photo Albums -->
            <div class="photo-albums">
                <h4>Photo Albums</h4>
                <div class="album-container">
                    @forelse($paginatedAlbums as $album)
                        <div class="album-box">
                            <a href="#" class="album-link" data-album="{{ $album->id }}">
                                <div class="icon">
                                    @if($album->icon)
                                        <i class="{{ $album->icon }}"></i>
                                    @else
                                        <i class="fas fa-image"></i> <!-- Default Icon -->
                                    @endif
                                </div>
                                <div class="text">{{ $album->name }}</div>
                            </a>
                        </div>
                    @empty
                        <div class="album-box">
                            <p>No albums available.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Modal Structure -->
<div class="modal" id="albumModal">
    <div class="modal-content">
        <span class="close-btn">&times;</span> <!-- Close button at the top -->
        <div class="modal-images">
            <img id="modalImage" src="" alt="Album Image" />
        </div>
        <div class="modal-controls">
            <button id="prevBtn" class="nav-btn">Previous</button>
            <button id="nextBtn" class="nav-btn">Next</button>
        </div>
    </div>
</div>

<!-- JavaScript Section -->
<script>
    // Image Slider Functionality
    let slideIndex = 0;
    const slides = document.querySelectorAll('.image-gallery .slide');
    const totalSlides = slides.length;

    function showSlides() {
        // Hide all slides
        slides.forEach(slide => slide.style.display = 'none');
        // Increment slide index
        slideIndex++;
        // Reset index if it exceeds total slides
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        }
        // Show the current slide
        slides[slideIndex].style.display = 'block';
    }

    function changeSlide(n) {
        slideIndex += n;
        if (slideIndex >= totalSlides) {
            slideIndex = 0;
        }
        if (slideIndex < 0) {
            slideIndex = totalSlides - 1;
        }
        // Hide all slides and show the selected one
        slides.forEach(slide => slide.style.display = 'none');
        slides[slideIndex].style.display = 'block';
    }

    // Show the first slide initially
    if (slides.length > 0) {
        slides[0].style.display = 'block';
        // Change slides every 3 seconds
        setInterval(showSlides, 3000);
    }

    // Album Modal Functionality
    const albumImages = @json($albumImages); // Injected from PHP

    const modal = document.getElementById('albumModal');
    const modalImage = document.getElementById('modalImage');
    const closeBtn = document.querySelector('.close-btn');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    let currentAlbum = [];
    let currentIndex = 0;

    // Open modal and display images when an album link is clicked
    document.querySelectorAll('.album-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const albumId = link.getAttribute('data-album'); // Get the album ID
            currentAlbum = albumImages[albumId] || []; // Get corresponding images
            if (currentAlbum.length > 0) {
                currentIndex = 0; // Reset to the first image
                updateModalImage(); // Display the first image
                modal.style.display = 'block'; // Show modal
            } else {
                alert('No images available for this album.');
            }
        });
    });

    // Update modal image based on current index
    function updateModalImage() {
        if (currentAlbum.length > 0) {
            modalImage.src = currentAlbum[currentIndex];
            modalImage.alt = `Album Image ${currentIndex + 1}`;
        }
    }

    // Navigate to the previous image
    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--; // Move to the previous image
            updateModalImage(); // Update displayed image
        }
    });

    // Navigate to the next image
    nextBtn.addEventListener('click', () => {
        if (currentIndex < currentAlbum.length - 1) {
            currentIndex++; // Move to the next image
            updateModalImage(); // Update displayed image
        }
    });

    // Close modal when close button is clicked
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none'; // Hide modal
    });

    // Close modal when clicking outside of the modal content
    window.addEventListener('click', (event) => {
        if (event.target == modal) {
            modal.style.display = 'none'; // Hide modal
        }
    });
</script>

<!-- Ensure that FontAwesome is included for icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">








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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>
