<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Voters Dashboard</title>
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
    <h2 class="mb-4 border-bottom pb-2">Voters Management</h2>

    @php
        // We only need DB for voters
        $voters = \DB::table('voters_login')
            ->select('voters_login.*')
            ->selectRaw('(SELECT COUNT(*) FROM election_voters_vote WHERE election_voters_vote.voter_id = voters_login.id) as votes_count')
            ->orderBy('id', 'asc')
            ->paginate(10);
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

        <!-- Search and Sort Section -->
        <div class="row mt-3 mb-3" style="background-color: #f8f9fa; padding: 30px; border-radius: 5px;">
            <div class="col-md-6">
                <!-- Sort By -->
                <div class="d-flex align-items-center">
                    <label for="sortBy" class="me-2 mb-0 fw-semibold">Sort By:</label>
                    <select class="form-select" id="sortBy" onchange="applySort()" style="width: auto;">
                        <option value="id_asc">ID (Ascending)</option>
                        <option value="id_desc">ID (Descending)</option>
                        <option value="student_id_asc">Student ID (Ascending)</option>
                        <option value="student_id_desc">Student ID (Descending)</option>
                        <option value="name_asc">Name (A-Z)</option>
                        <option value="name_desc">Name (Z-A)</option>
                        <option value="email_asc">Email (A-Z)</option>
                        <option value="email_desc">Email (Z-A)</option>
                        <option value="college_asc">College (A-Z)</option>
                        <option value="college_desc">College (Z-A)</option>
                        <option value="status_asc">Vote Status (Not Voted First)</option>
                        <option value="status_desc">Vote Status (Voted First)</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Search -->
                <div class="d-flex align-items-center justify-content-end">
                    <label for="searchBar" class="me-2 mb-0 fw-semibold">Search:</label>
                    <input type="text" id="searchBar" class="form-control" placeholder="Search voters..." onkeyup="searchVoters()" style="width: 60%;">
                </div>
            </div>
        </div>

        <!-- Voter Management Section -->
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 style="margin: 0; vertical-align: middle;">Registered Voters</h5>
                        <div>
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addVoterModal">Add Voter</button>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#bulkUploadModal">Bulk Upload</button>
                            <!-- New Print All Button -->
                            <a href="{{ route('voters.printAll') }}" target="_blank" class="btn btn-info btn-sm ms-2 no-print">
                                <i class="fas fa-print"></i> Print All
                            </a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if ($voters->count() > 0)
                            <table class="table table-bordered" id="votersTable">
                                <thead>
                                    <tr>
                                        <th style="background-color: #D3D3D3; color: black;">ID</th>
                                        <th style="background-color: #D3D3D3; color: black;">Student ID</th>
                                        <th style="background-color: #D3D3D3; color: black;">Name</th>
                                        <th style="background-color: #D3D3D3; color: black;">Email</th>
                                        <th style="background-color: #D3D3D3; color: black;">College</th>
                                        <th style="background-color: #D3D3D3; color: black;">Vote Status</th>
                                        <th style="background-color: #D3D3D3; color: black;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($voters as $voter)
                                        <tr>
                                            <td>{{ $voter->id }}</td>
                                            <td>{{ $voter->student_id }}</td>
                                            <td>{{ $voter->name }}</td>
                                            <td>{{ $voter->email }}</td>
                                            <td>{{ $voter->college }}</td>
                                            <td>
                                                @if ($voter->votes_count > 0)
                                                    <span class="badge bg-success">Voted</span>
                                                @else
                                                    <span class="badge bg-warning">Not Voted</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($voter->votes_count == 0)
                                                    <!-- Edit Button -->
                                                    <button 
                                                        class="btn btn-warning btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editVoterModal{{ $voter->id }}"
                                                    >
                                                        Edit
                                                    </button>

                                                    <!-- Delete Button (opens modal) -->
                                                    <button 
                                                        class="btn btn-danger btn-sm"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#deleteVoterModal{{ $voter->id }}"
                                                    >
                                                        Delete
                                                    </button>
                                                @else
                                                    <!-- Disabled Edit and Delete Buttons -->
                                                    <button class="btn btn-warning btn-sm" disabled title="Edit disabled for voters who have voted">Edit</button>
                                                    <button class="btn btn-danger btn-sm" disabled title="Cannot delete voter who has already voted">Delete</button>
                                                @endif
                                            </td>
                                        </tr>

                                        <!-- Edit Voter Modal (only if not voted) -->
                                        @if ($voter->votes_count == 0)
                                            <div class="modal fade" id="editVoterModal{{ $voter->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('voters.update', $voter->id) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit Voter</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">Student ID</label>
                                                                    <input type="text" name="student_id" value="{{ $voter->student_id }}" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Name</label>
                                                                    <input type="text" name="name" value="{{ $voter->name }}" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">Email</label>
                                                                    <input type="email" name="email" value="{{ $voter->email }}" class="form-control" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">College</label>
                                                                    <input type="text" name="college" value="{{ $voter->college }}" class="form-control" required>
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

                                            <!-- Delete Voter Modal -->
                                            <div class="modal fade" id="deleteVoterModal{{ $voter->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Delete Voter</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Are you sure you want to delete 
                                                                <strong>{{ $voter->name }}</strong> 
                                                                (Student ID: {{ $voter->student_id }})?
                                                            </p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                Cancel
                                                            </button>
                                                            <form 
                                                                action="{{ route('voters.destroy', $voter->id) }}" 
                                                                method="POST"
                                                            >
                                                                @csrf
                                                                @method('DELETE')
                                                                <button 
                                                                    type="submit" 
                                                                    class="btn btn-danger"
                                                                >
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End Delete Voter Modal -->
                                        @endif
                                    @endforeach
                                </table>

                                <!-- Pagination -->
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <p>Showing {{ $voters->firstItem() }} to {{ $voters->lastItem() }} of {{ $voters->total() }} results</p>
                                    {{ $voters->onEachSide(1)->links('pagination::bootstrap-4') }}
                                </div>
                            @else
                                <p class="text-center mt-4">No Voter Accounts Found.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <!-- Add Voter Modal -->
        <div class="modal fade" id="addVoterModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('voters.store') }}" method="POST">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add Voter</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Student ID</label>
                                <input type="text" name="student_id" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">College</label>
                                <select name="college" class="form-select" required>
                                    <option value="" disabled selected>Select College/Campus</option>
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
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Add Voter</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Bulk Upload Modal -->
        <div class="modal fade" id="bulkUploadModal" tabindex="-1">
            <div class="modal-dialog">
                <form action="{{ route('voters.bulkUpload') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Bulk Upload Voters</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Upload CSV File</label>
                                <input type="file" name="csv_file" class="form-control" required>
                                <small class="text-muted">Ensure the file follows the template format.</small>
                            </div>
                            <div class="mb-3">
                                <a href="{{ route('voters.downloadTemplate') }}" class="btn btn-secondary btn-sm">Download Template</a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <script>
            // Function to handle sorting
            function applySort() {
                const sortBy = document.getElementById('sortBy').value;
                const rows = Array.from(document.querySelectorAll('#votersTable tbody tr'));

                rows.sort((a, b) => {
                    const getCellValue = (row, columnIndex) => row.cells[columnIndex].innerText.trim();

                    switch (sortBy) {
                        case 'id_asc':
                            return Number(getCellValue(a, 0)) - Number(getCellValue(b, 0));
                        case 'id_desc':
                            return Number(getCellValue(b, 0)) - Number(getCellValue(a, 0));
                        case 'student_id_asc':
                            return getCellValue(a, 1).localeCompare(getCellValue(b, 1));
                        case 'student_id_desc':
                            return getCellValue(b, 1).localeCompare(getCellValue(a, 1));
                        case 'name_asc':
                            return getCellValue(a, 2).localeCompare(getCellValue(b, 2));
                        case 'name_desc':
                            return getCellValue(b, 2).localeCompare(getCellValue(a, 2));
                        case 'email_asc':
                            return getCellValue(a, 3).localeCompare(getCellValue(b, 3));
                        case 'email_desc':
                            return getCellValue(b, 3).localeCompare(getCellValue(a, 3));
                        case 'college_asc':
                            return getCellValue(a, 4).localeCompare(getCellValue(b, 4));
                        case 'college_desc':
                            return getCellValue(b, 4).localeCompare(getCellValue(a, 4));
                        case 'status_asc':
                            return getVoteStatusValue(a) - getVoteStatusValue(b);
                        case 'status_desc':
                            return getVoteStatusValue(b) - getVoteStatusValue(a);
                        default:
                            return 0;
                    }
                });

                const tbody = document.querySelector('#votersTable tbody');
                tbody.innerHTML = '';
                rows.forEach(row => tbody.appendChild(row));
            }

            // Numeric values to Vote Status for sorting
            function getVoteStatusValue(row) {
                const statusText = row.cells[5].innerText.trim().toLowerCase();
                if (statusText === 'voted') {
                    return 2;
                } else if (statusText === 'not voted') {
                    return 1;
                } else {
                    return 0;
                }
            }

            // Function to handle search
            function searchVoters() {
                const searchInput = document.getElementById('searchBar').value.toLowerCase();
                const rows = document.querySelectorAll('#votersTable tbody tr');

                rows.forEach(row => {
                    const text = row.innerText.toLowerCase();
                    row.style.display = text.includes(searchInput) ? '' : 'none';
                });
            }
        </script>

        <!-- Include Bootstrap JS (necessary for modals) -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Include Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
        
        {{-- Hide the Print All button when printing --}}
        <style>
            @media print {
                .no-print {
                    display: none;
                }
            }
        </style>
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
