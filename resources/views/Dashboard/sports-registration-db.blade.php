<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Sports Registration Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
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

<div class="main-content" id="mainContent">
<h2 class="mb-4 border-bottom pb-2">Sports Registration Dashboard</h2>

    <!-- Flash Messages -->
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Statistics Section -->
    <div class="row mt-4">
        <!-- Total Registrations -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded-circle" style="width: 60px; height: 60px;">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Registrations</h6>
                    @php
                        $registrationsCount = DB::table('sports_registrations')->count();
                    @endphp
                    <h4 class="mb-0">{{ $registrationsCount }}</h4>
                </div>
            </div>
        </div>

        @php
            
            $registrationsByAge = DB::table('sports_registrations')
                ->select('age', DB::raw('count(*) as total'))
                ->groupBy('age')
                ->get();

            $registrationsByGender = DB::table('sports_registrations')
                ->select('gender', DB::raw('count(*) as total'))
                ->groupBy('gender')
                ->get();

            $registrationsByYearLevel = DB::table('sports_registrations')
                ->select('year_level', DB::raw('count(*) as total'))
                ->groupBy('year_level')
                ->get();

            $registrationsByCourse = DB::table('sports_registrations')
                ->select('course', DB::raw('count(*) as total'))
                ->groupBy('course')
                ->get();

            $registrationsByCollege = DB::table('sports_registrations')
                ->select('college_campus', DB::raw('count(*) as total'))
                ->groupBy('college_campus')
                ->get();

            $registrationsByEvent = DB::table('sports_registrations')
                ->select('sports_event', DB::raw('count(*) as total'))
                ->groupBy('sports_event')
                ->get();
        @endphp


<!-- ... Ang iba pang bahagi ng iyong HTML at chart initialization code ... -->


<!-- Print All Charts Section -->
<div class="row mt-3">
  <div class="col-md-12">
    <div class="d-flex justify-content-end" style="margin-bottom: -20px;">
      <button id="printAllChartsBtn" class="btn btn-secondary btn-sm" style="margin-right: 10px;">
        Print All Charts
      </button>
    </div>
  </div>
</div>


<script>
document.getElementById('printAllChartsBtn').addEventListener('click', function() {
    const canvases = document.querySelectorAll('canvas');
    let htmlContent = `
        <html>
            <head>
                <title>Print Charts</title>
                <style>
                    body { text-align: center; margin: 0; }
                    img { 
                        display: block; 
                        margin: 0 auto 20px; 
                        width: 50%; 
                        height: auto; 
                        page-break-inside: avoid; 
                    }
                </style>
            </head>
            <body>
    `;
    canvases.forEach(canvas => {
        const dataUrl = canvas.toDataURL('image/png');
        htmlContent += `<img src="${dataUrl}" alt="Chart Image" />`;
    });
    htmlContent += `
            </body>
        </html>
    `;
    const printWindow = window.open('', '_blank');
    printWindow.document.write(htmlContent);
    printWindow.document.close();
    printWindow.focus();
    printWindow.onload = function() {
        printWindow.print();
    };
});
</script>

   <!-- Visualization Section -->
<div class="row mt-4">
    <!-- Row 1: Age and Gender -->
    <div class="col-md-6 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by Age</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByAgeChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color:  #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by Sex</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByGenderChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Row 2: Year Level -->
<div class="row mt-4">
    <div class="col-md-6 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color:  #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by Year Level</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByYearLevelChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color:  #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by Sports Event</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByEventChart"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Row 3: Full-width Charts -->
<div class="row mt-4">
    <div class="col-md-12 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color: #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by Course</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByCourseChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-12 mb-4">
        <div class="card" style="height: 400px;">
            <div class="card-header" style="background-color:  #137547; color: white; padding: 10px;">
                <h5 class="mb-0">Registrations by College/Campus</h5>
            </div>
            <div class="card-body">
                <canvas id="registrationsByCollegeChart"></canvas>
            </div>
        </div>
    </div>
</div>



    <!-- Search and Filter Section -->
    <div class="row mt-5 mb-2" style="background-color: #f8f9fa; padding: 15px; border-radius: 5px;">
        <div class="col-md-6">
            <!-- Filter -->
            <div class="d-flex align-items-center">
                <label for="filter" class="me-2 mb-0 fw-semibold">Filter by:</label>
                <select class="form-select" id="filter" onchange="applyFilter()" style="width: auto;">
                    <option value="all">All</option>
                    <option value="latest">Latest Registrations</option>
                    <option value="old">Oldest Registrations</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <!-- Search -->
            <div class="d-flex align-items-center justify-content-end">
                <label for="search" class="me-2 mb-0 fw-semibold">Search:</label>
                <input type="text" id="search" class="form-control" placeholder="Search registrations..." onkeyup="searchRegistrations()" style="width: 60%;">
            </div>
        </div>
    </div>

   

 <!-- Print Modal -->
<div class="modal fade" id="printModal" tabindex="-1" aria-labelledby="printModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
       <div class="modal-header">
          <h5 class="modal-title" id="printModalLabel">Select the College/Campus to print</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
       </div>
       <div class="modal-body">
          <select id="campusSelect" class="form-select">
             <option value="" disabled selected>Select a College/Campus</option>
             <!-- Populate options from the DB -->
             @foreach(DB::table('sports_registrations')->distinct()->pluck('college_campus') as $campus)
                <option value="{{ $campus }}">{{ $campus }}</option>
             @endforeach
          </select>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary" id="confirmPrint">Print</button>
       </div>
    </div>
  </div>
</div>


    <!-- Bulk Upload Modal -->
    <div class="modal fade" id="bulkUploadModal" tabindex="-1">
        <div class="modal-dialog">
            <form action="{{ route('bulk.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Bulk Upload Registrations</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="csv_file" class="form-label">Upload CSV File</label>
                            <input type="file" name="csv_file" class="form-control" required>
                            <small class="text-muted">Ensure the file follows the template format.</small>
                        </div>
                        <div class="mb-3">
                            <a href="{{ route('registrations.downloadTemplate') }}" class="btn btn-secondary btn-sm">Download Template</a>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

   <!-- Add Registration Modal -->
