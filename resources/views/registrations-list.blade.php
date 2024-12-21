<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations for {{ $sport }}</title>
        <link rel="icon" type="image/png" href="{{ asset('images/Logo.png') }}">
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome CSS for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* Custom Color Palette */
        :root {
            --dark-green: #0A210F;    /* #0A210F */
            --medium-green: #14591D;  /* #14591D */
            --light-yellow: #E1E289;  /* #E1E289 */
            --light-pink: #FCE7D9;    /* #FCE7D9 */
            --header-bg: var(--dark-green);
            --table-header-bg: var(--medium-green);
            --table-header-text: #FFFFFF;
            --even-row-bg: var(--light-yellow);
            --odd-row-bg: var(--light-pink);
            --button-bg: var(--medium-green);
            --button-hover-bg: var(--dark-green);
            --button-text: #FFFFFF;
            --text-color: #000000;
            --background-color: #f8f9fa; /* Light Gray Background */
            --container-bg: #ffffff;      /* White Background for Container */
            --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
            --table-border-color: var(--dark-green); /* Border Color for Table */
        }

        body {
            font-family: Arial, sans-serif;
            background-color: var(--background-color);
            padding: 20px;
            color: var(--text-color);
        }

        .table-container {
            margin: auto;
            max-width: 1200px;
            background: var(--container-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            padding: 30px;
        }

        h3.text-center {
            color: var(--dark-green);
            margin-bottom: 30px;
            font-weight: bold;
        }

        .table thead {
            background-color: var(--table-header-bg);
            color: var(--table-header-text);
        }

        /* Table Borders */
        .table th, .table td {
            border: 1px solid var(--table-border-color);
        }

        .table tbody tr:nth-child(even) {
            background-color: var(--even-row-bg);
        }

        .table tbody tr:nth-child(odd) {
            background-color: var(--odd-row-bg);
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
            /* Remove existing border-bottom to prevent double borders */
            border-bottom: none;
        }

        .table tbody tr:hover {
            background-color: #d4edda; /* Light Green Hover Effect */
        }

        .back-btn {
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 30px auto 0 auto;
            max-width: 200px;
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 12px 24px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.2s ease;
        }

        .back-btn i {
            margin-right: 8px;
        }

        .back-btn:hover {
            background-color: var(--button-hover-bg);
            color: var(--button-text);
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-decoration: none;
        }

        /* Responsive Adjustments */
        @media (max-width: 992px) {
            .table-container {
                padding: 25px;
            }

            .back-btn {
                max-width: 180px;
                padding: 10px 20px;
                font-size: 15px;
            }
        }

        @media (max-width: 768px) {
            .table-container {
                padding: 20px;
            }

            .back-btn {
                max-width: 160px;
                padding: 8px 16px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .table-container {
                padding: 15px;
            }

            .back-btn {
                max-width: 140px;
                padding: 6px 12px;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>
    <div class="table-container">
        <h3 class="text-center mb-4">Registrations for {{ $sport }}</h3>
        @if ($registrations->isEmpty())
            <p class="text-center text-muted">No registrations found for {{ $sport }}.</p>
        @else
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Year Level</th>
                            <th>Course</th>
                            <th>College/Campus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($registrations as $index => $registration)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $registration->full_name }}</td>
                                <td>{{ $registration->year_level }}</td>
                                <td>{{ $registration->course }}</td>
                                <td>{{ $registration->college_campus }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        <a href="{{ route('sports.list') }}" class="btn back-btn">
            <i class="fas fa-arrow-left"></i> Back to Sports
        </a>
    </div>
    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
