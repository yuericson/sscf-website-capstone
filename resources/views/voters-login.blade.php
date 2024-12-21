@php
    use App\Models\ElectionSetting;
    use Carbon\Carbon;

    // Retrieve the election settings directly within the Blade template
    $electionSetting = ElectionSetting::first();

    // Determine election status
    if ($electionSetting) {
        $now = Carbon::now();
        $startTime = Carbon::parse($electionSetting->start_time);
        $endTime = Carbon::parse($electionSetting->end_time);

        $isBeforeStart = $now->lt($startTime);
        $isOngoing = $now->between($startTime, $endTime);
        $isAfterEnd = $now->gt($endTime);
    } else {
        // If no election settings are found
        $isBeforeStart = $isOngoing = $isAfterEnd = false;
    }
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voter's Login</title>
    <link rel="icon" type="image/x-icon" href="../images/Logo.png">

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
            --transition-duration: 1s;
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
            max-width: 500px;
            padding: 20px;
        }

        .login-card {
            max-width: 500px;
            padding: 40px 30px;
            border-radius: var(--button-radius);
            box-shadow: var(--card-shadow);
            background-color: #ffffff;
            position: relative;
            overflow: hidden;
            transition: opacity var(--transition-duration) ease, visibility var(--transition-duration) ease;
        }

        .fade-in {
            opacity: 1;
            visibility: visible;
            transition: opacity var(--transition-duration) ease, visibility var(--transition-duration) ease;
        }

        .fade-out {
            opacity: 0;
            visibility: hidden;
            transition: opacity var(--transition-duration) ease, visibility var(--transition-duration) ease;
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
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
        }

        .countdown-section {
            margin-bottom: 20px;
            text-align: center;
        }

        .countdown-title {
            font-weight: bold;
            color: var(--text-color);
            margin-bottom: 10px;
        }

        .countdown-timer {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }

        .timer-section {
            background-color: #f8f9fa;
            padding: 10px 15px;
            border-radius: var(--button-radius);
            box-shadow: var(--card-shadow);
        }

        .timer-section span {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary-color);
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
        
        <!-- Election Status Section -->
        <div class="login-card" id="electionStatus" 
            @if($isAfterEnd) 
                class="login-card fade-out" 
            @elseif($isBeforeStart || $isOngoing) 
                class="login-card fade-in" 
            @endif>
            <h3>Voter's Login</h3>

            @if($electionSetting)
                <div class="countdown-section">
                    <h5 class="countdown-title">Election Status</h5>

                    @if($isBeforeStart)
                        <p class="text-warning">Election has not started yet.</p>
                        <div class="countdown-timer" id="startCountdownTimer">
                            <div class="timer-section">
                                <span id="start-days">00</span> Days
                            </div>
                            <div class="timer-section">
                                <span id="start-hours">00</span> Hours
                            </div>
                            <div class="timer-section">
                                <span id="start-minutes">00</span> Minutes
                            </div>
                            <div class="timer-section">
                                <span id="start-seconds">00</span> Seconds
                            </div>
                        </div>
                        <p>Election starts at: {{ Carbon::parse($electionSetting->start_time)->format('F j, Y, g:i a') }}</p>
                    @elseif($isOngoing)
                    <p class="text-success">Election is ongoing. Please log in to vote.</p>

                        <div class="countdown-timer" id="endCountdownTimer">
                            <div class="timer-section">
                                <span id="end-days">00</span> Days
                            </div>
                            <div class="timer-section">
                                <span id="end-hours">00</span> Hours
                            </div>
                            <div class="timer-section">
                                <span id="end-minutes">00</span> Minutes
                            </div>
                            <div class="timer-section">
                                <span id="end-seconds">00</span> Seconds
                            </div>
                        </div>
                        <p>Election ends at: {{ Carbon::parse($electionSetting->end_time)->format('F j, Y, g:i a') }}</p>
                    @else
                        <p class="text-danger">Election has ended.</p>
                    @endif
                </div>
            @else
                <p class="text-danger">Election settings are not configured.</p>
            @endif
        </div>

        <!-- Voter Login Form Section -->
        <div class="login-card fade-out" id="voterLoginForm" style="display: none;">
            <h3>Voter's Login</h3>
            <form action="{{ route('voters.login') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="student-id" class="form-label">Student ID</label>
                    <input type="text" class="form-control" id="student-id" name="student_id" placeholder="Enter your Student ID" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter your Password" required>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
            </form>
        </div>
    </div>

    @if(session('alreadyVoted'))
        <!-- Modal for Already Voted Error with Red Header -->
        <div class="modal fade" id="alreadyVotedModal" tabindex="-1" aria-labelledby="alreadyVotedModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="alreadyVotedModalLabel">Notice</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="mb-0">Our system indicates that you have already voted!</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var alreadyVotedModal = new bootstrap.Modal(document.getElementById('alreadyVotedModal'));
                alreadyVotedModal.show();
            });
        </script>
    @endif

    <!-- Countdown Timer and Transition Scripts -->
    <script>
        function fadeOutElectionStatus() {
            const electionStatus = document.getElementById('electionStatus');
            const voterLoginForm = document.getElementById('voterLoginForm');

            electionStatus.classList.remove('fade-in');
            electionStatus.classList.add('fade-out');

            setTimeout(() => {
                electionStatus.style.display = 'none';
                voterLoginForm.style.display = 'block';
                voterLoginForm.classList.remove('fade-out');
                voterLoginForm.classList.add('fade-in');
            }, 1000);
        }

        function updateCountdown(endTime, elements) {
            const countDownDate = new Date(endTime).getTime();

            const interval = setInterval(function() {
                const now = new Date().getTime();
                const distance = countDownDate - now;

                if (distance < 0) {
                    clearInterval(interval);
                    fadeOutElectionStatus();
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById(elements.days).innerHTML = days < 10 ? '0' + days : days;
                document.getElementById(elements.hours).innerHTML = hours < 10 ? '0' + hours : hours;
                document.getElementById(elements.minutes).innerHTML = minutes < 10 ? '0' + minutes : minutes;
                document.getElementById(elements.seconds).innerHTML = seconds < 10 ? '0' + seconds : seconds;
            }, 1000);
        }

        @if($isBeforeStart)
            updateCountdown("{{ $electionSetting->start_time }}", {
                days: 'start-days',
                hours: 'start-hours',
                minutes: 'start-minutes',
                seconds: 'start-seconds'
            });
        @elseif($isOngoing)
            setTimeout(fadeOutElectionStatus, 2000);
            updateCountdown("{{ $electionSetting->end_time }}", {
                days: 'end-days',
                hours: 'end-hours',
                minutes: 'end-minutes',
                seconds: 'end-seconds'
            });
        @endif
    </script>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