<div class="modal fade" id="addRegistrationModal" tabindex="-1" aria-labelledby="addRegistrationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Using modal-lg for a larger form -->
    <div class="modal-content">
      <!-- This form does not include Auth checks and matches the new route -->
      <form action="{{ route('add.registration') }}" method="POST" enctype="multipart/form-data">
        @csrf <!-- CSRF token for security -->
        <div class="modal-header">
          <h5 class="modal-title" id="addRegistrationModalLabel">Add Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body">
          <!-- Full Name Field -->
          <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name" name="full_name" required>
          </div>
          
          <!-- Email Field -->
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          
          <!-- Age Field -->
          <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" class="form-control" id="age" name="age" required min="0" max="120">
          </div>
          
          <!-- Gender Dropdown -->
          <div class="mb-3">
            <label for="gender" class="form-label">Sex</label>
            <select class="form-select" id="gender" name="gender" required>
              <option value="">Select Sex</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          
          <!-- Year Level Dropdown -->
          <div class="mb-3">
            <label for="year_level" class="form-label">Year Level</label>
            <select class="form-select" id="year_level" name="year_level" required>
              <option value="">Select Year Level</option>
              <option value="First Year">First Year</option>
              <option value="Second Year">Second Year</option>
              <option value="Third Year">Third Year</option>
              <option value="Fourth Year">Fourth Year</option>
            </select>
          </div>
          
          <!-- Course Dropdown -->
          <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select class="form-select" id="course" name="course" required>
            <option value="">Select Course</option>
    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
    <option value="Bachelor of Science in Nursing">Bachelor of Science in Nursing</option>
    <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
    <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
    <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
    <option value="Bachelor of Science in Agriculture">Bachelor of Science in Agriculture</option>
    <option value="Bachelor of Science in Radiologic Technology">Bachelor of Science in Radiologic Technology</option>
    <option value="Bachelor of Science in Mechanical Engineering">Bachelor of Science in Mechanical Engineering</option>
    <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
    <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology">Bachelor of Science in Industrial Technology - Major in Computer Technology</option>
    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
    <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
    <option value="Bachelor of Science in Mathematics">Bachelor of Science in Mathematics</option>
    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
    <option value="Bachelor of Secondary Education - Major in Mathematics">Bachelor of Secondary Education - Major in Mathematics</option>
    <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
    <option value="Bachelor of Science in Electrical Engineering">Bachelor of Science in Electrical Engineering</option>
    <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
    <option value="Bachelor of Public Administration">Bachelor of Public Administration</option>
    <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
    <option value="Bachelor of Science in Industrial Engineering">Bachelor of Science in Industrial Engineering</option>
    <option value="Bachelor of Science in Forestry">Bachelor of Science in Forestry</option>
    <option value="Bachelor of Science in Computer Engineering">Bachelor of Science in Computer Engineering</option>
    <option value="Bachelor of Science in Radiologic Technology">Bachelor of Science in Radiologic Technology</option>
    <option value="Bachelor of Science in Mathematics">Bachelor of Science in Mathematics</option>
    <option value="Bachelor of Culture and Arts Education">Bachelor of Culture and Arts Education</option>
    <option value="Bachelor of Culture and Arts Education">Bachelor of Culture and Arts Education</option>
    <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
    <option value="Bachelor of Secondary Education Major in Mathematics">Bachelor of Secondary Education Major in Mathematics</option>
    <option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
    <option value="BSESS">BSESS</option>
    <option value="Bachelor of Secondary Education - Major in Science">Bachelor of Secondary Education - Major in Science</option>
    <option value="Bachelor of Secondary Education - Major in Social Studies">Bachelor of Secondary Education - Major in Social Studies</option>
    <option value="Bachelor of Secondary Education - Major in Mathematics">Bachelor of Secondary Education - Major in Mathematics</option>
    <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology">Bachelor of Science in Industrial Technology - Major in Computer Technology</option>
    <option value="Bachelor of Arts in Psychology">Bachelor of Arts in Psychology</option>
    <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
    <option value="Bachelor of Science in Hospitality Management">Bachelor of Science in Hospitality Management</option>
    <option value="Bachelor of Elementary Education - Major in General Education">Bachelor of Elementary Education - Major in General Education</option>
    <option value="Bachelor of Science in Biology">Bachelor of Science in Biology</option>
    <option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology">Bachelor of Science in Industrial Technology - Major in Mechanical Technology</option>
    <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
    <option value="Bachelor of Science in Agriculture - Major in Crop Science">Bachelor of Science in Agriculture - Major in Crop Science</option>
    <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option>
    <option value="Bachelor of Science in Business Administration - Major in Human Resource Management">Bachelor of Science in Business Administration - Major in Human Resource Management</option>
    <option value="Bachelor in Public Administration">Bachelor in Public Administration</option>
    <option value="Bachelor of Science in Industrial Technology">Bachelor of Science in Industrial Technology</option>
    <option value="Bachelor of Science in Electronics Engineering">Bachelor of Science in Electronics Engineering</option>
    <option value="Bachelor of Science in Civil Engineering">Bachelor of Science in Civil Engineering</option>
    <option value="Bachelor of Science in Agriculture - Major in Animal Science">Bachelor of Science in Agriculture - Major in Animal Science</option>
    <option value="Bachelor of Science in Industrial Technology Major in Computer Technology">Bachelor of Science in Industrial Technology Major in Computer Technology</option>
    <option value="Bachelor of Science in Agriculture - Major in Agronomy">Bachelor of Science in Agriculture - Major in Agronomy</option>
    <option value="Bachelor of Secondary Education - Major in Science">Bachelor of Secondary Education - Major in Science</option>
    <option value="Bachelor of Science in Forestry">Bachelor of Science in Forestry</option>
    <option value="Bachelor of Science in Industrial Technology major in Computer Technology">Bachelor of Science in Industrial Technology major in Computer Technology</option>
    <option value="Bachelor of Science Industrial Technology">Bachelor of Science Industrial Technology</option>
    <option value="Bachelor of Science in Industrial Technology - Major in Food Technology">Bachelor of Science in Industrial Technology - Major in Food Technology</option>
    <option value="Bachelor of science in industrial technology major in computer technology">Bachelor of science in industrial technology major in computer technology</option>
    <option value="Bachelor of Science in Business Administration - Major in Marketing Management">Bachelor of Science in Business Administration - Major in Marketing Management</option>
    <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
    <option value="Bachelor of Science in Agriculture - Major in Crop Science">Bachelor of Science in Agriculture - Major in Crop Science</option>
    <option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering">Bachelor of Science in Civil Engineering - Major in Structural Engineering</option>
    <option value="Bachelor of Science in Environmental Science">Bachelor of Science in Environmental Science</option>
    <option value="Bachelor of Arts in History">Bachelor of Arts in History</option>
    <option value="Bachelor of Science in Agriculture - Major in Animal Science">Bachelor of Science in Agriculture - Major in Animal Science</option>
    <option value="Bachelor of Science in Exercise and Sports Science">Bachelor of Science in Exercise and Sports Science</option>
    <option value="Bachelor of Science in Industrial Technology Major in Computer Technology">Bachelor of Science in Industrial Technology Major in Computer Technology</option>
    <option value="Bachelor of Arts in Communication">Bachelor of Arts in Communication</option>
    <option value="Bachelor of elementary education">Bachelor of elementary education</option>
    <option value="Bachelor in Industrial Technology - Major in Computer Technology">Bachelor in Industrial Technology - Major in Computer Technology</option>
    <option value="Bachelor of Industrial Technology - Major in Computer">Bachelor of Industrial Technology - Major in Computer</option>
    <option value="Bachelor of science in industrial technology">Bachelor of science in industrial technology</option>
    <option value="BACHELOR OF PUBLIC ADMINISTRATION">BACHELOR OF PUBLIC ADMINISTRATION</option>
    <option value="Bachelor of Science in Exercise and Sports Sciences">Bachelor of Science in Exercise and Sports Sciences</option>
    <option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering">Bachelor of Science in Civil Engineering - Major in Structural Engineering</option>
    <option value="Bachelor of Science in Industrial Technology Major in Electronics Technology">Bachelor of Science in Industrial Technology Major in Electronics Technology</option>
    <option value="Bachelor of Science in Business Administration Major in Marketing Management">Bachelor of Science in Business Administration Major in Marketing Management</option>
    <option value="Bachelor of Science in Agriculture - Animal Science">Bachelor of Science in Agriculture - Animal Science</option>
    <option value="Bachelor of Science in Agriculture- Major in Crop Science">Bachelor of Science in Agriculture- Major in Crop Science</option>
    <option value="Bachelor of Science in Business Administration - Major in Human Resources Management">Bachelor of Science in Business Administration - Major in Human Resources Management</option>
    <option value="Bachelor of science in hospitality management">Bachelor of science in hospitality management</option>
    <option value="Bachelor of Science in Business Administration - Major in Human Resource Management">Bachelor of Science in Business Administration - Major in Human Resource Management</option>
    <option value="BS Information Technology">BS Information Technology</option>
    <option value="Bachelor of Science Industrial Technology - Major in Electronics Technology">Bachelor of Science Industrial Technology - Major in Electronics Technology</option>
    <option value="Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching">Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching</option>
    <option value="Bachelor of Science in Business Administration - Major in Financial Management">Bachelor of Science in Business Administration - Major in Financial Management</option>
    <option value="Bachelor of Industrial Technology - Major in Mechanical Technology">Bachelor of Industrial Technology - Major in Mechanical Technology</option>
    <option value="Bachelor of Science in Business Administration Major in Human Resource Management">Bachelor of Science in Business Administration Major in Human Resource Management</option>
    <option value="Bachelor of Technology and Livelihood Education - Major in ICT">Bachelor of Technology and Livelihood Education - Major in ICT</option>
    <option value="Bachelor of Science Mechanical Engineering">Bachelor of Science Mechanical Engineering</option>
    <option value="Bachelor of Science in Business Administration Major in Human Resource Management">Bachelor of Science in Business Administration Major in Human Resource Management</option>
    <option value="Bachelor of Agriculture - Major in Animal Science">Bachelor of Agriculture - Major in Animal Science</option>
    <option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology">Bachelor of Science in Industrial Technology - Major in Mechanical Technology</option>
    <option value="Bachelor of Science - Major in Nursing">Bachelor of Science - Major in Nursing</option>
    <option value="Bachelor of Science in Agriculture-Major in Crop Science">Bachelor of Science in Agriculture-Major in Crop Science</option>
    <option value="Bachelor of Secondary Education - Major in Filipino">Bachelor of Secondary Education - Major in Filipino</option>
    <option value="BSIT-MT">BSIT-MT</option>
    <option value="BS Forestry">BS Forestry</option>
    <option value="Bachelor of science industrial technology">Bachelor of science industrial technology</option>
  </select>
          </div>
          
          <!-- College/Campus Dropdown -->
          <div class="mb-3">
            <label for="college_campus" class="form-label">College/Campus</label>
            <select class="form-select" id="college_campus" name="college_campus" required>
              <option value="">Select College/Campus</option>
              <option value="College of Allied and Medicine">College of Allied and Medicine</option>
              <option value="College of Administration, Business, and Accountancy">College of Administration, Business, and Accountancy</option>
              <option value="College of Teacher Education">College of Teacher Education</option>
              <option value="College of Arts and Sciences">College of Arts and Sciences</option>
              <option value="College of Engineering (CEn)">College of Engineering (CEn)</option>
              <option value="College of Industrial Technology">College of Industrial Technology</option>
              <option value="College of Agriculture (CAg)">College of Agriculture (CAg)</option>
              <option value="SLSU Lucena Campus">SLSU Lucena Campus</option>
              <option value="SLSU Alabat Campus">SLSU Alabat Campus</option>
              <option value="SLSU Tayabas Campus">SLSU Tayabas Campus</option>
              <option value="SLSU Gumaca Campus">SLSU Gumaca Campus</option>
              <option value="SLSU Catanauan Campus">SLSU Catanauan Campus</option>
              <option value="SLSU Tagkawayan Campus">SLSU Tagkawayan Campus</option>
              <option value="SLSU Polillo Campus">SLSU Polillo Campus</option>
              <option value="SLSU Infanta Campus">SLSU Infanta Campus</option>
              <option value="SLSU Tiaong Campus">SLSU Tiaong Campus</option>
              <!-- Add more college/campus options here if needed -->
            </select>
          </div>
          
          <!-- Sports Event Dropdown -->
          <div class="mb-3">
            <label for="sports_event" class="form-label">Sports Event</label>
            <select class="form-select" id="sports_event" name="sports_event" required>
              <option value="">Select Sports Event</option>
              <option value="Athletics">Athletics</option>
              <option value="Arnis">Arnis</option>
              <option value="Archery">Archery</option>
              <option value="Basketball">Basketball</option>
              <option value="Badminton">Badminton</option>
              <option value="Volleyball">Volleyball</option>
              <option value="Billiards">Billiards</option>
              <option value="Beach Volleyball">Beach Volleyball</option>
              <option value="Chess">Chess</option>
              <option value="Dancesport (Standard)">Dancesport (Standard)</option>
              <option value="E-Games ML">E-Games ML</option>
              <option value="Table Tennis">Table Tennis</option>
              <option value="Lawn Tennis">Lawn Tennis</option>
              <option value="Sepak Takraw">Sepak Takraw</option>
              <option value="Football">Football</option>
              <option value="Futsal">Futsal</option>
              <option value="Karatedo">Karatedo</option>
              <option value="Taekwondo">Taekwondo</option>
              <option value="Swimming">Swimming</option>
              <!-- Add more sports event options here if needed -->
            </select>
          </div>
          
          <!-- ID Number Field -->
          <div class="mb-3">
            <label for="id_number" class="form-label">ID Number</label>
            <input type="text" class="form-control" id="id_number" name="id_number" required>
          </div>
          
          <!-- Image Field -->
          <div class="mb-3">
            <label for="image" class="form-label">Image</label>
            <input type="file" class="form-control" id="image" name="image">
          </div>
        </div>
        
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Add Registration</button>
        </div>
      </form>
    </div>
  </div>
