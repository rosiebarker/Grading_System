<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<?php include 'navigationbar.php'; ?>

<body class="bg-light">

<div class="container" style="max-width: 600px; margin-top: 50px;">
    <div class="form-container" style="text-align: center; background: #f9f9f9; padding: 20px; border-radius: 8px;">
        <h2>Login</h2>
        <form action="loginprocess.php" method="POST">
            <input type="email" name="email" placeholder="Email" required style="width: 250px; margin: 10px auto; display: block; text-align: center;">
            <input type="password" name="password" placeholder="Password" required style="width: 250px; margin: 10px auto; display: block; text-align: center;">
            <button type="submit" style="width: 250px; margin: 10px auto; display: block;">Login</button>
        </form>
    </div>
</div>
</body>
</html>