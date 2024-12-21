  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Super Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
      /* General Styles */
      body {
        font-family: Arial, sans-serif;
        background-color: #f8f9fa;
        margin: 0;
        padding: 0;
      }

      /* Sidebar Styles */
      .sidebar {
        width: 250px;
        height: 100vh;
        position: fixed;
        top: 0;
        left: 0;
        background-color: #185F43;
        color: #fff;
        display: flex;
        flex-direction: column;
        transition: width 0.3s ease;
      }

      .sidebar.collapsed {
        width: 70px;
      }

      .sidebar .logo {
        padding: 20px;
        font-size: 1.3rem;
        font-weight: bold;
        text-align: center;
        color: #fff;
        transition: font-size 0.3s ease;
      }

      .sidebar.collapsed .logo {
        font-size: 0.9rem;
        text-align: center;
      }

      .sidebar .nav {
        margin: 0;
        padding: 0;
        list-style: none;
      }

      .sidebar .nav-link {
        color: #cbd5e0;
        padding: 10px 15px;
        display: flex;
        align-items: center;
        justify-content: left;
        border-radius: 8px;
        text-decoration: none;
        transition: background-color 0.3s, color 0.3s, justify-content 0.3s;
        border: none; /* Remove any underline or border */
      }

      .sidebar .nav-link i {
        font-size: 1rem;
        transition: font-size 0.3s ease, margin-right 0.3s ease;
      }

      .sidebar.collapsed .nav-link {
        justify-content: center;
      }

      .sidebar.collapsed .nav-link i {
        margin-right: 0;
      }

      .sidebar .nav-link span {
        margin-left: 10px;
        font-size: 1rem;
        transition: opacity 0.3s ease;
      }

      .sidebar.collapsed .nav-link span {
        display: none;
      }

      .sidebar .nav-link:hover,
      .sidebar .nav-link:focus {
        background-color: #144d34;
        color: #fff;
      }

      .sidebar .nav-link.active {
        background-color: #144d34;
        color: #fff;
      }

      .management-title {
        font-size: 0.8rem;
        font-weight: bold;
        color: #cbd5e0;
        padding: 10px 15px;
        text-transform: uppercase;
      }

      .sidebar.collapsed .management-title {
        display: none;
      }

      /* Header Styles */
      .header {
        background-color: #185F43;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        position: fixed;
        top: 0;
        left: 250px;
        right: 0;
        z-index: 1000;
        box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        padding: 0 20px;
        color: #fff;
        transition: left 0.3s ease;
      }

      .header.collapsed {
        left: 70px;
      }

      .header .left-section {
        display: flex;
        align-items: center;
      }

      .header .search-bar {
        flex: 1;
        margin: 0 20px;
      }

      .header .search-bar input {
        width: 100%;
        border: 1px solid #ced4da;
        border-radius: 5px;
        padding: 5px 10px;
      }

    /* Main Content Styles */
.main-content {
  margin-top: 70px;
  margin-left: 250px;
  padding: 20px;
  transition: margin-left 0.3s ease;
}

.main-content.collapsed {
  margin-left: 70px;
}

/* Card Styles */
.card {
  border: none;
  border-radius: 10px;
  padding: 20px;
  
}

.card-header {
  border-radius: 10px 10px 0 0;
}

.stat-card {
  background-color: #f4f4f9;
  color: #3c3c54;
  padding: 20px;
  text-align: center;
  border: 1px solid #ddd;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.stat-card h5 {
  margin-bottom: 10px;
  font-size: 1rem;
}

.stat-card h3 {
  font-size: 2rem;
  font-weight: bold;
}

.stat-card:hover {
  transform: scale(1.05);
}

/* Table Styles */
.table {
  border-collapse: collapse;
}

.table-striped tbody tr:nth-of-type(odd) {
  background-color: #f9f9f9;
}

.table-bordered th, .table-bordered td {
  border: 1px solid #dee2e6;
}

