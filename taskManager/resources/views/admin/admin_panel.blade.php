    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            body, h1, h2, p, ul, li {
    margin: 0;
    padding: 0;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f4;
}

.table-container {
    position: absolute;
    top: 15%;
    left: 25%;
}

.admin-table {
    border-collapse: collapse;
    width: 100%;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.admin-table th, .admin-table td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: left;
}

.admin-table th {
    background-color: #f2f2f2;
}

.admin-table tr:hover {
    background-color: #f5f5f5;
}

.edit-button, .trash-button {
    padding: 8px 12px;
    margin-right: 5px;
    cursor: pointer;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 3px;
}

.trash-button {
    background-color: #e74c3c;
}

/* Style for More Information link */
.more-info-link {
    text-decoration: none;
    color: #3498db;
}

        </style>
    </head>
    <body>

    <div class="table-container">
        <table class="admin-table">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Type</th>
                <th>Action</th>
                <th>More Information</th>
            </thead>
            @foreach($givers as $giver)
                <tr>
                    <td>{{$giver->giver_id}}</td>
                    <td>{{$giver->name}}</td>
                    <td>{{$giver->email}}</td>
                    <td>Giver</td>
                    <td>
                        <button class="edit-button">Edit</button>

                        <a href="{{route('trashGiver',['id'=>$giver->giver_id])}}">
                            <button class="trash-button">Trash</button>
                        </a>
                    </td>
                    <td>
                        <!-- Add more information as needed -->
                        <a href="">Details</a>
                    </td>
                </tr>
            @endforeach
            
            @foreach($receivers as $receiver)
                <tr>
                    <td>{{$receiver->receiver_id}}</td>
                    <td>{{$receiver->name}}</td>
                    <td>{{$receiver->email}}</td>
                    <td>Receiver</td>
                    <td>
                        <button class="edit-button">Edit</button>
                        <a href="{{route('trashReceiver',['id'=>$receiver->receiver_id])}}">
                            <button class="trash-button">Trash</button>
                        </a>
                    </td>
                    <td>
                        <!-- Add more information as needed -->
                        <a href="">Details</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <div class="d-felx justify-content-center">
        @if(Request::url() == 'http://localhost:8000/admin/showGivers' || Request::url() == 'http://localhost:8000/admin/showAll'  || Request::url() == 'http://localhost:8000/admin')    
            {{$givers->links()}}
        @endif

        @if(Request::url() == 'http://localhost:8000/admin/showReceivers' || Request::url() == 'http://localhost:8000/admin/showAll' || Request::url() == 'http://localhost:8000/admin')
            {{$receivers->links()}}
        @endif
        </div>
    </div>
