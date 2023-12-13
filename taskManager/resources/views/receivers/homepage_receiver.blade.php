<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    header {
      background-color: #333;
      overflow: hidden;
    }

    header a {
      float: left;
      display: block;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    header a:hover {
      background-color: #ddd;
      color: black;
    }

    main {
      flex: 1;
    }

    footer {
      background-color: #333;
      color: white;
      text-align: center;
      padding: 20px;
    }

    .social-icons a {
      color: white;
      text-decoration: none;
      margin: 0 10px;
    }
  </style>
</head>
<body>

<header>
  <a href="{{route('homepageReceiver')}}">Home</a>
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#contact">Contact</a>
  <a href="{{route('logoutReceiver')}}">Log Out</a>
</header>

<main>

    Welcome, <a href="{{route('profileReceiver')}}">{{Auth::guard('receivers')->user()->name}}</a><br><br>
    You've been the receiver since: {{Auth::guard('receivers')->user()->created_at}}<br>

</main>

<footer>
  <div class="social-icons">
    <a href="https://twitter.com/YourTwitter" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
    <a href="https://facebook.com/YourFacebook" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
    <a href="https://instagram.com/YourInstagram" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
  </div>
</footer>

</body>
</html>