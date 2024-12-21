<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* CSS Variables for Easy Theme Management */
        :root {
            --primary-color: #185F43;
            --primary-hover: #144c35;
            --background-gradient: linear-gradient(135deg, #ece9e6 0%, #ffffff 100%);
            --card-shadow: rgba(0, 0, 0, 0.15) 0px 12px 24px;
            --border-color: #e0e0e0;
            --text-color: #333333;
            --label-color: #555555;
            --invalid-color: #dc3545;
            --button-radius: 8px;
            --transition-speed: 0.3s;
            --font-family: 'Poppins', sans-serif;
            --input-height: 50px;
            --underline-color: #000000; /* New CSS Variable for Underline Color */
        }

        * {
            box-sizing: border-box;
        }

        body {
            background: var(--background-gradient);
            font-family: var(--font-family);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
            padding: 0;
        }

        .login-container {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            padding: 40px 30px; /* Reduced padding for compactness */
            border-radius: var(--button-radius);
            border: 1px solid var(--border-color);
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

        /* Decorative Elements */
        .login-card::before {
            content: '';
            position: absolute;
            top: -50px;
            right: -50px;
            width: 100px;
            height: 100px;
            background: rgba(24, 95, 67, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .login-card::after {
            content: '';
            position: absolute;
            bottom: -50px;
            left: -50px;
            width: 100px;
            height: 100px;
            background: rgba(66, 133, 244, 0.1);
            border-radius: 50%;
            z-index: 0;
        }

        .login-card h3 {
            font-weight: 700;
            color: var(--text-color);
            margin-bottom: 30px; /* Reduced margin */
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .form-label {
            font-weight: 600;
            color: var(--label-color);
        }

        .form-control {
            border: 1px solid #ced4da;
            border-radius: var(--button-radius);
            height: var(--input-height);
            padding: 0 15px;
            font-size: 16px;
            transition: border-color var(--transition-speed) ease-in-out, box-shadow var(--transition-speed) ease-in-out;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(24, 95, 67, 0.25);
            outline: none;
        }

        .invalid-feedback {
            color: var(--invalid-color);
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }


        .btn-login {
            background-color: var(--primary-color);
            border: none;
            color: #ffffff;
            padding: 12px; /* Reduced padding */
            font-size: 16px;
            border-radius: var(--button-radius);
            transition: background-color var(--transition-speed) ease, box-shadow var(--transition-speed) ease;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-top: 10px; /* Added top margin for spacing */
            width: 100%;
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .btn-login:active {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px; /* Adjusted padding for smaller screens */
            }

            .btn-login {
                padding: 10px; /* Further reduced padding */
                font-size: 14px;
            }

            .login-card h3 {
                font-size: 1.5rem;
                margin-bottom: 20px; /* Further reduced margin */
            }
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
            <h3>Admin Login</h3>
            
            <!-- Administrator Login Form -->
            <form method="POST" action="{{ route('admin.login.submit') }}">
                @csrf
                <div class="mb-3"> <!-- Reduced from mb-4 to mb-3 -->
                    <label for="admin-email" class="form-label">Email Address</label>
                    <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        id="admin-email" 
                        name="email" 
                        value="{{ old('email') }}" 
                        required 
                        autofocus
                        placeholder="Enter your email"
                    >
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3"> <!-- Reduced from mb-4 to mb-3 -->
                    <label for="admin-password" class="form-label">Password</label>
                    <input 
                        type="password" 
                        class="form-control @error('password') is-invalid @enderror" 
                        id="admin-password" 
                        name="password" 
                        required
                        placeholder="Enter your password"
                    >
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
                <button type="submit" class="btn btn-login">Login as Admin</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