</div>


    <!-- Registration Management Section -->
    <div class="row mt-3">
      <div class="col-md-12">
      <div class="d-flex justify-content-end mb-2">
            <button type="button" class="btn btn-success btn-sm" style="margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#printModal">
                Print by College/Campus
            </button>
        </div>

        <div class="card">
          <!-- Card Header -->
          <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
            <h5 style="margin: 0; vertical-align: middle;">Registration Records</h5>
            <div>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addRegistrationModal">
                Add Registrations
              </button>
              <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">Bulk Upload</button>
            </div>
          </div>

          <div class="card-body">
            @php
              $registrations = DB::table('sports_registrations')->paginate(10);
            @endphp

            @if ($registrations->count() > 0)
            <div style="overflow-x: auto;">
              <table class="table table-bordered" id="registrationTable">
                <thead>
                  <tr>
                    <th style="background-color: #D3D3D3; color: black;">ID</th>
                    <th style="background-color: #D3D3D3; color: black;">Email</th>
                    <th style="background-color: #D3D3D3; color: black;">Full Name</th>
                    <th style="background-color: #D3D3D3; color: black;">Age</th>
                    <th style="background-color: #D3D3D3; color: black;">Sex</th>
                    <th style="background-color: #D3D3D3; color: black;">Year Level</th>
                    <th style="background-color: #D3D3D3; color: black;">Course</th>
                    <th style="background-color: #D3D3D3; color: black;">College/Campus</th>
                    <th style="background-color: #D3D3D3; color: black;">Sports Event</th>
                    <th style="background-color: #D3D3D3; color: black;">ID Number</th>
                    <th style="background-color: #D3D3D3; color: black;">Image</th>
                    <th style="background-color: #D3D3D3; color: black;">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($registrations as $registration)
                    <tr>
                      <td>{{ $registration->id }}</td>
                      <td>{{ $registration->email }}</td>
                      <td>{{ $registration->full_name }}</td>
                      <td>{{ $registration->age }}</td>
                      <td>{{ $registration->gender }}</td>
                      <td>{{ $registration->year_level }}</td>
                      <td>{{ $registration->course }}</td>
                      <td>{{ $registration->college_campus }}</td>
                      <td>{{ $registration->sports_event }}</td>
                      <td>{{ $registration->id_number }}</td>
                      <td>
                        @if($registration->image)
                          <img src="{{ asset('storage/' . $registration->image) }}" alt="User Image" style="width: 50px; height: 50px;">
                        @else
                          No Image
                        @endif
                      </td>
                      <td>
                      <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal{{ $registration->id }}">View</button>
                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $registration->id }}">Edit</button>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $registration->id }}">
  Delete
