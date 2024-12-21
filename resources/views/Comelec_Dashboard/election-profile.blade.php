<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Platforms Dashboard</title>
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
    <h2 class="mb-4 border-bottom pb-2">Platforms Management</h2>

@php
    use App\Models\LocalSection;

    // Get all sections (with subtitles and electionimages)
    $sections = LocalSection::with('subtitles.electionimages')->get();
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


    <!-- Add New Section Button -->
    <div class="text-end mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSectionModal">Add New Section</button>
    </div>

    <!-- Sections List -->
    @foreach($sections as $section)
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h2>{{ $section->title }}</h2>
                <div>
                    <button class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#editSectionModal{{ $section->id }}">Edit</button>
                    <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSectionModal{{ $section->id }}">Delete</button>
                </div>
            </div>
            <div class="card-body">
                <!-- Add Subtitle Button -->
                <div class="my-2 text-end">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addSubtitleModal{{ $section->id }}">Add New Subtitle</button>
                </div>

                <!-- Subtitles List -->
                @foreach($section->subtitles as $subtitle)
                    <div class="card mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4>{{ $subtitle->title }}</h4>
                            <div>
                                <button class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#editSubtitleModal{{ $subtitle->id }}">Edit</button>
                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteSubtitleModal{{ $subtitle->id }}">Delete</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Upload ElectionImage Button -->
                            <div class="my-2 text-end">
                                <button 
                                    class="btn btn-sm btn-primary upload-electionimage-button" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#uploadElectionImageModal" 
                                    data-subtitle-id="{{ $subtitle->id }}"
                                    data-subtitle-title="{{ $subtitle->title }}"
                                >
                                    Upload ElectionImage
                                </button>
                            </div>

                            <!-- ElectionImages List -->
                            @if($subtitle->electionimages->isEmpty())
                                <p>No election images available for this subtitle.</p>
                            @else
                                <div class="row">
                                    @foreach($subtitle->electionimages as $electionImage)
                                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                                            <div class="electionimage-hover" onclick="showFullImage('{{ asset('storage/' . $electionImage->image_path) }}', '{{ $electionImage->name }}')">
                                                <img src="{{ asset('storage/' . $electionImage->image_path) }}" class="card-img-top img-fluid electionimage-img" alt="{{ $electionImage->name }}" loading="lazy">
                                                <div class="overlay">
                                                    <div class="hover-content">
                                                        <i class="fas fa-search-plus"></i>
                                                        <span>View Image</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body text-center">
                                                <h5 class="card-title">{{ $electionImage->name }}</h5>
                                                <button class="btn btn-sm btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#editElectionImageModal{{ $electionImage->id }}">Edit</button>
                                                <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteElectionImageModal{{ $electionImage->id }}">Delete</button>
                                            </div>

                                            <!-- Edit ElectionImage Modal -->
                                            <div class="modal fade" id="editElectionImageModal{{ $electionImage->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('electionimages.update', $electionImage->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Edit ElectionImage</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <label class="form-label">ElectionImage Name</label>
                                                                    <input type="text" name="name" class="form-control" value="{{ $electionImage->name }}" required>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label class="form-label">ElectionImage File (Leave blank to keep current)</label>
                                                                    <input type="file" name="image" class="form-control" accept="image/*">
                                                                    @if($electionImage->image_path)
                                                                        <small>Current Image:</small>
                                                                        <img src="{{ asset('storage/' . $electionImage->image_path) }}" alt="{{ $electionImage->name }}" class="img-thumbnail mt-2" style="max-width: 100px;">
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-success">Update</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                            <!-- Delete ElectionImage Modal -->
                                            <div class="modal fade" id="deleteElectionImageModal{{ $electionImage->id }}" tabindex="-1">
                                                <div class="modal-dialog">
                                                    <form action="{{ route('electionimages.destroy', $electionImage->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Delete ElectionImage</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Are you sure you want to delete election image "{{ $electionImage->name }}"?
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Edit Subtitle Modal -->
                    <div class="modal fade" id="editSubtitleModal{{ $subtitle->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('subtitles.edit', $subtitle->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Subtitle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label class="form-label">Subtitle Title</label>
                                            <input type="text" name="title" class="form-control" value="{{ $subtitle->title }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Subtitle Modal -->
                    <div class="modal fade" id="deleteSubtitleModal{{ $subtitle->id }}" tabindex="-1">
                        <div class="modal-dialog">
                            <form action="{{ route('subtitles.destroy', $subtitle->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Delete Subtitle</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete subtitle "{{ $subtitle->title }}"?
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

                <!-- Add Subtitle Modal -->
                <div class="modal fade" id="addSubtitleModal{{ $section->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('subtitles.add', $section->id) }}" method="POST">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Add New Subtitle</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Subtitle Title</label>
                                        <input type="text" name="title" class="form-control" placeholder="Enter subtitle title" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Add Subtitle</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Edit Section Modal -->
                <div class="modal fade" id="editSectionModal{{ $section->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('sections.edit', $section->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit Section</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label class="form-label">Section Title</label>
                                        <input type="text" name="title" class="form-control" value="{{ $section->title }}" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-success">Update Section</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Delete Section Modal -->
                <div class="modal fade" id="deleteSectionModal{{ $section->id }}" tabindex="-1">
                    <div class="modal-dialog">
                        <form action="{{ route('sections.destroy', $section->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Section</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete section "{{ $section->title }}"? 
                                    This will also delete all associated subtitles and election images.
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <button type="submit" class="btn btn-danger">Delete Section</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Add Section Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1">
    <div class="modal-dialog">
        <form action="{{ route('sections.add') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Section</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Section Title</label>
                        <input type="text" name="title" class="form-control" placeholder="Enter section title" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Section</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Upload ElectionImage Modal (Reusable) -->
