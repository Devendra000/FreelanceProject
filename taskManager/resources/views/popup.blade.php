<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Popup Example</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .popup {
            position: fixed;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            text-align: center;
            z-index: 1000;
        }

        .popup-close {
            cursor: pointer;
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<!-- Button to Trigger Popup -->
<button onclick="togglePopup()">Open Popup</button>

<!-- Popup Container -->
<div class="overlay" id="overlay">
    <div class="popup">
        <span class="popup-close" onclick="togglePopup()">&times;</span>
        <h2>This is a Popup</h2>
        <p>Popup content goes here.</p>
    </div>
</div>

<!-- JavaScript to Toggle Popup -->
<script>
    function togglePopup() {
        var overlay = document.getElementById('overlay');
        overlay.style.display = (overlay.style.display === 'block') ? 'none' : 'block';
    }
</script>

</body>
</html>
