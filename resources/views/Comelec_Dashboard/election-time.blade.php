<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Time Setting Dashboard</title>
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
    <li><a href="{{ route('comelec.dashboard') }}" class="nav-link active"><i class="bi bi-speedometer2"></i> <span>Dashboard</span></a></li>
    <div class="management-title">Management</div>
    <li><a href="{{ route('comelec.election-time') }}" class="nav-link"><i class="bi bi-clock"></i> <span>Time Setting</span></a></li>
    <li><a href="{{ route('comelec.election-voters') }}" class="nav-link"><i class="bi bi-people"></i> <span>Voters</span></a></li>
    <li><a href="{{ route('comelec.election-votes') }}" class="nav-link"><i class="bi bi-bar-chart"></i> <span>Votes</span></a></li>
    <li><a href="{{ route('comelec.election-positions') }}" class="nav-link"><i class="bi bi-briefcase"></i> <span>Position</span></a></li>
    <li><a href="{{ route('comelec.election-candidates') }}" class="nav-link"><i class="bi bi-person-badge"></i> <span>Candidates</span></a></li>
    <li><a href="{{ route('comelec.election-profile') }}" class="nav-link"><i class="bi bi-image"></i> <span>Platforms</span></a></li>
</ul>


</div>


    <!-- Header -->
    <div class="header" id="header">
      <!-- Left Section: Toggle Button and Search Bar -->
      <div class="left-section">
        
      </div>

      


<div class="user-profile dropdown me-5">
    @auth('comelec')
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
           id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <!-- Admin Icon -->
            <i class="fas fa-user-shield admin-icon"></i>
            <!-- Avatar and Info -->
            <img src="{{ Auth::guard('comelec')->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="User Avatar">
            <div class="user-info">
                <div class="name">{{ Auth::guard('comelec')->user()->name }}</div>
                <div class="status">
                    <i class="fas fa-circle"></i> Online
                </div>
            </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li>
                <form id="logout-form" action="{{ route('comelec.logout') }}" method="POST">
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



<div class="main-content p-4" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Time Setting Management</h2>

@php
    use App\Models\ElectionSetting;
    use Carbon\Carbon;

    $electionSetting = ElectionSetting::first();
    $currentTime = Carbon::now();
    $status = 'Not Set';

    if ($electionSetting && $electionSetting->start_time && $electionSetting->end_time) {
        $startTime = Carbon::parse($electionSetting->start_time);
        $endTime = Carbon::parse($electionSetting->end_time);

        if ($currentTime->lt($startTime)) {
            $status = 'Not Started';
        } elseif ($currentTime->between($startTime, $endTime)) {
            $status = 'Ongoing';
        } elseif ($currentTime->gt($endTime)) {
            $status = 'Ended';
        }
    }
@endphp

<!-- Display Validation Errors -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Display Success Message -->
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<!-- Display Error Message -->
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="container">
    <h2 class="text-center my-4">Election Time Setting</h2>

    <!-- Display current election settings -->
    @if($electionSetting)
        <div class="card mb-4">
            <div class="card-header bg-info text-white d-flex justify-content-between align-items-center">
                <h5>Current Election Times</h5>
                <span class="badge 
                    {{ $status === 'Not Started' ? 'bg-warning' : '' }}
                    {{ $status === 'Ongoing' ? 'bg-success' : '' }}
                    {{ $status === 'Ended' ? 'bg-danger' : '' }}">
                    {{ $status }}
                </span>
            </div>
            <div class="card-body">
                <p><strong>Start Time:</strong> 
                    {{ $electionSetting->start_time ? Carbon::parse($electionSetting->start_time)->format('F j, Y, g:i a') : 'Not Set' }}
                </p>
                <p><strong>End Time:</strong> 
                    {{ $electionSetting->end_time ? Carbon::parse($electionSetting->end_time)->format('F j, Y, g:i a') : 'Not Set' }}
                </p>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            <strong>Notice:</strong> Election settings are not configured.
        </div>
    @endif

    <!-- Form to set election times -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Set Election Times</h5>
            <form action="{{ route('election.resetTimes') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Reset Times</button>
            </form>
        </div>
        <div class="card-body">
            <form action="{{ route('election.updateTimes') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="start_time" class="form-label">Start Time</label>
                    <input 
                        type="datetime-local" 
                        name="start_time" 
                        id="start_time" 
                        class="form-control" 
                        value="{{ $electionSetting && $electionSetting->start_time ? Carbon::parse($electionSetting->start_time)->format('Y-m-d\\TH:i') : '' }}" 
                        required
                    >
                </div>
                <div class="mb-3">
                    <label for="end_time" class="form-label">End Time</label>
                    <input 
                        type="datetime-local" 
                        name="end_time" 
                        id="end_time" 
                        class="form-control" 
                        value="{{ $electionSetting && $electionSetting->end_time ? Carbon::parse($electionSetting->end_time)->format('Y-m-d\\TH:i') : '' }}" 
                        required
                    >
                </div>
                <button type="submit" class="btn btn-success">Update Times</button>
            </form>
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
