<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabulation Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #185F43;
            --primary-hover: #144c35;
            --background-gradient: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            --card-shadow: rgba(0, 0, 0, 0.15) 0px 12px 24px;
            --text-color: #333333;
            --button-radius: 8px;
        }

        body {
            background: var(--background-gradient);
            font-family: 'Arial', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 100%;
            max-width: 400px;
            padding: 20px;
        }

        .login-card {
            padding: 40px 30px;
            border-radius: var(--button-radius);
            box-shadow: var(--card-shadow);
            background-color: #ffffff;
            animation: fadeInUp 0.8s ease-in-out;
            position: relative;
            overflow: hidden;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .login-card h3 {
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 20px;
            text-align: center;
        }

        .form-label {
            font-weight: bold;
            color: var(--text-color);
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: var(--button-radius);
            height: 45px;
            padding: 10px;
            font-size: 16px;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 0.2rem rgba(24, 95, 67, 0.25);
        }

        .btn-login {
            background-color: var(--primary-color);
            border: none;
            color: #ffffff;
            padding: 10px;
            font-size: 16px;
            border-radius: var(--button-radius);
            font-weight: bold;
            margin-top: 10px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }
    </style>
</head>
<body>

<style>
    .back-button-bottom {
        position: fixed; /* Fixed at the bottom */
        bottom: 20px; /* Space from the bottom edge */
        left: 50%; /* Center horizontally */
        transform: translateX(-50%); /* Align the center of the button with the page center */
        z-index: 1000; /* Ensure it's above other elements */
    }

    .back-button-bottom .btn {
        border-radius: 8px; /* Optional: Rounded corners for the button */
        padding: 10px 20px; /* Adjust padding for a better look */
        font-weight: bold; /* Make the text bold */
    }
</style>

      <!-- Bottom Back Button -->
      <div class="back-button-bottom">
            <button type="button" class="btn btn-secondary" onclick="history.back()">
                &larr; Go Back
            </button>
        </div>
<div class="container login-container">
    <div class="login-card">
        <h3>Judge's Login</h3>
        <form action="{{ route('tabulation-login.submit') }}" method="POST">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter your Username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
            </div>
            <button type="submit" class="btn btn-login">Login</button>
        </form>
    </div>
</div>
    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
