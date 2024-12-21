<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Tabulation Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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
    <li><a href="{{ route('tabulations.dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
    <div class="management-title">Management</div>
    <li><a href="{{ route('tabulations.register-judge') }}" class="nav-link"><i class="bi bi-person-badge"></i> <span>Register Judge</span></a></li>
    <li><a href="{{ route('tabulations.event-title') }}" class="nav-link"><i class="bi bi-calendar-event"></i> <span>Event Title</span></a></li>
    <li><a href="{{ route('tabulations.criteria') }}" class="nav-link"><i class="bi bi-list-check"></i> <span>Criteria</span></a></li>
    <li><a href="{{ route('tabulations.participants') }}" class="nav-link"><i class="bi bi-people"></i> <span>Participants</span></a></li>
    <li><a href="{{ route('tabulations.category') }}" class="nav-link"><i class="bi bi-tags"></i> <span>Category</span></a></li>
    <li><a href="{{ route('tabulations.final-results') }}" class="nav-link"><i class="bi bi-trophy"></i> <span>Final Results</span></a></li>
</ul>

</div>


    <!-- Header -->
    <div class="header" id="header">
      <!-- Left Section: Toggle Button and Search Bar -->
      <div class="left-section">
        
      </div>

      


<div class="user-profile dropdown me-5">
    @auth('tabulation')
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
           id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Admin Icon -->
            <i class="fas fa-user-shield admin-icon"></i>
            <!-- Avatar and Info -->
            <img src="{{ Auth::guard('tabulation')->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="User Avatar">
            <div class="user-info">
                <div class="name">{{ Auth::guard('tabulation')->user()->name }}</div>
                <div class="status">
                    <i class="fas fa-circle"></i> Online
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
                <form id="logout-form" action="{{ route('tabulations.logout') }}" method="POST">
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

<!-- resources/views/tabulation-db.blade.php -->

   <!-- resources/views/tabulation-db.blade.php -->

<!-- resources/views/tabulation-db.blade.php -->

{{-- resources/views/tabulation-db.blade.php --}}
{{-- Example: resources/views/tabulation-dashboard.blade.php --}}

{{-- Example: resources/views/tabulation-dashboard.blade.php --}}

@php
    use App\Models\Pageant;
    use App\Models\Judge;
    use App\Models\Category;
    use App\Models\Participant;
    use App\Models\Criteria;

    // Retrieve counts for statistics
    $totalPageants      = Pageant::count();
    $totalJudges        = Judge::count();
    $totalCriteria      = Criteria::count();
    $totalParticipants  = Participant::count();
    $totalCategories    = Category::count();

    // PAGINATE each table
    // Judges
    $judges = Judge::with('pageants')
        ->orderBy('id')
        ->paginate(10);

    // Pageants
    $pageants = Pageant::with('judges')
        ->orderBy('id')
        ->paginate(10);

    // Categories (with their criteria)
    $categories = Category::with(['pageant', 'criteria'])
        ->orderBy('id')
        ->paginate(10);

    // Participants
    $participants = Participant::with('pageant')
        ->orderBy('id')
        ->paginate(10);

         // Managed Pageants for the new table
    $managedPageants = Pageant::orderBy('id', 'desc')->paginate(10);


       // Additional statistics for Approved and Denied Events
       $approvedPageants   = Pageant::where('status', 'approved')->count();
    $deniedPageants     = Pageant::where('status', 'denied')->count();
@endphp

<div class="main-content p-4" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Tabulation Dashboard</h2>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Error Message -->
    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Statistics Section -->
    <div class="row mt-4">
        <!-- Total Judges -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-user-check fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Judges</h6>
                    <h4 class="mb-0">{{ $totalJudges }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Pageants -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-award fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Event</h6>
                    <h4 class="mb-0">{{ $totalPageants }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Criteria -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-info text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-list fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Criteria</h6>
                    <h4 class="mb-0">{{ $totalCriteria }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Categories -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-tags fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Categories</h6>
                    <h4 class="mb-0">{{ $totalCategories }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Participants -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Participant</h6>
                    <h4 class="mb-0">{{ $totalParticipants }}</h4>
                </div>
            </div>
        </div>
       
        <!-- Approved Event -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-check-circle fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Approved Event</h6>
                    <h4 class="mb-0">{{ $approvedPageants }}</h4>
                </div>
            </div>
        </div>
        <!-- Denied Event -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded"
                     style="width: 60px; height: 60px;">
                    <i class="fas fa-times-circle fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Denied Event</h6>
                    <h4 class="mb-0">{{ $deniedPageants }}</h4>
                </div>
            </div>
        </div>
    </div>


   

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>





<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





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
