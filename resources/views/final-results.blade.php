<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}">

    <title>Final Results - {{ $pageant->name }}</title>

    <!-- Bootstrap CSS -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <style>
        /*
          --- COLOR PALETTE ---
          #01210F (Dark Green)
          #14591D (Medium Green)
          #E1E289 (Light Greenish) - use sparingly
          #FCE7D9 (Pale Peach)    - use sparingly
        */

        /* Body with a light background and default Bootstrap font */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 750px; /* Reduced maximum width */
            margin: auto;
            padding: 15px;    /* Reduced padding */
        }

        /* Table fonts and spacing */
        .table {
            font-size: 1.2rem; /* Reduced base font size */
        }
        .table thead th {
            font-size: 1.4rem; 
            padding: 10px;     /* Reduced padding */
        }
        .table tbody td {
            font-size: 1.2rem;
            padding: 10px;     /* Reduced padding */
        }

        /* Card styling */
        .card {
            padding: 10px;
            border-radius: 10px; /* Softer corners */
            border: 1px solid #14591D; /* Outline with medium green */
        }

        /* Card Header: Dark Green background with Light Greenish text */
        .card-header {
            padding: 10px;       /* Reduced padding */
            background-color: #01210F !important;
            color: #E1E289 !important;
            text-align: center;
            border-bottom: 1px solid #14591D;
        }

        .card-header h2 {
            font-size: 1.6rem; /* Reduced header font size */
            margin: 0;         /* Remove extra spacing */
        }

        /* Card Footer */
        .card-footer {
            padding: 10px; /* Reduced padding */
        }

        /* Table Head: Medium Green background with Light Greenish text */
        .table thead.bg-dark {
            background-color: #14591D !important;
        }
        .table thead.bg-dark th {
            color: #E1E289 !important;
            border-color: #01210F !important;
        }
        .table-bordered > :not(caption) > * > * {
            border-color: #14591D !important;
        }

        /* Scores in medium green, bold */
        .text-success.font-weight-bold {
            color: #14591D !important;  /* Override .text-success to match the palette */
            font-weight: bold;
        }

        /* "Print Results" button: override the default 'btn-primary' color */
        .btn-primary {
            background-color: #14591D !important; /* Medium Green */
            border-color: #14591D !important;
        }
        .btn-primary:hover {
            background-color: #01210F !important; /* Dark Green on hover */
            border-color: #01210F !important;
        }

        /* Hide certain elements when printing */
        @media print {
            .no-print {
                display: none;
            }
            body {
                background-color: white;
            }
            .card {
                border: none;
                box-shadow: none;
            }
            .table {
                font-size: 1rem; /* Adjusted for printing */
            }
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Page Title -->
        <h1 class="text-center mb-3" style="color: #14591D; font-size: 2rem;">
            Final Results: {{ $pageant->name }}
        </h1>
        
        <div class="card shadow">
            <!-- Card Header -->
            <div class="card-header">
                <h2 class="mb-0">Ranking of Participants</h2>
            </div>

            <!-- Card Body -->
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead class="bg-dark">
                            <tr>
                                <th style="width: 20%;">Rank</th>
                                <th style="width: 50%;">Candidate</th>
                                <th style="width: 30%;">Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td class="align-middle font-weight-bold">
                                        {{ $result['rank'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $result['name'] }}
                                    </td>
                                    <td class="align-middle text-success font-weight-bold">
                                        {{ number_format($result['total_score'], 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer (includes Print Button) -->
            <div class="card-footer text-center no-print">
                <button
                  class="btn btn-primary btn-lg"
                  onclick="printResults()"
                >
                    Print Results
                </button>
                <p class="text-muted mt-2" style="font-size: 1rem;">
                    Generated on {{ now()->format('F d, Y h:i A') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Script: Print Results -->
    <script>
        function printResults() {
            window.print();
        }
    </script>

    <!-- Bootstrap JS Bundle -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    ></script>
</body>
</html>
