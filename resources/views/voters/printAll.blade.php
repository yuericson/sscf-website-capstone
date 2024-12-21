<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Print All Voters</title>
    <!-- Optional: Include Bootstrap for styling -->
      <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Customize print styles */
        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
            .no-print {
                display: none;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }
            th, td {
                border: 1px solid #000;
                padding: 8px;
                text-align: left;
            }
            th {
                background-color: #f2f2f2;
            }
            h2 {
                text-align: center;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container my-4">
        <h2 class="text-center mb-4">Registered Voters</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>College</th>
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
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        // Automatically trigger the print dialog when the page loads
        window.onload = function() {
            window.print();
        };
    </script>
</body>
</html>
