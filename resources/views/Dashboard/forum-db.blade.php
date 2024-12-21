<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Forum Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

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
    use App\Models\ForumPost;

    // Palitan ang ->get() ng ->paginate() para sa pagination
    $pendingPosts = ForumPost::where('status', 'pending')
                        ->with(['user', 'comments', 'reactions'])
                        ->paginate(10, ['*'], 'pending_page');

    $approvedPosts = ForumPost::where('status', 'approved')
                         ->with(['user', 'comments', 'reactions'])
                         ->paginate(10, ['*'], 'approved_page');

    $totalPosts = ForumPost::count();
    $approvedCount = ForumPost::where('status', 'approved')->count();
    $pendingCount = ForumPost::where('status', 'pending')->count();
    $deniedCount = ForumPost::where('status', 'denied')->count();
@endphp

<div class="main-content p-4" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Forum Dashboard</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistics Section -->
    <div class="row mt-4">
        <!-- Total Posts -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                    <i class="fas fa-clipboard-list fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Posts</h6>
                    <h4 class="mb-0">{{ $totalPosts }}</h4>
                </div>
            </div>
        </div>

        <!-- Approved Posts -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                    <i class="fas fa-check-circle fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Approved Posts</h6>
                    <h4 class="mb-0">{{ $approvedCount }}</h4>
                </div>
            </div>
        </div>

        <!-- Pending Posts -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                    <i class="fas fa-hourglass-half fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Pending Posts</h6>
                    <h4 class="mb-0">{{ $pendingCount }}</h4>
                </div>
            </div>
        </div>

        <!-- Denied Posts -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                    <i class="fas fa-times-circle fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Denied Posts</h6>
                    <h4 class="mb-0">{{ $deniedCount }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Post Table -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 style="margin: 0;">Pending Posts</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th style="background-color: #D3D3D3; color: black;">Id</th>
                                   <th style="background-color: #D3D3D3; color: black;">User Email</th>
                                   <th style="background-color: #D3D3D3; color: black;">Title</th>
                                   <th style="background-color: #D3D3D3; color: black;">Content</th>
                                   <th style="background-color: #D3D3D3; color: black;">Date</th>
                                   <th style="background-color: #D3D3D3; color: black;">Actions</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse($pendingPosts as $post)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td>{{ $post->user->email ?? 'N/A' }}</td>
                                       <td>{{ $post->title }}</td>
                                       <td>{{ Str::limit($post->content, 50) }}</td>
                                       <td>{{ $post->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
                                       <td>
                                           <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $post->id }}">
                                               View
                                           </button>
                                           <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approveModal{{ $post->id }}">
                                               Approve
                                           </button>
                                           <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#denyModal{{ $post->id }}">
                                               Deny
                                           </button>
                                       </td>
                                   </tr>

                                   <!-- View Modal -->
                                   <div class="modal fade" id="viewModal{{ $post->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $post->id }}" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="viewModalLabel{{ $post->id }}">Post Details</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <p><strong>#:</strong> {{ $loop->iteration }}</p>
                                                   <p><strong>User Email:</strong> {{ $post->user->email ?? 'N/A' }}</p>
                                                   <p><strong>Title:</strong> {{ $post->title }}</p>
                                                   <p><strong>Content:</strong> {{ $post->content }}</p>
                                                   <p><strong>Date:</strong> {{ $post->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</p>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <!-- Approve Modal -->
                                   <div class="modal fade" id="approveModal{{ $post->id }}" tabindex="-1" aria-labelledby="approveModalLabel{{ $post->id }}" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="approveModalLabel{{ $post->id }}">Confirm Approval</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   Are you sure you want to approve this post?
                                               </div>
                                               <div class="modal-footer">
                                                   <form method="POST" action="{{ route('approvePost', $post->id) }}">
                                                       @csrf
                                                       @method('PUT')
                                                       <button type="submit" class="btn btn-success">Approve</button>
                                                   </form>
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <!-- Deny Modal -->
                                   <div class="modal fade" id="denyModal{{ $post->id }}" tabindex="-1" aria-labelledby="denyModalLabel{{ $post->id }}" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="denyModalLabel{{ $post->id }}">Confirm Denial</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   Are you sure you want to deny this post?
                                               </div>
                                               <div class="modal-footer">
                                                   <form method="POST" action="{{ route('denyPost', $post->id) }}">
                                                       @csrf
                                                       @method('PUT')
                                                       <button type="submit" class="btn btn-warning">Deny</button>
                                                   </form>
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               @empty
                                   <tr>
                                       <td colspan="6" class="text-center">No pending posts available.</td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>
                    </div>

                    <!-- Pagination para sa Pending Posts -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>
                            Showing {{ $pendingPosts->firstItem() }} 
                            to {{ $pendingPosts->lastItem() }} 
                            of {{ $pendingPosts->total() }} results
                        </p>
                        {{ $pendingPosts->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Approved Post Table -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <!-- Card Header -->
                <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 style="margin: 0;">Approved Posts</h5>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                       <table class="table table-bordered table-hover" style="table-layout: fixed; width: 100%;">
                           <thead>
                               <tr>
                                   <th style="background-color: #D3D3D3; color: black; width: 50px;">Id</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 150px;">User Email</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 150px;">Title</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 300px;">Content</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 150px;">Date</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 100px;">Reactions</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 100px;">Comments</th>
                                   <th style="background-color: #D3D3D3; color: black; width: 150px;">Actions</th>
                               </tr>
                           </thead>
                           <tbody>
                               @forelse($approvedPosts as $post)
                                   <tr>
                                       <td>{{ $loop->iteration }}</td>
                                       <td style="word-wrap: break-word;">{{ $post->user->email ?? 'N/A' }}</td>
                                       <td style="word-wrap: break-word;">{{ $post->title }}</td>
                                       <td style="word-wrap: break-word;">{{ Str::limit($post->content, 50) }}</td>
                                       <td>{{ $post->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</td>
                                       <td>
                                           <i class="fas fa-thumbs-up"></i> {{ $post->reactions->where('type', 'like')->count() }} |
                                           <i class="fas fa-thumbs-down"></i> {{ $post->reactions->where('type', 'unlike')->count() }}
                                       </td>
                                       <td>{{ $post->comments->count() }}</td>
                                       <td>
                                           <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $post->id }}">
                                               View
                                           </button>
                                           <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">
                                               Delete
                                           </button>
                                       </td>
                                   </tr>

                                   <!-- View Modal for Approved Posts -->
                                   <div class="modal fade" id="viewModal{{ $post->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $post->id }}" aria-hidden="true">
                                       <div class="modal-dialog modal-lg">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="viewModalLabel{{ $post->id }}">Post Details</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   <p><strong>#:</strong> {{ $loop->iteration }}</p>
                                                   <p><strong>User Email:</strong> {{ $post->user->email ?? 'N/A' }}</p>
                                                   <p><strong>Title:</strong> {{ $post->title }}</p>
                                                   <p><strong>Content:</strong> {{ $post->content }}</p>
                                                   <p><strong>Date:</strong> {{ $post->created_at->timezone('Asia/Manila')->format('M d, Y h:i A') }}</p>
                                                   <p><strong>Reactions:</strong> 
                                                       <i class="fas fa-thumbs-up"></i> {{ $post->reactions->where('type', 'like')->count() }} |
                                                       <i class="fas fa-thumbs-down"></i> {{ $post->reactions->where('type', 'unlike')->count() }}
                                                   </p>
                                                   <p><strong>Comments:</strong></p>
                                                   <ul>
                                                       @forelse($post->comments as $comment)
                                                           <li><strong>{{ $comment->user->name ?? 'User' }}:</strong> {{ $comment->content }}</li>
                                                       @empty
                                                           <li>No comments available.</li>
                                                       @endforelse
                                                   </ul>
                                               </div>
                                               <div class="modal-footer">
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>

                                   <!-- Delete Modal -->
                                   <div class="modal fade" id="deleteModal{{ $post->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $post->id }}" aria-hidden="true">
                                       <div class="modal-dialog">
                                           <div class="modal-content">
                                               <div class="modal-header">
                                                   <h5 class="modal-title" id="deleteModalLabel{{ $post->id }}">Confirm Deletion</h5>
                                                   <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                               </div>
                                               <div class="modal-body">
                                                   Are you sure you want to delete this post?
                                               </div>
                                               <div class="modal-footer">
                                                   <form method="POST" action="{{ route('deletePost', $post->id) }}">
                                                       @csrf
                                                       @method('DELETE')
                                                       <button type="submit" class="btn btn-danger">Delete</button>
                                                   </form>
                                                   <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               @empty
                                   <tr>
                                       <td colspan="8" class="text-center">No approved posts available.</td>
                                   </tr>
                               @endforelse
                           </tbody>
                       </table>
                    </div>

                    <!-- Pagination para sa Approved Posts -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>
                            Showing {{ $approvedPosts->firstItem() }} 
                            to {{ $approvedPosts->lastItem() }} 
                            of {{ $approvedPosts->total() }} results
                        </p>
                        {{ $approvedPosts->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
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
