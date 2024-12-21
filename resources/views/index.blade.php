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
  
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <script src="{{ asset('js/index.js') }}"></script>

  
  

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


<!-- Mission & Vision & Goals -->
  <div class="container">
    <div class="row text-center">
      <div class="col-md-4 mb-4">
        <div class="mission-box">
          <div class="mission-icon-circle">
            <i class="bi bi-bullseye"></i>
          </div>
          <h3 class="custom-heading">Mission</h3>
          <p class="custom-paragraph">The SSCF aims to empower students by serving as the primary voice of the student
            body, promoting student welfare, rights, and involvement in institutional governance. We seek to develop
            student leaders who are proactive, responsible, and innovative.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="vision-box">
          <div class="vision-icon-circle">
            <i class="bi bi-eye"></i>
          </div>
          <h3 class="custom-heading">Vision</h3>
          <p class="custom-paragraph">The Supreme Student Council Federation envisions a unified and empowered student
            body, driven by strong leadership, inclusivity, and active participation in university affairs to foster a
            conducive environment for academic excellence and social development.</p>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="goals-box">
          <div class="goals-icon-circle">
            <i class="bi bi-flag"></i>
          </div>
          <h3 class="custom-heading">Goals</h3>
          <p class="custom-paragraph">The SSCF aims to establish a dynamic and inclusive student community by
            facilitating programs that promote academic growth, leadership development, and student engagement, ensuring
            that every student has a voice in shaping university policies and initiatives.</p>
        </div>
      </div>
    </div>
  </div>

<!-- End Mission & Vision & Goals -->




<!-- Organizational Chart -->
<div class="org-chart-background">
  <div class="org-chart-container text-center my-5">
      <div class="organization-title">ORGANIZATIONAL CHART</div>
      <div class="title-underline"></div>
      <img src="../images/orgchart.png" alt="Organization Chart" class="img-fluid org-chart" style="margin-top: 20px;">
  </div>
</div>
<!-- End Organizational Chart -->



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
/* President's Message Carousel Styling */
.president-carousel {
    width: 100%;
    max-width: 600px; /* Adjust as needed */
    height: 700px; /* Increased height from 400px to 600px */
    margin: 0 auto;
    position: relative;
    overflow: hidden;
    border-radius: 10px; /* Optional: rounded corners */
}

.carousel-image {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%; /* Ensures image fills the container height */
    object-fit: cover; /* Maintains aspect ratio while covering the container */
    opacity: 0;
    transition: opacity 1s ease-in-out;
    display: none;
}

.carousel-image.active {
    opacity: 1;
    display: block;
}

/* Optional: Responsive Height Adjustment */
@media (max-width: 768px) {
    .president-carousel {
        height: 400px; /* Reduced height for smaller screens */
    }
}

@media (max-width: 480px) {
    .president-carousel {
        height: 300px; /* Further reduced height for very small screens */
    }
}

</style>
<!-- End President Message -->


