<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
    
    .search-bar {
            display: flex;
            align-items: center;
            width: 50%;
            margin: 10px;
            position: absolute;
            top: 10%;
            left: 25%;
        }

        #searchInput {
            flex: 1;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 3px;
        }

        #searchButton {
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 8px;
            margin-left: 5px;
        }

        #trashButton {
            background-color: #ff5555;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            padding: 8px;
            margin-left: 5px;
            position:relative;
            left:80%;
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
@include('admin/header');
@include('admin/dashboard');

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

        

    <div class="search-bar">
        <form action="/admin/search">
            <input type="text" id="searchInput" name='search' placeholder="Search by name or email" value='{{$search}}'>
            <input type="submit" value='Search' id="searchButton">
        </form>
        <a href="{{route('viewTrash')}}">
            <button id="trashButton"> View Trash</button>
        </a>
    </div>

@include('admin/admin_panel');
</body>
</html>
</body>
</html>
