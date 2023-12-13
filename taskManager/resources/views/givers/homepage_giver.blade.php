<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Homepage</title>
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

    .message-container {
        width: 300px;
        padding: 1px;
        box-sizing: border-box;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        background-color: #fff;
        text-align: center;
        position:absolute;
        bottom:10%;
        right:1%;
    }

    .error {
        color: #dc3545;
        background-color: #f8d7da;
        border: 1px solid #dc3545;
    }

    .success {
        color: #28a745;
        background-color: #d4edda;
        border: 1px solid #28a745;
    }
  </style>
</head>
<body>

<header>
  <a href="{{route('homepageGiver')}}">Home</a>
  <a href="#about">About</a>
  <a href="#services">Services</a>
  <a href="#contact">Contact</a>
  <a href="{{route('logoutGiver')}}">Log Out</a>
</header>

<main>

    Welcome, <a href="{{route('profileGiver')}}">{{Auth::guard('givers')->user()->name}}</a><br><br>
    You've been the giver since: {{Auth::guard('givers')->user()->created_at}}<br>

</main>


@if($errors->any())
        <div>
            @foreach($errors->all() as $error)
                <div class="message-container error">
                    <p>{{$error}}</p>
                </div>
            @endforeach
        </div>
    @endif

    @if(session()->has('error'))
        <div class="message-container error">
            <p>{{session('error')}}</p>
        </div>
    @endif

    @if(session()->has('success'))   
        <div class="message-container success">
            <p>{{session('success')}}</p>
        </div>
    @endif
<footer>
  <div class="social-icons">
    <a href="https://twitter.com/YourTwitter" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
    <a href="https://facebook.com/YourFacebook" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
    <a href="https://instagram.com/YourInstagram" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
    <a href="/popup" target="_blank">Popup</a>
  </div>
</footer>

</body>
</html>