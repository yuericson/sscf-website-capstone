  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSCF</title>
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

      <!-- Import Agatho font from Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Agatho&display=swap" rel="stylesheet">
    
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


  <div class="content-container">
      <div class="logo-container">
          <img src="../images/SLSU-Lucban.png" alt="SLSU Lucban Logo" class="header-logo-1">
          <img src="../images/Logo.png" alt="Logo" class="header-logo-2">
      </div>
      <h1 class="small-text">Southern Luzon State University</h1>
      <h2 class="large-text">SUPREME STUDENT COUNCIL FEDERATION</h2>
      <p class="medium-text">
        This is the highest governing and policy-making
        body of<br> Southern Luzon State University (SLSU)
        student body.
      </p>
  </div>

  <style>
    /* MAIN PAGE */
    @import url('https://fonts.googleapis.com/css2?family=Agatho&display=swap');

    .content-container {
      flex: 1;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      padding: 20px;
      background: linear-gradient(to bottom, #289937, #aee9bb); /* Reversed gradient for mobile */
      margin-bottom: 70px;
    }

    /* Logo container styling */
    .logo-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 40px;
      margin-bottom: 10px;
      margin-right: 50px;
    }

    /* Styling for the second logo */
    .header-logo-1 {
      width: 350px;
      height: 230px;
      object-fit: contain;
      margin-left: 40px;
    }

    /* Styling for the first logo */
    .header-logo-2 {
      width: 350px;
      height: 250px;
      object-fit: contain;
      margin-left: -100px;
      font-weight: 500px;
    }

    /* Styles for small text */
    .small-text {
      font-size: 47px;
      margin-bottom: 1px;
      color: #14591D;
    }

    /* Styles for large text */
    .large-text {
      font-size: 50px;
      margin-bottom: 20px;
      font-weight: 700;
      color: #1d4225;
      font-family: 'Agatho', serif; /* Apply Agatho font */
    }

    /* Styles for medium text */
    .medium-text {
      font-size: 25px;
      line-height: 1.2;
      margin-top: 1px;
      text-align: center;
      margin-bottom: 130px;
      color: #14591D;
    }

    /* Media query for mobile responsiveness */
    @media (max-width: 768px) {
      .content-container {
        padding: 10px;
        margin-bottom: 40px;
        height: 570px;
        background: linear-gradient(to bottom, #14591D, #0A210F);
      }

      .logo-container {
        flex-direction: row;
        justify-content: center;
        align-items: center;
      }

      .header-logo-1 {
        width: 100%;
        max-width: 120px;
        margin-bottom: -90px;
        margin-right: -10px;
      }

      .header-logo-2 {
        width: 100%;
        max-width: 150px;
        margin-left: 5px;
        margin-bottom: -90px;
        margin-right: -20px;
      }

      .small-text {
        font-size: 25px;
        margin-bottom: 10px;
        margin-top: 25px;
        color: #FCE7D9;
      }

      .large-text {
        font-size: 25px;
        color: #E1E289;
      }

      .medium-text {
        font-size: 20px;
        margin: 0 10px;
        margin-bottom: 150px;
        color: #FCE7D9;
      }
    }
  </style>


    
  <!-- Mission, Vision & Goals -->
  <div class="wrapper" data-aos="fade-up">
      <div class="row text-center">
          <div class="col-md-4 mb-4">
              <div class="card-wrapper">
                  <div class="circle-container mission-circle">
                      <i class="bi bi-bullseye"></i>
                  </div>
                  <h3 class="title">Mission</h3>
                  <p class="text-content">The SSCF aims to empower students by serving as the primary voice of the student
                      body, promoting student welfare, rights, and involvement in institutional governance. We seek to develop
                      student leaders who are proactive, responsible, and innovative.</p>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="card-wrapper">
                  <div class="circle-container vision-circle">
                      <i class="bi bi-eye"></i>
                  </div>
                  <h3 class="title">Vision</h3>
                  <p class="text-content">The Supreme Student Council Federation envisions a unified and empowered student
                      body, driven by strong leadership, inclusivity, and active participation in university affairs to foster a
                      conducive environment for academic excellence and social development.</p>
              </div>
          </div>
          <div class="col-md-4 mb-4">
              <div class="card-wrapper">
                  <div class="circle-container goals-circle">
                      <i class="bi bi-flag"></i>
                  </div>
                  <h3 class="title">Goals</h3>
                  <p class="text-content">The SSCF aims to establish a dynamic and inclusive student community by
                      facilitating programs that promote academic growth, leadership development, and student engagement, ensuring
                      that every student has a voice in shaping university policies and initiatives.</p>
              </div>
          </div>
      </div>
  </div>
  <!-- End Mission, Vision & Goals -->

  <!-- Mission, Vision & Goals Styles -->
  <style>
      /* Mission, Vision & Goals */
      .wrapper {
          padding: 0 30px;
      }

      .circle-container, .mission-circle, .vision-circle, .goals-circle {
          width: 70px;
          height: 70px;
          background-color: #14591D;
          border-radius: 50%;
          display: flex;
          justify-content: center;
          align-items: center;
          margin: 0 auto;
          color: #FCE7D9;
          font-size: 36px;
      }

      .card-wrapper {
          background-color: #0A210F;
          padding: 20px;
          text-align: center;
          border-radius: 10px;
          transition: transform 0.3s ease, box-shadow 0.3s ease;
      }

      .card-wrapper:hover {
          transform: translateY(-10px);
          box-shadow: 0 8px 16px rgba(0, 0, 0, 0.3);
      }

      .title {
          font-weight: bold;
          margin: 15px 0;
          color: #E1E289;
          font-size: 22px;
      }

      .text-content {
          font-size: 16px;
          font-weight: 400;
          color: #FCE7D9;
          padding: 0 15px;
          line-height: 1.5;
      }

      /* Responsive Styles */
      @media (max-width: 768px) {
          .wrapper {
              padding: 0 15px;
          }

          .circle-container {
              margin-bottom: 15px;
          }

          .title {
              font-size: 20px;
          }

          .text-content {
              font-size: 14px;
          }
      }
  </style>

  <!-- Organizational Chart -->
  <div class="org-chart-background" data-aos="fade-up">
      <div class="org-chart-container text-center my-5">
          <div class="organization-title">ORGANIZATIONAL CHART</div>
          <div class="title-underline"></div>
          <img src="../images/orgchart.png" alt="Organization Chart" class="img-fluid org-chart">
      </div>
  </div>
  <!-- End Organizational Chart -->

  <!-- Organizational Chart Styles -->
  <style>
      /* ORGANIZATIONAL CHART */
      .org-chart-background {
          background-color: #14591D;
          padding: 50px 20px;
          border-radius: 10px;
      }

      .org-chart-container {
          max-width: 800px; 
          margin: auto; 
          position: relative; 
          z-index: 2; 
      }

      .organization-title {
          font-size: 2em;
          font-weight: bold;
          text-align: center;
          margin-bottom: 10px;
          color: #FCE7D9;
          margin-top: -40px;
      }

      .title-underline {
          width: 100px;
          height: 3px;
          background-color: #E1E289;
          margin: 0.5em auto 20px;
      }

      .org-chart {
          width: 100%;
          height: auto;
          border: 2px solid #E1E289;
          border-radius: 10px;
      }

      /* Responsive Styles */
      @media (max-width: 768px) {
          .organization-title {
              font-size: 1.5em;
          }

          .title-underline {
              width: 80px;
              height: 2px;
          }
      }
  </style>


    <!-- President Message -->
    @php
        // Fetch the latest 5 posts with non-null images for the carousel
        $carouselImages = \App\Models\PresidentCorner::whereNotNull('image')
                            ->orderBy('created_at', 'desc')
                            ->take(5)
                            ->get(['image']);
    @endphp 

    <div class="container text-center my-5">
        <div class="president-title">PRESIDENT'S MESSAGE</div>
        <div class="president-title-underline"></div>

        @if($carouselImages->count() > 0)
            <div class="president-carousel">
                @foreach ($carouselImages as $image)
                    <img src="{{ asset('storage/' . $image->image) }}" alt="President's Message Image" class="img-fluid custom-img">
                @endforeach
            </div>
        @else
            <p>No images available for the President's Message.</p>
        @endif
    </div>

    <!-- Include the Custom Carousel JavaScript -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let currentIndex = 0;
            const images = document.querySelectorAll('.president-carousel img');
            const totalImages = images.length;

            if (totalImages === 0) return; // Exit if no images

            function showNextImage() {
                images[currentIndex].style.opacity = 0;
                setTimeout(() => {
                    images[currentIndex].style.display = 'none';
                    currentIndex = (currentIndex + 1) % totalImages;
                    images[currentIndex].style.display = 'block';
                    images[currentIndex].style.opacity = 1;
                }, 1000); // Duration matches the CSS transition
            }

            images.forEach((img, index) => {
                img.style.display = (index === 0) ? 'block' : 'none';
                img.style.opacity = (index === 0) ? 1 : 0;
            });

            setInterval(showNextImage, 4000); // Change image every 4 seconds
        });
    </script>

    <style>
      
    /* PRESIDENT'S CORNER */
  .president-title {
    font-size: 1.9em;
    font-weight: bold;
    color: #14591D;
    margin-top: 1em;
    text-align: center;
  }

  .president-title-underline {
    width: 10em;
    height: 2px;
    background-color: #14591D;
    margin: 0.5em auto;
  }

  .custom-img {
    width: 100%;
    max-width: 700px;
    margin: 2rem auto; 
    display: block; 
  }

  @media (max-width: 768px) {
    .custom-img {
      max-width: 100%; 
    }
  }
    </style>
    <!-- End President Message -->


    @php
      use App\Models\LatestNews;

      // Fetch the latest 10 news items from the database
      $latestNews = LatestNews::orderBy('date', 'desc')->take(10)->get();

      // Prepare news data for JavaScript
      $newsData = $latestNews->map(function ($news) {
          return [
              'title' => $news->title,
              'date' => \Carbon\Carbon::parse($news->date)->format('F d, Y'),
              'content' => Str::limit($news->content, 100), // Limit content to 100 characters
              'img' => $news->image_path ? asset('storage/' . $news->image_path) : '../images/default-news.png',
          ];
      });
  @endphp

  <!-- Recent News -->
  <div class="recent-news-background">
      <div class="container text-center">
          <h2 class="recent-news-title">Recent News</h2>
          <div id="news-container" class="row justify-content-center"></div>

          <!-- Read More Button -->
          <div class="mt-4">
              <a href="{{ route('latest.news') }}" class="btn btn-primary btn-lg">Read More</a>
          </div>

          <!-- Pagination -->
          <div class="pagination mt-4">
              <a href="#" class="prev">&lt; Previous</a>
              <div class="page-numbers"></div>
              <a href="#" class="next">Next &gt;</a>
          </div>
      </div>
  </div>
  <!-- End of Recent News -->

  <!-- JS FOR RECENT NEWS -->
  <script>
  document.addEventListener('DOMContentLoaded', function () {
      // Latest news data from Laravel
      const newsData = @json($newsData);

      const itemsPerPage = 3; // Display 3 boxes per page
      const totalPages = Math.ceil(newsData.length / itemsPerPage) || 1;
      let currentPage = 1;

      const newsContainer = document.getElementById('news-container');
      const prevButton = document.querySelector('.prev');
      const nextButton = document.querySelector('.next');
      const pageNumbersContainer = document.querySelector('.page-numbers');

      // Function to display news items
      function displayNews(page) {
          newsContainer.classList.add('fade-out');

          setTimeout(() => {
              newsContainer.innerHTML = ''; // Clear existing content

              if (newsData.length === 0) {
                  // Show "No news available" message if no data
                  const noNewsMessage = document.createElement('div');
                  noNewsMessage.classList.add('no-news-message', 'text-center', 'text-muted');
                  noNewsMessage.textContent = 'No news available at the moment.';
                  newsContainer.appendChild(noNewsMessage);
              } else {
                  const start = (page - 1) * itemsPerPage;
                  const end = start + itemsPerPage;
                  const paginatedNews = newsData.slice(start, end);

                  paginatedNews.forEach(news => {
                      const newsBox = document.createElement('div');
                      newsBox.classList.add('col-md-4', 'news-box', 'mb-4');
                      newsBox.innerHTML = `
                          <img src="${news.img}" alt="${news.title}" class="img-fluid rounded mb-2">
                          <div class="news-title font-weight-bold">${news.title}</div>
                          <div class="news-date text-muted">Date: ${news.date}</div>
                      `;
                      newsContainer.appendChild(newsBox);
                  });
              }

              newsContainer.classList.remove('fade-out');
              newsContainer.classList.add('fade-in');

              setTimeout(() => {
                  newsContainer.classList.remove('fade-in');
              }, 500);
          }, 500);
      }

      // Update pagination buttons and page numbers
      function updatePaginationButtons() {
          prevButton.style.visibility = currentPage === 1 ? 'hidden' : 'visible';
          nextButton.style.visibility = currentPage === totalPages ? 'hidden' : 'visible';

          pageNumbersContainer.innerHTML = '';
          const maxVisiblePages = 5; // Maximum number of page numbers to display
          let startPage, endPage;

          if (totalPages <= maxVisiblePages) {
              startPage = 1;
              endPage = totalPages;
          } else {
              if (currentPage <= Math.ceil(maxVisiblePages / 2)) {
                  startPage = 1;
                  endPage = maxVisiblePages;
              } else if (currentPage + Math.floor(maxVisiblePages / 2) >= totalPages) {
                  startPage = totalPages - maxVisiblePages + 1;
                  endPage = totalPages;
              } else {
                  startPage = currentPage - Math.floor(maxVisiblePages / 2);
                  endPage = currentPage + Math.floor(maxVisiblePages / 2);
              }
          }

          for (let i = startPage; i <= endPage; i++) {
              const pageNumber = document.createElement('span');
              pageNumber.classList.add('page-number');
              pageNumber.textContent = i;
              pageNumber.dataset.page = i;
              if (i === currentPage) pageNumber.classList.add('active');
              pageNumber.addEventListener('click', function () {
                  currentPage = i;
                  displayNews(currentPage);
                  updatePaginationButtons();
              });
              pageNumbersContainer.appendChild(pageNumber);
          }
      }

      // Event listeners for pagination
      prevButton.addEventListener('click', function (e) {
          e.preventDefault();
          if (currentPage > 1) {
              currentPage--;
              displayNews(currentPage);
              updatePaginationButtons();
          }
      });

      nextButton.addEventListener('click', function (e) {
          e.preventDefault();
          if (currentPage < totalPages) {
              currentPage++;
              displayNews(currentPage);
              updatePaginationButtons();
          }
      });

      // Initial setup
      displayNews(currentPage);
      updatePaginationButtons();
  });

  </script>
  <!-- END JS FOR RECENT NEWS -->


  <style>
    /* Recent News Background */
  .recent-news-background {

    padding: 50px 0;
  }

  /* Recent News Title */
  .recent-news-title {
    margin-bottom: 30px;
    font-weight: bold;
    font-size: 1.7rem;
    color:rgb(255, 255, 255);
    text-transform: uppercase;
    background:  #0A210F;
    padding: 15px 25px;
    border-radius: 10px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.15);
    font-family: 'Roboto', sans-serif;
    text-align: center;
    letter-spacing: 1px;
    display: inline-block;
  }

  /* News Box Styles */
  .news-box {
    border: 2px solid #14591D;
    padding: 20px;
    margin: 25px;
    text-align: center;
    background-color: #ffffff;
    flex: 1 1 200px;
    max-width: 400px;
  }

  .news-box img {
    width: 100%;
    height: auto;
  }

  .news-box .news-title {
    font-size: 1.5em;
    margin-top: 10px;
    color: #14591D;
  }

  .news-box .news-date {
    font-size: 0.9em;
    color: #E1E289; /* Pinalitan ang grey na kulay */
  }

  .news-read-more-box {
    margin-top: 10px;
  }

  .news-read-more {
    margin-top: 10px;
    display: inline-block;
    text-decoration: none;
    color: #ffffff;
    background-color: #14591D;
    border: 1px solid #14591D;
    padding: 5px 10px;
    border-radius: 5px;
  }

  /* Pagination Styles */
  .pagination {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 15px;
    flex-wrap: wrap;
  }

  .pagination a {
    color: #14591D;
    text-decoration: none;
    font-weight: bold;
  }

  .pagination .page-number {
    padding: 5px 10px;
    border: 1px solid #14591D;
    border-radius: 5px;
    margin: 0 5px;
  }

  .pagination .page-number.active {
    background-color: #14591D;
    color: #ffffff;
    border: 1px solid #14591D;
  }

  .pagination .prev,
  .pagination .next {
    font-weight: bold;
  }

  /* Fade Effects */
  .fade-in {
    opacity: 0;
    animation: fadeIn 0.5s ease-in-out forwards;
  }

  @keyframes fadeIn {
    from {
      opacity: 0;
    }
    to {
      opacity: 1;
    }
  }

  .fade-out {
    opacity: 1;
    animation: fadeOut 0.5s ease-in-out forwards;
  }

  @keyframes fadeOut {
    from {
      opacity: 1;
    }
    to {
      opacity: 0;
    }
  }

  /* Responsive Styles */
  @media (max-width: 768px) {
    .recent-news-title {
      font-size: 1.5rem;
    }
    
    .news-box {
      margin: 10px;
      flex: 1 1 150px;
    }

    .news-box .news-title {
      font-size: 1.3em;
    }

    .pagination .page-number {
      padding: 4px 8px;
    }

    .pagination a {
      font-size: 0.9em;
    }
  }

  /* Extra Small Screens - 425px and below */
  @media (max-width: 425px) {
    .recent-news-background {
      padding: 30px 0;
    }

    .recent-news-title {
      font-size: 1.3rem;
      padding: 10px 15px;
    }

    #news-container {
      display: flex; 
      justify-content: center; 
      flex-direction: column; 
      align-items: center; 
      overflow: hidden; 
    }

    .news-box {
      display: none; 
    }

    .news-box:first-child {
      display: block; 
      margin: 8px 0; 
      padding: 15px;
      flex: 0 0 auto; 
      max-width: 100%; 
      width: 100%; 
    }

    .news-box img {
      width: 100%;
      height: auto;
    }

    .news-box .news-title {
      font-size: 1.2em;
    }

    .news-box .news-date {
      font-size: 0.85em;
    }

    .news-read-more {
      padding: 4px 8px;
      font-size: 0.85em;
    }

    .pagination {
      display: none; 
    }
  }
  </style>

    <!-- Upcoming Events -->
  @php
      // Fetch all upcoming events images, ordered by the most recent
      $eventImages = \App\Models\UpcomingEvent::whereNotNull('image')->orderBy('created_at', 'desc')->get();
  @endphp

  <section class="upcoming-events">
    <h2>Upcoming Events</h2>
    <div class="slider-container">
        <div class="slider">
            @if($eventImages->count() > 0)
                @foreach($eventImages as $event)
                    <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}">
                @endforeach
            @endif
        </div>
        <button class="slider-button prev" onclick="moveSlide(-1)">&#10094;</button>
        <button class="slider-button next" onclick="moveSlide(1)">&#10095;</button>
    </div>
  </section>
  <!-- End of Upcoming Events -->

  <!-- JS FOR UPCOMING EVENTS -->
  <script>
    let currentSlide = 0;

    function showSlide(index) {
        const slides = document.querySelectorAll('.slider img');
        if (slides.length === 0) return;
        if (index >= slides.length) {
            currentSlide = 0;
        } else if (index < 0) {
            currentSlide = slides.length - 1;
        } else {
            currentSlide = index;
        }
        const slider = document.querySelector('.slider');
        slider.style.transform = `translateX(${-currentSlide * 100}%)`;
    }

    function moveSlide(direction) {
        showSlide(currentSlide + direction);
    }

    // Initialize slider to show the first slide
    showSlide(currentSlide);

    // Set interval for automatic slide movement
    setInterval(() => {
        moveSlide(1);
    }, 3000);
  </script>
  <!-- END JS FOR UPCOMING EVENTS -->


  <style>
    /* UPCOMING EVENTS */
  .upcoming-events {
    background:#E1E289; 
    padding: 50px;
    text-align: center;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  .upcoming-events h2 {
    color:#14591D; 
    margin-bottom: 35px;
  }

  .slider-container {
    position: relative;
    max-width: 700px; 
    margin: auto; 
    overflow: hidden;
  }

  .slider {
    display: flex; 
    transition: transform 0.5s ease-in-out;
  }

  .slider img {
    min-width: 100%; 
    height: auto; 
    max-height: 80vh; 
    border-radius: 10px; 
    object-fit: contain; 
  }

  .slider-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(10,33,15,0.5); /* Ginamit ang dark green may transparency */
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    z-index: 1;
    font-size: 16px;
  }

  .slider-button.prev {
    left: 10px; 
  }

  .slider-button.next {
    right: 10px; 
  }

  /* Tablet Styles */
  @media (max-width: 1024px) {
    .slider-button.prev {
      left: 20px; 
    }

    .slider-button.next {
      right: 20px; 
    }
  }

  /* Mobile Styles */
  @media (max-width: 768px) {
    .slider-button.prev {
      left: 1px; 
    }

    .slider-button.next {
      right: 1px; 
    }
  }

  /* Mobile Styles for 425px and Below */
  @media (max-width: 425px) {
    .slider-button {
      padding: 5px 10px; 
      font-size: 14px; 
      width: 25px; 
      margin: 0 auto; 
    }

    .slider-button.prev {
      left: -5px; 
    }

    .slider-button.next {
      right: -5px; 
    }
  }

  </style>





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
