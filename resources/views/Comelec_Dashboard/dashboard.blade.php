<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <title>Comelec Dashboard</title>
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
    <h2 class="mb-4 border-bottom pb-2">Comelec Dashboard</h2>

    @php
        use App\Models\LocalSection;
        use App\Models\ElectionSetting;
        use Carbon\Carbon;

        // Retrieve data from the database
        $totalVoters = \DB::table('voters_login')->count();
        $totalPositions = \DB::table('election_positions')->count();
        $totalCandidates = \DB::table('election_candidates')->count();
        $totalVotes = \DB::table('election_voters_vote')->count();

        // Get registered voters with pagination and votes_count
        $voters = \DB::table('voters_login')
            ->select('voters_login.*')
            ->selectRaw('(SELECT COUNT(*) FROM election_voters_vote WHERE election_voters_vote.voter_id = voters_login.id) as votes_count')
            ->orderBy('id', 'asc')
            ->paginate(10);

        // Get all positions and candidates ordered by ID
        $positions = \DB::table('election_positions')->orderBy('id', 'asc')->get();
        $candidates = \DB::table('election_candidates')->orderBy('position_id', 'asc')->get();

        // Get all votes with details
        $votes = \DB::table('election_voters_vote')
            ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
            ->select(
                'voters_login.student_id as student_id',
                'voters_login.name as voter_name',
                'election_voters_vote.votes',
                'election_voters_vote.updated_at as voted_at'
            )
            ->orderBy('election_voters_vote.updated_at', 'desc')
            ->get();

        // Format votes for display
        $formattedVotes = $votes->map(function ($vote) {
            $votesData = json_decode($vote->votes, true);
            $formatted = '';
            foreach ($votesData as $position => $candidate) {
                $formatted .= "<strong>{$position}</strong>: {$candidate}<br>";
            }
            return [
                'student_id' => $vote->student_id,
                'voter_name' => $vote->voter_name,
                'votes' => $formatted,
                'voted_at' => $vote->voted_at,
            ];
        });

        // Data for Charts
        $votersByCollege = \DB::table('voters_login')
            ->select('college', \DB::raw('count(*) as total'))
            ->groupBy('college')
            ->get();

        $votesByCollege = \DB::table('election_voters_vote')
            ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
            ->select('voters_login.college', \DB::raw('count(*) as total_votes'))
            ->groupBy('voters_login.college')
            ->get();

        // Votes by Position and Candidate ordered by position_id ascending
        $votesByPositionAndCandidate = \DB::table('election_candidates')
            ->join('election_positions', 'election_candidates.position_id', '=', 'election_positions.id')
            ->select(
                'election_positions.id as position_id',
                'election_positions.name as position_name',
                'election_candidates.id as candidate_id',
                'election_candidates.name as candidate_name',
                \DB::raw('(SELECT COUNT(*) FROM election_voters_vote 
                            WHERE JSON_CONTAINS(election_voters_vote.votes, 
                                                JSON_OBJECT(election_positions.name, election_candidates.name))
                          ) as total_votes')
            )
            ->orderBy('election_positions.id', 'asc')
            ->get();

        // Prepare chart data for Total Votes and Abstain per Candidate
        $totalVotesAndAbstainPerCandidate = [];
        foreach ($votesByPositionAndCandidate as $vote) {
            if (!isset($totalVotesAndAbstainPerCandidate[$vote->candidate_id])) {
                $totalVotesAndAbstainPerCandidate[$vote->candidate_id] = [
                    'position_id'    => $vote->position_id,
                    'position_name'  => $vote->position_name,
                    'candidate_name' => $vote->candidate_name,
                    'total_votes'    => 0,
                    'total_abstains' => 0,
                ];
            }
            $voteData = \DB::table('election_voters_vote')
                ->whereRaw("JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = '{$vote->candidate_name}' OR JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = 'Abstain'")
                ->select(
                    \DB::raw("SUM(CASE WHEN JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = 'Abstain' THEN 1 ELSE 0 END) as abstain_count"),
                    \DB::raw("SUM(CASE WHEN JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = '{$vote->candidate_name}' THEN 1 ELSE 0 END) as votes_count")
                )
                ->first();
            $totalVotesAndAbstainPerCandidate[$vote->candidate_id]['total_votes'] = $voteData->votes_count ?? 0;
            $totalVotesAndAbstainPerCandidate[$vote->candidate_id]['total_abstains'] = $voteData->abstain_count ?? 0;
        }
        $totalVotesAndAbstainPerCandidate = collect($totalVotesAndAbstainPerCandidate)
            ->sortBy('position_id')
            ->values()
            ->all();

        // Prepare chart data for Total Votes and Abstain Cast by College per Candidate
        $votesAndAbstainsByCollegePerCandidate = [];
        foreach ($votesByPositionAndCandidate as $vote) {
            if (!isset($votesAndAbstainsByCollegePerCandidate[$vote->candidate_id])) {
                $votesAndAbstainsByCollegePerCandidate[$vote->candidate_id] = [
                    'position_id'    => $vote->position_id,
                    'position_name'  => $vote->position_name,
                    'candidate_name' => $vote->candidate_name,
                    'votes_by_college' => []
                ];
            }
            $votesPerCollege = \DB::table('election_voters_vote')
                ->join('voters_login', 'election_voters_vote.voter_id', '=', 'voters_login.id')
                ->whereRaw("JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = '{$vote->candidate_name}' OR JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = 'Abstain'")
                ->select(
                    'voters_login.college',
                    \DB::raw("SUM(CASE WHEN JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = 'Abstain' THEN 1 ELSE 0 END) as abstain_count"),
                    \DB::raw("SUM(CASE WHEN JSON_EXTRACT(votes, '$.\"{$vote->position_name}\"') = '{$vote->candidate_name}' THEN 1 ELSE 0 END) as votes_count")
                )
                ->groupBy('voters_login.college')
                ->get();
            foreach ($votesPerCollege as $vc) {
                $votesAndAbstainsByCollegePerCandidate[$vote->candidate_id]['votes_by_college'][$vc->college] = [
                    'votes'    => $vc->votes_count ?? 0,
                    'abstains' => $vc->abstain_count ?? 0,
                ];
            }
        }
        $votesAndAbstainsByCollegePerCandidate = collect($votesAndAbstainsByCollegePerCandidate)
            ->sortBy('position_id')
            ->values()
            ->all();

        // Define $sections if not already passed from the controller
        if (!isset($sections)) {
            $sections = LocalSection::with('subtitles.electionimages')->get();
        }
        $totalSections = $sections->count();
        $totalSubtitles = $sections->sum(fn($section) => $section->subtitles->count());
        $totalElectionImages = $sections->sum(fn($section) => $section->subtitles->sum(fn($subtitle) => $subtitle->electionimages->count()));

        // Define color sets for charts
        $colorSets = [
            ['rgba(75, 192, 192, 0.6)', 'rgba(255, 206, 86, 0.6)'],
            ['rgba(255, 99, 132, 0.6)', 'rgba(54, 162, 235, 0.6)'],
            ['rgba(153, 102, 255, 0.6)', 'rgba(255, 159, 64, 0.6)'],
            ['rgba(255, 205, 86, 0.6)', 'rgba(75, 192, 192, 0.6)'],
            ['rgba(54, 162, 235, 0.6)', 'rgba(255, 99, 132, 0.6)'],
        ];
    @endphp

    <!-- STATISTICS SECTION -->
    <div class="row mt-4">
        <!-- Registered Voters Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-users fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Registered Voters</h6>
                    <h4 class="mb-0">{{ $totalVoters }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Positions Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-info text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-briefcase fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Positions</h6>
                    <h4 class="mb-0">{{ $totalPositions }}</h4>
                </div>
            </div>
        </div>
        <!-- Total Candidates Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-user-tie fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Candidates</h6>
                    <h4 class="mb-0">{{ $totalCandidates }}</h4>
                </div>
            </div>
        </div>
        <!-- Voters Voted Card -->
        <div class="col-md-3 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-danger text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-check-circle fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Voters Voted</h6>
                    <h4 class="mb-0">{{ $totalVotes }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- SUMMARY STATISTICS (Sections, Subtitles, Images) -->
    <div class="row mb-4">
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-primary text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-folder fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Election Title</h6>
                    <h4 class="mb-0">{{ $totalSections }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-success text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-file-alt fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Subtitle Position</h6>
                    <h4 class="mb-0">{{ $totalSubtitles }}</h4>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="d-flex align-items-center p-3 shadow rounded bg-white h-100">
                <div class="bg-warning text-white d-flex align-items-center justify-content-center rounded" style="width: 60px; height: 60px;">
                    <i class="fas fa-images fa-lg"></i>
                </div>
                <div class="ms-3">
                    <h6 class="text-muted mb-1">Total Candidate Images</h6>
                    <h4 class="mb-0">{{ $totalElectionImages }}</h4>
                </div>
            </div>
        </div>
    </div>

    <!-- RESULT CONTROLS -->
    <div class="container mt-4">
        <h2 class="text-center">Result Controls</h2>
        <div class="d-flex justify-content-center gap-3 mt-4">
            <button id="btn-toggleSections" class="btn btn-primary" onclick="toggleAllSections()">
                Show All Result to User Page
            </button>
            <!-- Print All Button -->
            <button id="btn-printAll" class="btn btn-secondary" onclick="printAllSections()">
                <i class="fas fa-print"></i> Print All Charts
            </button>
            <!-- Global Toggle Button for Local Election Content -->
            <button id="btn-toggleLocalElectionGlobal" class="btn btn-warning" onclick="toggleLocalElectionContentGlobal()">
                Hide All Local Election Content
            </button>
        </div>
    </div>

    <!-- CHARTS SECTION -->
    <div class="row mt-5">
        <!-- Registered Voters by College -->
        <div class="col-md-6 mb-4">
            <div class="card" style="height: 400px;">
                <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Registered Voters by College</h5>
                    <!-- Print Button -->
                    <button class="btn btn-light btn-sm" onclick="printSection('registeredByCollegeSection')">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
                <div class="card-body printable-section" id="registeredByCollegeSection">
                    <canvas id="registeredByCollegeChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Votes Cast by College -->
        <div class="col-md-6 mb-4">
            <div class="card" style="height: 400px;">
                <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Votes Cast by College</h5>
                    <!-- Print Button -->
                    <button class="btn btn-light btn-sm" onclick="printSection('votesByCollegeSection')">
                        <i class="fas fa-print"></i> Print
                    </button>
                </div>
                <div class="card-body printable-section" id="votesByCollegeSection">
                    <canvas id="votesByCollegeChart"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- TOTAL VOTES AND ABSTAIN -->
    <div class="row mt-4">
        <div class="col-12 mb-4">
            <div class="p-3 mb-3 text-white rounded d-flex justify-content-between align-items-center bg-success">
                <h4 class="mb-0 text-center">Total Votes and Abstain</h4>
            </div>
        </div>
        @foreach($totalVotesAndAbstainPerCandidate as $data)
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            {{ $data['position_name'] }} - {{ $data['candidate_name'] }}
                        </h5>
                        <!-- Print Button -->
                        <button class="btn btn-light btn-sm" 
                                onclick="printSection('totalVotesAbstainChartCandidate{{ $loop->index + 1 }}Section')">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                    <div class="card-body printable-section" id="totalVotesAbstainChartCandidate{{ $loop->index + 1 }}Section">
                        <canvas id="totalVotesAbstainChartCandidate{{ $loop->index + 1 }}"></canvas>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- TOTAL VOTES AND ABSTAIN CAST BY COLLEGE -->
    <div class="row mt-4">
        <div class="col-12 mb-4">
            <div class="p-3 mb-3 text-white rounded d-flex justify-content-between align-items-center bg-success">
                <h4 class="mb-0 text-center">Total Votes and Abstain Cast by College</h4>
            </div>
        </div>
        @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
            <div class="col-md-12 mb-4">
                <div class="card" style="height: 600px;">
                    <div class="card-header bg-success text-white p-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">
                            {{ $data['position_name'] }} - {{ $data['candidate_name'] }}
                        </h5>
                        <!-- Print Button -->
                        <button class="btn btn-light btn-sm"
                                onclick="printSection('votesAbstainByCollegeChartCandidate{{ $loop->index + 1 }}Section')">
                            <i class="fas fa-print"></i> Print
                        </button>
                    </div>
                    <div class="card-body printable-section" id="votesAbstainByCollegeChartCandidate{{ $loop->index + 1 }}Section">
                        <canvas id="votesAbstainByCollegeChartCandidate{{ $loop->index + 1 }}"></canvas>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- CHART.JS AND PRINT SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <script>
        // Toggle Sections (for dashboard charts)
        function toggleAllSections() {
            const currentState = localStorage.getItem('allSections') === 'visible' ? 'hidden' : 'visible';
            localStorage.setItem('allSections', currentState);

            const elementsToToggle = [
                'dashboardContainer', 
                'registeredVotersSection',
                'votesCastSection',
                'totalVotesAbstainSection',
                'votesByCollegeSection'
            ];

            elementsToToggle.forEach(elementId => {
                const element = document.getElementById(elementId);
                if (element) {
                    element.style.display = currentState === 'visible' ? 'block' : 'none';
                }
            });

            const button = document.getElementById('btn-toggleSections');
            button.textContent = currentState === 'visible' ? 'Hide All Results' : 'Show All Results';
        }

        document.addEventListener('DOMContentLoaded', () => {
            const currentState = localStorage.getItem('allSections') || 'hidden';
            const button = document.getElementById('btn-toggleSections');
            button.textContent = currentState === 'visible' ? 'Hide All Results' : 'Show All Results';
        });

        // Global Toggle for Local Election Content from Dashboard
        function toggleLocalElectionContentGlobal() {
            let hidden = localStorage.getItem("localElectionHidden") === "true";
            if (hidden) {
                localStorage.setItem("localElectionHidden", "false");
                document.getElementById('btn-toggleLocalElectionGlobal').textContent = "Hide All Local Election Content (Global)";
                alert("Local Election content will be shown next time you load the Local Election page.");
            } else {
                localStorage.setItem("localElectionHidden", "true");
                document.getElementById('btn-toggleLocalElectionGlobal').textContent = "Show All Local Election Content (Global)";
                alert("Local Election content will be hidden and 'Not Election Season' will be displayed on the Local Election page.");
            }
        }

        // Local Toggle for Local Election Content (if needed directly on dashboard)
        function toggleLocalElectionContent() {
            const container = document.getElementById('localElectionContainer');
            const button = document.getElementById('btn-toggleLocalElectionContent');
            if (container.style.display === 'none' || container.style.display === '') {
                container.style.display = 'block';
                button.textContent = 'Hide All Local Election Content';
            } else {
                container.style.display = 'none';
                button.textContent = 'Show All Local Election Content';
            }
        }

        // Print Section
        function printSection(sectionId) {
            const contentElement = document.getElementById(sectionId);
            const clonedContent = contentElement.cloneNode(true);

            const canvases = clonedContent.getElementsByTagName('canvas');
            Array.from(canvases).forEach(function(canvas) {
                const originalCanvas = document.getElementById(canvas.id);
                const img = document.createElement('img');
                img.src = originalCanvas.toDataURL();
                img.style.maxWidth = '100%';
                canvas.parentNode.replaceChild(img, canvas);
            });

            const mywindow = window.open('', 'Print', 'height=800,width=1200');
            mywindow.document.write('<html><head><title>Print Section</title>');
            mywindow.document.write('<style>body { font-family: Arial, sans-serif; padding: 20px; }</style>');
            mywindow.document.write('</head><body>');
            mywindow.document.write(clonedContent.innerHTML);
            mywindow.document.write('</body></html>');
            mywindow.document.close();
            mywindow.focus();
            setTimeout(function () {
                mywindow.print();
                mywindow.close();
            }, 1000);
            return true;
        }

        // Print All Sections
        function printAllSections() {
            const printableSections = document.querySelectorAll('.printable-section');
            if (printableSections.length === 0) {
                alert('No sections available to print.');
                return;
            }
            const clonedSections = [];
            printableSections.forEach(section => {
                const clonedSection = section.cloneNode(true);
                const canvases = clonedSection.getElementsByTagName('canvas');
                Array.from(canvases).forEach(canvas => {
                    const originalCanvas = document.getElementById(canvas.id);
                    const img = document.createElement('img');
                    img.src = originalCanvas.toDataURL('image/png');
                    img.style.maxWidth = '100%';
                    canvas.parentNode.replaceChild(img, canvas);
                });
                clonedSections.push(clonedSection.innerHTML);
            });
            const printWindow = window.open('', 'Print All Charts', 'height=1000,width=1200');
            printWindow.document.write('<html><head><title>Print All Charts</title>');
            printWindow.document.write('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">');
            printWindow.document.write('<style>body { font-family: Arial, sans-serif; padding: 20px; } .chart-section { margin-bottom: 40px; }</style>');
            printWindow.document.write('</head><body>');
            clonedSections.forEach(content => {
                printWindow.document.write('<div class="chart-section">' + content + '</div>');
            });
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.focus();
            printWindow.onload = function () {
                printWindow.print();
                printWindow.close();
            };
        }
    </script>

    <script>
        // Chart Data from PHP
        const registeredByCollegeLabels = @json($votersByCollege->pluck('college'));
        const registeredByCollegeData   = @json($votersByCollege->pluck('total'));

        const votesByCollegeLabels = @json($votesByCollege->pluck('college'));
        const votesByCollegeData   = @json($votesByCollege->pluck('total_votes'));

        const totalVotesAndAbstainData         = @json($totalVotesAndAbstainPerCandidate);
        const votesAndAbstainsByCollegeData    = @json($votesAndAbstainsByCollegePerCandidate);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Registered Voters by College (Horizontal Bar)
            const ctxRegisteredByCollege = document.getElementById('registeredByCollegeChart').getContext('2d');
            new Chart(ctxRegisteredByCollege, {
                type: 'bar',
                data: {
                    labels: registeredByCollegeLabels,
                    datasets: [{
                        label: 'Registered Voters',
                        data: registeredByCollegeData,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)',
                        ],
                        borderWidth: 1,
                    }],
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: 'white',
                            anchor: 'center',
                            align: 'center',
                            font: { size: 14, weight: 'bold' },
                            formatter: (value) => value,
                        },
                        legend: { display: false },
                        title:  { display: true, text: 'Registered Voters by College' },
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: { display: true, text: 'Number of Voters' },
                            ticks: { precision: 0 },
                        },
                        y: { title: { display: false } },
                    },
                },
                plugins: [ChartDataLabels],
            });

            // Votes Cast by College (Pie)
            const ctxVotesByCollege = document.getElementById('votesByCollegeChart').getContext('2d');
            new Chart(ctxVotesByCollege, {
                type: 'pie',
                data: {
                    labels: votesByCollegeLabels,
                    datasets: [{
                        label: 'Votes Cast',
                        data: votesByCollegeData,
                        backgroundColor: [
                            'rgba(80, 200, 120, 0.6)',
                            'rgba(255, 191, 0, 0.6)',
                            'rgba(191, 95, 255, 0.6)',
                            'rgba(108, 122, 137, 0.6)',
                            'rgba(75, 0, 130, 0.6)',
                            'rgba(255, 165, 0, 0.6)',
                        ],
                        borderColor: [
                            'rgba(80, 200, 120, 1)',
                            'rgba(255, 191, 0, 1)',
                            'rgba(191, 95, 255, 1)',
                            'rgba(108, 122, 137, 1)',
                            'rgba(75, 0, 130, 1)',
                            'rgba(255, 165, 0, 1)',
                        ],
                        borderWidth: 1,
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: 'white',
                            formatter: (value, context) => {
                                const total = context.chart.data.datasets[0].data.reduce((sum, val) => sum + val, 0);
                                const percentage = ((value / total) * 100).toFixed(1);
                                return value + ' (' + percentage + '%)';
                            },
                            font: { size: 14, weight: 'bold' },
                            align: 'center',
                            anchor: 'center',
                        },
                        legend: { display: true, position: 'right' },
                        title: { display: true, text: 'Votes Cast by College' },
                    },
                },
                plugins: [ChartDataLabels],
            });

            // Total Votes and Abstain (Horizontal Bars)
            @foreach($totalVotesAndAbstainPerCandidate as $data)
                @php
                    $colorSet = $colorSets[$loop->index % count($colorSets)];
                @endphp
                const ctxTotalVotesAbstain{{ $loop->index + 1 }} = document.getElementById('totalVotesAbstainChartCandidate{{ $loop->index + 1 }}').getContext('2d');
                new Chart(ctxTotalVotesAbstain{{ $loop->index + 1 }}, {
                    type: 'bar',
                    data: {
                        labels: ['Votes', 'Abstain'],
                        datasets: [{
                            label: '{{ $data['candidate_name'] }}',
                            data: [{{ $data['total_votes'] }}, {{ $data['total_abstains'] }}],
                            backgroundColor: [
                                '{{ $colorSet[0] }}',
                                '{{ $colorSet[1] }}',
                            ],
                            borderColor: [
                                '{{ $colorSet[0] }}',
                                '{{ $colorSet[1] }}',
                            ],
                            borderWidth: 1,
                        }],
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            datalabels: {
                                color: 'white',
                                anchor: 'center',
                                align: 'center',
                                font: { size: 14, weight: 'bold' },
                                formatter: (value) => value,
                            },
                            legend: { display: false },
                            title: { display: true, text: 'Total Votes and Abstain for {{ $data['candidate_name'] }}' },
                        },
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: { display: true, text: 'Number of Votes' },
                                ticks: { precision: 0 },
                            },
                            y: { title: { display: false } },
                        },
                    },
                    plugins: [ChartDataLabels],
                });
            @endforeach

            // Votes and Abstain by College (Horizontal Bars with Legends)
            @foreach($votesAndAbstainsByCollegePerCandidate as $candidateId => $data)
                @php
                    $colorSet = $colorSets[$loop->index % count($colorSets)];
                @endphp
                const ctxVotesAbstainByCollege{{ $loop->index + 1 }} = document.getElementById('votesByCollegeChart{{ $candidateId }}').getContext('2d');
                new Chart(ctxVotesAbstainByCollege{{ $loop->index + 1 }}, {
                    type: 'bar',
                    data: {
                        labels: @json(array_keys($data['votes_by_college'])),
                        datasets: [
                            {
                                label: 'Votes',
                                data: @json(array_column($data['votes_by_college'], 'votes')),
                                backgroundColor: '{{ $colorSet[0] }}',
                                borderColor: '{{ $colorSet[0] }}',
                                borderWidth: 1,
                            },
                            {
                                label: 'Abstain',
                                data: @json(array_column($data['votes_by_college'], 'abstains')),
                                backgroundColor: '{{ $colorSet[1] }}',
                                borderColor: '{{ $colorSet[1] }}',
                                borderWidth: 1,
                            }
                        ]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                title: { display: true, text: 'Number of Votes' },
                                ticks: { precision: 0 },
                            },
                            y: {
                                title: { display: true, text: 'Colleges' },
                                ticks: { precision: 0 },
                            },
                        },
                        plugins: {
                            datalabels: {
                                color: 'white',
                                anchor: 'center',
                                align: 'center',
                                font: { size: 14, weight: 'bold' },
                                formatter: (value) => value,
                            },
                            legend: { display: true, position: 'top' },
                            title: { display: true, text: 'Total Votes and Abstain Cast by College for {{ $data["candidate_name"] }}' }
                        }
                    },
                    plugins: [ChartDataLabels],
                });
            @endforeach
        });
    </script>

    {{-- Print-specific styling --}}
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            .printable-section, .printable-section * {
                visibility: visible;
            }
            .printable-section {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
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
