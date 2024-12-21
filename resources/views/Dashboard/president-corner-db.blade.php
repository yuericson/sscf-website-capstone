<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">
  <title>Super Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
    rel="stylesheet">

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
      border: none;
      /* Remove any underline or border */
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

    .table-bordered th,
    .table-bordered td {
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
      background-color: #28a745;
      /* Green color */
      border-radius: 50%;
      margin-right: 5px;
      /* Positioned to the left of the name */
    }

    /* Custom CSS to Adjust Dropdown Icon Spacing */
    .user-profile.dropdown .dropdown-toggle::after {
      margin-left: 10px;
      /* Adjust this value as needed for spacing */
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
      background-color: #28a745;
      /* Bootstrap Success Green */
      color: #ffffff;
      /* White text for contrast */
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
      <li><a href="{{ route('dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i>
          <span>Dashboard</span></a></li>
      <div class="management-title">Management</div>

      <li><a href="{{ route('academic-resources-db') }}" class="nav-link"><i class="bi bi-book"></i> <span>Academic
            Resources</span></a></li>
      <li><a href="{{ route('latest-news-db') }}" class="nav-link"><i class="bi bi-newspaper"></i> <span>Latest
            News</span></a></li>
      <li><a href="{{ route('media-gallery-db') }}" class="nav-link"><i class="bi bi-images"></i> <span>Media
            Gallery</span></a></li>
      <li><a href="{{ route('press-releases-db') }}" class="nav-link"><i class="bi bi-megaphone"></i> <span>Press
            Releases</span></a></li>
      <li><a href="{{ route('president-corner-db') }}" class="nav-link"><i class="bi bi-person-circle"></i>
          <span>President's Corner</span></a></li>
      <li><a href="{{ route('volunteer-opportunities-db') }}" class="nav-link"><i class="bi bi-hand-thumbs-up"></i>
          <span>Volunteer Opportunities</span></a></li>
      <li><a href="{{ route('forum-db') }}" class="nav-link"><i class="bi bi-chat-left-dots"></i> <span>Forum</span></a>
      </li>
      <li><a href="{{ route('feedback-db') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i>
          <span>Feedback</span></a></li>
      <li><a href="{{ route('sports-registration-db') }}" class="nav-link"><i class="bi bi-trophy"></i> <span>Sports
            Registration</span></a></li>
      <li><a href="{{ route('local-election-db') }}" class="nav-link"><i class="bi bi-person-check"></i> <span>Local
            Election</span></a></li>
      <li><a href="{{ route('tabulation-db') }}" class="nav-link"><i class="bi bi-table"></i>
          <span>Tabulation</span></a></li>

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
        <a href="#" class="text-white position-relative" id="messageDropdown" data-bs-toggle="dropdown"
          aria-expanded="false">
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
        <a href="#" class="text-white position-relative" id="bellDropdown" data-bs-toggle="dropdown"
          aria-expanded="false">
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
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="userDropdown"
        data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{ Auth::guard('administrator')->user()->avatar ?? 'https://via.placeholder.com/40' }}"
        alt="User Avatar" class="rounded-circle" style="width: 40px; height: 40px;">
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
        <li><a class="dropdown-item" href="">Profile</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li>
        <hr class="dropdown-divider">
        </li>
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
    <h2>President Corner Dashboard</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @php
        $totalPosts = \App\Models\PresidentCorner::count();
        $latestPosts = \App\Models\PresidentCorner::latest()->take(5)->count();
        $oldPosts = $totalPosts - $latestPosts;
        $posts = \App\Models\PresidentCorner::orderBy('id')->paginate(10); // Paginated 10 posts per page
    @endphp

    <!-- Statistics Section -->
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="card stat-card-green">
                <h5>Total Posts</h5>
                <h3>{{ $totalPosts }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card-green">
                <h5>Latest Posts</h5>
                <h3>{{ $latestPosts }}</h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stat-card-green">
                <h5>Old Posts</h5>
                <h3>{{ $oldPosts }}</h3>
            </div>
        </div>
    </div>

<!-- Add New Post Form -->
<div class="row mt-5">
    <div class="col-md-9">
        <div class="card" style="border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
            <div class="card-header bg-primary text-white text-center" style="border-radius: 1px 1px 0 0;">
                <h4 class="mb-0">Add New Post</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('dashboard.president-corner.add') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="form-label fw-semibold">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="Enter post title" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="form-label fw-semibold">Content</label>
                        <textarea class="form-control" id="content" name="content" rows="5" placeholder="Write your content here" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="form-label fw-semibold">Image</label>
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5" style="background-color: #007bff; border-color: #007bff; border-radius: 25px;">Add Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Search and Filter Section -->
<div class="row mt-5 mb-3" style="background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
    <div class="col-md-6">
        <!-- Filter -->
        <div class="d-flex align-items-center">
            <label for="filter" class="me-2 mb-0 fw-semibold">Filter by:</label>
            <select class="form-select" id="filter" onchange="applyFilter()" style="width: auto;">
                <option value="all">All</option>
                <option value="latest">Latest Posts</option>
                <option value="old">Old Posts</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <!-- Search -->
        <div class="d-flex align-items-center justify-content-end">
            <label for="search" class="me-2 mb-0 fw-semibold">Search:</label>
            <input type="text" id="search" class="form-control" placeholder="Search posts..." onkeyup="searchPosts()" style="width: 60%;">
        </div>
    </div>
</div>


    <!-- Posts Table -->
    <div class="row">
        <div class="col-12">
            <h4>All Posts</h4>
            <table class="table table-bordered" id="postsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="postsTableBody">
                    @if ($posts->count() > 0)
                        @foreach ($posts as $post)
                            <tr data-category="{{ $loop->iteration <= $latestPosts ? 'latest' : 'old' }}">
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($post->content, 50) }}</td>
                                <td>
                                    @if ($post->image)
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="50">
                                    @else
                                        N/A
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $post->id }}">Edit</button>
                                    <form action="{{ route('dashboard.president-corner.delete', $post->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center" style="color: red; font-weight: bold;">No posts found.</td>
                        </tr>
                    @endif
                </tbody>
            </table>

            <!-- Pagination Details -->
            @if ($posts->count() > 0)
                <div class="d-flex justify-content-between align-items-center mt-3">
                    <p>Showing {{ $posts->firstItem() }} to {{ $posts->lastItem() }} of {{ $posts->total() }} results</p>
                    {{ $posts->onEachSide(1)->links('pagination::bootstrap-4') }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
    function searchPosts() {
        const searchInput = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#postsTableBody tr');

        rows.forEach(row => {
            const title = row.children[1].innerText.toLowerCase();
            const content = row.children[2].innerText.toLowerCase();
            if (title.includes(searchInput) || content.includes(searchInput)) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    function applyFilter() {
        const filterValue = document.getElementById('filter').value;
        const rows = document.querySelectorAll('#postsTableBody tr');

        rows.forEach(row => {
            const category = row.getAttribute('data-category');
            if (filterValue === 'all' || category === filterValue) {
                row.style.display = '';
            } else {
                row.style.display = 'none';
            }
        });
    }

    document.addEventListener('DOMContentLoaded', () => {
        const addPaginationListeners = () => {
            const paginationLinks = document.querySelectorAll('.pagination a');
            paginationLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const url = this.href;
                    fetch(url)
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newTable = doc.querySelector('#postsTable');
                            const newPagination = doc.querySelector('.pagination');
                            
                            document.querySelector('#postsTable').innerHTML = newTable.innerHTML;
                            document.querySelector('.pagination').innerHTML = newPagination.innerHTML;

                            // Re-add listeners after content is replaced
                            addPaginationListeners();

                            // Smooth scroll to the table
                            document.getElementById('postsTable').scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        });
                });
            });
        };

        // Add initial listeners
        addPaginationListeners();
    });
</script>








  @include('components.loader') <!-- Include the loader here -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
 
</body>

</html>