<div class="modal fade" id="uploadElectionImageModal" tabindex="-1">
    <div class="modal-dialog">
        <form id="uploadElectionImageForm" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload ElectionImage</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">ElectionImage Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter election image name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ElectionImage File</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Upload ElectionImage</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Fullscreen Image Overlay -->
<div class="fullscreen-overlay" id="fullscreenOverlay" onclick="hideFullImage(event)">
    <span class="close-icon" onclick="hideFullImage(event)">✖</span>
    <img id="fullscreenImage" src="" alt="Fullscreen Image">
</div>

<style>
    /* Hover and fullscreen styles (optional, from your code) */
    .electionimage-hover {
        position: relative;
        cursor: pointer;
        overflow: hidden;
        border-radius: 8px;
        transition: transform 0.3s ease;
    }
    .electionimage-img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.3s ease, filter 0.3s ease;
    }
    .electionimage-hover:hover {
        transform: scale(1.02);
    }
    .overlay {
        position: absolute;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.6);
        display: flex; justify-content: center; align-items: center;
        opacity: 0; transition: opacity 0.3s ease;
    }
    .electionimage-hover:hover .overlay {
        opacity: 1;
    }
    .hover-content {
        text-align: center; color: #fff;
        transform: translateY(20px);
        transition: transform 0.3s ease, opacity 0.3s ease;
        opacity: 0;
    }
    .electionimage-hover:hover .hover-content {
        transform: translateY(0);
        opacity: 1;
    }
    .hover-content i {
        font-size: 30px; margin-bottom: 5px;
    }
    .hover-content span {
        font-size: 16px;
    }
    .fullscreen-overlay {
        display: none; position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background-color: rgba(0, 0, 0, 0.9);
        justify-content: center; align-items: center;
        z-index: 1050;
    }
    .fullscreen-overlay img {
        max-width: 90%; max-height: 90%;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
        border-radius: 5px;
    }
    .close-icon {
        position: absolute; top: 20px; right: 30px;
        font-size: 30px; color: white; cursor: pointer;
        transition: transform 0.2s ease, color 0.2s ease;
        z-index: 1051;
    }
    .close-icon:hover {
        transform: scale(1.2);
        color: #ff4d4d;
    }
    body.no-scroll {
        overflow: hidden;
    }
</style>

<script>
    // Show Fullscreen Image
    function showFullImage(src, imageName) {
        const fullscreenOverlay = document.getElementById('fullscreenOverlay');
        const fullscreenImage = document.getElementById('fullscreenImage');
        fullscreenImage.src = src;
        fullscreenImage.alt = imageName;
        fullscreenOverlay.style.display = 'flex';
        document.body.classList.add('no-scroll');
    }

    // Hide Fullscreen Image
    function hideFullImage(event) {
        if (event.target.id === 'fullscreenOverlay' || event.target.classList.contains('close-icon')) {
            const fullscreenOverlay = document.getElementById('fullscreenOverlay');
            fullscreenOverlay.style.display = 'none';
            document.body.classList.remove('no-scroll');
        }
    }

    // Dynamically set form action for uploading
    document.addEventListener('DOMContentLoaded', function () {
        const uploadElectionImageButtons = document.querySelectorAll('.upload-electionimage-button');
        const uploadElectionImageForm = document.getElementById('uploadElectionImageForm');
        const modalTitle = document.querySelector('#uploadElectionImageModal .modal-title');

        uploadElectionImageButtons.forEach(button => {
            button.addEventListener('click', function () {
                const subtitleId = this.getAttribute('data-subtitle-id');
                const subtitleTitle = this.getAttribute('data-subtitle-title');
                modalTitle.textContent = `Upload ElectionImage to "${subtitleTitle}"`;
                uploadElectionImageForm.action = `/subtitles/${subtitleId}/electionimages`;
            });
        });

        // Prevent clicks on the fullscreen image from closing the overlay
        const fullscreenImage = document.getElementById('fullscreenImage');
        fullscreenImage.addEventListener('click', function(event) {
            event.stopPropagation();
        });

        // Close overlay when 'Esc' key is pressed
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                const fullscreenOverlay = document.getElementById('fullscreenOverlay');
                if (fullscreenOverlay.style.display === 'flex') {
                    fullscreenOverlay.style.display = 'none';
                    document.body.classList.remove('no-scroll');
                }
            }
        });
    });
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