.table-dark {
  background-color: #3c3c54;
  color: #ffffff;
}


      /* Toggle Button */
      .toggle-btn {
        cursor: pointer;
        font-size: 1.5rem;
        color: #fff;
      }

      /* User Profile Styles */
      .user-profile {
        display: flex;
        align-items: center;
        cursor: pointer;
      }

      .user-profile img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
      }

      .user-info {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
      }

      .user-info .name {
        font-weight: bold;
        display: flex;
        align-items: center;
      }

      .user-info .title {
        font-size: 0.85rem;
        color: #cbd5e0;
      }

      .status-indicator {
        width: 10px;
        height: 10px;
        background-color: #28a745; /* Green color */
        border-radius: 50%;
        margin-right: 5px; /* Positioned to the left of the name */
      }

      /* Custom CSS to Adjust Dropdown Icon Spacing */
      .user-profile.dropdown .dropdown-toggle::after {
        margin-left: 10px; /* Adjust this value as needed for spacing */
      }

      /* Responsive Adjustments */
      @media (max-width: 768px) {
        .header {
          left: 0;
        }

        .sidebar {
          position: absolute;
          z-index: 1001;
          height: 100%;
        }

        .main-content {
          margin-left: 0;
        }

        .header.collapsed {
          left: 0;
        }
      }


      .dropdown-menu-notifications {
        width: 300px;
        max-height: 400px;
        overflow-y: auto;
        padding: 0;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .dropdown-menu-notifications .notification-header {
        padding: 10px 15px;
        font-weight: bold;
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
      }

      .dropdown-menu-notifications .notification-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        cursor: pointer;
      }

      .dropdown-menu-notifications .notification-item:hover {
        background-color: #f1f1f1;
      }

      .dropdown-menu-notifications .notification-item i {
        font-size: 1.5rem;
        margin-right: 10px;
      }

      .dropdown-menu-notifications .notification-footer {
        text-align: center;
        padding: 10px;
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
      }

      .dropdown-menu-notifications .notification-footer a {
        text-decoration: none;
        color: #007bff;
      }

      .dropdown-menu-notifications .notification-footer a:hover {
        text-decoration: underline;
      }

      /* Dropdown Menu for Messages */
      .dropdown-menu-messages {
        width: 300px;
        max-height: 400px;
        overflow-y: auto;
        padding: 0;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }

      .dropdown-menu-messages .message-header {
        padding: 10px 15px;
        font-weight: bold;
        background-color: #f8f9fa;
        border-bottom: 1px solid #ddd;
      }

      .dropdown-menu-messages .message-item {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        cursor: pointer;
      }

      .dropdown-menu-messages .message-item:hover {
        background-color: #f1f1f1;
      }

      .dropdown-menu-messages .message-item img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
      }

      .dropdown-menu-messages .message-item .message-content {
        flex: 1;
      }

      .dropdown-menu-messages .message-item .message-content .sender {
        font-weight: bold;
      }

      .dropdown-menu-messages .message-item .message-content .text {
        font-size: 0.9rem;
        color: #555;
      }

      .dropdown-menu-messages .message-footer {
        text-align: center;
        padding: 10px;
        background-color: #f8f9fa;
        border-top: 1px solid #ddd;
      }

      .dropdown-menu-messages .message-footer a {
        text-decoration: none;
        color: #007bff;
      }

      .dropdown-menu-messages .message-footer a:hover {
        text-decoration: underline;
      }

      /* Green Stat Card Styles */
.stat-card-green {
  background-color: #28a745; /* Bootstrap Success Green */
  color: #ffffff; /* White text for contrast */
  text-align: center;
  border: none;
  border-radius: 10px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s;
}

.stat-card-green h5 {
  margin-bottom: 10px;
  font-size: 1rem;
}

.stat-card-green h3 {
  font-size: 2rem;
  font-weight: bold;
}
    </style>
  </head>
  <body>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
      <div class="logo">SSCF</div>
     <ul class="nav flex-column mt-2">
    <li><a href="{{ route('dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
    <div class="management-title">Management</div>
 
    <li><a href="{{ route('academic-resources-db') }}" class="nav-link"><i class="bi bi-book"></i> <span>Academic Resources</span></a></li>
    <li><a href="{{ route('latest-news-db') }}" class="nav-link"><i class="bi bi-newspaper"></i> <span>Latest News</span></a></li>
    <li><a href="{{ route('media-gallery-db') }}" class="nav-link"><i class="bi bi-images"></i> <span>Media Gallery</span></a></li>
    <li><a href="{{ route('press-releases-db') }}" class="nav-link"><i class="bi bi-megaphone"></i> <span>Press Releases</span></a></li>
    <li><a href="{{ route('president-corner-db') }}" class="nav-link"><i class="bi bi-person-circle"></i> <span>President's Corner</span></a></li>
    <li><a href="{{ route('volunteer-opportunities-db') }}" class="nav-link"><i class="bi bi-hand-thumbs-up"></i> <span>Volunteer Opportunities</span></a></li>
    <li><a href="{{ route('forum-db') }}" class="nav-link"><i class="bi bi-chat-left-dots"></i> <span>Forum</span></a></li>
    <li><a href="{{ route('feedback-db') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> <span>Feedback</span></a></li>
    <li><a href="{{ route('sports-registration-db') }}" class="nav-link"><i class="bi bi-trophy"></i> <span>Sports Registration</span></a></li>
    <li><a href="{{ route('local-election-db') }}" class="nav-link"><i class="bi bi-person-check"></i> <span>Local Election</span></a></li>
    <li><a href="{{ route('tabulation-db') }}" class="nav-link"><i class="bi bi-table"></i> <span>Tabulation</span></a></li>



