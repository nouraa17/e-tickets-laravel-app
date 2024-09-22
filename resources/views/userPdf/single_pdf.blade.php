<!DOCTYPE html>
<html>
<head>
    <title>User Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>User Details</h1>
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Name:</strong> {{ $user->name }}</p>
    <p><strong>Phone:</strong> {{ $user->phone }}</p>
    <p><strong>Type:</strong> {{ $user->type }}</p>
</body>
</html>
