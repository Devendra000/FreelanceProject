<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giver Profile</title>

    <style>
        body {
          font-family: Arial, sans-serif;
          background-color: #f4f4f4;
          margin: 0;
          padding: 0;
          display:flex;
          flex-direction:column;
          min-height:100vh;
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

        main{
          flex:1;
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
        
        .profile-container {
          display:flex;
          flex-direction:column;
          max-width: 600px;
          margin: 50px auto;
          background-color: #fff;
          padding: 20px;
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-picture-container {
            text-align: center;
        }

        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 20px;
        }

        .profile-picture img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .upload-button {
          background-color:blue;
          padding: 5px 10px; 
          text-decoration: none;
          color: #ffffff; 
          border-radius: 2px; 
        }

        .profile-info {
            text-align: center;
        }

        .profile-info h2 {
            margin: 10px 0;
        }

        .profile-info p {
            color: #888;
        }

        .update-info {
            margin-top: 20px;
        }

        .update-info label {
            display: block;
            margin-bottom: 8px;
        }

        .update-info input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        .update-profile{
          display:flex;
          justify-content:center;
          align-items:center;
        }

        .update-button {
          background-color:green; #your-desired-color;
          padding: 5px 10px; /* Adjust the padding as needed */
          text-decoration: none; /* Remove underline */
          color: #ffffff; /* Text color, adjust as needed */
          border-radius: 4px; /* Optional: Add rounded corners */
        }

        input[type="file"] {
          display: none;
        }

    /* Style the custom upload button */
    .custom-upload-button {
      padding:5px;
      background-color: #3498db;
      color: #fff;
      cursor: pointer;
      border: none;
      border-radius: 4px;
    }

    /* Style the second button */
    #uploadButton {
      display: none;
      margin-top: 10px;
    }

    #image-preview {
      max-width: 100%;
      max-height: 150px;
      margin-top: 10px;
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
    <div class="profile-container">
    <div class="profile-picture-container">
            <div class="profile-picture">
                <img id="image-preview" src="{{asset('storage/givers/').'/'.Auth::guard('givers')->user()->images}}" alt="Profile Picture Preview">
            </div>
            <form action="/upload" method="post" enctype="multipart/form-data">
        @csrf

        <label for="image-upload" id='submitLabel' class="custom-upload-button">Upload picture</label>
        <input type="file" name="file" id="image-upload" accept="image/*" onchange="previewImage()" name="image">

        <button type="submit" class='upload-button' id="uploadButton" style="display: none;">Upload this picture</button>
    </form>
        </div>
        <br><br>
        <div class="profile-info">
        <form method='post' action="{{route('updateGiver')}}"> 
          @csrf

            <h2 id="name" ondblclick="enableEdit('name')">{{Auth::guard('givers')->user()->name}}</h2>
            <br>
            <p>Email: <span id="email" ondblclick="enableEdit('email')">{{Auth::guard('givers')->user()->email}}</span> </p>
            <p>User since: {{Auth::guard('givers')->user()->created_at}}</p>
        </div>
        
        
        <div class="update-profile">
            <input type='submit' class="update-button" value='Update'>
        </div>
      </form> 
    </div>
</main>

<footer>
  <div class="social-icons">
    <a href="https://twitter.com/YourTwitter" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
    <a href="https://facebook.com/YourFacebook" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
    <a href="https://instagram.com/YourInstagram" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
  </div>
</footer>    

<script>
        function previewImage() {
            const input = document.getElementById('image-upload');
            const preview = document.getElementById('image-preview');
            const uploadButton = document.getElementById('uploadButton');
            const submitLabel = document.getElementById('submitLabel');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                    uploadButton.style.display = 'inline';
                    submitLabel.innerHTML = 'Select another picture';
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <script>
        function enableEdit(fieldId) {
            var element = document.getElementById(fieldId);
            
            // Create an input element
            var inputElement = document.createElement('input');

            // Set the type, value, and placeholder attributes
            if(fieldId=='email'){
              inputElement.type = 'email';
            }else{
              inputElement.type = 'text';
            }
            inputElement.value = element.innerText.trim()||element.innerHTML.trim();
            inputElement.placeholder = element.innerText.trim()||element.innerHTML.trim();
            inputElement.name = fieldId;
            
            // Set the id and class attributes
            inputElement.id = fieldId + 'Input';
            inputElement.className = 'update-info-input';
            
            // Replace the original element with the input element
            element.parentNode.replaceChild(inputElement, element);

            // Focus on the input element
            inputElement.focus();
            
            // Add an event listener to handle blur (when focus is lost)
            inputElement.addEventListener('blur', function() {
                // Replace the input element with the original element
                element.innerText = inputElement.value || inputElement.placeholder;
                element.parentNode.replaceChild(element, inputElement);
            });
        }
    </script>


</body>

</html>