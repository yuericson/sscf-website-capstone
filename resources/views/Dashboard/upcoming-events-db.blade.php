<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Upcoming Events Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    
<!-- Add Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

<style>
/* Dropdown Toggle Styling */
.user-profile .dropdown-toggle {
    display: flex;
    align-items: center;
    padding: 5px 10px;
    border-radius: 8px;
    transition: background-color 0.3s ease;
}
.user-profile .dropdown-toggle:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Admin Icon Styling */
.admin-icon {
    font-size: 1.5rem;
    margin-right: 10px;
    color: #fff;
}

/* Avatar Styling */
.user-profile img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
}

/* User Info Styling */
.user-info {
    margin-left: 10px;
    color: #fff;
}
.user-info .name {
    font-weight: bold;
    font-size: 1rem;
}
.user-info .status {
    display: flex;
    align-items: center;
    font-size: 0.85rem;
    color: #ddd;
    margin-top: 2px;
}
.user-info .status i {
    color: #28a745; /* Green for online status */
    margin-right: 5px;
}

/* Dropdown Menu Styling */
.dropdown-menu {
    min-width: 180px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}
.dropdown-item {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    transition: background-color 0.2s ease, color 0.2s ease;
}
.dropdown-item i {
    width: 20px;
    margin-right: 10px;
    color: #555;
}
.dropdown-item:hover {
    background-color: #f0f0f0; /* Light gray hover color */
    color: #000; /* Text turns black on hover */
}
</style>

    
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
      height: 100%; /* Dynamic height to fit content */
      min-height: 100vh; /* Ensures full viewport height */
      position: fixed;
      top: 0;
      left: 0;
      background-color: #185F43;
      color: #fff;
      display: flex;
      flex-direction: column;
      transition: width 0.3s ease;
      overflow-y: auto; /* Enables scrolling for overflow */
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar .logo {
      padding: 10px;
      font-size: 1.5rem;
      font-weight: bold;
      color: #fff;
      margin-top: 5px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-left: 35px;
    }

    .sidebar.collapsed .logo span {
      display: none;
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
      border-radius: 8px;
      text-decoration: none;
      transition: background-color 0.3s, color 0.3s, justify-content 0.3s;
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

    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .header {
        left: 0;
      }

      .sidebar {
        position: absolute;
        z-index: 1001;
        height: 100%; /* Allow dynamic height */
      }

      .main-content {
        margin-left: 0;
      }

      .header.collapsed {
        left: 0;
      }
    }
  </style>
  </head>
  <body>

   <!-- Sidebar -->
<div class="sidebar" id="sidebar">
<div class="logo d-flex justify-content-between align-items-center">
  <span class="logo-text">S S C F</span>
  <i class="bi bi-list toggle-btn" id="toggleBtn" style="cursor: pointer;"></i>
</div>
<style>
  /* Style for the logo text */
.logo-text {
  font-family: 'Agatho', serif; /* Use Agatho font */
  font-size: 2rem; /* Adjust the size to match */
  font-weight: bold; /* Ensure bold appearance */
  letter-spacing: 0.2rem; /* Add spacing between letters */
  color:rgb(255, 255, 255); /* Set the desired color */
  transition: color 0.3s ease; /* Smooth hover transition */
}

/* Hover effect for the logo text */
.logo-text:hover {
  color: #0c3925; /* Slightly darker hover color */
}
</style>
  <ul class="nav flex-column mt-2">
    <li><a href="{{ route('dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
    <div class="management-title">Management</div>
    <li><a href="{{ route('academic-resources-db') }}" class="nav-link"><i class="bi bi-book"></i> <span>Academic Resources</span></a></li>
    <li><a href="{{ route('auditor-db') }}" class="nav-link"><i class="bi bi-calculator"></i> <span>Auditor</span></a></li>
    <li><a href="{{ route('latest-news-db') }}" class="nav-link"><i class="bi bi-newspaper"></i> <span>Latest News</span></a></li>
    <li><a href="{{ route('media-gallery-db') }}" class="nav-link"><i class="bi bi-images"></i> <span>Media Gallery</span></a></li>
    <li><a href="{{ route('press-releases-db') }}" class="nav-link"><i class="bi bi-megaphone"></i> <span>Press Releases</span></a></li>
    <li><a href="{{ route('president-corner-db') }}" class="nav-link"><i class="bi bi-person-circle"></i> <span>President's Corner</span></a></li>
    <li><a href="{{ route('upcoming-events-db') }}" class="nav-link"><i class="bi bi-calendar-event"></i> <span>Upcoming Events</span></a></li>
    <li><a href="{{ route('volunteer-opportunities-db') }}" class="nav-link"><i class="bi bi-hand-thumbs-up"></i> <span>Volunteer Opportunities</span></a></li>
    <li><a href="{{ route('forum-db') }}" class="nav-link"><i class="bi bi-chat-left-dots"></i> <span>Forum</span></a></li>
    <li><a href="{{ route('feedback-db') }}" class="nav-link"><i class="bi bi-box-arrow-in-right"></i> <span>Feedback</span></a></li>
    <li><a href="{{ route('sports-registration-db') }}" class="nav-link"><i class="bi bi-trophy"></i> <span>Sports Registration</span></a></li>

  </ul>
</div>


    <!-- Header -->
    <div class="header" id="header">
      <!-- Left Section: Toggle Button and Search Bar -->
      <div class="left-section">
        
      </div>


      


