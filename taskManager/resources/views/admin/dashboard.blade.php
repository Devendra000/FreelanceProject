<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/adminDashboard.css') }}">
</head>
<body>

    
    <div class="container">
        <div class="sidebar">
            <h2>Statistics</h2>
            <div class="statistic">
                <p>Total Users: <span> {{App\Models\giver::count()+App\Models\receiver::count()}} </span></p>
            </div>
            <div class="statistic">
                <p>Total Givers: <span> {{App\Models\giver::count()}} </span></p>
            </div>
            <div class="statistic">
                <p>Total Receivers: <span> {{App\Models\receiver::count()}} </span></p>
            </div>
            <div class="statistic">
                <p>Active Users: <span> $activeUsers </span></p>
            </div>
            <div class="statistic">
                <p>Inactive Users: <span> $inactiveUsers </span></p>
            </div>
            <div class="statistic">
                <p>Total Work in Progress: <span> $totalWorkInProgress </span></p>
            </div>
            <div class="statistic">
                <p>Total Work Completion: <span> $totalWorkCompletion </span></p>
            </div>
            <div class="statistic">
                <p>Work Not Accepted Yet: <span> $workNotAccepted </span></p>
            </div>
            
        </div>

    </div>
</body>
</html>
