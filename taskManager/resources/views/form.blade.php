<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f5f5f5; /* Light Gray */
        margin: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        position: relative; /* Make body a relative positioning context */
    }

    .login-container {
        background-color: #ffffff; /* White */
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        margin-top: 50px; /* Adjust this value for spacing */
    }

    h2 {
        display: flex;
        justify-content: center;
        padding-bottom: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 8px;
        color: #333333; /* Dark Gray */
    }

    input {
        width: 100%;
        padding: 8px;
        box-sizing: border-box;
        border: 1px solid #cccccc; /* Light Gray */
        border-radius: 4px;
        margin-bottom: 10px;
    }

    button {
        background-color: #4caf50; /* Green */
        color: #ffffff; /* White */
        padding: 10px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        width: 100%;
    }

    .disabled {
        background-color: #cccccc; /* Light Gray */
        cursor: not-allowed;
    }

    .checkbox-label {
        display: flex;
        align-items: center;
    }

    #rememberPassword {
        margin-right: 8px;
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
        top:10%;
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
<div>
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

</div>

<div class='login-container'>
    <h2>Login</h2>
    {!! Form::open(['route'=>'login.post', 'files'=>true, 'id'=>'loginForm']) !!}

        <div class="form-group">
        {!!Form::label('email', 'Email',);!!}
            {!! Form::email('email',null,['class'=>'form-element', 'autocomplete'=>"true"]) !!}
        </div>

        <div class="form-group">
            {!!Form::label('password', 'Password',);!!}   
            {!! Form::password('password',['class'=>'form-element'])!!}
        </div>

        <div class="form-group">

            <button id="submitButton" type="submit" disabled='true' class='disabled'>Login</button>

        </div>
        
        <div>
            <p>Don't have an account? <a href="{{route('registration')}}">Register</a>
        </div>

    {!! Form::close() !!}
</div>
<script>
    document.getElementById('loginForm').addEventListener('input', function () {
        var emailValue = document.getElementById('email').value.trim();
        var passwordValue = document.getElementById('password').value.trim();
        var submitButton = document.getElementById('submitButton');

        if (emailValue !== '' && passwordValue !== '') {
            submitButton.removeAttribute('disabled');
            submitButton.classList.remove('disabled');
        } 
        if(emailValue == '' || passwordValue == '') {
            submitButton.setAttribute('disabled', 'true');
            submitButton.classList.add('disabled');
        }
    });
</script>
</body>
</html>