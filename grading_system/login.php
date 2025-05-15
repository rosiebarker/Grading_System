<?php session_start(); ?>

<?php
if (isset($_SESSION['account_type'])) {
    if ($_SESSION['account_type'] === 'Admin') {
        header('Location: admindashboard.php');
        exit();
    } elseif ($_SESSION['account_type'] === 'Teacher' || $_SESSION['account_type'] === 'Student') {
        header('Location: index.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<!-- ADMIN LOGIN ADMIN@HOTMAIL.COM PASSWORD: Password123-->
<!-- TEACHER LOGIN JOEGRANT@HOTMAIL.COM PASSWORD: Password123-->
<!-- STUDENT LOGIN JAMESCAMPBELL@HOTMAIL.COM PASSWORD: Password123-->

<body>

    <div class="form-container" style="text-align: center;">

        <h2>Login</h2>

        <form action="loginprocess.php" method="POST">

            <input type="email" name="email" placeholder="Email" required style="width: 250px; margin: 10px auto; display: block; text-align: center;">

            <div class="pass-wrapper">
                <input type="password" name="password" placeholder="Password" required id="password">
                <img src="uploads/show.png" class="toggle-password" onclick="togglePasswords()" id="toggle-icon">
            </div>

            <button type="submit" style="width: 250px; margin: 10px auto; display: block;">Log In</button>
        </form>
    </div>

    <script>
    function togglePasswords() {
        const password = document.getElementById('password');
        const type = password.type === 'password' ? 'text' : 'password';
        password.type = type;
    }
    </script>

</body>
</html>