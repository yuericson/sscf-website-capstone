<!DOCTYPE html>
< lang="en">

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
  
  <link rel="stylesheet" href="{{ asset('css/forum.css') }}">
<link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">


  
  

</head>
</body>

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






<div class="container mt-5">
  <!-- Create New Post Button -->
  <div class="d-flex justify-content-end mb-3">
    <button class="btn btn-primary" id="create-new-post">Create a New Post</button>
  </div>

  <!-- Modal -->
  <!-- Modal -->
  <div id="postModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <h4>Submit a New Post</h4>
      <form action="submit-post.php" method="post">
        <div class="mb-3">
          <label for="postTitle" class="form-label">Title/Subject</label>
          <input type="text" class="form-control" id="postTitle" name="title" required>
        </div>
        <div class="mb-3">
          <label for="postMessage" class="form-label">Message</label>
          <textarea class="form-control" id="postMessage" name="message" rows="4" required></textarea>
        </div>
        <div class="submit-btn-container">
          <button type="submit" class="btn btn-primary">Submit a new post</button>
        </div>
      </form>
      <small class="note">Note: Your message will not automatically be posted. Messages will be under review by the admin. Your identity will remain anonymous.</small>
    </div>
  </div>

  <style>
/* Modal styling */
.modal {
  display: none;
  position: fixed;
  z-index: 1000;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.4);
  display: flex;
  justify-content: center;
  align-items: flex-start;
  padding-top: 50px;
}

.modal-content {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  width: 50%;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
  animation: fadeIn 0.3s;
}

.modal-content h4 {
  margin-bottom: 20px;
  color: #333;
}

.close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.close:hover, .close:focus {
  color: #000;
  text-decoration: none;
}

/* Animations */
@keyframes fadeIn {
  from { opacity: 0; }
  to { opacity: 1; }
}

.submit-btn-container {
  margin-top: 10px;
}

.note {
  display: block;
  margin-top: 10px;
  font-size: 0.9em;
  color: #555;
}
</style>


<script>
// JavaScript to handle modal visibility
const modal = document.getElementById('postModal');
const openModalButton = document.getElementById('create-new-post');
const closeModalButton = document.querySelector('.close');

openModalButton.addEventListener('click', () => {
  modal.style.display = 'flex';
});

closeModalButton.addEventListener('click', () => {
  modal.style.display = 'none';
});

window.addEventListener('click', (event) => {
  if (event.target === modal) {
    modal.style.display = 'none';
  }
});
</script>

  <div class="forum-section">
      <!-- Existing Posts -->
      <div class="forum-posts">
          <div class="forum-post">
              <div class="d-flex align-items-start">
                  <img src="images/SSCF-Footer-Logo.png" alt="User Avatar" class="rounded-circle me-3" width="50" height="50">
                  <div>
                      <h4 class="post-title">MABUHAY</h4>
                      <p class="post-content">Congratulations to all departments at SLSU on the election of your newly elected student council officers! I hope to see your colleges improve even more!</p>
                      <div class="d-flex align-items-center post-reactions-time">
                          <div class="post-reactions d-flex">
                              <button class="reaction-btn like" data-post-id="1">👍0</button>
                              <button class="reaction-btn unlike" data-post-id="1">👎0</button>
                          </div>
                          <span class="post-time ms-3"><i class="fas fa-clock"></i> 1hr ago</span>
                          <span class="post-comments ms-3"><i class="fas fa-comments"></i> 3</span>
                      </div>
                  </div>
              </div>
              <!-- Comment Input -->
              <div class="comment-input mt-3">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Add a comment..." aria-label="Comment">
                      <button class="btn send-icon">
                          <i class="fas fa-paper-plane"></i> <!-- Font Awesome send icon -->
                      </button>
                  </div>
              </div>
          </div>

          <!-- New Post 1 -->
          <div class="forum-post">
              <div class="d-flex align-items-start">
                  <img src="images/SSCF-Footer-Logo.png" alt="User Avatar" class="rounded-circle me-3" width="50" height="50">
                  <div>
                      <h4 class="post-title">Salamat!</h4>
                      <p class="post-content">Malaking tulong ang mga bagong opisyal ng SSCF para sa mga proyekto ng unibersidad. Sana ay magpatuloy ang kanilang serbisyo!</p>
                      <div class="d-flex align-items-center post-reactions-time">
                          <div class="post-reactions d-flex">
                              <button class="reaction-btn like" data-post-id="2">👍0</button>
                              <button class="reaction-btn unlike" data-post-id="2">👎0</button>
                          </div>
                          <span class="post-time ms-3"><i class="fas fa-clock"></i> 2hr ago</span>
                          <span class="post-comments ms-3"><i class="fas fa-comments"></i> 1</span>
                      </div>
                  </div>
              </div>
              <!-- Comment Input -->
              <div class="comment-input mt-3">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Add a comment..." aria-label="Comment">
                      <button class="btn send-icon">
                          <i class="fas fa-paper-plane"></i> <!-- Font Awesome send icon -->
                      </button>
                  </div>
              </div>
          </div>

          <!-- New Post 2 -->
          <div class="forum-post">
              <div class="d-flex align-items-start">
                  <img src="images/SSCF-Footer-Logo.png" alt="User Avatar" class="rounded-circle me-3" width="50" height="50">
                  <div>
                      <h4 class="post-title">Kudos!</h4>
                      <p class="post-content">Kudos sa mga bagong liderato! Magandang simula ang kanilang proyekto sa mga estudyante.</p>
                      <div class="d-flex align-items-center post-reactions-time">
                          <div class="post-reactions d-flex">
                              <button class="reaction-btn like" data-post-id="3">👍0</button>
                              <button class="reaction-btn unlike" data-post-id="3">👎0</button>
                          </div>
                          <span class="post-time ms-3"><i class="fas fa-clock"></i> 3hr ago</span>
                          <span class="post-comments ms-3"><i class="fas fa-comments"></i> 2</span>
                      </div>
                  </div>
              </div>
              <!-- Comment Input -->
              <div class="comment-input mt-3">
                  <div class="input-group">
                      <input type="text" class="form-control" placeholder="Add a comment..." aria-label="Comment">
                      <button class="btn send-icon">
                          <i class="fas fa-paper-plane"></i> <!-- Font Awesome send icon -->
                      </button>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>





<script>
  // JavaScript to toggle the post form visibility
  document.getElementById('create-new-post').addEventListener('click', function() {
      const postFormContainer = document.querySelector('.post-form-container');
      postFormContainer.style.display = postFormContainer.style.display === 'none' ? 'block' : 'none';
  });
</script>






















  
@include('layouts.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</body>

</html>