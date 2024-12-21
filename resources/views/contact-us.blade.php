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

  <link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
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
              <li><a class="dropdown-item" href="{{ route('volunteer.opportunities') }}">Volunteer Opportunities</a>
              </li>
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








  <!-- Committee Contacts Section -->
  <!-- Committee Contacts Section -->
  <div class="background-section">
    <div class="text-center my-5">
      <div class="committee-contacts-title">Committee Contacts</div>
      <div class="contacts-title-underline"></div>
      <div class="row justify-content-center">
        <!-- Committee 1 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CIT.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Industrial Technology Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucitssc@slsu.edu.ph">slsucitssc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucitsc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 2 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CEN.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Engineering Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucesc@slsu.edu.ph">slsucesc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucesc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 3 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CAS.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Arts and Sciences Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucassc@slsu.edu.ph">slsucassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 4 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CTE.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Teacher Education Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsuctesc@slsu.edu.ph">slsucessc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucessc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 5 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CABHA.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Administration, Business, Hospitality and Accountancy Student
                Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsuccabhasc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 6 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CAM.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Allied Medicine Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucamsc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 7 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/CAG.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">College of Agriculture Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucagsc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 8 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Tayabas.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Tayabas Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsuctayabassc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 9 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Lucena.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Lucena Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsuclucenasc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 10 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Gumaca.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Gumaca Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsugumacasc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 11 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Catanauan.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Catanauan Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsucatanauansc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 12 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Tiaong.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Tiaong Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsutiaongsc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 13 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Infanta.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Infanta Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsuinfantasc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 14 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Polillo.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Polillo Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsupolillosc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 15 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Alabat.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Alabat Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsualabatsc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
        <!-- Committee 16 -->
        <div class="col-md-8 committee-box">
          <div class="committee-details">
            <div class="committee-logo">
              <img src="images/Tagkawayan.png" alt="Logo" class="logo-img">
            </div>
            <div class="committee-info">
              <div class="committee-name">SLSU Tagkawayan Campus Student Council</div>
              <div class="committee-email"><i class="fas fa-envelope"></i> <a
                  href="mailto:slsutagkawayansc@slsu.edu.ph">slsucbassc@slsu.edu.ph</a></div>
              <div class="committee-phone"><i class="fas fa-phone"></i> 09123456789</div>
              <div class="committee-fb"><i class="fab fa-facebook"></i> <a href="http://facebook.com/slsucbassc"
                  target="_blank">Link</a></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>






  @include('layouts.footer')