</button>

                       
                        </form>
                      </td>
                    </tr>


             <!-- Delete Confirmation Modal for Registration -->
<div class="modal fade" id="deleteModal{{ $registration->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $registration->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('delete.registration', $registration->id) }}" method="POST">
      @csrf
     
      <input type="hidden" name="_method" value="DELETE">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel{{ $registration->id }}">Delete Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete the registration of <strong>{{ $registration->full_name }}</strong>?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </div>
      </div>
    </form>
  </div>
</div>



                    <!-- View Modal for each registration -->
<div class="modal fade" id="viewModal{{ $registration->id }}" tabindex="-1" aria-labelledby="viewModalLabel{{ $registration->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewModalLabel{{ $registration->id }}">View Registration Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p><strong>ID:</strong> {{ $registration->id }}</p>
        <p><strong>Email:</strong> {{ $registration->email }}</p>
        <p><strong>Full Name:</strong> {{ $registration->full_name }}</p>
        <p><strong>Age:</strong> {{ $registration->age }}</p>
        <p><strong>Gender:</strong> {{ $registration->gender }}</p>
        <p><strong>Year Level:</strong> {{ $registration->year_level }}</p>
        <p><strong>Course:</strong> {{ $registration->course }}</p>
        <p><strong>College/Campus:</strong> {{ $registration->college_campus }}</p>
        <p><strong>Sports Event:</strong> {{ $registration->sports_event }}</p>
        <p><strong>ID Number:</strong> {{ $registration->id_number }}</p>
        <p><strong>Image:</strong><br>
          @if($registration->image)
            <img src="{{ asset('storage/' . $registration->image) }}" alt="User Image" style="width: 100px; height: 100px;">
          @else
            No Image
          @endif
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


                    <!-- Edit Modal for each registration -->
