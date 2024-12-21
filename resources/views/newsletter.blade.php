<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Newsletter</title>
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">
  <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="Expires" content="0">

  
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
  
  <!-- Bootstrap Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  
  <!-- Custom CSS -->
 
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

  // Function to hide the loading spinner
  function hideLoading() {
    document.getElementById('loading').style.display = 'none';
  }

  // Hide loading spinner after page load and when the page is shown from cache
  window.addEventListener('load', hideLoading);
  window.addEventListener('pageshow', hideLoading);
</script>
<!-- END OF LOADER -->






<style>
    .newsletter-container {
        padding: 40px;
 

        /* Soft yellow-green background */
    }

    .newsletter-title {
        text-align: center;
        font-size: 2.8rem;
       color: #14591D;
        /* Deep green title color */

        font-weight: bold;
        letter-spacing: 1px;
        margin-top: -50px;
        /* Add spacing between letters */
    }

    .newsletter-subtitle {
        text-align: center;
        margin-bottom: 40px;
        color: #14591D;
        /* Medium green for subtitle */
        font-style: italic;
        font-size: 1.2rem;
        /* Slightly larger subtitle font */
    }

    .newsletter-card {

        /* Light peach background for cards */
        border: 2px solid #14591D;
        /* Medium green border */
        border-radius: 12px;
        /* Rounded corners for a modern look */
        transition: transform 0.3s, box-shadow 0.3s;
        padding: 20px;
    }

    .newsletter-card:hover {
        transform: translateY(-8px);
        /* Lift card slightly on hover */
        box-shadow: 0 10px 40px rgba(20, 89, 29, 0.3);
        /* Green shadow effect */
    }

    .newsletter-card-title {
        font-size: 1.6rem;
        color: #0A210F;
        /* Deep green card title */
        margin-bottom: 10px;
        font-weight: bold;
    }

    .newsletter-card-text {
        color: #14591D;
        /* Medium green card text */
        margin-bottom: 20px;
        font-size: 1rem;
    }

    .btn-primary {
        background-color: #14591D;
        /* Medium green button */
        color: #FCE7D9;
        /* Light peach text */
        border: none;
        font-size: 1rem;
        padding: 12px 20px;
        border-radius: 8px;
        /* Rounded button */
        transition: background-color 0.3s, transform 0.3s;
    }

    .btn-primary:hover {
        background-color: #0A210F;
        /* Darker green button on hover */
        transform: scale(1.05);
    }

    /* Center and enlarge modal */
    .modal-dialog {
        max-width: 800px;
        /* Larger modal width */
        margin: 50px auto;
        /* Center modal */
    }

    .modal-content {
        background-color: #E1E289;
        /* Soft yellow-green for modal background */
        border: 2px solid #14591D;
        /* Medium green border */
        border-radius: 15px;
        padding: 20px;
    }

    .modal-header {
        background-color: #14591D;
        /* Medium green modal header */
        color: #FCE7D9;
        /* Light peach text */
        border-bottom: none;
        /* Remove header bottom border */
        padding: 20px;
        border-radius: 15px 15px 0 0;
    }

    .modal-title {
        font-size: 1.8rem;
        font-weight: bold;
        letter-spacing: 1px;
    }

    .btn-close {
        color: #FCE7D9;
        /* Light peach close button */
        background-color: transparent;
        border: none;
    }

    .modal-body {
        background-color: #FCE7D9;
        /* Light peach for modal body */
        color: #0A210F;
        /* Deep green text */
        padding: 30px;

    }

    .modal-footer {
        background-color:#FCE7D9;
        /* Medium green footer */
        border-top: none;
        padding: 20px;
        border-radius: 0 0 15px 15px;
    }

    .modal-footer .btn-secondary {
        background-color: #E1E289;
        /* Soft yellow-green button */
        color: #0A210F;
        /* Deep green text */
        border: none;
        font-size: 1rem;
        padding: 10px 25px;
        border-radius: 8px;
        transition: background-color 0.3s, transform 0.3s;
    }

    .modal-footer .btn-secondary:hover {
        background-color: #14591D;
        /* Medium green hover */
        color: #FCE7D9;
        /* Light peach text */
        transform: scale(1.05);
    }

    /* Media query for responsiveness */
    @media (max-width: 768px) {
        .modal-dialog {
            max-width: 90%;
            /* Adjust modal width for smaller screens */
        }

        .newsletter-card {
            margin-bottom: 20px;
            /* Space between cards on smaller screens */
        }
    }
</style>





