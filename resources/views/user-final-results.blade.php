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
          #FCE7D9 (Pale Peach)     - use sparingly
        */

        /* Keep the main page background white */
        body {
            background-color: #FFFFFF;
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif; /* Using your chosen font */
        }

        .container {
            max-width: 750px;
            margin: auto;
            padding: 15px;
        }

        /* 
          Text color overrides:
          Use medium green (#14591D) for .text-primary 
        */
        .text-primary {
            color: #14591D !important;
        }

        /* Card styling with a medium green border */
        .card {
            border: 1px solid #14591D;
            border-radius: 10px;
        }

        /* Card header with dark green background + light greenish text */
        .card-header {
            background-color: #01210F !important;
            color: #E1E289 !important; 
            border-bottom: 1px solid #14591D;
            text-align: center;
            padding: 10px; 
        }
        .card-header h2 {
            margin: 0;
        }

        /* Card footer */
        .card-footer {
            padding: 10px;
        }

        /* Table styling: 
           Thead has medium green (#14591D) with light greenish (#E1E289) text
        */
        .table-responsive {
            margin-top: 15px;
        }
        .table {
            margin: 0 auto;
        }
        .table thead {
            background-color: #14591D;
        }
        .table thead th {
            color: #E1E289;
            border-color: #01210F;
        }
        .table tbody td {
            border-color: #14591D;
        }
        .table-bordered > :not(caption) > * > * {
            border-color: #14591D !important;
        }

        /* Score text in medium green (#14591D), bold */
        .text-score {
            color: #14591D;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <!-- Main Heading -->
        <h1 class="text-center text-primary mb-3">
            Final Results: {{ $pageant->name }}
        </h1>

        <div class="card shadow">
            <!-- Card Header (Dark Green) -->
            <div class="card-header">
                <h2 class="mb-0">Ranking of Participants</h2>
            </div>

            <!-- Card Body -->
            <div class="card-body text-center">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped text-center">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Rank</th>
                                <th style="width: 50%;">Candidate</th>
                                <th style="width: 30%;">Total Score</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($results as $result)
                                <tr>
                                    <td class="align-middle fw-bold">
                                        {{ $result['rank'] }}
                                    </td>
                                    <td class="align-middle">
                                        {{ $result['name'] }}
                                    </td>
                                    <td class="align-middle text-score">
                                        {{ number_format($result['total_score'], 2) }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Card Footer -->
            <div class="card-footer text-center">
                <p class="text-muted mt-2 mb-0">
                    Generated on {{ now()->format('F d, Y h:i A') }}
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    ></script>
</body>
</html>
