<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            color: #333;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }
        .header {
            background-color: #4a5568;
            color: #fff;
            padding: 10px;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            margin-bottom: 20px;
        }
        .header h2 {
            margin: 0;
            font-size: 24px;
        }
        .content {
            padding: 20px;
        }
        .user-info {
            margin-bottom: 20px;
        }
        .user-info p {
            margin: 5px 0;
        }
        .logout-btn {
            background-color: #e53e3e;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 4px;
        }
        .logout-btn:hover {
            background-color: #c53030;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>Dashboard</h2>
        </div>
        <div class="content">
            <div class="user-info">
                <p>You are logged in as: John Doe</p>
                <p>Email: john.doe@example.com</p>
            </div>
            <form method="POST" action="/logout">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
</body>
</html>
