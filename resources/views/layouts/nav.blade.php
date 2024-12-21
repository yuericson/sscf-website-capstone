<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SSCF</title>
  <link rel="icon" type="image/x-icon" href="../images/Logo.png">
  <!-- Bootstrap JS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css2?family=Yeseva+One&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="{{ asset('css/contact-us.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <script src="{{ asset('js/index.js') }}"></script>



  

</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <div class="navbar-text">
      <a href="{{ route('index') }}" class="navbar-link">S S C F</a>
    </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon">
        <div></div> <!-- Middle line -->
      </span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('index') }}">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">About us</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
            <li><a class="dropdown-item" href="{{ route('history') }}">History</a></li>
            <li><a class="dropdown-item" href="{{ route('mission.vision') }}">Mission & Vision</a></li>
            <li><a class="dropdown-item" href="{{ route('leadership') }}">Leadership</a></li>
            <li><a class="dropdown-item" href="{{ route('committees') }}">Committees</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResources" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Resources</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownResources">
            <li><a class="dropdown-item" href="{{ route('student.guide') }}">Student Guide</a></li>
            <li><a class="dropdown-item" href="{{ route('academic.resources') }}">Academic Resources</a></li>
            <li><a class="dropdown-item" href="{{ route('career.support') }}">Career Support</a></li>
            <li><a class="dropdown-item" href="{{ route('wellbeing.support') }}">Well-being Support</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMedia" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">News & Media</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMedia">
            <li><a class="dropdown-item" href="{{ route('latest.news') }}">Latest News</a></li>
            <li><a class="dropdown-item" href="{{ route('newsletter') }}">Newsletter</a></li>
            <li><a class="dropdown-item" href="{{ route('media.gallery') }}">Media Gallery</a></li>
            <li><a class="dropdown-item" href="{{ route('press.releases') }}">Press Releases</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownInvolved" role="button"
            data-bs-toggle="dropdown" aria-expanded="false">Get Involved</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownInvolved">
          <li><a class="dropdown-item" href="{{ route('explore.organization') }}">Explore Organization</a></li>
            <li><a class="dropdown-item" href="{{ route('volunteer.opportunities') }}">Volunteer Opportunities</a></li>
            <li><a class="dropdown-item" href="{{ route('forum') }}">Forum</a></li>
            <li><a class="dropdown-item" href="{{ route('feedback') }}">Feedback</a></li>
            <li><a class="dropdown-item" href="{{ route('sports.registration') }}">Sports Registration</a></li>
            <li><a class="dropdown-item" href="{{ route('local.election') }}">Local Election</a></li>
            <li><a class="dropdown-item" href="{{ route('tabulation') }}">Tabulation</a></li>
            <li><a class="dropdown-item" href="{{ route('calendar.activities') }}">Calendar Activities</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="{{ route('contact.us') }}">Contact us</a></li>
        <li class="nav-item">
        <a class="btn navbar-login-btn" href="{{ route('login.google') }}" id="login-btn">Login</a>



        </li>
      </ul>
    </div>
  </div>
</nav>





