<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giver Data</title>
</head>
<body>
    <table border='1px solid black' style='padding:2px; margin-left:30%;'>
        <thead>
            <th>Name</th>
            <th>Email</th>
        </thead>
        @foreach($givers as $giver)
        <tr>
            <td>{{$giver->name}}</td>
            <td>{{$giver->email}}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>