<!-- Recent News -->
<div class="recent-news-background">
  <div class="container text-center">
    <h2 class="recent-news-title">Recent News</h2>
    <div id="news-container" class="row justify-content-center"></div>

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
    const newsData = [
        { title: 'Community Service Initiative Launch', date: 'September 15, 2024', img: '../images/Volunteer.png' },
        { title: 'New Health and Wellness Program', date: 'September 16, 2024', img: '../images/Volunteer.png' },
        { title: 'Annual Fundraising Event Success', date: 'September 17, 2024', img: '../images/Volunteer.png' },
        { title: 'Volunteer Opportunities Open', date: 'September 18, 2024', img: '../images/Volunteer.png' },
        { title: 'New Scholarship Opportunities', date: 'September 19, 2024', img: '../images/Volunteer.png' },
        { title: 'Sustainability Workshop Series', date: 'September 20, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 7', date: 'July 7, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 8', date: 'July 8, 2024', img: '../images/Volunteer.png' },
        { title: 'News Title 9', date: 'July 9, 2024', img: '../images/Volunteer.png' }
        
    ];

    const itemsPerPage = 2;
    const totalPages = Math.ceil(newsData.length / itemsPerPage);
    let currentPage = 1;

    const newsContainer = document.getElementById('news-container');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    const pageNumbersContainer = document.querySelector('.page-numbers');

    function displayNews(page) {
        newsContainer.classList.add('fade-out');

        setTimeout(() => {
            newsContainer.innerHTML = '';
            const start = (page - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedNews = newsData.slice(start, end);

            paginatedNews.forEach(news => {
                const newsBox = document.createElement('div');
                newsBox.classList.add('col-md-3', 'news-box');
                newsBox.innerHTML = `
                    <img src="${news.img}" alt="${news.title}">
                    <div class="news-title">${news.title}</div>
                    <div class="news-date">Date: ${news.date}</div>
                    <div class="news-read-more-box">
                        <a href="latest-news.html?news=${encodeURIComponent(news.title)}#${encodeURIComponent(news.title)}" class="news-read-more">Read more</a>
                    </div>
                `;
                newsContainer.appendChild(newsBox);
            });

            newsContainer.classList.remove('fade-out');
            newsContainer.classList.add('fade-in');

            setTimeout(() => {
                newsContainer.classList.remove('fade-in');
            }, 500);
        }, 500);
    }

    function updatePaginationButtons() {
        prevButton.style.visibility = currentPage === 1 ? 'hidden' : 'visible';
        nextButton.style.visibility = currentPage === totalPages ? 'hidden' : 'visible';

        pageNumbersContainer.innerHTML = '';
        const maxVisiblePages = 5; // Maximum number of page numbers to display
        let startPage, endPage;

        if (totalPages <= maxVisiblePages) {
            // If total pages are less than or equal to maxVisiblePages
            startPage = 1;
            endPage = totalPages;
        } else {
            // Calculate start and end page
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

    displayNews(currentPage);
    updatePaginationButtons();
});

</script>
  <!-- END JS FOR RECENT NEWS -->








<!-- Upcoming Events -->
<section class="upcoming-events">
  <h2>Upcoming Events</h2>
  <div class="slider-container">
      <div class="slider">
          <img src="../images/message.jpg" alt="Event 1">
          <img src="../images/message.jpg" alt="Event 2">
          <img src="../images/message.jpg" alt="Event 3">
          <img src="../images/message.jpg" alt="Event 4">
          <img src="../images/message.jpg" alt="Event 5">
          <img src="../images/message.jpg" alt="Event 6">
          <img src="../images/message.jpg" alt="Event 7">
          <img src="../images/message.jpg" alt="Event 8">
          <img src="../images/message.jpg" alt="Event 9">
      </div>
      <button class="slider-button prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="slider-button next" onclick="moveSlide(1)">&#10095;</button>
  </div>
</section>
<!-- End of Upcoming Events -->


    <!-- JS FOR UPCOMING EVENTS  -->
<script>
  let currentSlide = 0;

  function showSlide(index) {
      const slides = document.querySelectorAll('.slider img');
      if (index >= slides.length) {
          currentSlide = 0;
      } else if (index < 0) {
          currentSlide = slides.length - 1;
      } else {
          currentSlide = index;
      }
      const slider = document.querySelector('.slider');
      slider.style.transform = `translateX(${-currentSlide * 100}%)`; // Move slider
  }

  function moveSlide(direction) {
      showSlide(currentSlide + direction); // Move to next/previous slide
  }

  // Initialize slider to show the first slide
  showSlide(currentSlide);

  // Set interval for automatic slide movement
  setInterval(() => {
      moveSlide(1); // Move to the next slide every 3 seconds
  }, 3000); // Change 3000 to adjust the timing (in milliseconds)

</script>
 <!-- END JS FOR UPCOMING EVENTS  -->











    <!-- Footer -->
@include('layouts.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>