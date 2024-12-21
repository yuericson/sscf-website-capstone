<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">
  <title>Tabulator Management</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons & Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-..." crossorigin="anonymous">

  <!-- Custom Styles -->
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
      background-color: #f0f0f0;
      color: #000;
    }

    /* General Styles */
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      margin: 0;
      padding: 0;
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
      left: 0;
      right: 0;
      z-index: 1000;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      padding: 0 20px;
      color: #fff;
    }
    /* Sa header, pinanatili na ang logo ng "S S C F" */
    .header .logo {
      font-family: 'Agatho', serif;
      font-size: 2rem;
      font-weight: bold;
      letter-spacing: 0.2rem;
      color: #fff;
      transition: color 0.3s ease;
    }
    .header .logo:hover {
      color: #0c3925;
    }
    /* Main Content Styles */
    .main-content {
      margin-top: 70px;
      padding: 20px;
    }
    /* Card Styles */
    .card {
      border: none;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 30px;
    }
    .card-header {
      border-radius: 10px 10px 0 0;
    }
    /* Responsive Adjustments */
    @media (max-width: 768px) {
      .header {
        padding: 0 10px;
      }
      .main-content {
        padding: 10px;
      }
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header" id="header">
    <!-- Logo (SSC F logo na lang ang ipapakita) -->
    <div class="logo">S S C F</div>
    <div class="user-profile dropdown me-5">
      @auth('tabulator')
        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" 
           id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
          <!-- Admin Icon -->
          <i class="fas fa-user-shield admin-icon"></i>
          <!-- Avatar and Info -->
          <img src="{{ Auth::guard('tabulator')->user()->avatar ?? 'https://via.placeholder.com/40' }}" alt="User Avatar">
          <div class="user-info">
            <div class="name">{{ Auth::guard('tabulator')->user()->name }}</div>
            <div class="status"><i class="fas fa-circle"></i> Online</div>
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

  <!-- PHP Data Initialization -->
  @php
    use App\Models\Pageant;
    use App\Models\Judge;
    use App\Models\Category;
    use App\Models\Participant;
    use App\Models\Criteria;

    // Retrieve counts for statistics
    $totalJudges       = Judge::count();
    $totalCriteria     = Criteria::count();
    $totalCategories   = Category::count();
    $totalParticipants = Participant::count();
    
    // Count total, approved, and denied pageants
    $totalPageants    = Pageant::count();
    $approvedPageants = Pageant::where('status', 'approved')->count();
    $deniedPageants   = Pageant::where('status', 'denied')->count();

    // PAGINATE each table
    $judges = Judge::with('pageants')->orderBy('id')->paginate(10);
    $pageants = Pageant::with('judges')->orderBy('id')->paginate(10);
    $categories = Category::with(['pageant', 'criteria'])->orderBy('id')->paginate(10);
    $participants = Participant::with('pageant')->orderBy('id')->paginate(10);
    $managedPageants = Pageant::orderBy('id', 'desc')->paginate(10);
  @endphp

  <!-- Main Content -->
  <div class="main-content p-4" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Tabulator Dashboard</h2>

    <!-- Statistics Section -->
    <div class="row mt-4">
      <!-- Total Pageants -->
      <div class="col-md-4 mb-4">
        <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
          <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
            <i class="fas fa-award fa-lg"></i>
          </div>
          <div class="ms-3">
            <h6 class="text-muted mb-1">Total Event</h6>
            <h4 class="mb-0">{{ $totalPageants }}</h4>
          </div>
        </div>
      </div>
      <!-- Approved Pageants -->
      <div class="col-md-4 mb-4">
        <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
          <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
            <i class="fas fa-check-circle fa-lg"></i>
          </div>
          <div class="ms-3">
            <h6 class="text-muted mb-1">Approved Event</h6>
            <h4 class="mb-0">{{ $approvedPageants }}</h4>
          </div>
        </div>
      </div>
      <!-- Denied Pageants -->
      <div class="col-md-4 mb-4">
        <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
          <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
            <i class="fas fa-times-circle fa-lg"></i>
          </div>
          <div class="ms-3">
            <h6 class="text-muted mb-1">Denied Event</h6>
            <h4 class="mb-0">{{ $deniedPageants }}</h4>
          </div>
        </div>
      </div>
    </div>

    <!-- Final Results Display Section -->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
          <div class="card-header text-center" style="background: linear-gradient(to right, #FFC107, #FF8C00); color: white; padding: 20px; border-radius: 8px 8px 0 0;">
            <h4 class="mb-0">Final Results</h4>
          </div>
          <div class="card-body" style="background: #FCE7D9; padding: 30px; border-radius: 0 0 8px 8px;">
            <p class="text-center" style="font-size: 1.1rem; color: #14591D; margin-bottom: 20px;">
              Select a Event below to view the final results:
            </p>
            <div class="list-group">
              @forelse($pageants as $pageant)
                <a href="{{ route('final-results', $pageant->id) }}"
                   target="_blank"
                   class="list-group-item list-group-item-action"
                   style="background: linear-gradient(to right, #E1E289, #FCE7D9); color: #0A210F; margin-bottom: 10px; border-radius: 5px; border: 1px solid #D4D4D4; transition: transform 0.3s, background 0.3s;">
                  <div class="d-flex justify-content-between align-items-center">
                    <span style="font-weight: bold; font-size: 1.2rem;">{{ $pageant->name }}</span>
                    <span class="badge" style="background-color: #14591D; color: #FCE7D9; font-size: 0.9rem; padding: 5px 10px; border-radius: 5px;">View Results</span>
                  </div>
                </a>
              @empty
                <p class="text-center">No Event Found.</p>
              @endforelse
            </div>
            <!-- Pagination for Final Results -->
            @if($pageants->count() > 0)
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small>
                  Showing {{ $pageants->firstItem() }} to {{ $pageants->lastItem() }} of {{ $pageants->total() }} results
                </small>
                {{ $pageants->links() }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

    <!-- Manage Event Section -->
    <div class="row mt-5">
      <div class="col-md-12">
        <div class="card mb-4 shadow-sm">
          <div class="card-header text-center" style="background: linear-gradient(to right, #0A210F, #0A210F); color: white; padding: 20px; border-radius: 8px 8px 0 0;">
            <h4 class="mb-0">Manage Event</h4>
          </div>
          <div class="card-body" style="background: #FCE7D9; padding: 30px; border-radius: 0 0 8px 8px;">
            <p class="text-center" style="font-size: 1.1rem; color: #14591D; margin-bottom: 20px;">
              Manage your Event below:
            </p>
            <div class="table-responsive">
              <table class="table table-bordered" id="managePageantsTable">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($managedPageants as $pageant)
                    <tr>
                      <td>{{ $pageant->id }}</td>
                      <td>{{ $pageant->name }}</td>
                      <td>
                        @if($pageant->status == 'approved')
                          <span class="badge bg-success">Approved</span>
                        @elseif($pageant->status == 'denied')
                          <span class="badge bg-danger">Denied</span>
                        @else
                          <span class="badge bg-warning text-dark">Pending</span>
                        @endif
                      </td>
                      <td>
                        <!-- View Button -->
                        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewPageantModal{{ $pageant->id }}">
                          <i class="fas fa-eye"></i> View
                        </button>
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPageantModal{{ $pageant->id }}">
                          <i class="fas fa-edit"></i> Edit
                        </button>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deletePageantModal{{ $pageant->id }}">
                          <i class="fas fa-trash-alt"></i> Delete
                        </button>
                        <!-- Approve Button -->
                        @if($pageant->status != 'approved')
                          <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#approvePageantModal{{ $pageant->id }}">
                            <i class="fas fa-check"></i> Approve
                          </button>
                        @endif
                        <!-- Deny Button -->
                        @if($pageant->status != 'denied')
                          <button type="button" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#denyPageantModal{{ $pageant->id }}">
                            <i class="fas fa-times"></i> Deny
                          </button>
                        @endif
                      </td>
                    </tr>

                    <!-- View Pageant Modal -->
                    <div class="modal fade" id="viewPageantModal{{ $pageant->id }}" tabindex="-1" aria-labelledby="viewPageantModalLabel{{ $pageant->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="viewPageantModalLabel{{ $pageant->id }}">Final Results: {{ $pageant->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            @if($pageant->status == 'approved')
                              <h6>Participants:</h6>
                              <ul>
                                @foreach($pageant->participants as $participant)
                                  <li>{{ $participant->name }} - Score: {{ $participant->score }}</li>
                                @endforeach
                              </ul>
                              <h6>Winners:</h6>
                              <ol>
                                @foreach($pageant->participants->sortByDesc('score')->take(3) as $winner)
                                  <li>{{ $winner->name }} - Score: {{ $winner->score }}</li>
                                @endforeach
                              </ol>
                            @else
                              <p class="text-danger">Final results are not available for this Event.</p>
                            @endif
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Edit Pageant Modal -->
                    <div class="modal fade" id="editPageantModal{{ $pageant->id }}" tabindex="-1" aria-labelledby="editPageantModalLabel{{ $pageant->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="{{ route('pageant-edit', $pageant->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                              <h5 class="modal-title" id="editPageantModalLabel{{ $pageant->id }}">Edit Event</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <!-- Pageant Name -->
                              <div class="mb-3">
                                <label for="name{{ $pageant->id }}" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name{{ $pageant->id }}" value="{{ old('name', $pageant->name) }}" required>
                                @error('name')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <!-- Pageant Gender -->
                              <div class="mb-3">
                                <label for="gender{{ $pageant->id }}" class="form-label">Sex</label>
                                <select class="form-select" name="gender" id="gender{{ $pageant->id }}" required>
                                  <option value="male" {{ $pageant->gender == 'male' ? 'selected' : '' }}>Male</option>
                                  <option value="female" {{ $pageant->gender == 'female' ? 'selected' : '' }}>Female</option>
                                  <option value="other" {{ $pageant->gender == 'other' ? 'selected' : '' }}>Other</option>
                                </select>
                                @error('gender')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <!-- Pageant Description -->
                              <div class="mb-3">
                                <label for="description{{ $pageant->id }}" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description{{ $pageant->id }}" rows="3">{{ old('description', $pageant->description) }}</textarea>
                                @error('description')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <!-- Pageant Date -->
                              <div class="mb-3">
                                <label for="date{{ $pageant->id }}" class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date{{ $pageant->id }}" value="{{ old('date', $pageant->date) }}" required>
                                @error('date')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
                              </div>
                              <!-- Pageant Status -->
                              <div class="mb-3">
                                <label for="status{{ $pageant->id }}" class="form-label">Status</label>
                                <select class="form-select" name="status" id="status{{ $pageant->id }}" required>
                                  <option value="pending" {{ $pageant->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                  <option value="approved" {{ $pageant->status == 'approved' ? 'selected' : '' }}>Approved</option>
                                  <option value="denied" {{ $pageant->status == 'denied' ? 'selected' : '' }}>Denied</option>
                                </select>
                                @error('status')
                                  <div class="text-danger">{{ $message }}</div>
                                @enderror
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

                    <!-- Delete Pageant Modal -->
                    <div class="modal fade" id="deletePageantModal{{ $pageant->id }}" tabindex="-1" aria-labelledby="deletePageantModalLabel{{ $pageant->id }}" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <form action="{{ route('pageant-delete', $pageant->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal-header">
                              <h5 class="modal-title" id="deletePageantModalLabel{{ $pageant->id }}">Delete Event</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              Are you sure you want to delete <strong>{{ $pageant->name }}</strong>? This action cannot be undone.
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                              <button type="submit" class="btn btn-danger">Delete</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>

                    <!-- Approve Pageant Modal -->
                    <div class="modal fade" id="approvePageantModal{{ $pageant->id }}" tabindex="-1" aria-labelledby="approvePageantModalLabel{{ $pageant->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="approvePageantModalLabel{{ $pageant->id }}">Approve Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to approve <strong>{{ $pageant->name }}</strong>? This action cannot be undone.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('pageant.approve', $pageant->id) }}" method="POST" class="d-inline">
                              @csrf
                              <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>

                    <!-- Deny Pageant Modal -->
                    <div class="modal fade" id="denyPageantModal{{ $pageant->id }}" tabindex="-1" aria-labelledby="denyPageantModalLabel{{ $pageant->id }}" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="denyPageantModalLabel{{ $pageant->id }}">Deny Event</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Are you sure you want to deny <strong>{{ $pageant->name }}</strong>? This action cannot be undone.
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('pageant.deny', $pageant->id) }}" method="POST" class="d-inline">
                              @csrf
                              <button type="submit" class="btn btn-secondary">Deny</button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  @empty
                    <tr>
                      <td colspan="4" class="text-center">No Event Found.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
            <!-- Pagination for Manage Event -->
            @if($managedPageants->count() > 0)
              <div class="d-flex justify-content-between align-items-center mt-3">
                <small>
                  Showing {{ $managedPageants->firstItem() }} to {{ $managedPageants->lastItem() }} of {{ $managedPageants->total() }} results
                </small>
                {{ $managedPageants->links() }}
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>

  <!-- Bootstrap JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    // Prevent back button after logout
    (function () {
      window.history.forward();
    })();
    window.onunload = function () { null };
  </script>

  @include('components.loader') <!-- I-include ang loader component dito kung kinakailangan -->
</body>
</html>
