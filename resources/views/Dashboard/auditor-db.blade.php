<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Auditor Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css" rel="stylesheet">
   <!-- Bootstrap CSS -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- CSRF Token for AJAX (if needed) -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    // Kunin ang kasalukuyang taon
    $currentYear = now()->year;

    // Kalkulahin ang total inflows at outflows batay sa amount
    $totalInflows  = \App\Models\Transaction::where('type', 'inflow')->sum('amount');
    $totalOutflows = \App\Models\Transaction::where('type', 'outflow')->sum('amount');

    // Kalkulahin ang total debit at credit (gamit ang bagong fields)
    $totalDebit  = \App\Models\Transaction::sum('debit');   // kabuuang pumapasok
    $totalCredit = \App\Models\Transaction::sum('credit');  // kabuuang lumalabas

    // Kalkulahin ang current funds batay sa amount
    $currentFunds = $totalInflows - $totalOutflows;

    // Kunin ang beginning balance
    $beginningBalance      = \App\Models\BeginningBalance::where('year', $currentYear)->first();
    $beginningBalanceAmount = $beginningBalance ? $beginningBalance->amount : 0;

    // Kalkulahin ang ending cash on hand
    $endingCashOnHand = $beginningBalanceAmount + $currentFunds;

    // Ihanda ang monthly inflows at outflows para sa kasalukuyang taon
    $monthlyInflows  = [];
    $monthlyOutflows = [];
    for ($month = 1; $month <= 12; $month++) {
        $monthlyInflows[$month] = \App\Models\Transaction::where('type', 'inflow')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $month)
            ->sum('amount');

        $monthlyOutflows[$month] = \App\Models\Transaction::where('type', 'outflow')
            ->whereYear('date', $currentYear)
            ->whereMonth('date', $month)
            ->sum('amount');
    }

    // Para sa ibang sections ng dashboard (Totals at Beginning Balances) ay naka‑paginate
    $totals            = \App\Models\Total::orderBy('year', 'desc')->paginate(10);
    $beginningBalances = \App\Models\BeginningBalance::orderBy('year', 'desc')->paginate(10);

    // Para sa transactions table na may running balance, kunin ang lahat ng transactions sa tamang order (ascending)
    $allTransactions = \App\Models\Transaction::orderBy('date', 'asc')->get();
    // Itakda ang running balance sa beginning balance bilang panimulang halaga
    $runningBalance  = $beginningBalanceAmount;
@endphp

<!-- Navigation Links -->
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('beginning-balances.index') }}">Beginning Balances</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('totals.index') }}">Totals</a>
        </li>
        <!-- Iba pang navigation items -->
    </ul>
</div>
</div>
</nav>

