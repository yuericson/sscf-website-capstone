<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Media Gallery Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
    <h2 class="mb-4 border-bottom pb-2">Media Gallery Dashboard</h2>

    <!-- Display Success Messages -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Display Error Messages -->
    @if($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        use App\Models\GalleryImage;
        use App\Models\GalleryAlbum;
        use App\Models\GalleryVideo;

        // Images Statistics
        $totalImages = GalleryImage::count();
        $recentImages = GalleryImage::latest()->take(5)->count();
        $olderImages = $totalImages - $recentImages;

        // Albums Statistics
        $totalAlbums = GalleryAlbum::count();

        // Videos Statistics
        $totalVideos = GalleryVideo::count();

        // Paginated Data
        $paginatedImages = GalleryImage::orderBy('created_at', 'desc')->paginate(10);
        $albums = GalleryAlbum::all();
        $paginatedAlbums = GalleryAlbum::latest()->paginate(10);
        $paginatedVideos = GalleryVideo::latest()->paginate(10);
    @endphp

    <!-- Statistics Section -->
    <div class="row mt-4">
        <!-- Total Images -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-images fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Images</h6>
                    <h4 class="mb-0">{{ $totalImages }}</h4>
                </div>
            </div>
        </div>

        <!-- Recent Images -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-clock fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Recent Images</h6>
                    <h4 class="mb-0">{{ $recentImages }}</h4>
                </div>
            </div>
        </div>

        <!-- Older Images -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-archive fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Older Images</h6>
                    <h4 class="mb-0">{{ $olderImages }}</h4>
                </div>
            </div>
        </div>

        <!-- Total Albums -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-info text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-folder-open fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Albums</h6>
                    <h4 class="mb-0">{{ $totalAlbums }}</h4>
                </div>
            </div>
        </div>

        <!-- Total Videos -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-video fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Videos</h6>
                    <h4 class="mb-0">{{ $totalVideos }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Forms and Tables Section -->
    <div class="container mt-5">
        <!-- Upload Image Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 class="mb-0">Upload New Image</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('media.gallery.images.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="alt_text" class="form-label fw-semibold">Alt Text</label>
                                <input type="text" class="form-control" id="alt_text" name="alt_text" placeholder="Enter alt text for the image (optional)" value="{{ old('alt_text') }}">
                            </div>
                            <div class="mb-3">
                                <label for="gallery_album_id" class="form-label fw-semibold">Select Album (optional)</label>
                                <select class="form-select" id="gallery_album_id" name="gallery_album_id">
                                    <option value="">-- Select Album --</option>
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}" {{ old('gallery_album_id') == $album->id ? 'selected' : '' }}>
                                            {{ $album->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="images" class="form-label fw-semibold">Images <span class="text-danger">*</span></label>
                                <input type="file" name="images[]" class="form-control" id="images" multiple required>
                                <small class="form-text text-muted">You can select multiple images at once.</small>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-white px-5" style="background-color: #137547; border-radius: 25px;">Upload Images</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Images Table Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 class="mb-0">Images</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="background-color: #D3D3D3; color: black;">Id</th>
                                    <th style="background-color: #D3D3D3; color: black;">Image</th>
                                    <th style="background-color: #D3D3D3; color: black;">Alt Text</th>
                                    <th style="background-color: #D3D3D3; color: black;">Album</th>
                                    <th style="background-color: #D3D3D3; color: black;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($paginatedImages->count() > 0)
                                    @foreach($paginatedImages as $image)
                                        @php
                                            $imagePath = asset('storage/' . $image->path);
                                            $altText = $image->alt_text ?? 'No alt text';
                                            $albumName = $image->galleryAlbum ? $image->galleryAlbum->name : 'Unassigned';
                                        @endphp
                                        <tr>
                                            <td>
                                                {{ ($paginatedImages->currentPage() - 1) * $paginatedImages->perPage() + $loop->iteration }}
                                            </td>
                                            <td><img src="{{ $imagePath }}" alt="{{ $altText }}" width="100" class="img-thumbnail"></td>
                                            <td>{{ $altText }}</td>
                                            <td>{{ $albumName }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewImageModal{{ $image->id }}">View</button>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">Edit</button>
                                                <!-- Delete Button triggers modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteImageModal{{ $image->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- View Image Modal -->
                                        <div class="modal fade" id="viewImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="viewImageModalLabel{{ $image->id }}" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-scrollable" style="max-width:800px;">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                 <h5 class="modal-title" id="viewImageModalLabel{{ $image->id }}">View Image</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body text-center" style="max-height:600px; overflow:auto;">
                                                 <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $altText }}" class="img-fluid mb-3" style="max-height:500px; width:auto; object-fit:contain;">
                                                 <p><strong>Alt Text:</strong> {{ $altText }}</p>
                                                 <p><strong>Album:</strong> {{ $albumName }}</p>
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End of View Image Modal -->

                                        <!-- Edit Image Modal -->
                                        <div class="modal fade" id="editImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="editImageModalLabel{{ $image->id }}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <form action="{{ route('media.gallery.images.update', $image) }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                                  @method('PUT')
                                                  <div class="modal-header">
                                                      <h5 class="modal-title" id="editImageModalLabel{{ $image->id }}">Edit Image</h5>
                                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                  </div>
                                                  <div class="modal-body">
                                                      <div class="mb-3">
                                                          <label for="alt_text_{{ $image->id }}" class="form-label fw-semibold">Alt Text</label>
                                                          <input type="text" class="form-control" id="alt_text_{{ $image->id }}" name="alt_text" value="{{ old('alt_text', $image->alt_text) }}">
                                                      </div>
                                                      <div class="mb-3">
                                                          <label for="gallery_album_id_{{ $image->id }}" class="form-label fw-semibold">Select Album (optional)</label>
                                                          <select class="form-select" id="gallery_album_id_{{ $image->id }}" name="gallery_album_id">
                                                              <option value="">-- Select Album --</option>
                                                              @foreach($albums as $album)
                                                                  <option value="{{ $album->id }}" {{ ($image->gallery_album_id == $album->id) ? 'selected' : '' }}>
                                                                      {{ $album->name }}
                                                                  </option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                      <div class="mb-3">
                                                          <label for="image_{{ $image->id }}" class="form-label fw-semibold">Replace Image (optional)</label>
                                                          <input type="file" class="form-control" id="image_{{ $image->id }}" name="image" accept="image/*">
                                                      </div>
                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                      <button type="submit" class="btn btn-success">Save Changes</button>
                                                  </div>
                                              </form>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End of Edit Image Modal -->

                                        <!-- Delete Image Modal -->
                                        <div class="modal fade" id="deleteImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="deleteImageModalLabel{{ $image->id }}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="deleteImageModalLabel{{ $image->id }}">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to delete this image?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('media.gallery.images.destroy', $image) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End Delete Image Modal -->

                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No images found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @if($paginatedImages->count() > 0)
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p>Showing {{ $paginatedImages->firstItem() }} to {{ $paginatedImages->lastItem() }} of {{ $paginatedImages->total() }} results</p>
                            {{ $paginatedImages->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Create Album Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
                    <div class="card-header bg-success text-white text-center" style="padding: 10px;">
                        <h5 class="mb-0">Create New Album</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('media.gallery.albums.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="album_name" class="form-label fw-semibold">Album Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="album_name" name="name" placeholder="Enter album name" value="{{ old('name') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="album_icon" class="form-label fw-semibold">Icon (optional)</label>
                                <input type="text" class="form-control" id="album_icon" name="icon" placeholder="Enter icon class (e.g., fas fa-folder)" value="{{ old('icon') }}">
                                <small class="form-text text-muted">Use FontAwesome classes or similar for icons.</small>
                            </div>
                            <div class="mb-3">
                                <label for="album_description" class="form-label fw-semibold">Description (optional)</label>
                                <textarea class="form-control" id="album_description" name="description" rows="3" placeholder="Enter album description">{{ old('description') }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-success px-5" style="border-radius: 25px;">Create Album</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Albums Table Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 class="mb-0">Albums</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th style="background-color: #D3D3D3; color: black;">Id</th>
                                    <th style="background-color: #D3D3D3; color: black;">Name</th>
                                    <th style="background-color: #D3D3D3; color: black;">Icon</th>
                                    <th style="background-color: #D3D3D3; color: black;">Description</th>
                                    <th style="background-color: #D3D3D3; color: black;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($paginatedAlbums->count() > 0)
                                    @foreach($paginatedAlbums as $album)
                                        <tr>
                                            <td>
                                                {{ ($paginatedAlbums->currentPage() - 1) * $paginatedAlbums->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $album->name }}</td>
                                            <td>
                                                @if($album->icon)
                                                    <i class="{{ $album->icon }}"></i>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>{{ $album->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewAlbumModal{{ $album->id }}">View</button>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editAlbumModal{{ $album->id }}">Edit</button>
                                                <!-- Delete Button triggers modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteAlbumModal{{ $album->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- View Album Modal -->
                                        <div class="modal fade" id="viewAlbumModal{{ $album->id }}" tabindex="-1" aria-labelledby="viewAlbumModalLabel{{ $album->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="viewAlbumModalLabel{{ $album->id }}">View Album</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p><strong>Name:</strong> {{ $album->name }}</p>
                                                        <p><strong>Icon:</strong> @if($album->icon)<i class="{{ $album->icon }}"></i>@else N/A @endif</p>
                                                        <p><strong>Description:</strong> {{ $album->description }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of View Album Modal -->

                                        <!-- Edit Album Modal -->
                                        <div class="modal fade" id="editAlbumModal{{ $album->id }}" tabindex="-1" aria-labelledby="editAlbumModalLabel{{ $album->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <form action="{{ route('media.gallery.albums.update', $album) }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editAlbumModalLabel{{ $album->id }}">Edit Album</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <label for="album_name_{{ $album->id }}" class="form-label fw-semibold">Album Name <span class="text-danger">*</span></label>
                                                                <input type="text" class="form-control" id="album_name_{{ $album->id }}" name="name" value="{{ old('name', $album->name) }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="album_icon_{{ $album->id }}" class="form-label fw-semibold">Icon (optional)</label>
                                                                <input type="text" class="form-control" id="album_icon_{{ $album->id }}" name="icon" value="{{ old('icon', $album->icon) }}">
                                                                <small class="form-text text-muted">Use FontAwesome classes or similar for icons.</small>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="album_description_{{ $album->id }}" class="form-label fw-semibold">Description (optional)</label>
                                                                <textarea class="form-control" id="album_description_{{ $album->id }}" name="description" rows="3">{{ old('description', $album->description) }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End of Edit Album Modal -->

                                        <!-- Delete Album Modal -->
                                        <div class="modal fade" id="deleteAlbumModal{{ $album->id }}" tabindex="-1" aria-labelledby="deleteAlbumModalLabel{{ $album->id }}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="deleteAlbumModalLabel{{ $album->id }}">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to delete this album?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('media.gallery.albums.destroy', $album) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End Delete Album Modal -->

                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center">No albums found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @if($paginatedAlbums->count() > 0)
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p>Showing {{ $paginatedAlbums->firstItem() }} to {{ $paginatedAlbums->lastItem() }} of {{ $paginatedAlbums->total() }} results</p>
                            {{ $paginatedAlbums->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Video Form -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card" style="border-radius: 15px; box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 class="mb-0">Add New Video</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('media.gallery.videos.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="video_title" class="form-label fw-semibold">Video Title <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="video_title" name="title" placeholder="Enter video title" value="{{ old('title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="video_url" class="form-label fw-semibold">YouTube Embed URL</label>
                                <input type="url" class="form-control" id="video_url" name="url" placeholder="https://www.youtube.com/embed/yourvideoid" value="{{ old('url') }}">
                                <small class="form-text text-muted">Use the YouTube embed URL (e.g., https://www.youtube.com/embed/yourvideoid)</small>
                            </div>
                            <div class="mb-3">
                                <label for="video_file" class="form-label fw-semibold">Or Upload Video</label>
                                <input type="file" name="video" class="form-control" accept="video/*">
                                <small class="form-text text-muted">Supported formats: mp4, avi, wmv, mov. Max size: 20MB.</small>
                            </div>
                            <div class="mb-3">
                                <label for="video_album" class="form-label fw-semibold">Select Album (optional)</label>
                                <select class="form-select" id="video_album" name="gallery_album_id">
                                    <option value="">-- Select Album --</option>
                                    @foreach($albums as $album)
                                        <option value="{{ $album->id }}" {{ old('gallery_album_id') == $album->id ? 'selected' : '' }}>
                                            {{ $album->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="video_description" class="form-label fw-semibold">Description (optional)</label>
                                <textarea class="form-control" id="video_description" name="description" rows="3" placeholder="Enter video description">{{ old('description') }}</textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn text-white px-5" style="background-color: #137547; border-radius: 25px;">Add Video</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Videos Table Section -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                        <h5 class="mb-0">Videos</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped" id="videosTable">
                            <thead>
                                <tr>
                                    <th style="background-color: #D3D3D3; color: black;">Id</th>
                                    <th style="background-color: #D3D3D3; color: black;">Title</th>
                                    <th style="background-color: #D3D3D3; color: black;">Album</th>
                                    <th style="background-color: #D3D3D3; color: black;">Video</th>
                                    <th style="background-color: #D3D3D3; color: black;">Description</th>
                                    <th style="background-color: #D3D3D3; color: black;">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if($paginatedVideos->count() > 0)
                                    @foreach($paginatedVideos as $video)
                                        <tr>
                                            <td>
                                                {{ ($paginatedVideos->currentPage() - 1) * $paginatedVideos->perPage() + $loop->iteration }}
                                            </td>
                                            <td>{{ $video->title }}</td>
                                            <td>{{ $video->galleryAlbum ? $video->galleryAlbum->name : 'Unassigned' }}</td>
                                            <td>
                                                @if($video->url)
                                                    <a href="{{ $video->url }}" target="_blank">View Video</a>
                                                @elseif($video->path)
                                                    <video width="200" controls>
                                                        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                @else
                                                    <span class="text-muted">N/A</span>
                                                @endif
                                            </td>
                                            <td>{{ $video->description }}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewVideoModal{{ $video->id }}">View</button>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editVideoModal{{ $video->id }}">Edit</button>
                                                <!-- Delete Button triggers modal -->
                                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteVideoModal{{ $video->id }}">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- View Video Modal -->
                                        <div class="modal fade" id="viewVideoModal{{ $video->id }}" tabindex="-1" aria-labelledby="viewVideoModalLabel{{ $video->id }}" aria-hidden="true">
                                          <div class="modal-dialog modal-dialog-scrollable" style="max-width:800px;">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                 <h5 class="modal-title" id="viewVideoModalLabel{{ $video->id }}">View Video</h5>
                                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body text-center" style="max-height:600px; overflow:auto;">
                                                 @if($video->url)
                                                    <div class="embed-responsive embed-responsive-16by9 mb-3">
                                                        <iframe class="embed-responsive-item" src="{{ $video->url }}" allowfullscreen></iframe>
                                                    </div>
                                                 @elseif($video->path)
                                                    <video width="100%" controls>
                                                        <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
                                                        Your browser does not support the video tag.
                                                    </video>
                                                 @endif
                                                 <p><strong>Title:</strong> {{ $video->title }}</p>
                                                 <p><strong>Description:</strong> {{ $video->description }}</p>
                                              </div>
                                              <div class="modal-footer">
                                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End of View Video Modal -->

                                        <!-- Edit Video Modal -->
                                        <div class="modal fade" id="editVideoModal{{ $video->id }}" tabindex="-1" aria-labelledby="editVideoModalLabel{{ $video->id }}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <!-- Placeholder for Edit Video Modal -->
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="editVideoModalLabel{{ $video->id }}">Edit Video</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                <!-- Edit form content goes here -->
                                                <form action="{{ route('media.gallery.videos.update', $video) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="video_title_{{ $video->id }}" class="form-label fw-semibold">Video Title <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="video_title_{{ $video->id }}" name="title" value="{{ old('title', $video->title) }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="video_url_{{ $video->id }}" class="form-label fw-semibold">YouTube Embed URL</label>
                                                        <input type="url" class="form-control" id="video_url_{{ $video->id }}" name="url" value="{{ old('url', $video->url) }}">
                                                        <small class="form-text text-muted">Use the YouTube embed URL (e.g., https://www.youtube.com/embed/yourvideoid)</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="video_file_{{ $video->id }}" class="form-label fw-semibold">Replace Video (optional)</label>
                                                        <input type="file" name="video" class="form-control" id="video_file_{{ $video->id }}" accept="video/*">
                                                        <small class="form-text text-muted">Supported formats: mp4, avi, wmv, mov. Max size: 20MB.</small>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="video_album_{{ $video->id }}" class="form-label fw-semibold">Select Album (optional)</label>
                                                        <select class="form-select" id="video_album_{{ $video->id }}" name="gallery_album_id">
                                                            <option value="">-- Select Album --</option>
                                                            @foreach($albums as $album)
                                                                <option value="{{ $album->id }}" {{ ($video->gallery_album_id == $album->id) ? 'selected' : '' }}>
                                                                    {{ $album->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="video_description_{{ $video->id }}" class="form-label fw-semibold">Description (optional)</label>
                                                        <textarea class="form-control" id="video_description_{{ $video->id }}" name="description" rows="3">{{ old('description', $video->description) }}</textarea>
                                                    </div>
                                                </form>
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-success">Save Changes</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End of Edit Video Modal -->

                                        <!-- Delete Video Modal -->
                                        <div class="modal fade" id="deleteVideoModal{{ $video->id }}" tabindex="-1" aria-labelledby="deleteVideoModalLabel{{ $video->id }}" aria-hidden="true">
                                          <div class="modal-dialog">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <h5 class="modal-title" id="deleteVideoModalLabel{{ $video->id }}">Confirm Delete</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                              </div>
                                              <div class="modal-body">
                                                Are you sure you want to delete this video?
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <form action="{{ route('media.gallery.videos.destroy', $video) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <!-- End Delete Video Modal -->

                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="6" class="text-center">No videos found.</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

                        @if($paginatedVideos->count() > 0)
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <p>Showing {{ $paginatedVideos->firstItem() }} to {{ $paginatedVideos->lastItem() }} of {{ $paginatedVideos->total() }} results</p>
                            {{ $paginatedVideos->onEachSide(1)->links('pagination::bootstrap-4') }}
                        </div>
                        @endif
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
