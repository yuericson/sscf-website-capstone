<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SSCF Forum</title>
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">

  <!-- Bootstrap CSS -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
    crossorigin="anonymous"
  >

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap"
    rel="stylesheet"
  >

  <!-- Bootstrap Icons -->
  <link
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
    rel="stylesheet"
  >

  <!-- Font Awesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
  >

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
      color: rgb(47, 51, 44);
      transition: background-color 0.3s;
    }

    .custom-dropdown-menu .dropdown-item:hover {
      background-color: #3d4145;
      color: #ffffff;
    }

    /* Profile Modal Styling */
    #profileModal .modal-content {
      background-color: rgb(255, 255, 255);
      color: rgb(0, 0, 0);
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
      border: 3px solid #7289da;
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
      border-top: 0.3em solid black;
      border-right: 0.3em solid transparent;
      border-left: 0.3em solid transparent;
      margin-left: 0.255em;
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
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
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
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownAbout"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >About us</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
              <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
              <li><a class="dropdown-item" href="{{ route('mission.vision') }}">Mission & Vision</a></li>
              <li><a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a></li>
              <li><a class="dropdown-item" href="{{ route('committees') }}">Committees</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownResources"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >Resources</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownResources">
              <li><a class="dropdown-item" href="{{ route('student.guide') }}">Student Guide</a></li>
              <li><a class="dropdown-item" href="{{ route('academic.resources') }}">Academic Resources</a></li>
              <li><a class="dropdown-item" href="{{ route('career.support') }}">Career Support</a></li>
              <li><a class="dropdown-item" href="{{ route('wellbeing.support') }}">Well-being Support</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownMedia"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >News & Media</a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMedia">
              <li><a class="dropdown-item" href="{{ route('latest.news') }}">Latest News</a></li>
              <li><a class="dropdown-item" href="{{ route('newsletter') }}">Newsletter</a></li>
              <li><a class="dropdown-item" href="{{ route('media.gallery') }}">Media Gallery</a></li>
              <li><a class="dropdown-item" href="{{ route('press.releases') }}">Press Releases</a></li>
              <li><a class="dropdown-item" href="{{ route('presidents.corner') }}">SSCF President's Corner</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="navbarDropdownInvolved"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
            >Get Involved</a>
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
              <a
                class="btn navbar-login-btn d-flex align-items-center"
                href="{{ route('login.google') }}"
                id="login-btn"
              >
                <!-- Google SVG Icon -->
                <svg
                  class="google-logo me-2"
                  xmlns="http://www.w3.org/2000/svg"
                  viewBox="0 0 533.5 544.3"
                  width="20"
                  height="20"
                >
                  <path
                    fill="#4285f4"
                    d="M533.5 278.4c0-18.4-1.6-36.1-4.7-53.3H272v101.1h147.4c-6.3 34.4-25 63.4-53.4 82.8v68.6h86.5c50.6-46.7 80-115.5 80-199.2z"
                  />
                  <path
                    fill="#34a853"
                    d="M272 544.3c72.4 0 133.1-23.9 177-65.1l-86.5-68.6c-24.1 16.2-55 25.7-90.5 25.7-69.5 0-128.3-46.9-149.3-109.6H36.4v68.7C81.3 490.1 169.6 544.3 272 544.3z"
                  />
                  <path
                    fill="#fbbc04"
                    d="M122.7 324.1c-4.7-13.8-7.4-28.5-7.4-43.1s2.7-29.3 7.4-43.1v-68.7H36.4c-18.1 35.8-28.4 76.4-28.4 119.8s10.3 84 28.4 119.8l86.3-68.7z"
                  />
                  <path
                    fill="#ea4335"
                    d="M272 107.3c38.3 0 72.8 13.2 100.1 39.1l75-75C407.1 24.2 344.4 0 272 0 169.6 0 81.3 54.2 36.4 135.6l86.3 68.7c21-62.7 79.8-109.6 149.3-109.6z"
                  />
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
  <div
    class="modal fade"
    id="profileModal"
    tabindex="-1"
    aria-labelledby="profileModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="profileModalLabel">
            <i class="bi bi-person-circle me-2"></i> My Profile
          </h5>
        </div>
        <div class="modal-body text-center">
          <img
            src=""
            alt="User Avatar"
            id="profileAvatar"
            class="rounded-circle mb-3"
            style="width: 100px; height: 100px;"
          >
          <h4 id="profileName"></h4>
          <p id="profileEmail"></p>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-secondary"
            data-bs-dismiss="modal"
          >Close</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End Profile Modal -->

  <!-- Scripts for User Profile Fetch/Logout (unchanged logic) -->
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
        loginContainer.innerHTML =
          `<div class="dropdown">
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
          </div>`;

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
      }, 500);
    }

    function resetLoginButton() {
      const loginContainer = document.querySelector(".navbar-login-container");
      if (loginContainer) {
        loginContainer.innerHTML =
          `<a class="btn navbar-login-btn d-flex align-items-center" href="{{ route('login.google') }}" id="login-btn">
            <!-- Google SVG Icon -->
            <svg class="google-logo me-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3" width="20" height="20">
              <path fill="#4285f4" d="M533.5 278.4c0-18.4-1.6-36.1-4.7-53.3H272v101.1h147.4c-6.3 34.4-25 63.4-53.4 82.8v68.6h86.5c50.6-46.7 80-115.5 80-199.2z" />
              <path fill="#34a853" d="M272 544.3c72.4 0 133.1-23.9 177-65.1l-86.5-68.6c-24.1 16.2-55 25.7-90.5 25.7-69.5 0-128.3-46.9-149.3-109.6H36.4v68.7C81.3 490.1 169.6 544.3 272 544.3z" />
              <path fill="#fbbc04" d="M122.7 324.1c-4.7-13.8-7.4-28.5-7.4-43.1s2.7-29.3 7.4-43.1v-68.7H36.4c-18.1 35.8-28.4 76.4-28.4 119.8s10.3 84 28.4 119.8l86.3-68.7z" />
              <path fill="#ea4335" d="M272 107.3c38.3 0 72.8 13.2 100.1 39.1l75-75C407.1 24.2 344.4 0 272 0 169.6 0 81.3 54.2 36.4 135.6l86.3 68.7c21-62.7 79.8-109.6 149.3-109.6z" />
            </svg>
            Login with Google
          </a>`;
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
          }, 1000);
          e.preventDefault();
        }
      });
    });

    // Open the login in a new tab and display the loading spinner
    document.getElementById('login-btn').addEventListener('click', function (e) {
      e.preventDefault();
      showLoading();
      setTimeout(() => {
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

  <!-- =============== RENAMED FORUM SECTION START =============== -->

  <!-- 
       NOTE:
       1) All forum-related classes/IDs below have been renamed (prefixed with "my" for clarity).
       2) The CSS that references these classes/IDs has been updated accordingly to keep the exact same design.
  -->

  <style>
    /* Keep the existing design, but rename all forum-related classes/IDs */

    /* Remove global font-family to preserve original fonts in navbar */
    body {
      background-color: #f8f9fa;
    }

    /* ------------ RENAMED CLASSES ------------- */

    /* Former .forum-section => .my-forum-section */
    .my-forum-section {
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
      border: 1px solid #14591D; /* Medium Green */
      background-color:rgb(244, 244, 244); /* Light Peach */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      display: flex;
      justify-content: space-between;
      gap: 20px;
      flex-wrap: wrap;
      margin-bottom: 50px;
    }

    /* Former .forum-posts => .my-forum-posts */
    .my-forum-posts {
      flex: 1;
      max-width: 100%;
    }

    /* Former .forum-post => .my-forum-post */
    .my-forum-post {
      border: 1px solid #14591D; /* Medium Green */
      background-color: #ffffff;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      padding: 15px;
      margin-bottom: 20px;
      border-radius: 8px;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .my-forum-post:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }

    /* Former .post-title => .my-post-title */
    .my-post-title {
      font-size: 1.4em;
      color: #14591D; /* Medium Green */
      margin-bottom: 5px;
    }

    /* Former .post-content => .my-post-content */
    .my-post-content {
      font-size: 1em;
      color: #0A210F; /* Dark Green */
      margin-bottom: 10px;
    }

    /* Former .post-reactions-time => .my-post-reactions-time */
    .my-post-reactions-time {
      display: flex;
      align-items: center;
      gap: 1px;
    }

    /* Former .post-reactions => .my-post-reactions */
    .my-post-reactions {
      display: flex;
      gap: 3px;
      align-items: center;
    }

    /* Reaction buttons */
    .reaction-btn {
      border: none;
      background: none;
      font-size: 0.9em;
      cursor: pointer;
      padding: 2px 4px;
      display: flex;
      align-items: center;
      gap: 2px;
    }
    .reaction-btn.like {
      color: #14591D; 
    }
    .reaction-btn.unlike {
      color: rgb(255, 28, 28);
    }
    .reaction-btn:hover {
      color: #0A210F; /* Dark Green */
    }

    /* Time / Comments icons */
    .post-time i,
    .post-comments i {
      color: #14591D; /* Medium Green */
      font-size: 1em;
    }
    .post-time i:hover,
    .post-comments i:hover {
      color: #0A210F; /* Dark Green */
    }

    /* Former .comment-input => .my-comment-input */
    .my-comment-input {
      display: flex;
      flex-direction: column;
      margin-left: 70px;
    }
    .my-comment-input .input-group {
      display: flex;
      align-items: center;
    }
    .my-comment-input input {
      flex: 1;
      background-color: #f5f5f5;
      max-width: 1050px;
      border: 1px solid #14591D; /* Medium Green */
      border-radius: 5px;
      padding: 8px;
    }
    .my-comment-input .send-icon {
      border: none;
      background: none;
      padding: 0 10px;
      cursor: pointer;
      font-size: 1.2em;
      color: #14591D; /* Medium Green */
    }
    .my-comment-input .send-icon:hover {
      color: #0A210F; /* Dark Green */
    }

    /* Former .search-section => .my-search-section */
    .my-search-section {
      background-color: #ffffff;
      padding: 15px 0;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      margin-bottom: 20px;
    }

    /* Search bar container */
    .my-search-section .my-forum-controls {
      display: flex;
      justify-content: center;
      align-items: center;
      gap: 10px;
      flex-wrap: wrap;
    }

    /* Former .search-bar => we’re using the ID or direct input group styles now */

    /* Buttons */
    .btn-primary {
      background-color: #14591D; /* Medium Green */
      border: none;
      transition: background-color 0.3s ease;
      color: #FCE7D9; /* Light Peach text */
    }
    .btn-primary:hover {
      background-color: #0A210F; /* Dark Green on hover */
    }

    .btn-secondary {
      background-color: #E1E289; /* Yellowish */
      border: none;
      transition: background-color 0.3s ease;
      color: #0A210F; /* Dark Green text */
    }
    .btn-secondary:hover {
      background-color: #d0c76c; /* Slightly darker yellow */
    }

    /* Create New Post Button (renamed ID) */
    #myOpenModalBtn {
      background-color: #14591D;
      color: #FCE7D9;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      border-radius: 8px;
      padding: 12px 24px;
      display: inline-flex;
      align-items: center;
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    #myOpenModalBtn:hover {
      background-color: #0A210F;
      transform: translateY(-2px);
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.15);
    }
    #myOpenModalBtn:active {
      transform: translateY(0);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Modal (renamed #createPostModal => #myCreatePostModal) */
    #myCreatePostModal {
      display: none;
      position: fixed;
      z-index: 1050;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgba(10, 33, 15, 0.5);
      transition: opacity 0.3s ease;
    }
    #myCreatePostModal .modal-content {
      background-color: #ffffff;
      margin: 5% auto;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(10, 33, 15, 0.3);
      width: 90%;
      max-width: 500px;
      transition: transform 0.3s ease;
    }
    #myCreatePostModal .modal-header {
      border-bottom: 2px solid #14591D;
      padding-bottom: 10px;
    }
    #myCreatePostModal .modal-title {
      font-weight: bold;
      color: #ffffff; /* This was in the original code but note the background color: you may adjust as needed */
    }
    #myCreatePostModal .close {
      cursor: pointer;
      font-size: 1.5rem;
      color: #0A210F; /* Dark Green */
    }
    #myCreatePostModal .close:hover {
      color: #14591D; /* Medium Green */
    }
    #myCreatePostModal .modal-body .form-label {
      color: #14591D; /* Medium Green */
    }
    #myCreatePostModal .modal-footer {
      border-top: 2px solid #14591D;
    }

    /* Avatar styling - unchanged name is fine if you want, or rename to .my-avatar */
    .avatar,
    .avatar-sm {
      width: 50px;
      height: 50px;
      object-fit: cover;
      border: 2px solid #14591D;
    }

    /* General Alert Styles (unchanged) */
    .alert {
      border-radius: 8px;
      padding: 12px 16px;
      font-size: 16px;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 10px;
      width: 40%;
      margin: 0 auto;
      position: relative;
    }
    .alert-success {
      background-color: #DFF6E1;
      border: 2px solid #2D9149;
      color: #14591D;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .alert-danger {
      background-color: #FDE2E2;
      border: 2px solid #E63946;
      color: #A83232;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Pagination styles (unchanged) */
    .pagination {
      justify-content: center;
    }
    .pagination .page-link {
      color: #14591D;
    }
    .pagination .page-link:hover {
      color: #0A210F;
      background-color: #E1E289;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .my-forum-section {
        padding: 15px;
      }
      .my-comment-input {
        margin-left: 0;
      }
      #myCreatePostModal .modal-content {
        width: 95%;
        margin: 10% auto;
      }
    }
  </style>

  <!-- Button to Create a New Post (Renamed ID) -->
  <div class="d-flex justify-content-end mb-4">
    <button
      type="button"
      class="btn btn-primary btn-lg shadow"
      id="myOpenModalBtn"
    >
      <i class="fas fa-pencil-alt me-2"></i> Create a Post
    </button>
  </div>

  <!-- Create Post Modal (Renamed to #myCreatePostModal) -->
  <div id="myCreatePostModal" class="modal">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Create New Post</h5>
        <span
          class="close text-white"
          id="myCloseModalBtn"
          style="position: absolute; top: 15px; right: 40px; cursor: pointer; font-size: 40px;"
        >&times;</span>
      </div>
      <form method="POST" action="{{ route('submitPost') }}">
        @csrf
        <div class="modal-body">
          <div class="form-group mb-3">
            <label for="postTitle" class="form-label">Title</label>
            <input
              type="text"
              id="postTitle"
              name="title"
              class="form-control shadow-sm"
              required
            >
          </div>
          <div class="form-group mb-3">
            <label for="postContent" class="form-label">Content</label>
            <textarea
              id="postContent"
              name="content"
              class="form-control shadow-sm"
              rows="4"
              required
            ></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <!-- Renamed class from cancel-modal => myCancelModal -->
          <button
            type="button"
            class="btn btn-secondary shadow myCancelModal"
          >
            Cancel
          </button>
          <button type="submit" class="btn btn-primary shadow">
            Submit Post
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Success & Error Messages -->
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
      {{ session('error') }}
    </div>
  @endif

  <!-- Search Bar Section (Renamed to .my-search-section) -->
  <div class="my-search-section py-4">
    <div class="container">
      <form id="mySearchForm" class="d-flex align-items-center justify-content-center">
        <div
          class="input-group"
          style="max-width: 600px; width: 100%;"
        >
          <input
            type="text"
            id="mySearchInput"
            class="form-control shadow-sm rounded-start"
            placeholder="Search posts..."
            autocomplete="off"
          >
          <button
            type="button"
            id="mySearchBtn"
            class="btn btn-primary shadow rounded-end"
          >
            <i class="fas fa-search"></i> Search
          </button>
        </div>
      </form>
    </div>
  </div>

  <!-- Forum Section (Renamed to .my-forum-section) -->
  <div class="my-forum-section py-4">
    <!-- Posts List -->
    <div class="my-forum-posts container" id="myPostsContainer">
      @forelse($posts as $post)
        <div class="card shadow-sm mb-4 my-forum-post">
          <div class="card-body">
            <div class="d-flex align-items-start">
              <img
                src="{{ $post->user->avatar ?? asset('default-avatar.png') }}"
                alt="User Avatar"
                class="rounded-circle me-3 avatar"
              >
              <div class="w-100">
                <h5 class="card-title mb-2 my-post-title">{{ $post->title }}</h5>
                <p class="card-text my-post-content">{{ $post->content }}</p>
                <p class="text-muted small">
                  Posted by {{ $post->user->name ?? 'Anonymous' }} -
                  <span
                    class="my-time"
                    data-timestamp="{{ $post->created_at->timezone('Asia/Manila')->toIso8601String() }}"
                  ></span>
                </p>
                <div class="d-flex align-items-center mb-2 my-post-reactions-time">
                  <form
                    method="POST"
                    action="{{ route('react', $post->id) }}"
                    class="me-2 my-post-reactions"
                  >
                    @csrf
                    <input type="hidden" name="type" value="like">
                    <button
                      type="submit"
                      class="btn btn-sm btn-outline-success reaction-btn like"
                    >
                      <i class="fas fa-thumbs-up"></i>
                      <span class="like-count">
                        {{ $post->reactions->where('type', 'like')->count() }}
                      </span>
                    </button>
                  </form>
                  <form
                    method="POST"
                    action="{{ route('react', $post->id) }}"
                    class="me-2 my-post-reactions"
                  >
                    @csrf
                    <input type="hidden" name="type" value="unlike">
                    <button
                      type="submit"
                      class="btn btn-sm btn-outline-danger reaction-btn unlike"
                    >
                      <i class="fas fa-thumbs-down"></i>
                      <span class="unlike-count">
                        {{ $post->reactions->where('type', 'unlike')->count() }}
                      </span>
                    </button>
                  </form>
                  <button
                    class="btn btn-link btn-sm text-decoration-none"
                    data-toggle="collapse"
                    data-target="#comments-{{ $post->id }}"
                  >
                    <i class="fas fa-comments"></i>
                    View Comments ({{ $post->comments->count() }})
                  </button>
                </div>

                <!-- Comments Section -->
                <div id="comments-{{ $post->id }}" class="collapse mt-3">
                  @foreach($post->comments as $comment)
                    <div class="d-flex mb-2">
                      <img
                        src="{{ $comment->user->avatar ?? asset('default-avatar.png') }}"
                        alt="User Avatar"
                        class="rounded-circle me-2 avatar-sm"
                      >
                      <div>
                        <p class="mb-1">
                          <strong>{{ $comment->user->name ?? 'User' }}:</strong>
                          {{ $comment->content }}
                        </p>
                      </div>
                    </div>
                  @endforeach

                  <!-- Add Comment -->
                  <form method="POST" action="{{ route('addComment', $post->id) }}">
                    @csrf
                    <div class="input-group mt-2">
                      <input
                        type="text"
                        class="form-control shadow-sm"
                        name="content"
                        placeholder="Add a comment..."
                        required
                      >
                      <button
                        class="btn btn-outline-primary shadow"
                        type="submit"
                      >
                        <i class="fas fa-paper-plane"></i>
                      </button>
                    </div>
                  </form>
                </div>
              </div> <!-- /.w-100 -->
            </div> <!-- /.d-flex -->
          </div> <!-- /.card-body -->
        </div> <!-- /.my-forum-post -->
      @empty
        <div class="alert alert-warning text-center shadow-sm">
          No posts to display.
        </div>
      @endforelse

      <!-- Pagination -->
      <div class="d-flex justify-content-between align-items-center mt-3">
        <p class="mb-0">
          Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} posts
        </p>
        {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
      </div>
    </div>
  </div>
  <!-- =============== RENAMED FORUM SECTION END =============== -->

  <!-- JavaScript for the Forum (Modal, Search, Relative Time) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"
  ></script>

  <script>
    document.addEventListener("DOMContentLoaded", function () {
      // Modal Logic
      const modal = document.getElementById("myCreatePostModal");
      const openModalBtn = document.getElementById("myOpenModalBtn");
      const closeModalBtn = document.getElementById("myCloseModalBtn");
      const cancelModalBtns = document.querySelectorAll(".myCancelModal");

      openModalBtn.addEventListener("click", () => {
        modal.style.display = "block";
      });

      closeModalBtn.addEventListener("click", () => {
        modal.style.display = "none";
      });

      cancelModalBtns.forEach(btn => {
        btn.addEventListener("click", () => {
          modal.style.display = "none";
        });
      });

      window.addEventListener("click", (event) => {
        if (event.target === modal) {
          modal.style.display = "none";
        }
      });

      // Relative Time Function
      function getRelativeTime(timestamp) {
        const now = new Date();
        const postTime = new Date(timestamp);
        const diffInSeconds = Math.floor((now - postTime) / 1000);
        const intervals = [
          { label: 'year', seconds: 31536000 },
          { label: 'month', seconds: 2592000 },
          { label: 'day', seconds: 86400 },
          { label: 'hour', seconds: 3600 },
          { label: 'minute', seconds: 60 },
          { label: 'second', seconds: 1 }
        ];
        for (const interval of intervals) {
          const count = Math.floor(diffInSeconds / interval.seconds);
          if (count >= 1) {
            return count === 1
              ? `${count} ${interval.label} ago`
              : `${count} ${interval.label}s ago`;
          }
        }
        return 'Just now';
      }

      function updateAllPostTimes() {
        const timeElements = document.querySelectorAll('.my-time');
        timeElements.forEach(timeEl => {
          const timestamp = timeEl.getAttribute('data-timestamp');
          if (timestamp) {
            timeEl.textContent = getRelativeTime(timestamp);
          }
        });
      }

      updateAllPostTimes();
      setInterval(updateAllPostTimes, 60000);

      // Search Logic
      const searchInput = document.getElementById('mySearchInput');
      const searchBtn = document.getElementById('mySearchBtn');
      const postsContainer = document.getElementById('myPostsContainer');
      const posts = Array.from(postsContainer.getElementsByClassName('my-forum-post'));

      // Function to perform search
      function searchPosts() {
        const searchTerm = searchInput.value.toLowerCase().trim();
        // Filter Logic
        const filteredPosts = posts.filter(post => {
          const title = post.querySelector('.my-post-title').textContent.toLowerCase();
          const content = post.querySelector('.my-post-content').textContent.toLowerCase();
          return title.includes(searchTerm) || content.includes(searchTerm);
        });

        // Clear existing posts
        postsContainer.innerHTML = '';

        // Append filtered posts
        if (filteredPosts.length > 0) {
          filteredPosts.forEach(post => {
            postsContainer.appendChild(post);
          });
        } else {
          // Display message if no posts match
          const noPostsDiv = document.createElement('div');
          noPostsDiv.className = 'alert alert-warning text-center shadow-sm';
          noPostsDiv.textContent = 'No posts match your search criteria.';
          postsContainer.appendChild(noPostsDiv);
        }
      }

      // Event Listeners
      searchBtn.addEventListener('click', searchPosts);
      searchInput.addEventListener('keypress', function (e) {
        if (e.key === 'Enter') {
          e.preventDefault();
          searchPosts();
        }
      });
    });
  </script>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <!-- Logo -->
        <div class="col-md-4 text-center">
          <img src="../images/SSCF-Footer-Logo.png" alt="Logo" class="img-fluid mb-3">
          <div class="logo-description-section">
            <p class="mb-0">
              This is the highest governing and policy-making body of Southern Luzon State University (SLSU)
              student body.
            </p>
          </div>
        </div>
        <!-- Contact Us -->
        <div class="col-md-4">
          <div class="contact-us-section">
            <h5>Contact Us</h5>
            <p>
              Email:
              <a href="mailto:slsusscf@slsu.edu.ph" class="text-white"
                >slsusscf@slsu.edu.ph</a
              >
            </p>
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
            <p>
              Supreme Student Council Federation of Southern Luzon State University, dedicated to
              empowering students by promoting academic and social well-being, fostering community,
              and providing a platform for student voices to be heard.
            </p>
          </div>
          <div class="get-in-touch-section">
            <h5>Get in Touch</h5>
            <p>
              <a href="mailto:slsusscf@slsu.edu.ph" class="text-white"
                ><i class="fas fa-envelope"></i> Gmail</a
              >
              |
              <a href="https://facebook.com" class="text-white"
                ><i class="fab fa-facebook-f"></i> Facebook</a
              >
              |
              <a href="https://twitter.com" class="text-white"
                ><i class="fab fa-twitter"></i> Twitter</a
              >
            </p>
          </div>
        </div>
      </div>
      <hr class="hr-divider">
      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <p class="footer-center-text">
            © 2024 SLSU Supreme Student Council Federation. All Rights Reserved
          </p>
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
  

  <!-- Bootstrap JS Bundle -->
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>

</body>
</html>