<!-- Main Content -->
<div class="main-content" id="mainContent">
    <h2 class="mb-4 border-bottom pb-2">Auditor Dashboard</h2>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Summary Statistics Cards --}}
    <div class="row mt-4 mb-4">
        <!-- Cash Inflows Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-arrow-down fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Cash Inflows</h6>
                    <h4 class="mb-0">₱{{ number_format($totalInflows, 2) }}</h4>
                </div>
            </div>
        </div>
        <!-- Cash Outflows Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-arrow-up fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Cash Outflows</h6>
                    <h4 class="mb-0">₱{{ number_format($totalOutflows, 2) }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Debit Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-plus fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Debit</h6>
                    <h4 class="mb-0">₱{{ number_format($totalDebit, 2) }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Credit Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-minus fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Credit</h6>
                    <h4 class="mb-0">₱{{ number_format($totalCredit, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Additional Statistics Cards --}}
    <div class="row">
        <!-- Beginning Balance Card -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-secondary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-chart-line fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Beginning Balance</h6>
                    <h4 class="mb-0">₱{{ number_format($beginningBalance->amount ?? 0, 2) }}</h4>
                </div>
            </div>
        </div>
        <!-- Ending Cash On Hand Card -->
        <div class="col-md-6 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-hand-holding-usd fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Ending Cash On Hand</h6>
                    <h4 class="mb-0">₱{{ number_format($endingCashOnHand, 2) }}</h4>
                </div>
            </div>
        </div>
    </div>

    {{-- Monthly Cash Flow Chart --}}
    <div class="card mt-4">
        <div class="card-header">
            <h5>Monthly Cash Flow</h5>
        </div>
        <div class="card-body">
            <canvas id="cashFlowChart"></canvas>
        </div>
    </div>

    <!-- Transactions Section with Running Balance -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 class="mb-0">Transactions</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                        <i class="fas fa-plus"></i> Add Transaction
                    </button>
                </div>
                <div class="card-body">
                    <!-- Table: Date, Description, Withdrawal (Lumabas), Deposit (Pumasok), Running Balance, Category, Actions -->
                    <table class="table table-bordered table-hover" id="transactionsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Description</th>
                                <th>Withdrawal (₱)</th>
                                <th>Deposit (₱)</th>
                                <th>Running Balance (₱)</th>
                                <th>Category</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($allTransactions->isEmpty())
                                <tr>
                                    <td colspan="7" class="text-center">No transactions found.</td>
                                </tr>
                            @else
                                @php 
                                    // Itakda ang running balance sa beginning balance
                                    $runningBalance = $beginningBalanceAmount;
                                @endphp
                                @foreach($allTransactions as $transaction)
                                    @php
                                        // I-compute ang running balance: kung deposit, idadagdag; kung withdrawal, ibabawas.
                                        if ($transaction->type === 'inflow') {
                                            $runningBalance += $transaction->amount;
                                        } else {
                                            $runningBalance -= $transaction->amount;
                                        }
                                    @endphp
                                    <tr id="transaction-{{ $transaction->id }}">
                                        <td>{{ \Carbon\Carbon::parse($transaction->date)->format('M d, Y') }}</td>
                                        <td>{{ $transaction->description }}</td>
                                        <td>
                                            @if($transaction->type === 'outflow')
                                                <span class="text-danger">₱{{ number_format($transaction->amount, 2) }}</span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>
                                            @if($transaction->type === 'inflow')
                                                <span class="text-success">₱{{ number_format($transaction->amount, 2) }}</span>
                                            @else
                                                -
                                            @endif
                                        </td>
                                        <td>₱{{ number_format($runningBalance, 2) }}</td>
                                        <td>{{ $transaction->care_of }}</td>
                                        <td>
                                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTransactionModal-{{ $transaction->id }}">
                                                <i class="fas fa-edit"></i> Edit
                                            </button>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTransactionModal-{{ $transaction->id }}">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </button>
                                        </td>
                                    </tr>

                                    <!-- Edit Transaction Modal -->
                                    <div class="modal fade" id="editTransactionModal-{{ $transaction->id }}" tabindex="-1" aria-labelledby="editTransactionModalLabel-{{ $transaction->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="editTransactionModalLabel-{{ $transaction->id }}">Edit Transaction</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Date -->
                                                        <div class="mb-3">
                                                            <label for="edit-date-{{ $transaction->id }}" class="form-label">Date:</label>
                                                            <input type="date" name="date" id="edit-date-{{ $transaction->id }}" class="form-control" value="{{ $transaction->date }}" required>
                                                        </div>
                                                        <!-- Description -->
                                                        <div class="mb-3">
                                                            <label for="edit-description-{{ $transaction->id }}" class="form-label">Description:</label>
                                                            <input type="text" name="description" id="edit-description-{{ $transaction->id }}" class="form-control" value="{{ $transaction->description }}" required>
                                                        </div>
                                                        <!-- Amount -->
                                                        <div class="mb-3">
                                                            <label for="edit-amount-{{ $transaction->id }}" class="form-label">Amount (₱):</label>
                                                            <input type="number" name="amount" id="edit-amount-{{ $transaction->id }}" class="form-control" step="0.01" value="{{ $transaction->amount }}" required>
                                                        </div>
                                                        <!-- Category -->
                                                        <div class="mb-3">
                                                            <label for="edit-care_of-{{ $transaction->id }}" class="form-label">Category:</label>
                                                            <input type="text" name="care_of" id="edit-care_of-{{ $transaction->id }}" class="form-control" value="{{ $transaction->care_of }}" required>
                                                        </div>
                                                        <!-- Transaction Type -->
                                                        <div class="mb-3">
                                                            <label for="edit-type-{{ $transaction->id }}" class="form-label">Transaction Type:</label>
                                                            <select name="type" id="edit-type-{{ $transaction->id }}" class="form-select" required>
                                                                <option value="" disabled>Select Type</option>
                                                                <option value="inflow" {{ $transaction->type === 'inflow' ? 'selected' : '' }}>Inflow (Deposit)</option>
                                                                <option value="outflow" {{ $transaction->type === 'outflow' ? 'selected' : '' }}>Outflow (Withdrawal)</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn btn-primary">Update Transaction</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                    <!-- Delete Transaction Modal -->
                                    <div class="modal fade" id="deleteTransactionModal-{{ $transaction->id }}" tabindex="-1" aria-labelledby="deleteTransactionModalLabel-{{ $transaction->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <form action="{{ route('transactions.destroy', $transaction->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteTransactionModalLabel-{{ $transaction->id }}">Delete Transaction</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Are you sure you want to delete this transaction?</p>
                                                        <p><strong>{{ $transaction->description }}</strong></p>
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
                        </tbody>
                    </table>
                    <!-- (Optional) Search/Filter controls dito -->
                </div>
            </div>
        </div>
    </div>

    <!-- Totals Management Section -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 class="mb-0">Totals</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addTotalModal">
                        <i class="fas fa-plus"></i> Add Totals
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="totalsTable">
                        <thead class="table-light">
                            <tr>
                                <th>Year</th>
                                <th>Total Inflows (₱)</th>
                                <th>Total Outflows (₱)</th>
                                <th>Current Funds (₱)</th>
                                <th>Ending Cash On Hand (₱)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($totals as $total)
                                <tr id="total-{{ $total->id }}">
                                    <td>{{ $total->year }}</td>
                                    <td>₱{{ number_format($total->total_inflows, 2) }}</td>
                                    <td>₱{{ number_format($total->total_outflows, 2) }}</td>
                                    <td>₱{{ number_format($total->current_funds, 2) }}</td>
                                    <td>₱{{ number_format($total->ending_cash_on_hand, 2) }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editTotalModal-{{ $total->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteTotalModal-{{ $total->id }}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Total Modal -->
                                <div class="modal fade" id="editTotalModal-{{ $total->id }}" tabindex="-1" aria-labelledby="editTotalModalLabel-{{ $total->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('totals.update', $total->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editTotalModalLabel-{{ $total->id }}">Edit Totals</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Year -->
                                                    <div class="mb-3">
                                                        <label for="edit-total-year-{{ $total->id }}" class="form-label">Year:</label>
                                                        <input type="number" name="year" id="edit-total-year-{{ $total->id }}" class="form-control" value="{{ $total->year }}" required>
                                                    </div>
                                                    <!-- Total Inflows -->
                                                    <div class="mb-3">
                                                        <label for="edit-total-inflows-{{ $total->id }}" class="form-label">Total Inflows (₱):</label>
                                                        <input type="number" name="total_inflows" id="edit-total-inflows-{{ $total->id }}" class="form-control" step="0.01" value="{{ $total->total_inflows }}" required>
                                                    </div>
                                                    <!-- Total Outflows -->
                                                    <div class="mb-3">
                                                        <label for="edit-total-outflows-{{ $total->id }}" class="form-label">Total Outflows (₱):</label>
                                                        <input type="number" name="total_outflows" id="edit-total-outflows-{{ $total->id }}" class="form-control" step="0.01" value="{{ $total->total_outflows }}" required>
                                                    </div>
                                                    <!-- Current Funds -->
                                                    <div class="mb-3">
                                                        <label for="edit-total-current-funds-{{ $total->id }}" class="form-label">Current Funds (₱):</label>
                                                        <input type="number" name="current_funds" id="edit-total-current-funds-{{ $total->id }}" class="form-control" step="0.01" value="{{ $total->current_funds }}" required>
                                                    </div>
                                                    <!-- Ending Cash On Hand -->
                                                    <div class="mb-3">
                                                        <label for="edit-total-ending-cash-{{ $total->id }}" class="form-label">Ending Cash On Hand (₱):</label>
                                                        <input type="number" name="ending_cash_on_hand" id="edit-total-ending-cash-{{ $total->id }}" class="form-control" step="0.01" value="{{ $total->ending_cash_on_hand }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Totals</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Delete Total Modal -->
                                <div class="modal fade" id="deleteTotalModal-{{ $total->id }}" tabindex="-1" aria-labelledby="deleteTotalModalLabel-{{ $total->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('totals.destroy', $total->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteTotalModalLabel-{{ $total->id }}">Delete Totals</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete these totals for the year <strong>{{ $total->year }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete Totals</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No totals found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination para sa Totals -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>
                            Showing {{ $totals->firstItem() }} to {{ $totals->lastItem() }} of {{ $totals->total() }} results
                        </p>
                        {{ $totals->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Beginning Balances Section -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center" style="background-color: #137547; color: white; padding: 10px;">
                    <h5 class="mb-0">Beginning Balances</h5>
                    <button class="btn btn-light btn-sm" data-bs-toggle="modal" data-bs-target="#addBeginningBalanceModal">
                        <i class="fas fa-plus"></i> Add Beginning Balance
                    </button>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover" id="beginningBalancesTable">
                        <thead class="table-light">
                            <tr>
                                <th>Year</th>
                                <th>Amount (₱)</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($beginningBalances as $balance)
                                <tr id="balance-{{ $balance->id }}">
                                    <td>{{ $balance->year }}</td>
                                    <td>₱{{ number_format($balance->amount, 2) }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editBeginningBalanceModal-{{ $balance->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteBeginningBalanceModal-{{ $balance->id }}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </td>
                                </tr>

                                <!-- Edit Beginning Balance Modal -->
                                <div class="modal fade" id="editBeginningBalanceModal-{{ $balance->id }}" tabindex="-1" aria-labelledby="editBeginningBalanceModalLabel-{{ $balance->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('beginning-balances.update', $balance->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editBeginningBalanceModalLabel-{{ $balance->id }}">Edit Beginning Balance</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Year -->
                                                    <div class="mb-3">
                                                        <label for="edit-balance-year-{{ $balance->id }}" class="form-label">Year:</label>
                                                        <input type="number" name="year" id="edit-balance-year-{{ $balance->id }}" class="form-control" value="{{ $balance->year }}" required>
                                                    </div>
                                                    <!-- Amount -->
                                                    <div class="mb-3">
                                                        <label for="edit-balance-amount-{{ $balance->id }}" class="form-label">Amount (₱):</label>
                                                        <input type="number" name="amount" id="edit-balance-amount-{{ $balance->id }}" class="form-control" step="0.01" value="{{ $balance->amount }}" required>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-primary">Update Beginning Balance</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- Delete Beginning Balance Modal -->
                                <div class="modal fade" id="deleteBeginningBalanceModal-{{ $balance->id }}" tabindex="-1" aria-labelledby="deleteBeginningBalanceModalLabel-{{ $balance->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('beginning-balances.destroy', $balance->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteBeginningBalanceModalLabel-{{ $balance->id }}">Delete Beginning Balance</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Are you sure you want to delete the beginning balance for the year <strong>{{ $balance->year }}</strong>?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                    <button type="submit" class="btn btn-danger">Delete Beginning Balance</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">No beginning balances found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- Pagination para sa Beginning Balances -->
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <p>
                            Showing {{ $beginningBalances->firstItem() }} to {{ $beginningBalances->lastItem() }} of {{ $beginningBalances->total() }} results
                        </p>
                        {{ $beginningBalances->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Transaction Modal -->
    <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTransactionModalLabel">Add New Transaction</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Date -->
                        <div class="mb-3">
                            <label for="add-date" class="form-label">Date:</label>
                            <input type="date" name="date" id="add-date" class="form-control" required>
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="add-description" class="form-label">Description:</label>
                            <input type="text" name="description" id="add-description" class="form-control" placeholder="e.g., Event Sponsorship" required>
                        </div>
                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="add-amount" class="form-label">Amount (₱):</label>
                            <input type="number" name="amount" id="add-amount" class="form-control" step="0.01" required>
                        </div>
                        <!-- Source / Destination (Category) -->
                        <div class="mb-3">
                            <label for="add-care_of" class="form-label">Source / Destination (Category):</label>
                            <input type="text" name="care_of" id="add-care_of" class="form-control" placeholder="e.g., Donation Bank / Vendor Payment" required>
                        </div>
                        <!-- Transaction Type -->
                        <div class="mb-3">
                            <label for="add-type" class="form-label">Transaction Type:</label>
                            <select name="type" id="add-type" class="form-select" required>
                                <option value="" disabled selected>Select Type</option>
                                <option value="inflow">Inflow (Deposit)</option>
                                <option value="outflow">Outflow (Withdrawal)</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Transaction</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Total Modal -->
    <div class="modal fade" id="addTotalModal" tabindex="-1" aria-labelledby="addTotalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('totals.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addTotalModalLabel">Add New Totals</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Year -->
                        <div class="mb-3">
                            <label for="add-total-year" class="form-label">Year:</label>
                            <input type="number" name="year" id="add-total-year" class="form-control" placeholder="e.g., 2025" required>
                        </div>
                        <!-- Total Inflows -->
                        <div class="mb-3">
                            <label for="add-total-inflows" class="form-label">Total Inflows (₱):</label>
                            <input type="number" name="total_inflows" id="add-total-inflows" class="form-control" step="0.01" required>
                        </div>
                        <!-- Total Outflows -->
                        <div class="mb-3">
                            <label for="add-total-outflows" class="form-label">Total Outflows (₱):</label>
                            <input type="number" name="total_outflows" id="add-total-outflows" class="form-control" step="0.01" required>
                        </div>
                        <!-- Current Funds -->
                        <div class="mb-3">
                            <label for="add-total-current-funds" class="form-label">Current Funds (₱):</label>
                            <input type="number" name="current_funds" id="add-total-current-funds" class="form-control" step="0.01" required>
                        </div>
                        <!-- Ending Cash On Hand -->
                        <div class="mb-3">
                            <label for="add-total-ending-cash" class="form-label">Ending Cash On Hand (₱):</label>
                            <input type="number" name="ending_cash_on_hand" id="add-total-ending-cash" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Totals</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Beginning Balance Modal -->
    <div class="modal fade" id="addBeginningBalanceModal" tabindex="-1" aria-labelledby="addBeginningBalanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="{{ route('beginning-balances.store') }}" method="POST">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBeginningBalanceModalLabel">Add New Beginning Balance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Year -->
                        <div class="mb-3">
                            <label for="add-balance-year" class="form-label">Year:</label>
                            <input type="number" name="year" id="add-balance-year" class="form-control" placeholder="e.g., 2025" required>
                        </div>
                        <!-- Amount -->
                        <div class="mb-3">
                            <label for="add-balance-amount" class="form-label">Amount (₱):</label>
                            <input type="number" name="amount" id="add-balance-amount" class="form-control" step="0.01" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Add Beginning Balance</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- JavaScript para sa Dashboard Functionality -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Chart.js
            const canvas = document.getElementById('cashFlowChart');
            if (canvas) {
                const ctx = canvas.getContext('2d');
                const cashFlowChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: [
                            'January', 'February', 'March', 'April', 'May', 'June', 
                            'July', 'August', 'September', 'October', 'November', 'December'
                        ],
                        datasets: [{
                            label: 'Inflows',
                            data: @json(array_values($monthlyInflows)),
                            backgroundColor: 'rgba(40, 167, 69, 0.6)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        }, {
                            label: 'Outflows',
                            data: @json(array_values($monthlyOutflows)),
                            backgroundColor: 'rgba(220, 53, 69, 0.6)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ₱' + context.parsed.y.toLocaleString();
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                console.error('Canvas element with id "cashFlowChart" not found.');
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