</ul>
    </div>

    <!-- Header -->
    <div class="header" id="header">
      <!-- Left Section: Toggle Button and Search Bar -->
      <div class="left-section">
        <i class="bi bi-list toggle-btn" id="toggleBtn"></i>
        <div class="search-bar ms-3">
          <input type="text" placeholder="Search...">
        </div>
      </div>

      <!-- Right Section: Message Icon, Bell Icon, and User Profile -->
      <div class="d-flex align-items-center">
        <!-- Message Icon with Dropdown -->
        <div class="dropdown me-4"> <!-- Added message dropdown with margin -->
          <a href="#" class="text-white position-relative" id="messageDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-chat-left-text" style="font-size: 1.5rem;"></i>
            <!-- Message Badge -->
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-warning">
              3
              <span class="visually-hidden">unread messages</span>
            </span>
          </a>
          <!-- Dropdown Menu -->
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-messages" aria-labelledby="messageDropdown">
            <div class="message-header">You have 3 new messages</div>
            <div class="message-item">
              <img src="https://via.placeholder.com/40" alt="User Avatar">
              <div class="message-content">
                <div class="sender">Alice Smith</div>
                <div class="text">Hi there! Welcome to the dashboard.</div>
              </div>
            </div>
            <div class="message-item">
              <img src="https://via.placeholder.com/40" alt="User Avatar">
              <div class="message-content">
                <div class="sender">Bob Johnson</div>
                <div class="text">Don't forget the meeting at 3 PM.</div>
              </div>
            </div>
            <div class="message-item">
              <img src="https://via.placeholder.com/40" alt="User Avatar">
              <div class="message-content">
                <div class="sender">Charlie Lee</div>
                <div class="text">Can you review my latest report?</div>
              </div>
            </div>
            <div class="message-footer">
              <a href="#">See all messages</a>
            </div>
          </div>
        </div>

        <!-- Bell Icon with Dropdown -->
        <div class="dropdown me-5"> <!-- Adjusted margin -->
          <a href="#" class="text-white position-relative" id="bellDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-bell" style="font-size: 1.5rem;"></i>
            <!-- Notification Badge -->
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              4
              <span class="visually-hidden">unread notifications</span>
            </span>
          </a>
          <!-- Dropdown Menu -->
          <div class="dropdown-menu dropdown-menu-end dropdown-menu-notifications" aria-labelledby="bellDropdown">
            <div class="notification-header">You have 4 new notifications</div>
            <div class="notification-item">
              <i class="bi bi-person-circle text-primary"></i>
              <div>
                <div>New user registered</div>
                <small class="text-muted">5 minutes ago</small>
              </div>
            </div>
            <div class="notification-item">
              <i class="bi bi-chat-dots text-success"></i>
              <div>
                <div>Rahmad commented on Admin</div>
                <small class="text-muted">12 minutes ago</small>
              </div>
            </div>
            <div class="notification-item">
              <i class="bi bi-envelope text-warning"></i>
              <div>
                <div>Reza sent messages to you</div>
                <small class="text-muted">12 minutes ago</small>
              </div>
            </div>
            <div class="notification-item">
              <i class="bi bi-heart text-danger"></i>
              <div>
                <div>Farrah liked Admin</div>
                <small class="text-muted">17 minutes ago</small>
              </div>
            </div>
            <div class="notification-footer">
              <a href="#">See all notifications</a>
            </div>
          </div>
        </div>

   <!-- User Profile Dropdown for Dashboard --> 
   <div class="user-profile dropdown me-5">
    @auth('administrator')
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="{{ Auth::guard('administrator')->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px;">
            <div class="user-info ms-2">
                <div class="name d-flex align-items-center">
                    <div class="status-indicator"></div>
                    {{ Auth::guard('administrator')->user()->name }}
                </div>
                <div class="title">
                    {{ ucfirst(Auth::guard('administrator')->user()->role) }}
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">Logout</button>
                </form>
            </li>
        </ul>
    @endauth
</div>

</div>
</div>
</div>


    <div class="main-content" id="mainContent">
  <h2>Dashboard</h2>
  
  <!-- Statistics Section -->
  <div class="row mt-4">
  <div class="col-md-3">
    <div class="card stat-card-green">
      <h5>Voters</h5>
      <h3>0</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card stat-card-green">
      <h5>Subscribers</h5>
      <h3>1,303</h3>
    </div>
  </div>
  <div class="col-md-3">
    <div class="card stat-card-green">
      <h5>Sales</h5>
      <h3>$1,345</h3>
    </div>
  </div>
</div>




  


@include('components.loader') <!-- Include the loader here -->
  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Prevent back button after logout
        (function () {
            window.history.forward();
        })();

        window.onunload = function () { null };
    </script>
  </body>
  </html>