<div class="user-profile dropdown me-5">
    @auth('administrator')
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
           id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Admin Icon -->
            <i class="fas fa-user-shield admin-icon"></i>
            <!-- Avatar and Info -->
            <img src="{{ Auth::guard('administrator')->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="User Avatar">
            <div class="user-info">
                <div class="name">{{ Auth::guard('administrator')->user()->name }}</div>
                <div class="status">
                    <i class="fas fa-circle"></i> Online
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    @endauth
</div>




</div>
</div>
</div>




@php
    use App\Models\UpcomingEvent;

    $events = UpcomingEvent::orderBy('id')->paginate(10);
    $totalEvents = UpcomingEvent::count();
    $latestEvents = UpcomingEvent::latest()->take(5)->count();
    $oldEvents = $totalEvents - $latestEvents;
@endphp

<div class="main-content" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Upcoming Events Dashboard</h2>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Summary Statistics -->
    <div class="row mt-4 mb-4">
        <!-- Total Events -->
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-calendar-alt fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Events</h6>
                    <h4 class="mb-0">{{ $totalEvents }}</h4>
                </div>
            </div>
        </div>
        <!-- Latest Events -->
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-clock fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Latest Events</h6>
                    <h4 class="mb-0">{{ $latestEvents }}</h4>
                </div>
            </div>
        </div>
        <!-- Old Events -->
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-archive fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Old Events</h6>
                    <h4 class="mb-0">{{ $oldEvents }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Add New Event Form -->
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 class="mb-0">Add New Event</h5>
                </div>
                <div class="card-body" style="border: 1px solid #ccc; border-radius: 5px; padding: 20px; background-color: #f9f9f9;">
                    <form action="{{ route('dashboard.upcoming-events.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label"><strong>Title</strong></label>
                                <input type="text" name="title" id="title" class="form-control" placeholder="Enter event title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="image" class="form-label"><strong>Image</strong></label>
                                <input type="file" name="image" id="image" class="form-control">
                                <small class="text-muted">Upload an image (optional).</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label"><strong>Description</strong></label>
                                <textarea name="description" id="description" rows="5" class="form-control" placeholder="Enter event description..." required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Add Event</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Search and Filter Section (Optional Implementation) -->
    <!-- Similar to president corner if needed -->

    <!-- Events Table Card -->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 class="mb-0">All Events</h5>
                </div>
                <div class="card-body">
                    @if ($events->count() > 0)
                        <table class="table table-bordered" id="eventsTable">
                            <thead>
                                <tr>
                                    <th style="background-color: #D3D3D3; color: black; text-align: center;">ID</th>
                                    <th style="background-color: #D3D3D3; color: black;">Title</th>
                                    <th style="background-color: #D3D3D3; color: black;">Description</th>
                                    <th style="background-color: #D3D3D3; color: black; text-align: center;">Image</th>
                                    <th style="background-color: #D3D3D3; color: black; text-align: center;">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="eventsTableBody">
                                @foreach ($events as $event)
                                    <tr data-category="{{ $loop->iteration <= $latestEvents ? 'latest' : 'old' }}">
                                        <td style="text-align: center;">{{ $event->id }}</td>
                                        <td>{{ $event->title }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($event->description, 50) }}</td>
                                        <td style="text-align: center;">
                                            @if ($event->image)
                                                <img src="{{ asset('storage/' . $event->image) }}" alt="Event Image" width="50">
                                            @else
                                                N/A
                                            @endif
                                        </td>
                                        <td style="text-align: center;">
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $event->id }}">Edit</button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $event->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Pagination Details -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p>Showing {{ $events->firstItem() }} to {{ $events->lastItem() }} of {{ $events->total() }} results</p>
                            {{ $events->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                    @else
                        <p class="text-center mt-4">No events found.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modals for Editing and Deleting Events -->
    @if ($events->count() > 0)
        @foreach ($events as $event)
            <!-- Edit Modal -->
            <div class="modal fade" id="editModal{{ $event->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $event->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('dashboard.upcoming-events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel{{ $event->id }}">Edit Event</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                 <div class="mb-3">
                                    <label for="edit_title_{{ $event->id }}" class="form-label"><strong>Title</strong></label>
                                    <input type="text" name="title" id="edit_title_{{ $event->id }}" class="form-control" value="{{ $event->title }}" required>
                                 </div>
                                 <div class="mb-3">
                                    <label for="edit_description_{{ $event->id }}" class="form-label"><strong>Description</strong></label>
                                    <textarea name="description" id="edit_description_{{ $event->id }}" rows="5" class="form-control" required>{{ $event->description }}</textarea>
                                 </div>
                                 <div class="mb-3">
                                    <label for="edit_image_{{ $event->id }}" class="form-label"><strong>Image</strong></label>
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            @if($event->image)
                                                <small><strong>Current Image:</strong></small><br>
                                                <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" width="120" class="rounded border">
                                            @else
                                                <small><strong>No image available.</strong></small>
                                            @endif
                                        </div>
                                        <div>
                                            <input type="file" name="image" id="edit_image_{{ $event->id }}" class="form-control">
                                        </div>
                                    </div>
                                 </div>
                            </div>
                            <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                 <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Delete Modal -->
            <div class="modal fade" id="deleteModal{{ $event->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $event->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="{{ route('dashboard.upcoming-events.delete', $event->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title" id="deleteModalLabel{{ $event->id }}">Delete Event</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 Are you sure you want to delete <strong>{{ $event->title }}</strong>?
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                 <button type="submit" class="btn btn-danger">Delete</button>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
</div>

<script>
    // Similar search and filter JS logic as in president-corner-db.blade.php, 
    // but targeting the eventsTable and eventsTableBody if needed.
    // ...
</script>




  


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
