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
  <link rel="stylesheet" href="{{ asset('css/sports-registration.css') }}">
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
                const registerNowBtn = document.getElementById("register-now-btn");

                if (data.user) {
                    // User is logged in, redirect to the sports form
                    registerNowBtn.addEventListener("click", function () {
                        window.location.href = "{{ asset('sports-form') }}";
                    });
                    updateLoginButtonWithAvatar(data.user.avatar, "{{ route('logout') }}");
                } else {
                    // User is not logged in, redirect to Google login
                    registerNowBtn.addEventListener("click", function () {
                        window.location.href = "{{ route('login.google') }}";
                    });
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



<!-- ICCAC-CAF Pre-Registration Form -->
<div class="pre-registration-form mb-5 text-center">
  <div class="slideshow-container">
    <div class="slideshow">
      <div class="slide slide1"></div>
      <div class="slide slide2"></div>
      <div class="slide slide3"></div>
      <!-- Duplicate slides for seamless transition -->
      <div class="slide slide1"></div>
      <div class="slide slide2"></div>
      <div class="slide slide3"></div>
    </div>
  </div>
  <h2 class="sports-title">ICCAC-CAF Pre-Registration Form</h2>
  <p class="form-description">
    The ICCAC CAF at Southern Luzon State University (SLSU) Lucban stands for the "Intercollegiate <br>and Campuses Athletic Competition – Culture and Arts Festival." This event brings together students <br> from various colleges and campuses of SLSU to participate in a variety of athletic competitions <br> and cultural activities. The festival aims to promote sportsmanship, cultural appreciation, and unity <br> among the student body. It includes a wide range of events such as sports competitions, <br> artistic performances, and student booths showcasing different talents and crafts.
  </p>
  <a href="#" id="register-now-btn" class="btn btn-primary">Register Now</a>
</div>

<!-- Modal -->
<div id="alreadyRegisteredModal" class="modal" tabindex="-1" style="display: none;">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Registration Notice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>You have already registered for the ICCAC-CAF event. If you need assistance, please contact support.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
      </div>
    </div>
  </div>
</div>


<script>
  document.addEventListener("DOMContentLoaded", function () {
  const registerNowBtn = document.getElementById("register-now-btn");

  registerNowBtn.addEventListener("click", function (event) {
    event.preventDefault();

    // Make an AJAX call to check registration status
    fetch("{{ route('check.registration') }}", {
      headers: { "X-Requested-With": "XMLHttpRequest" },
    })
      .then((response) => {
        if (response.status === 401) {
          // Redirect to the login page if unauthenticated
          window.location.href = "{{ route('login') }}";
          return;
        }
        return response.json();
      })
      .then((data) => {
        if (data.alreadyRegistered) {
          // Show the modal if the user is already registered
          showModal();
        } else {
          // Redirect to the registration form
          window.location.href = "{{ route('sports.form') }}";
        }
      })
      .catch((error) => {
        console.error("Error checking registration:", error);
      });
  });

  function showModal() {
    const modal = document.getElementById("alreadyRegisteredModal");
    modal.style.display = "block";
  }

  function closeModal() {
    const modal = document.getElementById("alreadyRegisteredModal");
    modal.style.display = "none";
  }
});

</script>





    

<!-- Departments & Colleges -->
<div class="departments-section mb-5 text-center">
  <h3 class="colleges-title">DEPARTMENTS & COLLEGES</h3>
  <div class="logos-container">
      <div class="logos-wrapper">
          <!-- Duplicate the logos to ensure a seamless infinite scroll -->
          <div class="logos-inner">
              <img src="{{ asset('images/CIT.png') }}" alt="Department Logo 1" class="dc-logo">
              <img src="{{ asset('images/CEN.png') }}" alt="Department Logo 2" class="dc-logo">
              <img src="{{ asset('images/CTE.png') }}" alt="Department Logo 3" class="dc-logo">
              <img src="{{ asset('images/CAM.png') }}" alt="Department Logo 4" class="dc-logo">
              <img src="{{ asset('images/CAS.png') }}" alt="Department Logo 5" class="dc-logo">
              <img src="{{ asset('images/CABHA.png') }}" alt="Department Logo 6" class="dc-logo">
              <img src="{{ asset('images/CAG.png') }}" alt="Department Logo 7" class="dc-logo">
              
              <!-- Repeat logos again for smooth infinite scrolling -->
              <img src="{{ asset('images/CIT.png') }}" alt="Department Logo 1" class="dc-logo">
              <img src="{{ asset('images/CEN.png') }}" alt="Department Logo 2" class="dc-logo">
              <img src="{{ asset('images/CTE.png') }}" alt="Department Logo 3" class="dc-logo">
              <img src="{{ asset('images/CAM.png') }}" alt="Department Logo 4" class="dc-logo">
              <img src="{{ asset('images/CAS.png') }}" alt="Department Logo 5" class="dc-logo">
              <img src="{{ asset('images/CABHA.png') }}" alt="Department Logo 6" class="dc-logo">
              <img src="{{ asset('images/CAG.png') }}" alt="Department Logo 7" class="dc-logo">
          </div>
      </div>
  </div>
</div>

<!-- Campuses -->
<div class="campuses-section text-center">
  <h3 class="colleges-title">CAMPUSES</h3>
  <div class="logos-container">
      <div class="logos-wrapper">
          <div class="logos-inner">
              <!-- Repeat the same set of logos twice for seamless infinite scroll -->
              <img src="{{ asset('images/SLSU-Lucban.png') }}" alt="Department Logo 1" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tayabas.png') }}" alt="Department Logo 2" class="dc-logo">
              <img src="{{ asset('images/SLSU-Lucena.png') }}" alt="Department Logo 3" class="dc-logo">
              <img src="{{ asset('images/SLSU-Catanauan.png') }}" alt="Department Logo 4" class="dc-logo">
              <img src="{{ asset('images/SLSU-Gumaca.png') }}" alt="Department Logo 5" class="dc-logo">
              <img src="{{ asset('images/SLSU-Infanta.png') }}" alt="Department Logo 6" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tiaong.png') }}" alt="Department Logo 7" class="dc-logo">
              <img src="{{ asset('images/SLSU-Polillo.png') }}" alt="Department Logo 8" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tagkawayan.png') }}" alt="Department Logo 9" class="dc-logo">
              <img src="{{ asset('images/SLSU-Alabat.png') }}" alt="Department Logo 10" class="dc-logo">
              
              <!-- Repeat logos again for smooth infinite scrolling -->
              <img src="{{ asset('images/SLSU-Lucban.png') }}" alt="Department Logo 1" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tayabas.png') }}" alt="Department Logo 2" class="dc-logo">
              <img src="{{ asset('images/SLSU-Lucena.png') }}" alt="Department Logo 3" class="dc-logo">
              <img src="{{ asset('images/SLSU-Catanauan.png') }}" alt="Department Logo 4" class="dc-logo">
              <img src="{{ asset('images/SLSU-Gumaca.png') }}" alt="Department Logo 5" class="dc-logo">
              <img src="{{ asset('images/SLSU-Infanta.png') }}" alt="Department Logo 6" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tiaong.png') }}" alt="Department Logo 7" class="dc-logo">
              <img src="{{ asset('images/SLSU-Polillo.png') }}" alt="Department Logo 8" class="dc-logo">
              <img src="{{ asset('images/SLSU-Tagkawayan.png') }}" alt="Department Logo 9" class="dc-logo">
              <img src="{{ asset('images/SLSU-Alabat.png') }}" alt="Department Logo 10" class="dc-logo">
          </div>
      </div>
  </div>
</div>






  
@include('layouts.footer')



  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU7+K9s+7t1btQz9iwFpm0pQmY64bPB4jU6fQ13D0FJ8zvM2F6Syyz8fL2Vss4" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>
