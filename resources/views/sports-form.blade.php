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

  <link rel="stylesheet" href="{{ asset('css/sports-form.css') }}">
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
                        <option value="Bachelor of Science in Nursing" {{ old('course') == 'Bachelor of Science in Nursing' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
                        <option value="Bachelor of Elementary Education" {{ old('course') == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
                    </select>
                </div>
                <div class="form-group college-campus-group">
                    <label for="college-campus" class="form-label">College/Campus</label>
                    <select name="college_campus" class="form-select" id="college-campus" required>
                        <option value="College of Allied and Medicine" {{ old('college_campus') == 'College of Allied and Medicine' ? 'selected' : '' }}>College of Allied and Medicine</option>
                        <option value="College of Business Administration" {{ old('college_campus') == 'College of Business Administration' ? 'selected' : '' }}>College of Business Administration</option>
                    </select>
                </div>
            </div>

            <!-- Sports Event and ID Number -->
            <div class="form-row">
                <div class="form-group sports-event-group">
                    <label for="sports-event" class="form-label">Sports Event</label>
                    <select name="sports_event" class="form-select" id="sports-event" required>
                        <option value="Athletics" {{ old('sports_event') == 'Athletics' ? 'selected' : '' }}>Athletics</option>
                        <option value="Basketball" {{ old('sports_event') == 'Basketball' ? 'selected' : '' }}>Basketball</option>
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
                <input type="file" name="image" id="browse-image" class="form-control">
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

 




  @include('layouts.footer')



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>