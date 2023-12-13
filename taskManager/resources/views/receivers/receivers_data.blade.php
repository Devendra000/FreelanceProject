<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receiver Data</title>
</head>
<body>
    <table border='1px solid black'>
        <thead>
            <th>Name</th>
            <th>Email</th>
        </thead>
        @foreach($receivers as $receiver)
        <tr>
            <td>{{$receiver->name}}</td>
            <td>{{$receiver->email}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>