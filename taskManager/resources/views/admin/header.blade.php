<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f4;
    }

    .admin-panel {
      background-color: #333;
      color: #fff;
      padding: 10px;
      text-align: center;
      display:flex;
      justify-content:space-around;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #333;
      min-width: 160px;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .menu-option {
      padding: 12px;
      text-decoration: none;
      display: block;
      color: #fff;
      transition: background-color 0.3s;
    }

    .menu-option:hover {
      background-color: #555;
    }
  </style>
</head>
<body>

  <div class="admin-panel">
  <a href='/admin' class="menu-option">Home</a>

    <div class="dropdown">
      <span class="menu-option">View</span>
      <div class="dropdown-content">
        <a href="{{route('showGiversAdmin')}}" class="menu-option">Givers</a>
        <a href="{{route('showReceiversAdmin')}}" class="menu-option">Receivers</a>
        <a href="{{route('showAll')}}" class="menu-option">All</a>
      </div>
    </div>

    <div class="dropdown">
      <span class="menu-option">Add</span>
      <div class="dropdown-content">
        <a href="{{route('addGivers')}}" class="menu-option">Givers</a>
        <a href="{{route('addReceivers')}}" class="menu-option">Receivers</a>
      </div>
    </div>

    <div class="dropdown">
      <span class="menu-option">Edit</span>
      <div class="dropdown-content">
        <a href="" class="menu-option">Givers</a>
        <a href="" class="menu-option">Receivers</a>
        <a href="" class="menu-option">All</a>
      </div>
    </div>

    <div class="dropdown">
      <span class="menu-option">Delete</span>
      <div class="dropdown-content">
        <a href="" class="menu-option">Givers</a>
        <a href="" class="menu-option">Receivers</a>
        <a href="" class="menu-option">All</a>
      </div>
    </div>
  </div>