<div class="modal fade" id="editModal{{ $registration->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $registration->id }}" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('edit.registration', $registration->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="editModalLabel{{ $registration->id }}">Edit Registration</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Full Name Field -->
          <div class="mb-3">
            <label for="full_name_{{ $registration->id }}" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="full_name_{{ $registration->id }}" name="full_name" value="{{ $registration->full_name }}" required>
          </div>
          <!-- Age Field -->
          <div class="mb-3">
            <label for="age_{{ $registration->id }}" class="form-label">Age</label>
            <input type="number" class="form-control" id="age_{{ $registration->id }}" name="age" value="{{ $registration->age }}" required>
          </div>
          <!-- Gender Dropdown -->
          <div class="mb-3">
            <label for="gender_{{ $registration->id }}" class="form-label">Sex</label>
            <select class="form-select" id="gender_{{ $registration->id }}" name="gender" required>
              <option value="Male" {{ $registration->gender == 'Male' ? 'selected' : '' }}>Male</option>
              <option value="Female" {{ $registration->gender == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
          </div>
          <!-- Year Level Dropdown -->
          <div class="mb-3">
            <label for="year_level_{{ $registration->id }}" class="form-label">Year Level</label>
            <select class="form-select" id="year_level_{{ $registration->id }}" name="year_level" required>
              <option value="First Year" {{ $registration->year_level == 'First Year' ? 'selected' : '' }}>First Year</option>
              <option value="Second Year" {{ $registration->year_level == 'Second Year' ? 'selected' : '' }}>Second Year</option>
              <option value="Third Year" {{ $registration->year_level == 'Third Year' ? 'selected' : '' }}>Third Year</option>
              <option value="Fourth Year" {{ $registration->year_level == 'Fourth Year' ? 'selected' : '' }}>Fourth Year</option>
            </select>
          </div>
          <!-- Course Dropdown -->
          <div class="mb-3">
            <label for="course_{{ $registration->id }}" class="form-label">Course</label>
            <select class="form-select" id="course_{{ $registration->id }}" name="course" required>
            <option value="">Select Course</option>
  <option value="Bachelor of Science in Nursing" {{ $registration->course == 'Bachelor of Science in Nursing' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
  <option value="Bachelor of Elementary Education" {{ $registration->course == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
  <option value="Bachelor of Science in Nursing" {{ $registration->course == 'Bachelor of Science in Nursing' ? 'selected' : '' }}>Bachelor of Science in Nursing</option>
  <option value="Bachelor of Science in Agriculture" {{ $registration->course == 'Bachelor of Science in Agriculture' ? 'selected' : '' }}>Bachelor of Science in Agriculture</option>
  <option value="Bachelor of Science in Mechanical Engineering" {{ $registration->course == 'Bachelor of Science in Mechanical Engineering' ? 'selected' : '' }}>Bachelor of Science in Mechanical Engineering</option>
  <option value="Bachelor of Public Administration" {{ $registration->course == 'Bachelor of Public Administration' ? 'selected' : '' }}>Bachelor of Public Administration</option>
  <option value="Bachelor of Science in Agriculture" {{ $registration->course == 'Bachelor of Science in Agriculture' ? 'selected' : '' }}>Bachelor of Science in Agriculture</option>
  <option value="Bachelor of Science in Radiologic Technology" {{ $registration->course == 'Bachelor of Science in Radiologic Technology' ? 'selected' : '' }}>Bachelor of Science in Radiologic Technology</option>
  <option value="Bachelor of Science in Mechanical Engineering" {{ $registration->course == 'Bachelor of Science in Mechanical Engineering' ? 'selected' : '' }}>Bachelor of Science in Mechanical Engineering</option>
  <option value="Bachelor of Science in Electrical Engineering" {{ $registration->course == 'Bachelor of Science in Electrical Engineering' ? 'selected' : '' }}>Bachelor of Science in Electrical Engineering</option>
  <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology - Major in Computer Technology</option>
  <option value="Bachelor of Science in Hospitality Management" {{ $registration->course == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
  <option value="Bachelor of Science in Industrial Engineering" {{ $registration->course == 'Bachelor of Science in Industrial Engineering' ? 'selected' : '' }}>Bachelor of Science in Industrial Engineering</option>
  <option value="Bachelor of Science in Mathematics" {{ $registration->course == 'Bachelor of Science in Mathematics' ? 'selected' : '' }}>Bachelor of Science in Mathematics</option>
  <option value="Bachelor of Arts in Psychology" {{ $registration->course == 'Bachelor of Arts in Psychology' ? 'selected' : '' }}>Bachelor of Arts in Psychology</option>
  <option value="Bachelor of Secondary Education - Major in Mathematics" {{ $registration->course == 'Bachelor of Secondary Education - Major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Mathematics</option>
  <option value="Bachelor of Science in Information Technology" {{ $registration->course == 'Bachelor of Science in Information Technology' ? 'selected' : '' }}>Bachelor of Science in Information Technology</option>
  <option value="Bachelor of Science in Electrical Engineering" {{ $registration->course == 'Bachelor of Science in Electrical Engineering' ? 'selected' : '' }}>Bachelor of Science in Electrical Engineering</option>
  <option value="Bachelor of Arts in Communication" {{ $registration->course == 'Bachelor of Arts in Communication' ? 'selected' : '' }}>Bachelor of Arts in Communication</option>
  <option value="Bachelor of Public Administration" {{ $registration->course == 'Bachelor of Public Administration' ? 'selected' : '' }}>Bachelor of Public Administration</option>
  <option value="Bachelor of Science in Biology" {{ $registration->course == 'Bachelor of Science in Biology' ? 'selected' : '' }}>Bachelor of Science in Biology</option>
  <option value="Bachelor of Science in Industrial Engineering" {{ $registration->course == 'Bachelor of Science in Industrial Engineering' ? 'selected' : '' }}>Bachelor of Science in Industrial Engineering</option>
  <option value="Bachelor of Science in Forestry" {{ $registration->course == 'Bachelor of Science in Forestry' ? 'selected' : '' }}>Bachelor of Science in Forestry</option>
  <option value="Bachelor of Science in Computer Engineering" {{ $registration->course == 'Bachelor of Science in Computer Engineering' ? 'selected' : '' }}>Bachelor of Science in Computer Engineering</option>
  <option value="Bachelor of Science in Radiologic Technology" {{ $registration->course == 'Bachelor of Science in Radiologic Technology' ? 'selected' : '' }}>Bachelor of Science in Radiologic Technology</option>
  <option value="Bachelor of Science in Mathematics" {{ $registration->course == 'Bachelor of Science in Mathematics' ? 'selected' : '' }}>Bachelor of Science in Mathematics</option>
  <option value="Bachelor of Culture and Arts Education" {{ $registration->course == 'Bachelor of Culture and Arts Education' ? 'selected' : '' }}>Bachelor of Culture and Arts Education</option>
  <option value="Bachelor of Culture and Arts Education" {{ $registration->course == 'Bachelor of Culture and Arts Education' ? 'selected' : '' }}>Bachelor of Culture and Arts Education</option>
  <option value="Bachelor of Science in Electronics Engineering" {{ $registration->course == 'Bachelor of Science in Electronics Engineering' ? 'selected' : '' }}>Bachelor of Science in Electronics Engineering</option>
  <option value="Bachelor of Secondary Education Major in Mathematics" {{ $registration->course == 'Bachelor of Secondary Education Major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education Major in Mathematics</option>
  <option value="Bachelor of Science in Environmental Science" {{ $registration->course == 'Bachelor of Science in Environmental Science' ? 'selected' : '' }}>Bachelor of Science in Environmental Science</option>
  <option value="BSESS" {{ $registration->course == 'BSESS' ? 'selected' : '' }}>BSESS</option>
  <option value="Bachelor of Secondary Education - Major in Science" {{ $registration->course == 'Bachelor of Secondary Education - Major in Science' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Science</option>
  <option value="Bachelor of Secondary Education - Major in Social Studies" {{ $registration->course == 'Bachelor of Secondary Education - Major in Social Studies' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Social Studies</option>
  <option value="Bachelor of Secondary Education - Major in Mathematics" {{ $registration->course == 'Bachelor of Secondary Education - Major in Mathematics' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Mathematics</option>
  <option value="Bachelor of Science in Industrial Technology - Major in Computer Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology - Major in Computer Technology</option>
  <option value="Bachelor of Arts in Psychology" {{ $registration->course == 'Bachelor of Arts in Psychology' ? 'selected' : '' }}>Bachelor of Arts in Psychology</option>
  <option value="Bachelor of Elementary Education" {{ $registration->course == 'Bachelor of Elementary Education' ? 'selected' : '' }}>Bachelor of Elementary Education</option>
  <option value="Bachelor of Science in Hospitality Management" {{ $registration->course == 'Bachelor of Science in Hospitality Management' ? 'selected' : '' }}>Bachelor of Science in Hospitality Management</option>
  <option value="Bachelor of Elementary Education - Major in General Education" {{ $registration->course == 'Bachelor of Elementary Education - Major in General Education' ? 'selected' : '' }}>Bachelor of Elementary Education - Major in General Education</option>
  <option value="Bachelor of Science in Biology" {{ $registration->course == 'Bachelor of Science in Biology' ? 'selected' : '' }}>Bachelor of Science in Biology</option>
  <option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology - Major in Mechanical Technology</option>
  <option value="Bachelor of Science in Civil Engineering" {{ $registration->course == 'Bachelor of Science in Civil Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
  <option value="Bachelor of Science in Agriculture - Major in Crop Science" {{ $registration->course == 'Bachelor of Science in Agriculture - Major in Crop Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Major in Crop Science</option>
  <option value="Bachelor of Science in Industrial Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology</option>
  <option value="Bachelor of Science in Business Administration - Major in Human Resource Management" {{ $registration->course == 'Bachelor of Science in Business Administration - Major in Human Resource Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration - Major in Human Resource Management</option>
  <option value="Bachelor in Public Administration" {{ $registration->course == 'Bachelor in Public Administration' ? 'selected' : '' }}>Bachelor in Public Administration</option>
  <option value="Bachelor of Science in Industrial Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology</option>
  <option value="Bachelor of Science in Electronics Engineering" {{ $registration->course == 'Bachelor of Science in Electronics Engineering' ? 'selected' : '' }}>Bachelor of Science in Electronics Engineering</option>
  <option value="Bachelor of Science in Civil Engineering" {{ $registration->course == 'Bachelor of Science in Civil Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering</option>
  <option value="Bachelor of Science in Agriculture - Major in Animal Science" {{ $registration->course == 'Bachelor of Science in Agriculture - Major in Animal Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Major in Animal Science</option>
  <option value="Bachelor of Science in Industrial Technology Major in Computer Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology Major in Computer Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology Major in Computer Technology</option>
  <option value="Bachelor of Science in Agriculture - Major in Agronomy" {{ $registration->course == 'Bachelor of Science in Agriculture - Major in Agronomy' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Major in Agronomy</option>
  <option value="Bachelor of Secondary Education - Major in Science" {{ $registration->course == 'Bachelor of Secondary Education - Major in Science' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Science</option>
<option value="Bachelor of Science in Forestry" {{ $registration->course == 'Bachelor of Science in Forestry' ? 'selected' : '' }}>Bachelor of Science in Forestry</option>
<option value="Bachelor of Science in Industrial Technology major in Computer Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology major in Computer Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology major in Computer Technology</option>
<option value="Bachelor of Science Industrial Technology" {{ $registration->course == 'Bachelor of Science Industrial Technology' ? 'selected' : '' }}>Bachelor of Science Industrial Technology</option>
<option value="Bachelor of Science in Industrial Technology - Major in Food Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology - Major in Food Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology - Major in Food Technology</option>
<option value="Bachelor of science in industrial technology major in computer technology" {{ $registration->course == 'Bachelor of science in industrial technology major in computer technology' ? 'selected' : '' }}>Bachelor of science in industrial technology major in computer technology</option>
<option value="Bachelor of Science in Business Administration - Major in Marketing Management" {{ $registration->course == 'Bachelor of Science in Business Administration - Major in Marketing Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration - Major in Marketing Management</option>
<option value="Bachelor of Science in Accountancy" {{ $registration->course == 'Bachelor of Science in Accountancy' ? 'selected' : '' }}>Bachelor of Science in Accountancy</option>
<option value="Bachelor of Science in Agriculture - Major in Crop Science" {{ $registration->course == 'Bachelor of Science in Agriculture - Major in Crop Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Major in Crop Science</option>
<option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering" {{ $registration->course == 'Bachelor of Science in Civil Engineering - Major in Structural Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering - Major in Structural Engineering</option>
<option value="Bachelor of Science in Environmental Science" {{ $registration->course == 'Bachelor of Science in Environmental Science' ? 'selected' : '' }}>Bachelor of Science in Environmental Science</option>
<option value="Bachelor of Arts in History" {{ $registration->course == 'Bachelor of Arts in History' ? 'selected' : '' }}>Bachelor of Arts in History</option>
<option value="Bachelor of Science in Agriculture - Major in Animal Science" {{ $registration->course == 'Bachelor of Science in Agriculture - Major in Animal Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Major in Animal Science</option>
<option value="Bachelor of Science in Exercise and Sports Science" {{ $registration->course == 'Bachelor of Science in Exercise and Sports Science' ? 'selected' : '' }}>Bachelor of Science in Exercise and Sports Science</option>
<option value="Bachelor of Science in Industrial Technology Major in Computer Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology Major in Computer Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology Major in Computer Technology</option>
<option value="Bachelor of Arts in Communication" {{ $registration->course == 'Bachelor of Arts in Communication' ? 'selected' : '' }}>Bachelor of Arts in Communication</option>
<option value="Bachelor of elementary education" {{ $registration->course == 'Bachelor of elementary education' ? 'selected' : '' }}>Bachelor of elementary education</option>
<option value="Bachelor in Industrial Technology - Major in Computer Technology" {{ $registration->course == 'Bachelor in Industrial Technology - Major in Computer Technology' ? 'selected' : '' }}>Bachelor in Industrial Technology - Major in Computer Technology</option>
<option value="Bachelor of Industrial Technology - Major in Computer" {{ $registration->course == 'Bachelor of Industrial Technology - Major in Computer' ? 'selected' : '' }}>Bachelor of Industrial Technology - Major in Computer</option>
<option value="Bachelor of science in industrial technology" {{ $registration->course == 'Bachelor of science in industrial technology' ? 'selected' : '' }}>Bachelor of science in industrial technology</option>
<option value="BACHELOR OF PUBLIC ADMINISTRATION" {{ $registration->course == 'BACHELOR OF PUBLIC ADMINISTRATION' ? 'selected' : '' }}>BACHELOR OF PUBLIC ADMINISTRATION</option>
<option value="Bachelor of Science in Exercise and Sports Sciences" {{ $registration->course == 'Bachelor of Science in Exercise and Sports Sciences' ? 'selected' : '' }}>Bachelor of Science in Exercise and Sports Sciences</option>
<option value="Bachelor of Science in Civil Engineering - Major in Structural Engineering" {{ $registration->course == 'Bachelor of Science in Civil Engineering - Major in Structural Engineering' ? 'selected' : '' }}>Bachelor of Science in Civil Engineering - Major in Structural Engineering</option>
<option value="Bachelor of Science in Industrial Technology Major in Electronics Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology Major in Electronics Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology Major in Electronics Technology</option>
<option value="Bachelor of Science in Business Administration Major in Marketing Management" {{ $registration->course == 'Bachelor of Science in Business Administration Major in Marketing Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration Major in Marketing Management</option>
<option value="Bachelor of Science in Agriculture - Animal Science" {{ $registration->course == 'Bachelor of Science in Agriculture - Animal Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture - Animal Science</option>
<option value="Bachelor of Science in Agriculture- Major in Crop Science" {{ $registration->course == 'Bachelor of Science in Agriculture- Major in Crop Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture- Major in Crop Science</option>
<option value="Bachelor of Science in Business Administration - Major in Human Resources Management" {{ $registration->course == 'Bachelor of Science in Business Administration - Major in Human Resources Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration - Major in Human Resources Management</option>
<option value="Bachelor of science in hospitality management" {{ $registration->course == 'Bachelor of science in hospitality management' ? 'selected' : '' }}>Bachelor of science in hospitality management</option>
<option value="Bachelor of Science in Business Administration - Major in Human Resource Management" {{ $registration->course == 'Bachelor of Science in Business Administration - Major in Human Resource Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration - Major in Human Resource Management</option>
<option value="BS Information Technology" {{ $registration->course == 'BS Information Technology' ? 'selected' : '' }}>BS Information Technology</option>
<option value="Bachelor of Science Industrial Technology - Major in Electronics Technology" {{ $registration->course == 'Bachelor of Science Industrial Technology - Major in Electronics Technology' ? 'selected' : '' }}>Bachelor of Science Industrial Technology - Major in Electronics Technology</option>
<option value="Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching" {{ $registration->course == 'Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching' ? 'selected' : '' }}>Bachelor of Science in Exercise and Sports Sciences - Major in Fitness and Sports Coaching</option>
<option value="Bachelor of Science in Business Administration - Major in Financial Management" {{ $registration->course == 'Bachelor of Science in Business Administration - Major in Financial Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration - Major in Financial Management</option>
<option value="Bachelor of Industrial Technology - Major in Mechanical Technology" {{ $registration->course == 'Bachelor of Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>Bachelor of Industrial Technology - Major in Mechanical Technology</option>
<option value="Bachelor of Science in Business Administration Major in Human Resource Management" {{ $registration->course == 'Bachelor of Science in Business Administration Major in Human Resource Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration Major in Human Resource Management</option>
<option value="Bachelor of Technology and Livelihood Education - Major in ICT" {{ $registration->course == 'Bachelor of Technology and Livelihood Education - Major in ICT' ? 'selected' : '' }}>Bachelor of Technology and Livelihood Education - Major in ICT</option>
<option value="Bachelor of Science Mechanical Engineering" {{ $registration->course == 'Bachelor of Science Mechanical Engineering' ? 'selected' : '' }}>Bachelor of Science Mechanical Engineering</option>
<option value="Bachelor of Science in Business Administration Major in Human Resource Management" {{ $registration->course == 'Bachelor of Science in Business Administration Major in Human Resource Management' ? 'selected' : '' }}>Bachelor of Science in Business Administration Major in Human Resource Management</option>
<option value="Bachelor of Agriculture - Major in Animal Science" {{ $registration->course == 'Bachelor of Agriculture - Major in Animal Science' ? 'selected' : '' }}>Bachelor of Agriculture - Major in Animal Science</option>
<option value="Bachelor of Science in Industrial Technology - Major in Mechanical Technology" {{ $registration->course == 'Bachelor of Science in Industrial Technology - Major in Mechanical Technology' ? 'selected' : '' }}>Bachelor of Science in Industrial Technology - Major in Mechanical Technology</option>
<option value="Bachelor of Science - Major in Nursing" {{ $registration->course == 'Bachelor of Science - Major in Nursing' ? 'selected' : '' }}>Bachelor of Science - Major in Nursing</option>
<option value="Bachelor of Science in Agriculture-Major in Crop Science" {{ $registration->course == 'Bachelor of Science in Agriculture-Major in Crop Science' ? 'selected' : '' }}>Bachelor of Science in Agriculture-Major in Crop Science</option>
<option value="Bachelor of Secondary Education - Major in Filipino" {{ $registration->course == 'Bachelor of Secondary Education - Major in Filipino' ? 'selected' : '' }}>Bachelor of Secondary Education - Major in Filipino</option>
<option value="BSIT-MT" {{ $registration->course == 'BSIT-MT' ? 'selected' : '' }}>BSIT-MT</option>
<option value="BS Forestry" {{ $registration->course == 'BS Forestry' ? 'selected' : '' }}>BS Forestry</option>
<option value="Bachelor of science industrial technology" {{ $registration->course == 'Bachelor of science industrial technology' ? 'selected' : '' }}>Bachelor of science industrial technology</option>
</select>
          </div>

          <div class="form-row">
            <div class="form-group college-campus-group">
              <label for="college_campus_{{ $registration->id }}" class="form-label">College/Campus</label>
              <select class="form-select" id="college_campus_{{ $registration->id }}" name="college_campus" required>
                <option value="">Select College/Campus</option>
                <option value="College of Allied and Medicine" {{ $registration->college_campus == 'College of Allied and Medicine' ? 'selected' : '' }}>College of Allied and Medicine</option>
                <option value="College of Administration, Business, and Accountancy" {{ $registration->college_campus == 'College of Administration, Business, and Accountancy' ? 'selected' : '' }}>College of Administration, Business, and Accountancy</option>
                <option value="College of Teacher Education" {{ $registration->college_campus == 'College of Teacher Education' ? 'selected' : '' }}>College of Teacher Education</option>
                <option value="College of Arts and Sciences" {{ $registration->college_campus == 'College of Arts and Sciences' ? 'selected' : '' }}>College of Arts and Sciences</option>
                <option value="College of Engineering (CEn)" {{ $registration->college_campus == 'College of Engineering (CEn)' ? 'selected' : '' }}>College of Engineering (CEn)</option>
                <option value="College of Industrial Technology" {{ $registration->college_campus == 'College of Industrial Technology' ? 'selected' : '' }}>College of Industrial Technology</option>
                <option value="College of Agriculture (CAg)" {{ $registration->college_campus == 'College of Agriculture (CAg)' ? 'selected' : '' }}>College of Agriculture (CAg)</option>
                <option value="SLSU Lucena Campus" {{ $registration->college_campus == 'SLSU Lucena Campus' ? 'selected' : '' }}>SLSU Lucena Campus</option>
                <option value="SLSU Alabat Campus" {{ $registration->college_campus == 'SLSU Alabat Campus' ? 'selected' : '' }}>SLSU Alabat Campus</option>
                <option value="SLSU Tayabas Campus" {{ $registration->college_campus == 'SLSU Tayabas Campus' ? 'selected' : '' }}>SLSU Tayabas Campus</option>
                <option value="SLSU Gumaca Campus" {{ $registration->college_campus == 'SLSU Gumaca Campus' ? 'selected' : '' }}>SLSU Gumaca Campus</option>
                <option value="SLSU Catanauan Campus" {{ $registration->college_campus == 'SLSU Catanauan Campus' ? 'selected' : '' }}>SLSU Catanauan Campus</option>
                <option value="SLSU Tagkawayan Campus" {{ $registration->college_campus == 'SLSU Tagkawayan Campus' ? 'selected' : '' }}>SLSU Tagkawayan Campus</option>
                <option value="SLSU Polillo Campus" {{ $registration->college_campus == 'SLSU Polillo Campus' ? 'selected' : '' }}>SLSU Polillo Campus</option>
                <option value="SLSU Infanta Campus" {{ $registration->college_campus == 'SLSU Infanta Campus' ? 'selected' : '' }}>SLSU Infanta Campus</option>
                <option value="SLSU Tiaong Campus" {{ $registration->college_campus == 'SLSU Tiaong Campus' ? 'selected' : '' }}>SLSU Tiaong Campus</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group sports-event-group">
              <label for="sports_event_{{ $registration->id }}" class="form-label">Sports Event</label>
              <select class="form-select" id="sports_event_{{ $registration->id }}" name="sports_event" required>
                <option value="">Select Sports Event</option>
                <option value="Athletics" {{ $registration->sports_event == 'Athletics' ? 'selected' : '' }}>Athletics</option>
                <option value="Arnis" {{ $registration->sports_event == 'Arnis' ? 'selected' : '' }}>Arnis</option>
                <option value="Archery" {{ $registration->sports_event == 'Archery' ? 'selected' : '' }}>Archery</option>
                <option value="Basketball" {{ $registration->sports_event == 'Basketball' ? 'selected' : '' }}>Basketball</option>
                <option value="Badminton" {{ $registration->sports_event == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                <option value="Volleyball" {{ $registration->sports_event == 'Volleyball' ? 'selected' : '' }}>Volleyball</option>
                <option value="Billiards" {{ $registration->sports_event == 'Billiards' ? 'selected' : '' }}>Billiards</option>
                <option value="Beach Volleyball" {{ $registration->sports_event == 'Beach Volleyball' ? 'selected' : '' }}>Beach Volleyball</option>
                <option value="Chess" {{ $registration->sports_event == 'Chess' ? 'selected' : '' }}>Chess</option>
                <option value="Dancesport (Standard)" {{ $registration->sports_event == 'Dancesport (Standard)' ? 'selected' : '' }}>Dancesport (Standard)</option>
                <option value="E-Games ML" {{ $registration->sports_event == 'E-Games ML' ? 'selected' : '' }}>E-Games ML</option>
                <option value="Table Tennis" {{ $registration->sports_event == 'Table Tennis' ? 'selected' : '' }}>Table Tennis</option>
                <option value="Lawn Tennis" {{ $registration->sports_event == 'Lawn Tennis' ? 'selected' : '' }}>Lawn Tennis</option>
                <option value="Sepak Takraw" {{ $registration->sports_event == 'Sepak Takraw' ? 'selected' : '' }}>Sepak Takraw</option>
                <option value="Football" {{ $registration->sports_event == 'Football' ? 'selected' : '' }}>Football</option>
                <option value="Futsal" {{ $registration->sports_event == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                <option value="Karatedo" {{ $registration->sports_event == 'Karatedo' ? 'selected' : '' }}>Karatedo</option>
                <option value="Taekwondo" {{ $registration->sports_event == 'Taekwondo' ? 'selected' : '' }}>Taekwondo</option>
                <option value="Swimming" {{ $registration->sports_event == 'Swimming' ? 'selected' : '' }}>Swimming</option>
              </select>
            </div>
          </div>

          <div class="mb-3">
            <label for="id_number_{{ $registration->id }}" class="form-label">ID Number</label>
            <input type="text" class="form-control" id="id_number_{{ $registration->id }}" name="id_number" value="{{ $registration->id_number }}" required>
          </div>
          <div class="mb-3">
            <label for="image_{{ $registration->id }}" class="form-label">Image</label>
            @if($registration->image)
              <img src="{{ asset('storage/' . $registration->image) }}" alt="Current Image" style="width: 50px; height: 50px; display:block; margin-bottom:10px;">
            @endif
            <input type="file" class="form-control" id="image_{{ $registration->id }}" name="image" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Changes</button>
        </div>
      </form>
    </div>
  </div>
</div>

                  @endforeach
                </tbody>
              </table>
              </div>

              <div class="d-flex justify-content-between align-items-center mt-3">
                <p>Showing {{ $registrations->firstItem() }} to {{ $registrations->lastItem() }} of {{ $registrations->total() }} results</p>
                {{ $registrations->onEachSide(1)->links('pagination::bootstrap-4') }}
              </div>
            @else
              <p class="text-center text-danger fw-bold">No registrations found.</p>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- JavaScript Functions for Filter and Search -->
    <script>
        function applyFilter() {
            const filter = document.getElementById('filter').value;
            const rows = document.querySelectorAll('#registrationTable tbody tr');

            rows.forEach(row => {
                row.style.display = ''; // Reset all rows

                if (filter === 'latest') {
                    const currentIndex = row.querySelector('td:first-child').innerText;
                    if (parseInt(currentIndex) > 5) {
                        row.style.display = 'none';
                    }
                } else if (filter === 'old') {
                    const currentIndex = row.querySelector('td:first-child').innerText;
                    if (parseInt(currentIndex) <= 5) {
                        row.style.display = 'none';
                    }
                }
            });
        }

        function searchRegistrations() {
            const searchInput = document.getElementById('search').value.toLowerCase();
            const rows = document.querySelectorAll('#registrationTable tbody tr');

            rows.forEach(row => {
                const cells = row.querySelectorAll('td');
                let matchFound = false;

                cells.forEach(cell => {
                    if (cell.innerText.toLowerCase().includes(searchInput)) {
                        matchFound = true;
                    }
                });

                row.style.display = matchFound ? '' : 'none';
            });
        }
    </script>

  <!-- Chart.js and ChartDataLabels Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <script>
  document.addEventListener('DOMContentLoaded', function () {
      // Registrations by Age Chart
      const ctxAge = document.getElementById('registrationsByAgeChart').getContext('2d');
      const registrationsByAgeLabels = {!! json_encode($registrationsByAge->pluck('age')) !!};
      const registrationsByAgeData = {!! json_encode($registrationsByAge->pluck('total')) !!};
      new Chart(ctxAge, {
          type: 'bar',
          data: {
              labels: registrationsByAgeLabels,
              datasets: [{
                  label: 'Registrations',
                  data: registrationsByAgeData,
                  backgroundColor: 'rgba(75, 192, 192, 0.6)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1,
              }],
          },
          options: {
              indexAxis: (registrationsByAgeLabels.length > 5) ? 'y' : 'x',
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { display: false },
                  title: {
                      display: true,
                      text: 'Registrations by Age',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      anchor: 'end',
                      align: 'top',
                      formatter: (value) => value,
                  },
              },
              scales: {
                  y: { beginAtZero: true, ticks: { precision: 0 } }
              },
          },
          plugins: [ChartDataLabels],
      });

      // Registrations by Gender Chart as Pie Chart
      const ctxGender = document.getElementById('registrationsByGenderChart').getContext('2d');
      const registrationsByGenderLabels = {!! json_encode($registrationsByGender->pluck('gender')) !!};
      const registrationsByGenderData = {!! json_encode($registrationsByGender->pluck('total')) !!};
      new Chart(ctxGender, {
          type: 'pie',
          data: {
              labels: registrationsByGenderLabels,
              datasets: [{
                  data: registrationsByGenderData,
                  backgroundColor: [
                      'rgba(153, 102, 255, 0.6)',
                      'rgba(255, 159, 64, 0.6)'
                  ],
                  borderColor: [
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                  ],
                  borderWidth: 1,
              }],
          },
          options: {
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { position: 'bottom' },
                  title: {
                      display: true,
                      text: 'Registrations by Sex',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      formatter: (value, context) => {
                          let sum = context.chart.data.datasets[0].data.reduce((a, b) => a + b, 0);
                          let percentage = ((value / sum) * 100).toFixed(2) + "%";
                          return percentage;
                      }
                  },
              },
          },
          plugins: [ChartDataLabels],
      });

      // Registrations by Year Level Chart
      const ctxYearLevel = document.getElementById('registrationsByYearLevelChart').getContext('2d');
      const registrationsByYearLevelLabels = {!! json_encode($registrationsByYearLevel->pluck('year_level')) !!};
      const registrationsByYearLevelData = {!! json_encode($registrationsByYearLevel->pluck('total')) !!};
      new Chart(ctxYearLevel, {
          type: 'bar',
          data: {
              labels: registrationsByYearLevelLabels,
              datasets: [{
                  label: 'Registrations',
                  data: registrationsByYearLevelData,
                  backgroundColor: 'rgba(255, 159, 64, 0.6)',
                  borderColor: 'rgba(255, 159, 64, 1)',
                  borderWidth: 1,
              }],
          },
          options: {
              indexAxis: (registrationsByYearLevelLabels.length > 5) ? 'y' : 'x',
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { display: false },
                  title: {
                      display: true,
                      text: 'Registrations by Year Level',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      anchor: 'end',
                      align: 'top',
                      formatter: (value) => value,
                  },
              },
              scales: {
                  y: { beginAtZero: true, ticks: { precision: 0 } }
              },
          },
          plugins: [ChartDataLabels],
      });

      // Registrations by Course Chart (Permanent Horizontal)
      const ctxCourse = document.getElementById('registrationsByCourseChart').getContext('2d');
      const registrationsByCourseLabels = {!! json_encode($registrationsByCourse->pluck('course')) !!};
      const registrationsByCourseData = {!! json_encode($registrationsByCourse->pluck('total')) !!};
      new Chart(ctxCourse, {
          type: 'bar',
          data: {
              labels: registrationsByCourseLabels,
              datasets: [{
                  label: 'Registrations',
                  data: registrationsByCourseData,
                  backgroundColor: 'rgba(54, 162, 235, 0.6)',
                  borderColor: 'rgba(54, 162, 235, 1)',
                  borderWidth: 1,
              }],
          },
          options: {
              indexAxis: 'y',  // Fixed horizontal orientation
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { display: false },
                  title: {
                      display: true,
                      text: 'Registrations by Course',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      anchor: 'end',
                      align: 'top',
                      formatter: (value) => value,
                  },
              },
              scales: {
                  y: { beginAtZero: true, ticks: { precision: 0 } }
              },
          },
          plugins: [ChartDataLabels],
      });

      // Registrations by College/Campus Chart (Permanent Horizontal)
      const ctxCollege = document.getElementById('registrationsByCollegeChart').getContext('2d');
      const registrationsByCollegeLabels = {!! json_encode($registrationsByCollege->pluck('college_campus')) !!};
      const registrationsByCollegeData = {!! json_encode($registrationsByCollege->pluck('total')) !!};
      new Chart(ctxCollege, {
          type: 'bar',
          data: {
              labels: registrationsByCollegeLabels,
              datasets: [{
                  label: 'Registrations',
                  data: registrationsByCollegeData,
                  backgroundColor: 'rgba(255, 205, 86, 0.6)',
                  borderColor: 'rgba(255, 205, 86, 1)',
                  borderWidth: 1,
              }],
          },
          options: {
              indexAxis: 'y',  // Fixed horizontal orientation
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { display: false },
                  title: {
                      display: true,
                      text: 'Registrations by College/Campus',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      anchor: 'end',
                      align: 'top',
                      formatter: (value) => value,
                  },
              },
              scales: {
                  y: { beginAtZero: true, ticks: { precision: 0 } }
              },
          },
          plugins: [ChartDataLabels],
      });

      // Registrations by Sports Event Chart (Permanent Horizontal)
      const ctxEvent = document.getElementById('registrationsByEventChart').getContext('2d');
      const registrationsByEventLabels = {!! json_encode($registrationsByEvent->pluck('sports_event')) !!};
      const registrationsByEventData = {!! json_encode($registrationsByEvent->pluck('total')) !!};
      new Chart(ctxEvent, {
          type: 'bar',
          data: {
              labels: registrationsByEventLabels,
              datasets: [{
                  label: 'Registrations',
                  data: registrationsByEventData,
                  backgroundColor: 'rgba(75, 192, 192, 0.6)',
                  borderColor: 'rgba(75, 192, 192, 1)',
                  borderWidth: 1,
              }],
          },
          options: {
              indexAxis: 'y',  // Fixed horizontal orientation
              responsive: true,
              maintainAspectRatio: false,
              plugins: {
                  legend: { display: false },
                  title: {
                      display: true,
                      text: 'Registrations by Sports Event',
                      color: '#333',
                      font: { size: 16 },
                  },
                  datalabels: {
                      color: '#fff',
                      anchor: 'end',
                      align: 'top',
                      formatter: (value) => value,
                  },
              },
              scales: {
                  y: { beginAtZero: true, ticks: { precision: 0 } }
              },
          },
          plugins: [ChartDataLabels],
      });
  });
  </script>




    <!-- JavaScript para sa Print functionality -->
    <script>
    document.getElementById('confirmPrint').addEventListener('click', function() {
        const campus = document.getElementById('campusSelect').value;
        if(campus) {
         
            var modalEl = document.getElementById('printModal');
            var modal = bootstrap.Modal.getInstance(modalEl);
            modal.hide();

           
            window.open("{{ url('/print') }}/" + encodeURIComponent(campus), '_blank');
        }
    });
    </script>
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