<div class="newsletter-container my-5">
    <h1 class="newsletter-title">SLSU Supreme Student Council Federation Newsletter</h1>
    <p class="newsletter-subtitle">Your source for the latest updates, activities, and initiatives of the SLSU Supreme Student Council Federation.</p>

    <div class="row">
      <!-- January 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">January 2024 Edition</h5>
            <p class="newsletter-card-text">Start the year with updates on campus initiatives and the SLSU Federation's plans for 2024. Learn about our goals and upcoming projects for the community.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJanuary2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for January 2024 -->
      <div class="modal fade" id="modalJanuary2024" tabindex="-1" aria-labelledby="modalJanuary2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalJanuary2024Label">January 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Welcome to the January 2024 edition of the SLSU SSC Federation Newsletter! This month, we highlight our advocacy for a sustainable campus and outline the Federation's goals for this year. Discover how we aim to foster collaboration among students and create positive changes across all SLSU campuses.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- February 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">February 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate the month of love with stories of student camaraderie and community outreach programs led by the Federation.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalFebruary2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for February 2024 -->
      <div class="modal fade" id="modalFebruary2024" tabindex="-1" aria-labelledby="modalFebruary2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalFebruary2024Label">February 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              This February, we celebrate the spirit of love and unity across all SLSU campuses. Read about inspiring student-led initiatives that strengthen ties between campuses and promote inclusivity, as well as highlights from the Federation's outreach programs.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- March 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">March 2024 Edition</h5>
            <p class="newsletter-card-text">Welcome the start of the semester with updates on student leadership programs and environmental initiatives.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMarch2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for March 2024 -->
      <div class="modal fade" id="modalMarch2024" tabindex="-1" aria-labelledby="modalMarch2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalMarch2024Label">March 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              March marks the start of new projects and environmental campaigns led by the SLSU SSC Federation. This month’s highlights include green initiatives aimed at reducing the university's carbon footprint and leadership training programs to empower student leaders across campuses.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- April 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">April 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate Earth Month with inspiring stories of environmental advocacy and sustainability efforts from the SLSU Federation.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalApril2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for April 2024 -->
      <div class="modal fade" id="modalApril2024" tabindex="-1" aria-labelledby="modalApril2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalApril2024Label">April 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              April is Earth Month! This edition features stories of how the SLSU campuses are championing renewable energy, tree planting, and waste management efforts. Learn how you can contribute to creating a greener university environment.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- May 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">May 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate the end of the academic year with highlights of student achievements, projects, and reflections.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalMay2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for May 2024 -->
      <div class="modal fade" id="modalMay2024" tabindex="-1" aria-labelledby="modalMay2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalMay2024Label">May 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              May marks the conclusion of another academic year. In this edition, we celebrate the achievements of SLSU students, from groundbreaking research projects to memorable events. Reflect on a year of growth, learning, and leadership.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- June 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">June 2024 Edition</h5>
            <p class="newsletter-card-text">Prepare for the upcoming semester with tips on internships, leadership training, and personal development opportunities.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJune2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for June 2024 -->
      <div class="modal fade" id="modalJune2024" tabindex="-1" aria-labelledby="modalJune2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalJune2024Label">June 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              As summer approaches, this June edition focuses on opportunities for growth and learning. Discover internships, leadership training, and volunteer programs organized by the SLSU SSC Federation to help you stay engaged during the break.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

            <!-- July 2024 Newsletter Card -->
            <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">July 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate the summer season with inspiring stories of adventure, leadership, and community involvement from SLSU students.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalJuly2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for July 2024 -->
      <div class="modal fade" id="modalJuly2024" tabindex="-1" aria-labelledby="modalJuly2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalJuly2024Label">July 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              This July, we bring you stories of adventure and leadership! Explore how SLSU students are spending their summer through internships, community development programs, and cultural immersion activities. Learn about the Federation’s ongoing efforts to support student growth during the break.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- August 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">August 2024 Edition</h5>
            <p class="newsletter-card-text">Gear up for the upcoming semester with updates on student programs, events, and resources from the Federation.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalAugust2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for August 2024 -->
      <div class="modal fade" id="modalAugust2024" tabindex="-1" aria-labelledby="modalAugust2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalAugust2024Label">August 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              August is the perfect time to prepare for the new semester! This edition provides updates on upcoming student programs, Federation-organized events, and essential resources for SLSU students. Get ready to kickstart the academic year with confidence and enthusiasm.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- September 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">September 2024 Edition</h5>
            <p class="newsletter-card-text">Welcome the new semester with exciting updates on student activities, academic programs, and leadership opportunities.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalSeptember2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for September 2024 -->
      <div class="modal fade" id="modalSeptember2024" tabindex="-1" aria-labelledby="modalSeptember2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalSeptember2024Label">September 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              September marks the start of a new semester! In this edition, we cover the latest updates on student activities, academic programs, and leadership opportunities across SLSU campuses. Join us as we build a stronger and more dynamic student community!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- October 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">October 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate the mid-semester with stories of student achievements and ongoing projects by the Federation.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalOctober2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for October 2024 -->
      <div class="modal fade" id="modalOctober2024" tabindex="-1" aria-labelledby="modalOctober2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalOctober2024Label">October 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              This October, we highlight the achievements of SLSU students and the Federation's ongoing projects. Celebrate the mid-semester with updates on cultural events, academic programs, and student-led initiatives that inspire positive change.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- November 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">November 2024 Edition</h5>
            <p class="newsletter-card-text">Reflect on the accomplishments of the year as we approach the end of the semester with gratitude and enthusiasm.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalNovember2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for November 2024 -->
      <div class="modal fade" id="modalNovember2024" tabindex="-1" aria-labelledby="modalNovember2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalNovember2024Label">November 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              November is a time for reflection and gratitude. This month’s edition highlights the accomplishments of the Federation and students across SLSU campuses. Discover the milestones achieved this year and prepare for the exciting plans ahead.
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <!-- December 2024 Newsletter Card -->
      <div class="col-md-4 mb-4">
        <div class="newsletter-card shadow">
          <div class="card-body">
            <h5 class="newsletter-card-title">December 2024 Edition</h5>
            <p class="newsletter-card-text">Celebrate the holiday season with a recap of the year and a glimpse into the Federation’s plans for 2025.</p>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalDecember2024">Read More</button>
          </div>
        </div>
      </div>

      <!-- Modal for December 2024 -->
      <div class="modal fade" id="modalDecember2024" tabindex="-1" aria-labelledby="modalDecember2024Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modalDecember2024Label">December 2024 Edition</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              December is a time to celebrate the holiday season and reflect on the milestones of the year. In this edition, we highlight the Federation’s achievements, student successes, and exciting plans for 2025. Join us in wrapping up 2024 with gratitude and enthusiasm for the year ahead!
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
</body>

</html>
