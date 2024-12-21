<!-- resources/views/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Poppins:wght@400;600&display=swap" rel="stylesheet">

    <style>
        /* CSS Variables for Easy Theme Management */
        :root {
            --primary-color: #185F43;
            --primary-hover: #144c35;
            --google-blue: #4285F4;
            --google-hover: #3367D6;
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

        .form-check-label {
            color: var(--label-color);
            font-weight: 500;
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
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .btn-login:active {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .google-login-btn {
            background-color: var(--google-blue);
            color: #ffffff;
            border: none;
            transition: background-color var(--transition-speed) ease;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px; /* Reduced padding */
            border-radius: var(--button-radius);
            font-size: 16px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-decoration: none;
            margin-top: 10px; /* Added top margin for spacing */
        }

        .google-login-btn:hover {
            background-color: var(--google-hover);
            color: #ffffff;
        }

        .google-login-btn:active {
            background-color: var(--google-hover);
            color: #ffffff;
        }

        .google-logo {
            width: 24px;
            height: 24px;
            margin-right: 10px; /* Reduced margin */
            transition: transform var(--transition-speed) ease;
        }

        hr {
            border: none; /* Remove default border */
            border-top: 2px solid var(--underline-color); /* Add black underline */
            margin: 20px 0; /* Reduced margin from 40px to 20px */
        }

        @media (max-width: 576px) {
            .login-card {
                padding: 30px 20px; /* Adjusted padding for smaller screens */
            }

            .google-logo {
                width: 20px;
                height: 20px;
                margin-right: 8px; /* Further reduced margin */
            }

            .btn-login, .google-login-btn {
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
    <div class="container login-container">
        <div class="login-card">
            <h3>Login</h3>
            
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
                <div class="mb-3 form-check"> <!-- Reduced from mb-4 to mb-3 -->
                    <input 
                        type="checkbox" 
                        class="form-check-input" 
                        id="admin-remember" 
                        name="remember"
                    >
                    <label class="form-check-label" for="admin-remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-login w-100">Login with Admin</button>
            </form>
            
            <hr>
            
            <!-- User Login via Google -->
            <div class="d-grid">
                <a href="{{ route('login.google') }}" class="btn google-login-btn d-flex align-items-center justify-content-center" aria-label="Login with Google for User">
                    <!-- Official Google "G" Logo as SVG -->
                    <svg class="google-logo" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 533.5 544.3">
                        <path fill="#4285f4" d="M533.5 278.4c0-18.4-1.6-36.1-4.7-53.3H272v101.1h147.4c-6.3 34.4-25 63.4-53.4 82.8v68.6h86.5c50.6-46.7 80-115.5 80-199.2z"/>
                        <path fill="#34a853" d="M272 544.3c72.4 0 133.1-23.9 177-65.1l-86.5-68.6c-24.1 16.2-55 25.7-90.5 25.7-69.5 0-128.3-46.9-149.3-109.6H36.4v68.7C81.3 490.1 169.6 544.3 272 544.3z"/>
                        <path fill="#fbbc04" d="M122.7 324.1c-4.7-13.8-7.4-28.5-7.4-43.1s2.7-29.3 7.4-43.1v-68.7H36.4c-18.1 35.8-28.4 76.4-28.4 119.8s10.3 84 28.4 119.8l86.3-68.7z"/>
                        <path fill="#ea4335" d="M272 107.3c38.3 0 72.8 13.2 100.1 39.1l75-75C407.1 24.2 344.4 0 272 0 169.6 0 81.3 54.2 36.4 135.6l86.3 68.7c21-62.7 79.8-109.6 149.3-109.6z"/>
                    </svg>
                    <span>Login with Google</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
